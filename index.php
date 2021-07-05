<?php

require 'vendor/autoload.php';

use App\Abilities;
use Cocur\Slugify\Slugify;
use Ramsey\Uuid\Uuid;

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

echo (new Slugify())->slugify($postTitle);

//Ajouter un uuid dans une case id de cache tableau de $tab pour obtenir

/*
 *
    0 => [
        'id' => '1ee9aa1b-6510-4105-92b9-7171bb2f3089'
        'name' => 'Theau',
        'height' => '180'
    ],
 */

$usersWithUuid = [];

foreach ($tab as $user) {
    $user['id'] = Uuid::uuid4()->toString();
    $usersWithUuid[] = $user;
}

dump($usersWithUuid);
