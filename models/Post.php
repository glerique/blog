<?php

namespace models;

class Post {

    private $id;
    private $titre;
    private $chapo;
    private $contenu;
    private $dateAjout;
    private $dateModification;
    private $statut;
    private $utilisateurId;

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

    function getTitre(){
        return $this->titre;
    }

    function getChapo(){
        return $this->chapo;
    }

    function getContenu(){
        return $this->contenu;
    }

    function getDateAjout(){
        return $this->dateAjout;
    }

    function getDateModification(){
        return $this->dateModification;
    }

    function getStatut(){
        return $this->statut;
    }

    function getUtilisateurId(){
        return $this->utilisateurId;
    }

    //SETTERS

    function setId($id){
        $this->id = $id;
    }

    function setTitre($titre){
        $this->titre = $titre;
    }
    
    function setChapo($chapo){
        $this->chapo = $chapo;
    }  

    function setContenu($contenu){
        $this->contenu = $contenu;
    }  

    function setDateAjout($dateAjout){
        $this->dateAjout = $dateAjout;
    }  

    function setDateModification($dateModification){
        $this->dateModification = $dateModification;
    }
    
    function setStatut($statut){
        $this->statut = $statut;
    }  

    function setUtilisateurId($utilisateurId){
        $this->utilisateurId = $utilisateurId;
    }   
}
