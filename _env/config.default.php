<?php

    /**
     * File for system wide sparky configuration
     * Please don't change this!!
     */

    $cfg = array(
    
        // Default configuration for page width values
        'page'=>array(
            'title'=>'sparky',
            'defaultlang'=>'de',
            'cache'=>'_cache',
        ),
        
        // Database connection (MySQL)
        'mysql'=>array(
            'host'=>"localhost",
            'user'=>"sparky",
            'password'=>"sparky",
            'db'=>"sparky",
        ),
        
        // Style configuration
        'style'=>array(
            'id'=>"default",
            'path'=>"_style",
        ),
        
        // Authentication configuration
        'auth'=>array(
            'timeout'=>60*60*24*30,
            'cookietimeout'=>60*60*24*30,
        ),
        
        // Localization
        'locales'=>array(
            'languages'=>array(
                'de',
            ),
            'LC_TIME'=>'de_CH',
        ),
        
        // Logging
        'log'=>array(
            'error'=>true,
            'errordir'=>'_log',
            'errorlog'=>'error.' . date('Ymd') . '.log',
        ),
        
        // Packages
        'packages'=>array(
            'folder'=>'_env/packages/',
            'required'=>array(
                'Twig',
            ),
        ),
            
    );
    
?>
