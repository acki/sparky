<?php

    error_reporting(E_ALL, E_NOTICE);
    
    ob_start();
    
    include('func.error.php');
        
    if(stristr($_SERVER["REQUEST_URI"], 'exec.php') === 'exec.php') {

        panic(__DIR__, __FILE__, __LINE__, __FUNCTION__, "You shouldn't access this file directly", "../");
    
    }
    
?>