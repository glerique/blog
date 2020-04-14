<?php
namespace Models;
class User {

    private $id;
    private $lastName;
    private $firstName;
    private $email;
    private $nickname;
    private $pswd;
    private $userRole; 

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
        // On récupère le nom du setter correspondant à l'attribut.
        $method = 'set'.ucfirst($key);
        // Si le setter correspondant existe.
        if (method_exists($this, $method)){
        // On appelle le setter.
        $this->$method($value);
        }
    }
}

// Important car sinon l'objet à sa création est vide.
public function __construct($valeurs = [])
{
  if (!empty($valeurs)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
  {
    $this->hydrate($valeurs);
  }
}

    //GETTERS

    function getId(){        
	    return $this->id;
    }

    function getLastName(){
	    return $this->lastName;
    }

    function getFirstName(){
        return $this->firstName;
    }

    function getEmail(){
        return $this->email;
    }

    function getNickname(){
        return $this->nickname;
    }

    function getPswd(){
        return $this->pswd;
    }

    function getUserRole(){
        return $this->userRole;
    }
    

    //SETTERS

    function setId($id){
        $this->id = $id;
    }

    function setLastName($lastName){
        $this->lastName = $lastName;
    }
    
    function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    function setEmail($email){
        $this->email = $email;
    }

    function setNickname($nickname){
        $this->nickname = $nickname;
    }

    function setPswd($pswd){
        $this->pswd = $pswd;
    }

    function setUserRole($userRole){
        $this->userRole = $userRole;
    }
}
