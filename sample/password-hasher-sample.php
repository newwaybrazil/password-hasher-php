<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PasswordHasher\PasswordHasher;

$passwordHasher = new PasswordHasher();

//generate an hash
$pass = 'test';
$hash = $passwordHasher->hash($pass);
print("Hash: ". $hash);
echo PHP_EOL;

//verify generated hash
$result = $passwordHasher->isValid($pass, $hash);
print("Result: ". $result);
echo PHP_EOL;
