<?php

namespace Models;

class User extends Model
{

    private $lastName;
    private $firstName;
    private $email;
    private $nickname;
    private $pswd;
    private $userRole;

    //GETTERS

    function getLastName()
    {
        return $this->lastName;
    }

    function getFirstName()
    {
        return $this->firstName;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getNickname()
    {
        return $this->nickname;
    }

    function getPswd()
    {
        return $this->pswd;
    }

    function getUserRole()
    {
        return $this->userRole;
    }


    //SETTERS

    function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    function setPswd($pswd)
    {
        $this->pswd = $pswd;
    }

    function setUserRole($userRole)
    {
        $this->userRole = $userRole;
    }
}
