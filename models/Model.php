<?php

namespace models;

abstract class Model
{

    protected $id;

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
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

    // GETTER
    function getId()
    {
        return $this->id;
    }

    // SETTER
    function setId($id)
    {
        $this->id = $id;
    }
}
