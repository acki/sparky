<?

    function loadTwig($tmp_style_path, $cache) {

        // Load Twig templating engine
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem($tmp_style_path . '/templates');
        $twig = new Twig_Environment($loader, array(
            'cache' => $cache,
        ));
        
        return $twig;

    }

?>