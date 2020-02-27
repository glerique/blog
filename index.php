<?php
require('includes/header.php');
require('controllers/Controller.php');
//On appele la classe controleur pour les actions en fonction des evenements
//Une structure if/elseif est utilisée pour savoir quelle action effectuer     
$controleur = new Controller();

if ($_POST){   
    if(isset($_POST['ajouter'])){
    $controleur->ajouterPost();        
    }

    elseif(isset($_POST['modifier'])){
        $controleur->modifierPost();               
    } 
    
    elseif(isset($_POST['login'])){
        $controleur->authentification();
    }
}

elseif ($_GET){    

    if ($_GET['action']=="accueil"){
        $controleur->accueil();
    }

    elseif ($_GET['action']=="afficher"){
        $controleur->fichePost();               
    }

    elseif ($_GET['action']=="ajouter"){
        require('views/addPost.view.php');
    }

    elseif ($_GET['action']=="modifier"){
        $controleur->modifierFiche();
        }    
    
    elseif ($_GET['action']=="liste"){
        $controleur->liste();
    }

    elseif ($_GET['action']=="supprimer"){
        $controleur->supprimerPost();
    }

    elseif ($_GET['action']=="login"){
        $controleur->login();
    }
}


else { $controleur->accueil();
}
require('includes/footer.php');

?>