<?php

// Get environment & autoloader, the $di & $app-object.
require __DIR__.'/config_with_app.php';

// Get the class CFlash
$di->setShared('flash', function() {
    $flash = new \Anax\Flash\CFlash();
    return $flash;
});

// Other services, modules, controllers here

// Starts the session, wich is required by Flash by itzy
$app->session;


// Add stylesheet for flash by itzy
$app->theme->addStylesheet('css/flash.css');

// Routes
$app->router->add('', function() use ($app) {

    $app->theme->setTitle("Flash test");

    $app->session;

  $app->flash->add('info', 'Better be on your toes, this needs your attention but is not urgent.');
  $app->flash->add('success', 'Yay! You are totally successful !');
  $app->flash->add('warning', 'Dude, I have to warn you, you do not look too good.');
  $app->flash->add('error', 'Oh snap, something went wrong!');

    $app->theme->setVariable('title', "Flash Test")
        ->setVariable('main', $app->flash->get());

});

$app->router->handle();
$app->theme->render();
