<?php

namespace controllers;

class Contact extends \controllers\Controller
{

    protected $modelName = "Contact";


    public function formContact()
    {
        \models\Renderer::render("contact");
    }

    public function message()
    {

        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);




        if (!$lastname || !$firstname || !$email || !$subject || !$content) {
            $this->redirectWithError(
                "index.php?controller=Contact&action=formContact",
                "Veuillez remplir tous les champs du formulaire correctement"
            );
        }

        $model = $this->modelManager;
        $mail = $model->sendEmail($lastname, $firstname, $email, $subject, $content);

        if (!$mail) {
            $this->redirectWithError(
                "index.php?controller=Contact&action=formContact",
                "Erreur serveur : Le mail n'a pas été envoyé"
            );
        }
        $this->redirectWithSuccess(
            "index.php?controller=Post&action=accueil",
            "Message envoyé avec succès"
        );
    }
}
