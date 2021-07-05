<?php

require 'vendor/autoload.php';

use App\Abilities;

$ab = new Abilities('Coucou', true, 'Desc');
var_dump($ab);