<?php
require_once('models/Database.php');
require_once('models/Post.php');

class PostManager extends Database{

  private $db; // Instance de PDO
 
  public function __construct(){
    $db = $this->dbConnect();
    $this->setDb($db);
  }

  public function setDb(PDO $db){
    $this->db = $db;
  }

  public function count(){
    $query = $this->db->query('SELECT COUNT(*) FROM post');
    $count = $query->fetchColumn();
    return $count;
  }

  public function addPost(Post $post){
    $query = $this->db->prepare('INSERT INTO post(titre, chapo, contenu, dateAjout, dateModification, statut, utilisateurId)
    VALUES(:titre, :chapo, :contenu, :dateAjout, :dateModification, :statut, :utilisateurId)');
    $query->bindValue(':titre', $post->getTitre());
    $query->bindValue(':chapo', $post->getChapo());
    $query->bindValue(':contenu', $post->getContenu());
    $query->bindValue(':dateAjout', $post->getDateAjout());
    $query->bindValue(':dateModification', $post->getDateModification());
    $query->bindValue(':statut', $post->getStatut());
    $query->bindValue(':utilisateurId', $post->getUtilisateurId());
    $query->execute();
  }

  public function deletePost(Post $post){
    $this->db->exec('DELETE FROM post WHERE id = '.$post->getId());
  }

  public function getPost($id){
    $id = (int) $id;
    $query = $this->db->query('SELECT id, titre, chapo, contenu, dateAjout, dateModification, statut, utilisateurId FROM post WHERE id = '.$id);
    $donnees = $query->fetch(PDO::FETCH_ASSOC);
    return new Post($donnees);
  }


  public function getListPost(){
    $posts= [];
    $query = $this->db->query('SELECT id, titre, chapo, contenu, dateAjout, dateModification, statut, utilisateurId FROM post');
   
    while ($donnees = $query->fetch())
    {
      $posts[] = new Post($donnees);
    }

    return $posts;   
  }

  
 
}

?>