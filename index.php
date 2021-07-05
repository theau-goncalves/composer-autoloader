<?php

require 'vendor/autoload.php';

use App\Abilities;
use Cocur\Slugify\Slugify;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

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

// A partir de symfony/filesystem
//Verif if /public/uploads exist -> sinon création

$filesystem = new Filesystem();

$uploadDirPath = __DIR__ . '/public/uploads';

if(!$filesystem->exists($uploadDirPath)) {
    try {
        $filesystem->mkdir($uploadDirPath);
    } catch (IOExceptionInterface $exception) {
        echo "An error occurred while creating your directory at ".$exception->getPath();
    }
} else {
    try {
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $filesystem->appendToFile(
            $uploadDirPath . '/test.txt',
            $date . " Fichier lancé \n"
        );

        echo 'Uploads folder has been created';
    } catch (IOExceptionInterface $exception) {
        echo "An error occurred while creating test.text ".$exception->getPath();
    }
}


