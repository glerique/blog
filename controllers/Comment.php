<?php

namespace controllers;

class Comment{

    protected $modelManager;
    

    public function __construct(){
                $this->modelManager = new \models\managers\CommentManager();        
    }
    
   
    function addComment(){
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);       
        $creationDate = date('Y-m-d');
        $postId = filter_input(INPUT_POST, 'postId', FILTER_VALIDATE_INT);
        

        if (!\models\Session::isConnected()) {
            $this->redirectWithError(
                "index.php?controller=Post&action=afficher&id=$postId",
                "Il faut être connecté pour pourvoir ajouter un commentaire !"
            );
        }       
        $userId = $_SESSION['user']['id'];
        
        
        if (!$content) {
            $this->redirectWithError("index.php?controller=Post&action=afficher&id=$postId",
                "Veuillez remplir tous les champs du formulaire correctement !"
            ); 
        } 
            
         
        $comment = new \models\Comment([
                'content' => $content, 
                'creationdate' => $creationDate,
                'postId' => $postId,                 
                'userId' => $userId                
            ]);
     
      
     $manager = $this->modelManager;               
     $manager->add($comment);
     
     $this->redirectWithSuccess(
        "index.php?controller=Post&action=accueil",
        "commentaire ajouté avec succès, en attente de validation de l'administrateur !"
    );   
                   
}


    function liste(){
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError("index.php?controller=Post&action=accueil",
                "Vous devez etre administrateur pour afficher la liste des commentaires !"
            );
        }   
        $manager = $this->modelManager;
        $comments = $manager->getWaitingList();
        \models\Renderer::render("listComment", compact('comments'));
    }

    function valider(){
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError(
                "index.php",
                "Il faut être administrateur pour valider un post !"
            );
        }       
        $manager = new $this->modelManager;
        $comment = $manager->get($_GET['id']);
        \models\Renderer::render("validComment", compact('comment'));
                
    }

    function validComment(){
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError("index.php?controller=Post&action=accueil",
                "Vous devez etre administrateur pour valider un commentaire !"
            );
        }
        
         
        
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $validated = filter_input(INPUT_POST, 'validated', FILTER_VALIDATE_INT);
        
        if (!$id || !$validated ) {
            $this->redirectWithError("index.php?controller=Comment&action=liste",
            "Veuillez remplir tous les champs du formulaire correctement !"
        ); 
        }
            
        $manager = new $this->modelManager;
        $comment = new \models\Comment([
        'id' => $id,
        'validated' => $validated  
        ]);

        $manager->validComment($comment);
        $manager = new $this->modelManager;
        $this->redirectWithSuccess(
            "index.php?controller=Comment&action=liste",
            "Post modifié avec succès !"
        );
        
    }

    function delete(){
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError("index.php?controller=Post&action=accueil",
                "Vous devez etre administrateur pour supprimer un commentaire !"
            );
        }   
        $manager = $this->modelManager;  
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id){
            $this->redirectWithError("index.php?controller=Post&action=liste",
                "Vous devez préciser un id !"
            );
        }     
        $manager->delete($id);               
        $this->redirectWithSuccess(
            "index.php?controller=Comment&action=liste",
            "Commentaire supprimé avec succès !"
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
}

?>
