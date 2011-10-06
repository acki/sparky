<?php

    /**
     * Return a panic error to the web. Deletes all other web content
     * The magic constants will be read over debug_backtrace()
     * @param 	string	$panic       The panic message
     * @param 	string	$dire        Normally you dont need to touch this
     */

    function panic($panic = 'Unknown error!', $dire = dire) {
    
        /**
         * Clean the web output, remove all php errors
         */
        ob_end_clean();
        error_reporting(0);
        
       /**
        * Read the needed backtrace informations, get script name
        */
        $debug = debug_backtrace();
        if(isset($debug[0])) {
            $file       = $debug[0]['file'];
            $line       = $debug[0]['line'];
        }
        
        $file = basename($file);
    
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

        <h1><img src="' . $dire . '_style/default/icons/deadly.png" alt="deadly" /> Eh. I am <a href="http://github.com/chrigu99/sparky" target="_blank">sparky</a>.<br />I\'ve run into a wall.</h1>
        
        <h2>The reason i think:</h2>
        <pre>' . $panic . '</pre>
        
        <h4>File:</h4>
        <pre>' . $file . '</pre>
        <h4>Line:</h4>
        <pre>' . $line . '</pre>
        
    </body>
</html>
        ';

       /*
        * Don't do more, better you die.
        */    
        die;
        
    }

?>