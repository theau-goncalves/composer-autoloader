<?php

require 'vendor/autoload.php';

use App\Abilities;

$ab = new Abilities('Coucou', true, 'Desc');

$tab = [
    0 => [
        'name' => 'Theau',
        'height' => '180'
    ],
    1 => [
        'name' => 'Alice',
        'height' => '158'
    ]
];

dump($tab);
dump($ab);

//apprendre-a-utiliser-composer
$postTitle = "Apprendre à utiliser composer";