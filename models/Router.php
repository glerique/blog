<?php

namespace models;

Class Router{

    public static function invoke(){        

        if(!empty($_GET['controller'])){
            $controllerName = ucfirst($_GET['controller']);
        }
        else {$controllerName = "Post";}

        if(!empty($_GET['action'])){
            $action = $_GET['action'];        
        }
        else {$action="accueil";}
      
        $controllerName = "\Controllers\\".$controllerName;
        $controler = new $controllerName();
        $controler->$action();        
    }
}
