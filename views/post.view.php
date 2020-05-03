<section class="hero-banner d-flex align-items-center">
  <div class="container text-center">
    <h2>Article / Post</h2>
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



              <p class="date">Dernirer modification le : <?= $post->getModificationDate(); ?></p>

            </div>
            <p class="date">Ecrit par : <?= $post->getAuthor(); ?></p>
          </div>
        </div>

        <div class="comments-area">
          <h4><?= count($comments) ?> Commentaires</h4>
          <?php foreach ($comments as $values) { ?>
            <div class="comment-list">
              <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                  <div class="desc">
                    <p class="comment">
                      <?= $values->getContent(); ?>
                    </p>

                    <div class="d-flex justify-content-between">
                      <div class="d-flex align-items-center">
                        <h5>
                          Ecrit Par <?= $values->getAuthor(); ?>
                        </h5>
                        <p class="date">le <?= $values->getCreationDate(); ?></p>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="comment-form">
          <h4>Laissez un commentaire</h4>
          <form class="form-contact comment_form" method="post" action="index.php?controller=Comment&action=addComment" id="commentForm">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <textarea class="form-control w-100" name="content" cols="30" rows="9" placeholder="Ecrire un commentaire"></textarea>
                </div>
              </div>

              <input class="form-control" type="hidden" name="postId" value="<?= $post->getId(); ?>">
              <?php if (\models\Session::isConnected()) { ?>   
              <input class="form-control" type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
               <?php } ?>
            </div>
            <div class="form-group">
              <button type="submit" class="button button-contactForm">Envoyer Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>