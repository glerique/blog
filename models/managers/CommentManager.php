<?php

namespace models\managers;


class CommentManager extends \models\Database
{

  protected $db; // Instance de PDO

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
    $query = $this->db->prepare('SELECT COUNT(*) FROM comment');
    $query->execute();
    $count = $query->fetchColumn();
    return $count;
  }

  public function add(\models\Comment $comment)
  {
    $query = $this->db->prepare('INSERT INTO comment(content, creationDate, postId, userId)
    VALUES(:content, :creationDate, :postId, :userId)');
    $query->bindValue(':content', $comment->getContent());
    $query->bindValue(':creationDate', $comment->getCreationDate());
    $query->bindValue(':postId', $comment->getPostId());
    $query->bindValue(':userId', $comment->getUserId());
    $query->execute();
  }

  public function delete($id)
  {
    $query = $this->db->prepare('DELETE FROM comment WHERE id = ' . $id);
    $query->execute();
    if ($query->rowCount() != 1) {
      return false;
    } else {
      return true;
    }
  }

  public function get($id)
  {
    $id = (int) $id;
    $query = $this->db->prepare('SELECT id, content, date_format(creationDate,"%d/%m/%Y") AS creationDate, 
                                     validated, postId, userId FROM comment 
                                    WHERE id =  :id');
    $query->execute(['id' => $id]);
    $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\models\Comment');                                
    $query->execute();
    if ($query->rowCount() != 1) {
      return false;
    } else {
      
      $comment = $query->fetch();
      
      $postManager = new \models\managers\PostManager();
      $comment->setTitle($postManager->getPostTitle($comment->getPostId())); 
         
      return $comment;    
      
    }
  }


 
  public function findAllWithPost($postId)
  {
    // On récupère les commentaires

    $query = $this->db->prepare('SELECT id, content, date_format(creationDate,"%d/%m/%Y") AS creationDate, 
                                      validated as validated, postId , userId                                      
                                      FROM comment
                                      WHERE postId = :postId 
                                      AND validated = 2 ORDER BY id ASC');
    $query->execute(['postId' => $postId]);
    $query->execute();
    $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\models\Comment');

    $comments = $query->fetchAll();
    
    foreach ($comments as $comment) {
      $userManager = new \models\managers\UserManager();
      $comment->setAuthor($userManager->getNickname($comment->getUserId()));
    }

    return $comments;
  }

  public function getWaitingList()
  {


    $query = $this->db->prepare('SELECT id, content, date_format(creationDate,"%d/%m/%Y") AS creationDate,
                                    validated as validated, postId, userId FROM comment WHERE validated = 1 ORDER BY id');
    $query->execute();

    $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\models\Comment');

    $comments = $query->fetchAll();

    foreach ($comments as $comment) {
      $userManager = new \models\managers\UserManager();
      $comment->setAuthor($userManager->getNickname($comment->getUserId()));
    }

    return $comments;
  }

  public function validComment(\models\Comment $post)
  {
    $query = $this->db->prepare('UPDATE comment SET  validated = :validated  WHERE id = :id');
    $query->bindValue(':validated', $post->getValidated());
    $query->bindValue(':id', $post->getId());
    $query->execute();
  }
}
