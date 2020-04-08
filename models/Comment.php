<?php

namespace models;

class Comment {

    private $id;
    private $content;
    private $creationDate;
    private $validated;
    private $postId; 
    private $userId;

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
    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    //GETTERS

    function getId(){
        return $this->id;
    }

    function getContent(){
        return $this->content;
    }   

    function getCreationDate(){
        return $this->creationDate;
    }
    

    function getValidated(){
        return $this->validated;
    }

    function getPostId(){
        return $this->postId;
    }

    function getUserId(){
        return $this->userId;
    }

    function getAuthor(){
        return $this->author;
    }


    //SETTERS

    function setId($id){
        $this->id = $id;
    }

    function setContent($content){
        $this->content = $content;
    }
    
    function setCreationDate($creationDate){
        $this->creationDate = $creationDate;
    }  
    
    function setValidated($validated){
        $this->validated = $validated;
    }
    
    function setPostId($postId){
        $this->postId = $postId;
    }  

    function setUserId($userId){
        $this->userId = $userId;
    }
    
    function setAuthor($author){
        $this->author = $author;
    } 
}
