<?php

    /**
     * Return a panic error to the web. Deletes all other web content
     * The magic constants will be read over debug_backtrace()
     * @param 	string	$panic       The panic message
     * @param 	string	$dire        Normally you dont need to touch this
     */

    function panic($panic = 'Unknown error!', $dire = dire) {

        // Globalize some data
        global $absolute_style_path, $twig, $cache, $cfg;

        // Do this if debug is not active
        if(!$cfg['page']['debug']) {
        
            // Clean the web output
            ob_end_clean();
            
            // Remove all php errors
            error_reporting(0);
        
        }
        
        if(!isset($twig) || !is_object($twig)) {
            include_once(dire . '_env/functions/twig.php');
            $twig = loadTwig($absolute_style_path, $cache);
         }
        
        include_once(dire . '_env/functions/render.php');
        
        // Read the needed backtrace informations, get script name
        $debug = debug_backtrace();
        if(isset($debug[0])) {
            $data['file']       = $debug[0]['file'];
            $data['line']       = $debug[0]['line'];
        }
        
        // Get the simple script name and set data
        $data['file'] = basename($data['file']);
        $data['panic'] = $panic;
        
        // Print the panic message well formatted
        render('panic.html', 'sparky runned into a wall', $data);

        // Don't do more, better you die.
        die;
        
    }
    
?>