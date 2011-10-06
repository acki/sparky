<?php

   /**
    * System-wide include file
    * Execute important things, include configs and functions, do some magic stuff
    */
    
    // We need the configuration from the beginning
    include('config.default.php');

    // Sets the value to report all PHP error, set log file, set locales
    error_reporting(E_ALL, E_NOTICE);
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
    
    // Includes
    include('functions/functions.php');
        
?>