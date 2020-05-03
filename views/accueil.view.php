<section class="home_banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6 col-xl-5 offset-xl-7">
                        <div class="banner_content">
                            <h3>Gaël Lerique<br/>Développeur PHP</h3>
                            <p>Un travail acharné vient à bout de tout.</p>
                         </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
 <!--================ Start Blog Area =================-->
 <section class="latest-blog-area area-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="area-heading">
                        <h4>Derniers Articles</h4>
                        <p>Retrouvez les derniers articles de mon blog ! </p>
                    </div>           
                </div>
            </div>          
            <div class="row">
            <?php 
      foreach($posts as $value){ 
        ?>  
                <div class="col-lg-4 col-md-6 ">
                <a href = "index.php?controller=Post&action=afficher&id=<?= $value->getId(); ?>">
                    <div class="single-blog">
                        <div class="thumb">
                            <img class="img-fluid w-100" src="assets/img/blog/2.png" alt="">
                        </div>
                        <div class="single-blog-content">                            
                            <p class="date">
                            <i>Derniere mise à jour le : <?= $value->getModificationDate(); ?> </i></p>
                            <h3>
                            <?= ucfirst ($value->getTitle()); ?>
                            </h3>
                            <p class="date"> <?= ucfirst ($value->getStandfirst()); ?></p>                           
                            </a>

                        </div>
                    </div>
                </div>               
                <?php } ?>            
              </div>
        </div>
    </section>
    <!--================ End Blog Area =================-->