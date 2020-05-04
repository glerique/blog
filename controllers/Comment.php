<?php

namespace controllers;

class Comment extends \controllers\Controller
{

    protected $modelName = "Comment";


    function addComment()
    {
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        $creationDate = date('Y-m-d');
        $postId = filter_input(INPUT_POST, 'postId', FILTER_VALIDATE_INT);


        if (!\models\Session::isConnected()) {
            $this->redirectWithError(
                "index.php?controller=Post&action=afficher&id=$postId",
                "Il faut être connecté pour pouvoir ajouter un commentaire"
            );
        }
        $userId = $_SESSION['user']['id'];


        if (!$content) {
            $this->redirectWithError(
                "index.php?controller=Post&action=afficher&id=$postId",
                "Veuillez remplir tous les champs du formulaire correctement"
            );
        }

        $token =  filter_input(INPUT_POST, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!$token || $token != $_SESSION['token']) {
            $this->redirectWithError(
                "index.php",
                "Vous devez avoir un jeton valide  pour ajouter un commentaire"
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
            "index.php",
            "Commentaire ajouté avec succès, en attente de validation de l'administrateur"
        );
    }


    function liste()
    {
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError(
                "index.php",
                "Vous devez etre administrateur pour afficher la liste des commentaires"
            );
        }
        $manager = $this->modelManager;
        $comments = $manager->getWaitingList();
        \models\Renderer::render("listComment", compact('comments'));
    }

    function valider()
    {
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError(
                "index.php",
                "Il faut être administrateur pour valider un commentaire"
            );
        }
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            $this->redirectWithError(
                "index.php?controller=Comment&action=liste",
                "Vous devez préciser un id"
            );
        }
        $manager = new $this->modelManager;

        $comment = $manager->get($id);
        if (!$comment) {
            $this->redirectWithError(
                "index.php?controller=Comment&action=liste",
                "Vous essayez de valider un commentaire qui n'existe pas"
            );
        }

        \models\Renderer::render("validComment", compact('comment'));
    }

    function validComment()
    {
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError(
                "index.php",
                "Vous devez etre administrateur pour valider un commentaire"
            );
        }

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $validated = filter_input(INPUT_POST, 'validated', FILTER_VALIDATE_INT);

        if (!$id || !$validated) {
            $this->redirectWithError(
                "index.php?controller=Comment&action=liste",
                "Veuillez remplir tous les champs du formulaire correctement"
            );
        }

        $token =  filter_input(INPUT_POST, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!$token || $token != $_SESSION['token']) {
            $this->redirectWithError(
                "index.php",
                "Vous devez avoir un jeton valide  pour valider un commentaire"
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
            "Commentaire validé avec succès"
        );
    }

    function supprimer()
    {
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError(
                "index.php",
                "Vous devez etre administrateur pour supprimer un commentaire"
            );
        }
        $manager = $this->modelManager;
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            $this->redirectWithError(
                "index.php?controller=Comment&action=liste",
                "Vous devez préciser un id"
            );
        }

        $token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!$token || $token != $_SESSION['token']) {
            $this->redirectWithError(
                "index.php",
                "Vous devez avoir un jeton valide pour supprimer un commentaire"
            );
        }

       
        $comment = $manager->delete($id);
        if (!$comment) {
            $this->redirectWithError(
                "index.php?controller=Comment&action=liste",
                "Vous essayez de supprimer un commentaire qui n'existe pas"
            );
        }
        $this->redirectWithSuccess(
            "index.php?controller=Comment&action=liste",
            "Commentaire supprimé avec succès"
        );
    }
}
