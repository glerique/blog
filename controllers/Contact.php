<?php

namespace controllers;

class Contact{

    protected $modelManager;
    

    public function __construct(){
                $this->modelManager = new \models\Contact();        
    }

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
            $this->redirectWithError("index.php?controller=Post&action=accueil",
            "Veuillez remplir tous les champs du formulaire correctement !"
        ); 
        }

        $model = $this->modelManager;
        $model->sendEmail( $lastname, $firstname, $email, $subject, $content);
        $this->redirectWithSuccess(
            "index.php?controller=Post&action=accueil",
            "Message envoyé avec succès !"
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