<?php
require_once('models/PostManager.php');

class Controller{
    //Affiche la page page d'accueil
    function accueil(){
        $manager = new PostManager();
        require('views/accueil.view.php'); 
    }

        

    function fichePost(){
        //Affiche la fiche d'un post    
        $manager = new PostManager();  
        require('views/post.view.php');
    }   
}
?>
