<?php

namespace models;

class Comment extends Model
{

    private $content;
    private $creationDate;
    private $validated;
    private $postId;
    private $userId;
    private $author;

    //GETTERS   

    function getContent()
    {
        return $this->content;
    }

    function getCreationDate()
    {
        return $this->creationDate;
    }


    function getValidated()
    {
        return $this->validated;
    }

    function getPostId()
    {
        return $this->postId;
    }

    function getUserId()
    {
        return $this->userId;
    }

    function getAuthor()
    {
        return $this->author;
    }


    //SETTERS

    function setContent($content)
    {
        $this->content = $content;
    }

    function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    function setValidated($validated)
    {
        $this->validated = $validated;
    }

    function setPostId($postId)
    {
        $this->postId = $postId;
    }

    function setUserId($userId)
    {
        $this->userId = $userId;
    }

    function setAuthor($author)
    {
        $this->author = $author;
    }
}
