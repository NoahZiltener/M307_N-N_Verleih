<?php

$router = new Router();

$router->define([
    '' => 'app/Controllers/WelcomeController.php',
    'home' => 'app/Controllers/WelcomeController.php',
    'update' => 'app/Controllers/UpdateController.php',
    'create' => 'app/Controllers/CreateController.php'
]);