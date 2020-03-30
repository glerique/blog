<?php

namespace models;

class Renderer
{

    
      //Affiche la vue demandée dans $path en injectant les variables contenues dans $var
     
     
    public static function render(string $path, array $var = []): void
    {
        
        extract($var);

        ob_start();
        require('views/' . $path . '.view.php');
        $pageContent = ob_get_clean();

        require('includes/layout.php');
    }
}
