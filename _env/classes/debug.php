<?php

   /**
    * Class for debugging
    */
    
    class Debug {
    
       /**
        * Function for do some initialization
        */
        function __construct() {
            
            $_SESSION['debug'] = array();
            $_SESSION['debug']['times'] = array();
                        
        } // function
        
       /**
        * Function for show debug infos
        */
        function showDebug() {
        
        	$return = '';
        
        	// show time shit
        	foreach($_SESSION['debug']['times'] as $key => $value) {
        	
        		$return .= $key . ': ' . $value['comp'] . 'ms, ' . $value['system'] . 'ms';
        		
        	}
        	
        	return $return;
                        
        } // function
        
       /**
        * Function for calculating used time
        */
        function calcUsedTime($ru, $rus, $index) {

			    return ($ru["ru_$index.tv_sec"]*1000 + intval($ru["ru_$index.tv_usec"]/1000))
					-  ($rus["ru_$index.tv_sec"]*1000 + intval($rus["ru_$index.tv_usec"]/1000));
	        
        } // function
        
       /**
        * Function for start measure used time
        */
        function startUsedTime($identifier) {

        	$_SESSION['_used_time_' . $identifier] = getrusage();
	        
        } // function
        
       /**
        * Function for get used time
        */
        function endUsedTime($identifier) {

			$timetmp = getrusage();
			
			$_SESSION['debug']['times'][$identifier] = array('comp' => $this->calcUsedTime($timetmp, $_SESSION['_used_time_' . $identifier], "utime"), 'system' => $this->calcUsedTime($timetmp, $_SESSION['_used_time_' . $identifier], "stime"));
			
        } // function
        
    } // class
    
?>