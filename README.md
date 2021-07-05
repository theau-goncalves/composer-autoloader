# Composer

### Usefull links 
- [Get composer](https://getcomposer.org/download/)
- [PSR-2: Coding Style Guide](https://www.php-fig.org/psr/psr-2/)
- [PHP DOC](https://docs.phpdoc.org/3.0/guide/references/phpdoc/tags/index.html#tag-reference)
- [PHP DOC examples](https://docs.phpdoc.org/3.0/guide/guides/docblocks.html)

### Requirements

 - Composer 1 or 2
 - PHP > 7.4

### Installation
```bash
$ composer init
```

Fill in all the requested information 

Then add this code in the composer.json file 

```json
{
  "autoload": {
    "psr-4": {
      "App\\": "Class/"
    }
  }
}
```

Next, you need to generate the autoload file with composer

```bash
$ composer dump-autoload
```

Finaly, require the autoload.php file where you want

```php
<?php

require 'vendor/autoload.php';

use App\Person;

$person  = new Person('Theau', 'Goncalves');
```

It's done !

### Use simple libs

Install library via composer
```bash
$ composer require author/name_of_the_lib
```

If the library is a dev tool like the Symfony var dumper, juste add --dev after the lib's name
```bash
$ composer require symfony/var-dumper --dev
```

- [symfony/var-dumper](https://packagist.org/packages/symfony/var-dumper)
- [symfony/filesystem](https://packagist.org/packages/symfony/filesystem)
- [symfony/finder](https://packagist.org/packages/symfony/finder)
- [twig/twig](https://packagist.org/packages/twig/twig)
- [symfony/http-client](https://packagist.org/packages/symfony/http-client)
- [cocur/slugify](https://packagist.org/packages/cocur/slugify)
- [ramsey/uuid](https://packagist.org/packages/ramsey/uuid)

### Tutorials (french)

- [PHP DOC](https://grafikart.fr/tutoriels/phpdoc-1140)
- [Composer autoloader](https://grafikart.fr/tutoriels/autoload-php-psr-510)

### Author
 
- Théau Goncalves - theau@drosalys.fr
