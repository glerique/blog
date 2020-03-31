<?php

namespace models;

class Post {

    private $id;
    private $title;
    private $standfirst;
    private $content;
    private $creationDate;
    private $modificationDate;
    private $published;
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

    function getTitle(){
        return $this->title;
    }

    function getStandfirst(){
        return $this->standfirst;
    }

    function getContent(){
        return $this->content;
    }

    function getCreationDate(){
        return $this->creationDate;
    }

    function getModificationDate(){
        return $this->modificationDate;
    }

    function getPublished(){
        return $this->published;
    }

    function getUserId(){
        return $this->userId;
    }

    //SETTERS

    function setId($id){
        $this->id = $id;
    }

    function setTitle($title){
        $this->title = $title;
    }
    
    function setStandfirst($standfirst){
        $this->standfirst = $standfirst;
    }  

    function setContent($content){
        $this->content = $content;
    }  

    function setCreationDate($creationDate){
        $this->creationDate = $creationDate;
    }  

    function setModificationDate($modificationDate){
        $this->modificationDate = $modificationDate;
    }
    
    function setPublished($published){
        $this->published = $published;
    }  

    function setUserId($userId){
        $this->userId = $userId;
    }   
}
