<?php

namespace models;

use Exception;

class PostManager extends Database
{

  private $db; // Instance de PDO

  public function __construct()
  {
    $db = $this->dbConnect();
    $this->setDb($db);
  }

  public function setDb(\PDO $db)
  {
    $this->db = $db;
  }

  public function count()
  {
    $query = $this->db->query('SELECT COUNT(*) FROM post');
    $count = $query->fetchColumn();
    return $count;
  }

  public function add(Post $post)
  {
    $query = $this->db->prepare('INSERT INTO post(title, standfirst, content, creationDate, published, userId)
    VALUES(:title, :standfirst, :content, :creationDate, :published, :userId)');
    $query->bindValue(':title', $post->getTitle());
    $query->bindValue(':standfirst', $post->getStandfirst());
    $query->bindValue(':content', $post->getContent());
    $query->bindValue(':creationDate', $post->getCreationDate());
    $query->bindValue(':published', $post->getPublished());
    $query->bindValue(':userId', $post->getUserId());
    $query->execute();
  }

  public function delete($id)
  {
    $query = $this->db->query('DELETE FROM post WHERE id = ' . $id);
    
    $query->execute();
  }

  public function get($id)
  {
    $id = (int) $id;
    $query = $this->db->query('SELECT id, title, standfirst, content, date_format(creationDate,"%d/%m/%Y") AS creationDate, 
                                    date_format(modificationDate,"%d/%m/%Y") AS modificationDate, published, userId FROM post WHERE id = ' . $id);
    if ($query->rowCount() != 1) {
      return false; 
    } else {

      $donnees = $query->fetch(\PDO::FETCH_ASSOC);
      return new Post($donnees);
    }
  }


  public function getList()
  {

    $posts = [];
    $query = $this->db->query('SELECT id, title, standfirst, content, date_format(creationDate,"%d/%m/%Y") AS creationDate,
                                   date_format(modificationDate,"%d/%m/%Y") AS modificationDate, published, userId FROM post');
    while ($donnees = $query->fetch()) {
      $posts[] = new Post($donnees);
    }
    return $posts;
  }

  public function getPublishedList()
  {

    $posts = [];
    $query = $this->db->query('SELECT id, title, standfirst, content, date_format(creationDate,"%d/%m/%Y") AS creationDate,
                                     date_format(modificationDate,"%d/%m/%Y") AS modificationDate, published, userId FROM post WHERE published = "Publié" ORDER BY id DESC');
    while ($donnees = $query->fetch()) {
      $posts[] = new Post($donnees);
    }
    return $posts;
  }

  public function update(Post $post)
  {
    $query = $this->db->prepare('UPDATE post SET title = :title, standfirst = :standfirst, content = :content,  
                                                 modificationDate = :modificationDate, published = :published, userId = :userId  WHERE id = :id');
    $query->bindValue(':title', $post->getTitle());
    $query->bindValue(':standfirst', $post->getStandfirst());
    $query->bindValue(':content', $post->getContent());
    $query->bindValue(':modificationDate', $post->getModificationDate());
    $query->bindValue(':published', $post->getPublished());
    $query->bindValue(':userId', $post->getUserId());
    $query->bindValue(':id', $post->getId());
    $query->execute();
  }
}
