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
       
        //Represente le chemin du dossier des controllers
        $path = "controllers/$controllerName.php";
        
        if (!file_exists($path)) {
        // Si le controller n'existe pas, on affiche une erreur :
        \models\Session::addFlash('error', "Le controller que vous avez demandé n'existe pas !");
        \models\Http::redirect('index.php?controller=Post&action=accueil');
        
        }
        // Represente le Namespace et non le chemin
        $controllerName = "\controllers\\".$controllerName;
        $controller = new $controllerName();
        
        if (!method_exists($controller, $action)) {
            // Si le controller ne connait pas de method pour cette action, on affiche une erreur
            \models\Session::addFlash('error', "L'action que vous avez demandé n'existe pas !");
            \models\Http::redirect("index.php?controller=Post&action=accueil");
        }      
        
        $controller->$action();
    }
}
