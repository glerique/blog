<?php
namespace Models;
class UserManager extends Database
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

    public function count(){
        $query = $this->db->query('SELECT COUNT(*) FROM user');
        $count = $query->fetchColumn();
        return $count;
      }
    
      public function add(User $user){
        $query = $this->db->prepare('INSERT INTO user(lastName, firstName, email, nickname, pswd, userRole)
        VALUES(:nom, :prenom, :mail, :pseudo, :mdp, :droit)');
        $query->bindValue(':nom', $user->getLastName());
        $query->bindValue(':prenom', $user->getFirstName());
        $query->bindValue(':mail', $user->getEmail());
        $query->bindValue(':pseudo', $user->getNickname());
        $query->bindValue(':mdp', $user->getPswd());
        $query->bindValue(':droit', $user->getUserRole());        
        $query->execute();
      }
    
      public function delete($id){
        $query= $this->db->query('DELETE FROM user WHERE id = '.$id);
        $query->execute();
      }
    
      public function get($id){
        $id = (int) $id;
        $query = $this->db->query('SELECT id, lastName, firstName, email, nickname, pswd, userRole FROM user WHERE id = '.$id);
        $data = $query->fetch(\PDO::FETCH_ASSOC);
        return new User($data);
      }
    
    
      public function getList(){   
        
        $users= [];
        $query = $this->db->query('SELECT id, lastName, firstName, email, nickname, pswd, userRole FROM user');   
        while ($data = $query->fetch())
        {
          $users[] = new User($data);
        }     
        return $users;    
        }
    
      public function update(User $user){
        $query = $this->db->prepare('UPDATE user SET lastName = :lastName, firstName = :firstName, email = :email, 
                                              nickname = :nickname, pswd = :pswd, userRole = :userRole WHERE id = :id');
        $query->bindValue(':lastName', $user->getLastName());   
        $query->bindValue(':firstName', $user->getFirstName());
        $query->bindValue(':email', $user->getEmail());
        $query->bindValue(':nickname', $user->getNickname());
        $query->bindValue(':pswd', $user->getPswd());
        $query->bindValue(':userRole', $user->getUserRole());        
        $query->bindValue(':id', $user->getId());
        $query->execute();
      }

    public function authentification($nickname, $pswd)
    {
        $query = $this->db->query("SELECT id, nickname, pswd, userRole FROM user WHERE nickname ='$nickname' AND pswd ='$pswd'");
        $data = $query->fetch();

        if (!$data) {
            require('views/login.view.php');
            echo 'Mauvais identifiant ou mot de passe !';
        } else {
            return new User($data);            
        }
    }
}
