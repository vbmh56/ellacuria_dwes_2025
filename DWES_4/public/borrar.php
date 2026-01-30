<?php
// public/borrar.php

session_start();

if (isset($_SESSION['preferencias']) && !empty($_SESSION['preferencias'])) {
    unset($_SESSION['preferencias']);
    $_SESSION['flash_ok'] = 'preferences_deleted';
} else {
    $_SESSION['flash_error'] = 'no_data';
}

header('Location: preferencias.php');
exit;
