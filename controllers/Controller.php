<?php
require_once('models/PostManager.php');

class Controller{
    //Affiche la page page d'accueil 
    function accueil(){
        $manager = new PostManager();
        require('views/accueil.view.php'); 
    }        

    function fichePost(){
         
        $manager = new PostManager();
        require('views/post.view.php');
    }
    
    function ajouterPost(){                
        $manager = new PostManager();           
        $post = new Post([
                'titre' => $_POST['titre'], 
                'chapo' => $_POST['chapo'], 
                'contenu' => $_POST['contenu'], 
                'dateAjout' => $_POST['dateAjout'], 
                'dateModification' => $_POST['dateModification'], 
                'statut' => $_POST['statut'], 
                'utilisateurId' =>$_POST['utilisateurId']
            ]);
     
     $manager->addPost($post);     
     require('views/accueil.view.php');               
    }

    function modifierFiche(){
        $manager = new PostManager();
        require('views/updatePost.view.php'); 
        
    }

    function ModifierPost(){
        
        $id = $_POST['id'];
        $titre = $_POST['titre'];
        $chapo = $_POST['chapo'];
        $contenu = $_POST['contenu'];
        $dateAjout = $_POST['dateAjout'];
        $dateModification = $_POST['dateModification'];
        $statut = $_POST['statut'];
        $utilisateurId = $_POST['utilisateurId'];

        $manager = new PostManager();
        $post = new Post([
        'id' => $id,
        'titre' => $titre,
        'chapo' => $chapo,
        'contenu' => $contenu,
        'dateAjout' => $dateAjout,
        'dateModification' => $dateModification,
        'statut' => $statut,
        'utilisateurId' => $utilisateurId  
        ]);

        $manager->updatePost($post);
        $manager = new PostManager();
        require('views/liste.view.php');
    }

    function liste(){
        $manager = new PostManager();
        require('views/liste.view.php');
    }

    function supprimerPost(){
        $id = $_GET['id'];
        $manager = new PostManager();       
        $manager->deletePost($id);               
        require('views/liste.view.php');
    }    
}

?>