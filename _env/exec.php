<?php

   /**
    * System-wide include file
    * Execute important things, include configs and functions, do some magic stuff
    */

   /**
    * Sets the value to report all PHP error
    */
    error_reporting(E_ALL, E_NOTICE);
   
   /**
    * Create an output cache
    */ 
    ob_start();
    
   /**
    * Error handling for direct file access, before do more stuff
    */
    include('functions/error.php');    
    if(stristr($_SERVER["REQUEST_URI"], 'exec.php') === 'exec.php') {
        panic("You shouldn't access this file directly", "../");
    }
    
   /**
    * Includes
    */
    include('config.default.php');
    
?>