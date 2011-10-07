<?php

   /**
    * File for some basic, ever needed functions
    */
    
   /**
    * vGET is a function for getting simple some post, get, 
    * cookie, session and file data
    * It takes also care of html entities (XSS)
    * @param    $str     The key for which you want data
    * @param    $safe    If true, it makes some safe functions for avoiding XSS
    * @param    $type    You CAN define the type of the data pipe (GET, POST, ...)
    * @param    $strtype You can define the expected type of data (not implemented)
    * @param    $ent     If true, executes html_entities
    */
    
    function vGET($str,$safe=true,$type=false,$strtype=false,$ent=true) {

        // Check if function exists
        if(!function_exists('vGET_parse')) {
            
            // Create a parse function
            function vGET_parse($foo) {
            
                // Check if array
                if(is_array($foo)) {
                    foreach($foo as $k=>$v) {
                        $foo[$k] = vGET_parse($foo[$k]);
                    }
                // Check if scalar
                } elseif(is_scalar($foo)) {
                    if(is_numeric($foo)) {
                        $foo = (float) $foo;
                    } elseif(is_string($foo)) {
                        $foo = (string) stripslashes($foo);
                    }
                // Check if null
                } elseif(is_null($foo)) {
                    $foo = NULL;
                }
                
                // Returns data
                return $foo;
                
            }
            
        }
        
        // Globalize the important data pipes
        global $_GET, $_POST, $_COOKIE, $_FILES, $_SESSION;
        
        // Get all in an array
        $_strings = array('get'=>$_GET,'post'=>$_POST,'cookie'=>$_COOKIE,'files'=>$_FILES,'session'=>$_SESSION);
        
        // Take the work for each data value
        foreach($_strings as $key=>$value) {
        
            // Check if a type is defined and matchs
            if((!$type || $type==$key) && isset($value[$str])) {
                $v            = $value[$str];
                ${$str}       = vGET_parse($v);
                $strtype      = gettype(${$str});
                
                // Return files and sessions directly, otherwise do the safe work
                if($key=='files' || $key=='session') {
                    return ${$str};
                } else {
                    
                    // Return arrays directly, escape the others if set
                    if(is_array(${$str})) {
                        return ${$str};
                    } elseif($ent==false || $safe==true) {
                        return ${$str};
                    } else {
                        // Escapes the string
                        return htmlentities(${$str});
                    } 
                                       
                }
                
            }
            
        }
        
        // When all goes wrong, we got false
        return false;
        
    }

?>