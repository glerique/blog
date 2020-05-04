<?php

namespace models;

class Comment extends Model
{

    protected $content;
    protected $creationDate;
    protected $validated;
    protected $postId;
    protected $userId;
    protected $author;
    protected $title;

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

    function getTitle()
    {
        return $this->title;
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

    function setTitle($title)
    {
        $this->title = $title;
    }
}
