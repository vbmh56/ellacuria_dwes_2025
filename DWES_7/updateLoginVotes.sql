-- Ampliacion para DWES_7: login de usuarios y sistema de votaciones.
-- Ejecutar despues de createDatabase.sql.

use proyecto;

create table if not exists usuarios (
    id int auto_increment primary key,
    usuario varchar(50) not null unique,
    password varchar(255) not null
);

create table if not exists votos (
    id int auto_increment primary key,
    usuario_id int not null,
    producto_id int not null,
    valoracion tinyint unsigned not null,
    constraint chk_votos_valoracion check (valoracion between 1 and 5),
    constraint uq_votos_usuario_producto unique (usuario_id, producto_id),
    constraint fk_votos_usuario foreign key (usuario_id)
        references usuarios(id)
        on update cascade
        on delete cascade,
    constraint fk_votos_producto foreign key (producto_id)
        references productos(id)
        on update cascade
        on delete cascade
);

insert into usuarios (usuario, password) values
    ('ana', '$2y$10$JgqQ.pe3WWcnfUKXZ9/epuVbLa3Z/xt48cQhZox/TUNTXpMyTjgOG'),
    ('borja', '$2y$10$m4ssfijjBoUYAkqDsPumRuhYEt9oj.5mnGzNQ3XejmLZ.YHWf0OJ6'),
    ('demo', '$2y$10$5ewWoTvWMzGQHlDbUkaOfOt9xO/BUm3PwYTaMF0326SKLeU69ts0i')
on duplicate key update
    usuario = values(usuario);
