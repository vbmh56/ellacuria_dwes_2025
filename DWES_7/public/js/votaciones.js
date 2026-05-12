document.addEventListener('DOMContentLoaded', () => {
  prepararBotonesVoto();
  cargarValoraciones();
});

function prepararBotonesVoto() {
  document.querySelectorAll('.voto-btn').forEach((boton) => {
    boton.addEventListener('click', votarProducto);
  });
}

async function cargarValoraciones() {
  try {
    const respuesta = await fetch('api/votos.php');
    const datos = await respuesta.json();

    if (!respuesta.ok || !datos.ok) {
      return;
    }

    Object.values(datos.valoraciones).forEach((valoracion) => {
      pintarValoracion(valoracion);

      if (valoracion.ha_votado) {
        bloquearVoto(valoracion.producto_id);
      }
    });
  } catch (error) {
    console.error('No se pudieron cargar las valoraciones.', error);
  }
}

function pintarValoracion(valoracion) {
  const contenedor = document.querySelector(
    `.valoracion-producto[data-producto-id="${valoracion.producto_id}"]`
  );

  if (!contenedor) {
    return;
  }

  if (valoracion.total_votos === 0 || valoracion.media === null) {
    contenedor.textContent = 'Sin valorar';
    return;
  }

  contenedor.replaceChildren(
    document.createTextNode(`${valoracion.total_votos} Valoraciones. `),
    crearEstrellas(valoracion.media)
  );
}

function crearEstrellas(media) {
  const estrellas = document.createElement('span');
  estrellas.className = 'estrellas';
  estrellas.setAttribute('aria-label', `Valoracion media ${media} de 5`);

  const completas = Math.floor(media);
  const tieneMedia = media - completas >= 0.5;

  for (let posicion = 1; posicion <= 5; posicion++) {
    const estrella = document.createElement('span');

    if (posicion <= completas) {
      estrella.className = 'estrella estrella-completa';
    } else if (posicion === completas + 1 && tieneMedia) {
      estrella.className = 'estrella estrella-media';
    } else {
      estrella.className = 'estrella estrella-vacia';
    }

    estrella.setAttribute('aria-hidden', 'true');
    estrellas.appendChild(estrella);
  }

  return estrellas;
}

function bloquearVoto(productoId) {
  const select = document.querySelector(`.voto-select[data-producto-id="${productoId}"]`);
  const boton = document.querySelector(`.voto-btn[data-producto-id="${productoId}"]`);

  if (select) {
    select.disabled = true;
  }

  if (boton) {
    boton.disabled = true;
  }
}

async function votarProducto(event) {
  const boton = event.currentTarget;
  const productoId = boton.dataset.productoId;
  const select = document.querySelector(`.voto-select[data-producto-id="${productoId}"]`);

  if (!select) {
    return;
  }

  const datosVoto = new FormData();
  datosVoto.append('producto_id', productoId);
  datosVoto.append('valoracion', select.value);

  boton.disabled = true;

  try {
    const respuesta = await fetch('api/votos.php', {
      method: 'POST',
      body: datosVoto,
    });
    const datos = await respuesta.json();

    if (!respuesta.ok || !datos.ok) {
      alert(datos.error || 'No se pudo guardar la votacion.');

      if (respuesta.status === 409) {
        bloquearVoto(productoId);
        return;
      }

      boton.disabled = false;
      return;
    }

    pintarValoracion(datos.valoracion);
    bloquearVoto(productoId);
  } catch (error) {
    console.error('No se pudo guardar la votacion.', error);
    alert('No se pudo guardar la votacion.');
    boton.disabled = false;
  }
}
