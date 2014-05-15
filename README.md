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


How to use in Anax-MVC
=====

First of all you need to implement CFlash in your own Anax-MVC version, simply place the class in your 'src'-folder.
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

If you want to use the stylesheet that comes with the module, put flash.css in your css folder to make it work, then write the following code in your froncontroller (below the previous code):

    // Add stylesheet for flash by itzy
    $app->theme->addStylesheet('css/flash.css');
    
    
That's it!
Now you can get flash by itzy for your own website.


    // Put this in a route in your frontcontroller
    $app->flash->add('info', 'Better be on your toes, this needs your attention but is not urgent.');
    $app->flash->add('success', 'Yay! You are totally successful !');
    $app->flash->add('warning', 'Dude, I have to warn you, you do not look too good.');
    $app->flash->add('error', 'Oh snap, something went wrong!');
    
    //If you're in a controller
    $this->flash->add('info', 'Better be on your toes, this needs your attention but is not urgent.');
    $this->flash->add('success', 'Yay! You are totally successful !');
    $this->flash->add('warning', 'Dude, I have to warn you, you do not look too good.');
    $this->flash->add('error', 'Oh snap, something went wrong!');
    
To then make the messages visible, add the following code inside your route/controller:

        //frontcontroller
        $app->flash->get();
        
        //controller or view
        $this->flash->get();
        
If you have support for Font Awesome, wich you get very easy from their page (http://fortawesome.github.io/Font-Awesome/) change the code to this:

        //frontcontroller
        $app->flash->get('icons');
        
        //controller or view
        $this->flash->get('icons');
        
Not that hard, right!
If you look at the code of your website it will look like this:

    <div class='flash_info'>
    <i class='fa fa-info-circle'></i>
    Better be on your toes, this needs your attention but is not urgent.
    </div>
    
    <div class='flash_success'>
    <i class='fa fa-check'></i>
    Yay! You are totally successful !
    </div>
    
    <div class='flash_warning'>
    <i class='fa fa-warning'></i>
    Dude, I have to warn you, you do not look too good.
    </div>
    
    <div class='flash_error'>
    <i class='fa fa-times-circle'></i>
    Oh snap, something went wrong!
    </div>
    
    
Have fun!
© Julia Sivartsson
