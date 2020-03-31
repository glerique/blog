<section class="hero-banner d-flex align-items-center">
  <div class="container text-center">
    <h2>Afficher</h2>
  </div>
</section>

<!--================Blog Area =================-->
<section class="blog_area single-post-area area-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 posts-list">
        <div class="single-post">
          <div class="feature-img">
            <img class="img-fluid" src="assets/img/blog/m-blog-2.jpg" alt="">
          </div>
          <div class="blog_details">
            <h2><?= $post->getTitle(); ?></h2>
            <p class="date"></p>
            <p class="excert">
              <?= $post->getStandfirst(); ?>
            </p>

            <p class="excert">
              <?= $post->getContent(); ?>
            </p>
            <div class="d-flex align-items-center">



              <p class="date">Dernirer modification : <?= $post->getModificationDate(); ?></p>

            </div>
            <p class="date">Autheur : <?= $post->getUserId(); ?></p>
          </div>
        </div>

        <div class="comments-area">
          <h4>Commentaires</h4>
          <div class="comment-list">
            <div class="single-comment justify-content-between d-flex">
              <div class="user justify-content-between d-flex">
                <div class="desc">
                  <p class="comment">
                    Multiply sea night grass fourth day sea lesser rule open subdue female fill
                    which them Blessed, give fill lesser bearing multiply sea night grass fourth
                    day sea lesser
                  </p>

                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <h5>
                        <a href="#">Emilly Blunt</a>
                      </h5>
                      <p class="date">December 4, 2017 at 3:12 pm </p>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="comment-form">
          <h4>Laissez un commentaire</h4>
          <form class="form-contact comment_form" action="#" id="commentForm">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                </div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="button button-contactForm">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>