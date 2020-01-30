<?php
require('includes/header.php');
require_once('controllers/Controller.php');
//On appele la classe controleur pour les actions en fonction des evenements
//Une structure if/else est utilisée pour savoir quelle action effectuer     
$controleur = new Controller();

if (isset($_GET['id'])){

    $controleur->fichePost();
}
else {$controleur->accueil();
}
require('includes/footer.php');
?>