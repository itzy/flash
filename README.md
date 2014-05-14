Flash by itzy
=====

A flash module for Anax-MVC, created by Julia Sivartsson, webdeveloper-student at Blekinge Tekniska Högskola.
This module comes with a simple stylesheet and icons that are available if you have Font Awesome (information further down).

It comes with four diffent styles:
- information
- success
- warning
- error

Preview
=====

![flash example](http://i60.tinypic.com/f1a52f.png)


How to use:
=====

At the top of your frontcontroller, add the following:

    // Get environment & autoloader and the $app-object.
    require __DIR__.'/config_with_app.php';

    // Get the class CFlash
    $di->setShared('flash', function() {
    $flash = new Anax\Flash\CFlash();
    return $flash;
    });

    // Starts the session, wich is required by Flash by itzy
    $app->session;
