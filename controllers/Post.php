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
        $posts = $manager->getList();        
        \models\Renderer::render("accueil", compact('posts'));
        
    }

    //Affiche la fiche produit en fonction de l'id recupéré par GET
    function afficher(){            
        $manager = new $this->modelManager;        
        $post= $manager->get($_GET['id']);
        \models\Renderer::render("post", compact('post'));
       
    }
    
    function ajouterPost(){                
        $statut = "Attente";
        $dateAjout = date('Y-m-d');
        $utilisateurId = $_SESSION['user']['id'];
        
        $manager = new $this->modelManager;          
        $post = new \models\Post([
                'titre' => $_POST['titre'], 
                'chapo' => $_POST['chapo'], 
                'contenu' => $_POST['contenu'], 
                'dateAjout' => $dateAjout,                               
                'statut' => $statut
                
            ]);
     
     $manager->add($post);
     $this->redirectWithSuccess(
        "index.php?controller=Post&action=liste",
        "Post ajouté avec succès !"
    );   
                   
    }

    function modifier(){
        
        $manager = new $this->modelManager;
        $post = $manager->get($_GET['id']);
        \models\Renderer::render("updatePost", compact('post'));
                
    }

    function ajouter(){
       
        \models\Renderer::render("addPost");
    }

    function ModifierPost(){
        
        $id = $_POST['id'];
        $titre = $_POST['titre'];
        $chapo = $_POST['chapo'];
        $contenu = $_POST['contenu'];        
        $dateModification = date('y-m-d');
        $statut = $_POST['statut'];
        $utilisateurId = $_POST['utilisateurId'];

        $manager = new $this->modelManager;
        $post = new \models\Post([
        'id' => $id,
        'titre' => $titre,
        'chapo' => $chapo,
        'contenu' => $contenu,        
        'dateModification' => $dateModification,
        'statut' => $statut,
        'utilisateurId' => $utilisateurId  
        ]);

        $manager->update($post);
        $manager = new $this->modelManager;
        $this->redirectWithSuccess(
            "index.php?controller=Post&action=liste",
            "Post modifié avec succès !"
        );
        
    }

    function liste(){
        $manager = new $this->modelManager;
        $posts = $manager->getList();
        \models\Renderer::render("liste", compact('posts'));
    }

    function supprimer(){
        $id = $_GET['id'];
        $manager = new $this->modelManager;       
        $manager->delete($id);               
        $this->redirectWithSuccess(
            "index.php?controller=Post&action=liste",
            "Post supprimé avec succès !"
        );
    }
    
    protected function redirectWithError(string $url, string $message)
    {
        \models\Session::addFlash('error', $message);
        \models\Http::redirect($url);
    }
    
    protected function redirectWithSuccess(string $url, string $message)
    {
        \models\Session::addFlash('success', $message);
        \models\Http::redirect($url);
    }

    protected function redirectBackWithError(string $message)
    {
        $url = $_SERVER['HTTP_REFERER'];
        $this->redirectWithError($url, $message);
    }

    
    protected function redirectBackWithSuccess(string $message)
    {
        $url = $_SERVER['HTTP_REFERER'];
        $this->redirectWithSuccess($url, $message);
    }
}
?>
