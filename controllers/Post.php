<?php

namespace controllers;

class Post{

    protected $modelManager;
    

    public function __construct(){
                $this->modelManager = new \models\PostManager();        
    }
    //Affiche la page page d'accueil 
    function accueil(){
        $manager = $this->modelManager;
        require('views/accueil.view.php'); 
    }        

    function afficher(){
        //Affiche la fiche produit en fonction de l'id recupéré par GET    
        $manager = new $this->modelManager;        
        $post= $manager->get($_GET['id']);
        require('views/post.view.php');
    }
    
    function ajouterPost(){                
        $manager = new $this->modelManager;          
        $post = new \models\Post([
                'titre' => $_POST['titre'], 
                'chapo' => $_POST['chapo'], 
                'contenu' => $_POST['contenu'], 
                'dateAjout' => $_POST['dateAjout'], 
                'dateModification' => $_POST['dateModification'], 
                'statut' => $_POST['statut'], 
                'utilisateurId' =>$_POST['utilisateurId']
            ]);
     
     $manager->add($post);     
     require('views/accueil.view.php');               
    }

    function modifier(){
        $manager = new $this->modelManager;
        $post = $manager->get($_GET['id']);
        require('views/updatePost.view.php'); 
        
    }

    function ajouter(){
        require('views/addPost.view.php');
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

        $manager = new $this->modelManager;
        $post = new \models\Post([
        'id' => $id,
        'titre' => $titre,
        'chapo' => $chapo,
        'contenu' => $contenu,
        'dateAjout' => $dateAjout,
        'dateModification' => $dateModification,
        'statut' => $statut,
        'utilisateurId' => $utilisateurId  
        ]);

        $manager->update($post);
        $manager = new $this->modelManager;
        require('views/liste.view.php');
    }

    function liste(){
        $manager = new $this->modelManager;
        require('views/liste.view.php');
    }

    function supprimer(){
        $id = $_GET['id'];
        $manager = new $this->modelManager;       
        $manager->delete($id);               
        require('views/liste.view.php');
    }    
}

?>
