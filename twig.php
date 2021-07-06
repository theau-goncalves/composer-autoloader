<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require 'vendor/autoload.php';

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader, [
//    'cache' => __DIR__ . '/var/cache',
]);

try {

    echo $twig->render('pages/index.html.twig', [
        'name' => 'Theau Goncalves',
    ]);

} catch (Exception $e) {
    echo $e->__toString();
}

