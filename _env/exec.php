<?php

   /**
    * System-wide include file
    * Execute important things, include configs and functions, do some magic stuff
    */
    
    // We need the configuration from the beginning
    include('config.default.php');

    // Sets the value to report all PHP error, set log file, set locales
    error_reporting(E_ALL);
    ini_set('error_log','../' . $cfg['log']['errordir'] . '/' . $cfg['log']['errorlog']);
    ini_set('log_errors', $cfg['log']['error']);
    setlocale(LC_TIME, $cfg['locales']['LC_TIME']);
    
    // Create an output cache
    ob_start();
    
    // Error handling for direct file access, before do more stuff
    include('functions/error.php');    
    if(stristr($_SERVER["REQUEST_URI"], 'exec.php') === 'exec.php') {
        panic("You shouldn't access this file directly", "../");
    }
    
    // Create style path
    $tmp_style_path = dire . $cfg['style']['path'].'/' . $cfg['style']['id'].'/';

    // Includes
    include('functions/functions.php');
    include('classes/packages.php');
    
    // Autoload packages
    $packages = new Package;
    $packages->loadPackages($cfg['packages']['required']);
    
    // Load Twig templating engine
    Twig_Autoloader::register();
    
    $loader = new Twig_Loader_Filesystem($tmp_style_path . '/templates');
    $twig = new Twig_Environment($loader, array(
        'cache' => $cfg['page']['cache'],
    ));
    
?>