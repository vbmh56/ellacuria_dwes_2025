<?php
// app/public/_bootstrap.php
declare(strict_types=1);

session_start();

require __DIR__ . '/../vendor/autoload.php';

use Jenssegers\Blade\Blade;
use App\Carrito;

$blade = new Blade(__DIR__ . '/../views', __DIR__ . '/../cache');

if (!isset($_SESSION['carrito']) || !($_SESSION['carrito'] instanceof Carrito)) {
    $_SESSION['carrito'] = new Carrito();
}

$carrito = $_SESSION['carrito'];
