<?php

   /**
    * Rendering function for Twig.
    * Renders the template and submit some data
    * @param    $template    Name of template
    * @param    $title       Site title
    * @param    $data        Array with data for the template rendering
    */

    function render($template, $title = 'sparky.', $data = array()) {
    
        // Globalize some data
        global $twig, $style_path;
        
        // Append arrays
        $defaultdata = array('title'=>$title, 'style_path'=>$style_path);
        $data = $defaultdata + $data;
    
        // Rendering template
        $template = $twig->loadTemplate($template);
        print $template->render($data);
        
    }
    
?>