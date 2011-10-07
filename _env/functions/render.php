<?php

    function render($template) {
    
        global $twig, $tmp_style_path;
    
        $template = $twig->loadTemplate($template);
        print $template->render(array('title'=>'hallo', 'tmp_style_path'=>$tmp_style_path,));
        
    }
    
?>