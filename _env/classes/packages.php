<?php

   /**
    * Class for using packages and additional plugins
    */
    
    class Package {
    
       /**
        * Function for autoloading packages
        * @param    $list    List of package names
        */
        function loadPackages($list) {
            
            // Globalize some data
            global $cfg;
            $packdir = dire . '' . $cfg['packages']['folder'];

            // Includes
            include_once(dire.'_env/functions/error.php');
    
            // Check if directory exists
            if(is_dir($packdir)) {
            
                // Do it for each package in list
                foreach($list as $p) {
                
                    $dir         = str_replace('//', '/', $packdir . '/' . $p);
                    $autofile    = $dir . '/Autoloader.php';
                    $classfile   = $dir . '/class.' . $p . '.php';
                    $funcfile    = $dir . '/function.' . $p . '.php';

                    // Check if directory exists
                    if(is_dir($dir)) {
                        
                        // Check if auto loader file exists
                        if(is_file($autofile)) {
                        
                            // Include auto loader file
                            require_once $autofile;
                        
                        // Check if class file exists
                        } elseif(is_file($classfile)) {
                        
                            // Include class file
                            include($classfile);
                        
                        // Check if function file exists
                        } elseif(is_file($funcfile)) {
                        
                            // Include function file
                            include($funcfile);
                            
                        } else {
                            
                            // Panic if nothing works
                            panic('
The required package "' . $p . '" doesn\'t match the standards or is corrupted.
No include file was found. Please refer to the documentation.

Searched for these files in the package:
' . $classfile . '
' . $funcfile
                                );
                            
                        } //if
                        
                    // Panic if folder isn't found
                    } else {
                    
                        panic('A required package named "' . $p . '" is not installed!<br />Please check your installation!');
                    
                    } // if
                    
                } // foreach
                    
            // Panic if configured folder doesn't exists
            } else {

                panic('Package folder "' . $cfg['packages']['folder'] . '" doesn\'t exist!<br />Please check your configuration!');
                    
            } // if
                        
        } // function
    
    } // class
    
?>