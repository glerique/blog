<?php

namespace controllers;

class User{

    protected $modelManager;
    

    public function __construct(){
                $this->modelManager = new \models\UserManager();        
    }
    
    function home(){
        $manager = $this->modelManager;
        require('views/home.view.php'); 
    }        
    
    function displayUser(){
        //Affiche la fiche produit en fonction de l'id recupéré par GET    
        $manager = new $this->modelManager;        
        $user= $manager->get($_GET['id']);
        require('views/user.view.php');
    }
    
    function addUser(){                
        $manager = new $this->modelManager;          
        $user = new \models\User([
                'lastName' => $_POST['lastName'], 
                'firstName' => $_POST['firstName'], 
                'email' => $_POST['email'], 
                'nickname' => $_POST['nickname'], 
                'pswd' => $_POST['pswd'], 
                'userRole' => $_POST['userRole']
            ]);
     
     $manager->add($user);     
     require('views/listUser.view.php');               
    }

    function update(){
        $manager = new $this->modelManager;
        $user = $manager->get($_GET['id']);
        require('views/updateUser.view.php'); 
        
    }

    function ajouter(){
        require('views/addUser.view.php');
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
        require('views/listUser.view.php');
    }

    function liste(){
        $manager = new $this->modelManager;
        require('views/listUser.view.php');
    }

    function delete(){
        $id = $_GET['id'];
        $manager = new $this->modelManager;       
        $manager->delete($id);               
        require('views/listUser.view.php');
    }    
}
?>
