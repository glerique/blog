<?php

namespace models;


class PostManager extends Database{

  private $db; // Instance de PDO
 
  public function __construct(){
    $db = $this->dbConnect();
    $this->setDb($db);
  }

  public function setDb(\PDO $db){
    $this->db = $db;
  }

  public function count(){
    $query = $this->db->query('SELECT COUNT(*) FROM post');
    $count = $query->fetchColumn();
    return $count;
  }

  public function add(Post $post){
    $query = $this->db->prepare('INSERT INTO post(titre, chapo, contenu,  dateAjout, statut, utilisateurId)
    VALUES(:titre, :chapo, :contenu, :dateAjout, :statut, :utilisateurId)');
    $query->bindValue(':titre', $post->getTitre());
    $query->bindValue(':chapo', $post->getChapo());
    $query->bindValue(':contenu', $post->getContenu());
    $query->bindValue(':dateAjout', $post->getDateAjout());    
    $query->bindValue(':statut', $post->getStatut());
    $query->bindValue(':utilisateurId', $post->getUtilisateurId());
    $query->execute();
  }

  public function delete($id){
    $query= $this->db->query('DELETE FROM post WHERE id = '.$id);
    $query->execute();
  }

  public function get($id){
    $id = (int) $id;
    $query = $this->db->query('SELECT id, titre, chapo, contenu, date_format(dateAjout,"%d/%m/%Y") AS dateAjout, 
                                    date_format(dateModification,"%d/%m/%Y") AS dateModification, statut, utilisateurId FROM post WHERE id = '.$id);
    $donnees = $query->fetch(\PDO::FETCH_ASSOC);
    return new Post($donnees);
  }


  public function getList(){   
    
    $posts= [];
    $query = $this->db->query('SELECT id, titre, chapo, contenu, date_format(dateAjout,"%d/%m/%Y") AS dateAjout,
                                   date_format(dateModification,"%d/%m/%Y") AS dateModification, statut, utilisateurId FROM post');   
    while ($donnees = $query->fetch())
    {
      $posts[] = new Post($donnees);
    }     
    return $posts;    
    }

  public function update(Post $post){
    $query = $this->db->prepare('UPDATE post SET titre = :titre, chapo = :chapo, contenu = :contenu,  
                                                 dateModification = :dateModification, statut = :statut, utilisateurId = :utilisateurId  WHERE id = :id');
    $query->bindValue(':titre', $post->getTitre());   
    $query->bindValue(':chapo', $post->getChapo());
    $query->bindValue(':contenu', $post->getContenu());    
    $query->bindValue(':dateModification', $post->getDateModification());
    $query->bindValue(':statut', $post->getStatut());
    $query->bindValue(':utilisateurId', $post->getUtilisateurId());
    $query->bindValue(':id', $post->getId());
    $query->execute();
  }
 
}
