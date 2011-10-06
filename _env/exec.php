<?php

    error_reporting(E_ALL, E_NOTICE);
    
    ob_start();
    
    include('functions/error.php');
        
    if(stristr($_SERVER["REQUEST_URI"], 'exec.php') === 'exec.php') {

        panic("You shouldn't access this file directly", "../");
    
    }
    
?>