<?php

namespace controllers;

class User{

    protected $modelManager;
    

    public function __construct(){
                $this->modelManager = new \models\UserManager();        
    }
    
      
    
    function addUser(){                
        $manager =  $this->modelManager;        
            
        
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);       
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);        
        $nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_SPECIAL_CHARS);
        $pswd = filter_input(INPUT_POST, 'pswd');
        $confirmPswd = filter_input(INPUT_POST, 'confirmPswd');
       
        
        if (!$lastName || !$firstName || !$email || !$nickname || !$pswd || !$confirmPswd ) {
            $this->redirectWithError("index.php?controller=User&action=ajouter",
                "Veuillez remplir tous les champs du formulaire correctement !"
            ); 
        }       
        $manager =  $this->modelManager;
        $user = $manager->getByEmail($email);

        // Si un utilisateur existe avec cet email, alors on affiche une erreur
        if ($user) {
            $this->redirectWithError("index.php?controller=User&action=ajouter","Un compte existe déjà avec cette adresse email");
        }

        $manager =  $this->modelManager;
        $user = $manager->getByNickname($nickname);

        // Si un utilisateur existe avec cet email, alors on affiche une erreur
        if ($user) {
            $this->redirectWithError("index.php?controller=User&action=ajouter","Un compte existe déjà avec ce pseudo");
        }
        


        // 4. Vérification que les mot de passe sont identiques (password et passwordConfirm)
        if ($pswd != $confirmPswd) {
            $this->redirectWithError("index.php?controller=User&action=ajouter","Les deux mots de passe ne correspondent pas !");
        }

        $password = password_hash($_POST['pswd'], PASSWORD_DEFAULT);  
        $userRole =  "Membre";

        $user = new \models\User([
                'lastName' => $lastName, 
                'firstName' => $firstName, 
                'email' => $email, 
                'nickname' => $nickname, 
                'pswd' => $password, 
                'userRole' => $userRole
            ]);
     
     $manager->add($user);     
     $this->redirectWithSuccess(
        "index.php?controller=Post&action=accueil",
        "Vous pouvez desormais commenter les articles après vous etre identifié !"
    );               
    }

    function update(){
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError("index.php?controller=Post&action=accueil",
                "Vous devez etre administrateur pour modifier un utilisateur !"
            );
        }
        

        $manager =  $this->modelManager;
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id){
            $this->redirectWithError("index.php?controller=User&action=liste",
                "Vous devez préciser un id !"
            );
        }          
        $user = $manager->get($id);
        \models\Renderer::render("updateUser", compact('user'));        
    }

    function ajouter(){
        \models\Renderer::render("addUser");
    }

    function updateUser(){
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError("index.php?controller=Post&action=accueil",
                "Vous devez etre administrateur pour modifier un utilisateur !"
            );
        }


        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);       
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
        $nickname = filter_input(INPUT_POST, 'nickname', FILTER_SANITIZE_SPECIAL_CHARS);
        $userRole = filter_input(INPUT_POST, 'userRole', FILTER_SANITIZE_SPECIAL_CHARS); 

        if ( !$id || !$lastName || !$firstName  || !$nickname || !$userRole  ) {
            $this->redirectWithError("index.php?controller=User&action=liste",
                "Veuillez remplir tous les champs du formulaire correctement !"
            ); 
        }      

        $manager = $this->modelManager;
        $user = new \models\User([
        'id' => $id,
        'firstName' => $firstName,
        'lastName' => $lastName,        
        'nickname' => $nickname,        
        'userRole' => $userRole  
        ]);

        $manager->update($user);
        $manager = new $this->modelManager;
        $this->redirectWithSuccess(
            "index.php?controller=User&action=liste",
            "Utilisateur modifié avec succès !"
        );
    }

    function liste(){
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError("index.php?controller=Post&action=accueil",
                "Vous devez etre administrateur pour supprimer un utilisateur !"
            );
        }
        $manager = $this->modelManager;
        $users = $manager->getList();
        \models\Renderer::render("listUser", compact('users'));
    }

    function delete(){
        if (!\models\Session::isAdmin()) {
            $this->redirectWithError("index.php?controller=Post&action=accueil",
                "Vous devez etre administrateur pour supprimer un utilisateur !"
            );
        }
        $manager =  $this->modelManager;    
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id){
            $this->redirectWithError("index.php?controller=User&action=liste",
                "Vous devez préciser un id !"
            );
        }          
        $manager->delete($id);               
        $this->redirectWithSuccess(
            "index.php?controller=User&action=liste",
            "User supprimé avec succès !"
        );
    } 
    
    public function formLogin()
    {
            \models\Renderer::render("login");
    }
 
    public function authentification()
    {
        
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pswd = $_POST['pswd'];
        
        if (!$email || !$pswd) {
            $this->redirectWithError("index.php?controller=User&action=formLogin","Le formulaire a été mal rempli");
        }
        
        $manager = $this->modelManager;
        $user = $manager->getByEmail($email); 
        
        if (!$user) {
            $this->redirectWithError("index.php?controller=User&action=formLogin","Aucun compte utilisateur ne possède cette adresse email");
        }
        
        $verif = password_verify($pswd, $user['pswd']);                    		
         
        if (!$verif) {
            $this->redirectWithError("index.php?controller=User&action=formLogin","Le mot de passe ne correspond au compte utilisateur trouvé");
        }
        else {   

        \models\Session::connect($user);                      
           

        $this->redirectWithSuccess(
            "index.php?controller=Post&action=accueil",
            "Bravo <strong>$user[firstName]</strong>, vous êtes désormais connecté(e) au blog !"
        );
        }
       
    }

    public function logout()
    {
        \models\Session::disconnect();

        $this->redirectWithSuccess(
            "index.php?controller=Post&action=accueil",
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
    
      
}
?>
