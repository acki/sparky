<?php

    /**
     * File for system wide sparky configuration
     * Please change this to your preferred values
     */

    $cfg = array(
    
       /**
        * Default configuration for page width values
        */
        'page'=>array(
            'title'=>"sparky",
            'defaultlang'=>"de",
        ),
        
       /**
        * Database connection (MySQL)
        */
        'mysql'=>array(
            'host'=>"localhost",
            'user'=>"sparky",
            'password'=>"sparky",
            'db'=>"sparky",
        ),
        
       /**
        * Style configuration
        */
        'style'=>array(
            'id'=>"default",
            'path'=>"_style",
        ),
        
       /**
        * Authentication configuration
        */
        'auth'=>array(
            'timeout'=>60*60*24*30,
            'cookietimeout'=>60*60*24*30,
        ),
        
       /**
        * Localization
        */
        'languages'=>array(
            'de',
        ),
            
    );
    
?>
