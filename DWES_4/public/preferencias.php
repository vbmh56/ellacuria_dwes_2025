<?php

$errores = [];

$old = $_SESSION['preferencias'] ?? [
  'idioma' => '',
  'perfil_publico' => '',
  'zona_horaria' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // 1) Recoger datos (y guardar "old" para repintar el formulario si falla)
        $old['idioma'] = trim($_POST['idioma'] ?? '');
        $old['perfil_publico'] = trim($_POST['perfil_publico'] ?? '');
        $old['zona_horaria'] = trim($_POST['zona_horaria'] ?? '');

        // 2) Validación mínima (FP)
        if ($old['idioma'] === '') $errores[] = "El idioma es obligatorio.";
        if ($old['perfil_publico'] === '') $errores[] = "El perfil público es obligatorio.";
        if ($old['zona_horaria'] === '') $errores[] = "La zona horaria es obligatoria.";        

        // 3) Insertar si todo ok
        if (empty($errores)) {
           
            // Guardar en sesión    
            $_SESSION['preferencias'] = $old;
        }
    }

// Definir la vista que contendrá el HTML
$view = __DIR__ . '/../views/app/preferencias.view.php';

// Incluir el layout
require_once __DIR__ . '/../views/layout.php';