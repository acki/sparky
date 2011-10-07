<?php

   /**
    * Rendering function for Twig.
    * Renders the template and submit some data
    * @param    $template    Name of template
    * @param    $title       Site title
    * @param    $data        Array with data for the template rendering
    */

    function render($template, $title = 'Welcome', $data = array()) {
    
        // Globalize some data
        global $twig, $tmp_style_path;
        
        // Append arrays
        $defaultdata = array('title'=>$title, 'tmp_style_path'=>$tmp_style_path);
        $data = $defaultdata + $data;
    
        // Rendering template
        $template = $twig->loadTemplate($template);
        print $template->render($data);
        
    }
    
?>