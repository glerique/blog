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
                        <p>Life firmament under them evening make after called dont saying likeness<br> isn't wherein also forth she'd air two without</p>
                    </div>           
                </div>
            </div>

            <div class="row">
            <?php 
      foreach($manager->getList() as $value){ 
        ?>  
                <div class="col-lg-4 col-md-6 ">
                <a href = "index.php?action=afficher&id=<?= $value->getId(); ?>">
                    <div class="single-blog">
                        <div class="thumb">
                            <img class="img-fluid w-100" src="assets/img/blog/2.png" alt="">
                        </div>
                        <div class="single-blog-content">
                            <p class="tag">Software / Business</p>
                            <p class="date"><?= $value->getDateAjout(); ?> </p>
                            <h4>
                            <?= ucfirst ($value->getTitre()); ?>
                            </h4>
                            <p> <?= $value->getChapo(); ?></p>
                            <div class="meta-bottom d-flex">
                                <p class="likes"><i class="ti-comments"></i> 02 Comments</p>                                
                            </div>
                            </a>

                        </div>
                    </div>
                </div>               
                <?php } ?>            
              </div>
        </div>
    </section>
    <!--================ End Blog Area =================-->