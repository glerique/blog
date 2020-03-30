<?php

namespace controllers;

class User{

    protected $modelManager;
    

    public function __construct(){
                $this->modelManager = new \models\UserManager();        
    }
    
      
    
    function addUser(){                
        $manager = new $this->modelManager;        
        $password = password_hash($_POST['pswd'], PASSWORD_DEFAULT);      
        $user = new \models\User([
                'lastName' => $_POST['lastName'], 
                'firstName' => $_POST['firstName'], 
                'email' => $_POST['email'], 
                'nickname' => $_POST['nickname'], 
                'pswd' => $password, 
                'userRole' => $_POST['userRole']
            ]);
     
     $manager->add($user);     
     $this->redirectWithSuccess(
        "index.php?controller=User&action=liste",
        "Utilisateur modifié avec succès !"
    );               
    }

    function update(){
        $manager = new $this->modelManager;
        $user = $manager->get($_GET['id']);
        \models\Renderer::render("updateUser", compact('user'));        
    }

    function ajouter(){
        \models\Renderer::render("addUser");
    }

    function updateUser(){
        
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $nickname = $_POST['nickname'];
        $pswd = $_POST['pswd'];
        $userRole = $_POST['userRole'];

        $manager = new $this->modelManager;
        $user = new \models\User([
        'id' => $id,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'nickname' => $nickname,
        'pswd' => $pswd,
        'userRole' => $userRole  
        ]);

        $manager->update($user);
        $manager = new $this->modelManager;
        $this->redirectWithSuccess(
            "index.php?controller=user&action=liste",
            "Utilisateur modifié avec succès !"
        );
    }

    function liste(){
        $manager = new $this->modelManager;
        $users = $manager->getList();
        \models\Renderer::render("listUser", compact('users'));
    }

    function delete(){
        $id = $_GET['id'];
        $manager = new $this->modelManager;       
        $manager->delete($id);               
        $this->redirectWithSuccess(
            "index.php?action=liste",
            "User supprimé avec succès !"
        );
    } 
    
    public function formLogin()
    {
            \models\Renderer::render("login");
    }
 
    public function authentification()
    {
        $email = $_POST['email'];
        $pswd = $_POST['pswd'];
        
        if (!$email || !$pswd) {
            $this->redirectBackWithError("Le formulaire a été mal rempli");
        }
        
        $manager = $this->modelManager;
        $user = $manager->getByEmail($email); 
        
        if (!$user) {
            $this->redirectBackWithError("Aucun compte utilisateur ne possède cette adresse email");
        }
        
        $verif = password_verify($pswd, $user['pswd']);                    		
         
        if (!$verif) {
            $this->redirectBackWithError("Le mot de passe ne correspond au compte utilisateur trouvé");
        }
        else {   

        \models\Session::connect($user);                      
           

        $this->redirectWithSuccess(
            "index.php",
            "Bravo <strong>$user[firstName]</strong>, vous êtes désormais connecté(e) au blog !"
        );
        }
       
    }

    public function logout()
    {
        \models\Session::disconnect();

        $this->redirectWithSuccess(
            "index.php",
            "Vous êtes désormais déconnecté !"
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
