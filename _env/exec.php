<?php

   /**
    * System-wide include file
    * Execute important things, include configs and functions, do some magic stuff
    */
    
    // We need the configuration from the beginning
    include_once('config.default.php');
    
    // Check if constants are defined
    if(!defined('dire')) {
        define('dire', '../');
    }

    // Set error reporting
    error_reporting(E_ALL);

    // Check if debug mode
    if($cfg['page']['debug']) {
        // Unset cache
        $cache = false;
    } else {
        // Set no error display
        ini_set('display_errors', 0);
        
        // Log errors to file
        ini_set('error_log', dire . $cfg['log']['errordir'] . '/' . $cfg['log']['errorlog']);
        ini_set('log_errors', $cfg['log']['error']);
        
        // Set template cache path
        $cache = dire . $cfg['page']['cache'];
    }
    
    // Create an output cache
    ob_start();
    
    // Create style path
    $tmp_style_path = dire . $cfg['style']['path'].'/' . $cfg['style']['id'].'/';

    // Autoload packages
    include_once('classes/packages.php');
    $packages = new Package;
    $packages->loadPackages($cfg['packages']['required']);
    
    // Load Twig templating engine
    include_once('functions/twig.php');
    $twig = loadTwig($tmp_style_path, $cache);

    // Includes
    include_once('functions/functions.php');
    include_once('functions/render.php');
    
    // Error handling for direct file access, before do more stuff
    include_once('functions/error.php');    
    if(stristr($_SERVER["REQUEST_URI"], 'exec.php') === 'exec.php') {
        panic("You shouldn't access this file directly", "../");
    }

    // Set encoding and locales
    header('Content-Type: text/html; charset=UTF8');
    setlocale(LC_TIME, $cfg['locales']['LC_TIME']);
    
?>