# password-generator
Generate random password of a given level and length.

## Installation
This project using composer.
```
$ composer require raso/password_generator
```

## Usage
Create index.php in root of the project. Generate random password with the following code.
```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use MyApp\Password;

//first argument is pass level (1-3), second is pass length(6-20)
$test = new Password(3, 6);

echo $test->randomPassword();
```

Open your porject root in your CLI and run:
```
$ php index.php
```