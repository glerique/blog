<?php

namespace controllers;

class Post extends \controllers\Controller
{

    protected $modelName = "Post";

    //Affiche la page page d'accueil 
    function accueil()
    {
        $manager = $this->modelManager;
        $posts = $manager->getPublishedList();
        \models\Renderer::render("accueil", compact('posts'));
    }

    //Affiche un post en fonction de l'id recupéré par GET
    function afficher()
    {
        $manager = $this->modelManager;

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            $this->redirectWithError(
                "index.php",
                "Vous devez préciser un id"
            );
        }

        $post = $manager->get($id);

        if (!$post) {
            $this->redirectWithError("index.php", "Vous essayez d'afficher un post qui n'existe pas");
        }

        
        $postId = $id;

        $commentsModel = new \models\managers\CommentManager();
        $comments = $commentsModel->findAllWithPost($postId);

        \models\Renderer::render("post", compact('post', 'comments'));
    }


    function ajouterPost()
    {
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError(
                "index.php",
                "Il faut être administrateur pour pouvoir ajouter un post"
            );
        }

        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        $standfirst = filter_input(INPUT_POST, 'standfirst', FILTER_SANITIZE_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        $author =  filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS);
        $creationDate = date('Y-m-d');
        $published = "En attente";
        $userId = $_SESSION['user']['id'];

        if (!$title || !$standfirst || !$content || !$author) {
            $this->redirectWithError(
                "index.php?controller=Post&action=ajouter",
                "Veuillez remplir tous les champs du formulaire correctement"
            );
        }

        $token =  filter_input(INPUT_POST, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!$token || $token != $_SESSION['token']) {
            $this->redirectWithError(
                "index.php?controller=Post&action=ajouter",
                "Vous devez avoir un jeton valide  pour ajouter un post"
            );
        }

        $manager = $this->modelManager;
        $post = new \models\Post([
            'title' => $title,
            'standfirst' => $standfirst,
            'content' => $content,
            'author' => $author,
            'creationDate' => $creationDate,
            'published' => $published,
            'userId' => $userId
        ]);

        $manager->add($post);
        $this->redirectWithSuccess(
            "index.php?controller=Post&action=liste",
            "Post ajouté avec succès"
        );
    }

    function modifier()
    {
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError(
                "index.php",
                "Il faut être administrateur pour modifier un post"
            );
        }
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            $this->redirectWithError(
                "index.php?controller=Post&action=liste",
                "Vous devez préciser un id !"
            );
        }
        $manager = new $this->modelManager;

        $post = $manager->get($id);
        if (!$post) {
            $this->redirectWithError(
                "index.php?Post&action=liste",
                "Vous essayez de modifier un post qui n'existe pas"
            );
        }
        \models\Renderer::render("updatePost", compact('post'));
    }

    function ajouter()
    {
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError(
                "index.php",
                "Vous devez être administrateur pour ajouter un Post"
            );
        }
        \models\Renderer::render("addPost");
    }

    function modifierPost()
    {
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError(
                "index.php",
                "Vous devez être administrateur pour modifier un Post"
            );
        }

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        $standfirst = filter_input(INPUT_POST, 'standfirst', FILTER_SANITIZE_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        $author =  filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS);
        $modificationDate = date('y-m-d');
        $published = filter_input(INPUT_POST, 'published', FILTER_SANITIZE_SPECIAL_CHARS);
        $userId = filter_input(INPUT_POST, 'userId', FILTER_VALIDATE_INT);

        if (!$id || !$title || !$standfirst || !$content || !$author || !$modificationDate || !$published || !$userId) {
            $this->redirectWithError(
                "index.php?controller=Post&action=ajouter",
                "Veuillez remplir tous les champs du formulaire correctement"
            );
        }

        $token =  filter_input(INPUT_POST, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!$token || $token != $_SESSION['token']) {
            $this->redirectWithError(
                "index.php",
                "Vous devez avoir un jeton valide  pour modifier un post"
            );
        }

        $manager = new $this->modelManager;
        $post = new \models\Post([
            'id' => $id,
            'title' => $title,
            'standfirst' => $standfirst,
            'content' => $content,
            'author' => $author,
            'modificationDate' => $modificationDate,
            'published' => $published,
            'userId' => $userId
        ]);

        $manager->update($post);
        $manager = new $this->modelManager;
        $this->redirectWithSuccess(
            "index.php?controller=Post&action=liste",
            "Post modifié avec succès"
        );
    }

    function liste()
    {
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError(
                "index.php",
                "Vous devez être administrateur pour afficher la liste des posts"
            );
        }
        $manager = $this->modelManager;
        $posts = $manager->getList();
        \models\Renderer::render("listPost", compact('posts'));
    }

    function supprimer()
    {
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError(
                "index.php",
                "Vous devez être administrateur pour supprimer un post"
            );
        }
        $manager = $this->modelManager;
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            $this->redirectWithError(
                "index.php?controller=Post&action=liste",
                "Vous devez préciser un id !"
            );
        }
        
        $token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$token || $token != $_SESSION['token']) {
            $this->redirectWithError(
                "index.php",
                "Vous devez avoir un jeton valide  pour supprimer un post"
            );
        }
       
        $post = $manager->delete($id);
        if (!$post) {
            $this->redirectWithError(
                "index.php?controller=Post&action=liste",
                "Vous essayez de supprimer un post qui n'existe pas"
            );
        }
        $this->redirectWithSuccess(
            "index.php?controller=Post&action=liste",
            "Post supprimé avec succès"
        );
    }
}
