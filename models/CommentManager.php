<?php

namespace models;


class CommentManager extends Database
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
    $query = $this->db->prepare('SELECT COUNT(*) FROM comment');
    $query->execute();
    $count = $query->fetchColumn();
    return $count;
  }

  public function add(Comment $comment)
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
  }

  public function get($id)
  {
    $id = (int) $id;
    $query = $this->db->prepare('SELECT id, content, date_format(creationDate,"%d/%m/%Y") AS creationDate, 
                                     validated, postId, userId FROM comment WHERE id = ' . $id);
    $query->execute();                                 
    if ($query->rowCount() != 1) {
      \models\Http::redirect("index.php");
    } else {

      $donnees = $query->fetch(\PDO::FETCH_ASSOC);
      return new \models\Comment($donnees);
    }
  }
  
  public function findAllWithPost($postId)
    {
        // 2. On récupère les commentaires
        $comments =[];
        $query = $this->db->prepare('SELECT comment.id, comment.content, date_format(comment.creationDate,"%d/%m/%Y") AS creationDate, 
                                      comment.validated as validated, comment.postId as postId, comment.userId,
                                      user.nickname as author
                                      FROM comment, user 
                                      WHERE comment.userId = user.id 
                                      AND postId = :postId 
                                      AND validated = 1 ORDER BY id ASC');
        $query->execute(['postId' => $postId]);
        while ($donnees = $query->fetch()) {
          $comments[] = new \models\Comment($donnees);
        }
        return $comments;

        
    }

  public function getWaitingList()
  {

    $comments = [];
    $query = $this->db->prepare('SELECT comment.id AS id, comment.content, date_format(comment.creationDate,"%d/%m/%Y") AS creationDate,
                                    comment.validated as validated, comment.postId, comment.userId FROM comment WHERE validated = 0 ORDER BY id');
    $query->execute();
    while ($donnees = $query->fetch()) {
      $comments[] = new \models\Comment($donnees);
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
