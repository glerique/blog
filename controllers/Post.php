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
        $posts = $manager->getPublishedList();        
        \models\Renderer::render("accueil", compact('posts'));
        
    }

    //Affiche la fiche produit en fonction de l'id recupéré par GET
    function afficher(){            
        $manager = new $this->modelManager;        
        $post= $manager->get($_GET['id']);
        \models\Renderer::render("post", compact('post'));
       
    }
    
    function ajouterPost(){       
        $creationDate = date('Y-m-d');
        $published = "En attente";
        $userId = $_SESSION['user']['id'];
        
        $manager = new $this->modelManager;          
        $post = new \models\Post([
                'title' => $_POST['title'], 
                'standfirst' => $_POST['standfirst'], 
                'content' => $_POST['content'], 
                'creationDate' => $creationDate,
                'published' => $published, 
                'userId' => $userId
                
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
        $title = $_POST['title'];
        $standfirst = $_POST['standfirst'];
        $content = $_POST['content'];        
        $modificationDate = date('y-m-d');
        $published = $_POST['published'];
        $userId = $_POST['userId'];

        $manager = new $this->modelManager;
        $post = new \models\Post([
        'id' => $id,
        'title' => $title,
        'standfirst' => $standfirst,
        'content' => $content,        
        'modificationDate' => $modificationDate,
        'published' => $published,
        'userId' => $userId  
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
