<?php

    /**
     * Return a panic error to the web. Deletes all other web content
     * Use PHP magic constants to fill out the first four variables
     * @param 	string	$dir         Magic constant __DIR__
     * @param 	string	$file        Magic constant __FILE__
     * @param 	string	$line        Magic constant __LINE__
     * @param 	string	$function    Magic constant __FUNCTION__
     * @param 	string	$panic       The panic message
     * @param 	string	$dire        Normally you dont need to touch this
     */

    function panic($dir, $file, $line, $function, $panic = 'Unknown error!', $dire = dire) {
    
        /**
         * Clean the web output, remove all php errors, fill empty variables,
         * create single file name
         */
        ob_end_clean();
        error_reporting(0);
        
        if ($function === '') {
            $function = 'Unknown or no function';
        }
        
        $file = str_ireplace($dir . '/', '', $file);
    
       /**
        * Print the panic message well formatted
        */
        print '
<html>
    <head>
        <title>sparky runned into a wall</title>
        <style>
            body {
                font-family: Helvetica, Arial, Verdana, sans-serif;
                font-size: 14px;
                text-align: center;
            }
            pre {
                margin-bottom: 20px;
                color: darkred;
            }
            a {
                color: darkred;
            }
        </style> 
    </head>
    <body>
    ';
        
        print '
        <h1><img src="' . $dire . '_style/default/icons/deadly.png" alt="deadly" /> Eh. I am <a href="http://github.com/chrigu99/sparky" target="_blank">sparky</a>.<br />I\'ve run into a wall.</h1>
        
        <h2>The reason i think:</h2>
        <pre>' . $panic . '</pre>
        
        <h4>File:</h4>
        <pre>' . $file . '</pre>
        <h4>Line:</h4>
        <pre>' . $line . '</pre>
        <h4>Function:</h4>
        <pre>' . $function . '</pre>
        
    </body>
</html>';

       /*
        * Don't do more, better you die.
        */    
        die;
        
    }

?>