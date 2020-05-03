<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="assets/img/favicon.png" type="image/png">
    <title>Blog PHP Gaël Lerique</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
    <!--================Header Menu Area =================-->
    <header class="header_area">	
        <div class="main_menu">        
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->                    
                    <a class="navbar-brand logo_h" href="index.php"><img src="assets/img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                            <li class="nav-item"><a class="nav-link" href="upload/cv.pdf" target="_blank">Mon CV</a></li>  
                            <?php if (\models\Session::isAdmin()) { ?>
                            <li class="nav-item submenu dropdown">                            
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrateur</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="index.php?controller=Post&action=ajouter">Ajouter un post </a></li> 
                                    <li class="nav-item"><a class="nav-link" href="index.php?controller=Post&action=liste">Liste des posts</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index.php?controller=User&action=liste">Liste utilisateurs</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index.php?controller=Comment&action=liste">Commentaires</a></li>                                                                          
                                </ul>
                            </li>
                                <?php }?>
                                <?php if (!\models\Session::isConnected()) { ?>   
                            <li class="nav-item"><a class="nav-link" href="index.php?controller=User&action=formLogin">Login</a></li>
                                <?php } 
                                if (\models\Session::isConnected()) { ?>
                            <li class="nav-item"><a class="nav-link" href="index.php?controller=User&action=logout">Logout</a></li>
                                <?php }?>
                                <li class="nav-item"><a class="nav-link" href="index.php?controller=Contact&action=formContact">Contact</a></li>        
                        </ul>
                    </div>
                    <div class="right-button">
                        <ul>                            
                            <li><a class="sign_up" href="index.php?controller=User&action=ajouter">Inscription</a></li>
                        </ul>
                    </div> 
                </div>
            </nav>                        
        </div>
        <?php if (\models\Session::showFlashes('error')): ?>
                <div class="alert alert-danger" role="alert">
				<?php foreach (\models\Session::getFlashes('error') as $message): ?>
					<p><?=$message?></p>
				<?php endforeach?>
			</div>
		<?php endif?>
        <?php if (\models\Session::showFlashes('success')): ?>
			<div class="alert alert-success">
				<?php foreach (\models\Session::getFlashes('success') as $message): ?>
					<p><?=$message?></p>
				<?php endforeach?>
			</div>
		<?php endif?>		
    </header>
    <body>
    