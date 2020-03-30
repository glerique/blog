<section class="hero-banner d-flex align-items-center">
        <div class="container text-center">
            <h2>Ajouter</h2>            
        </div>
    </section> 
    <section class="contact-section area-padding">
    <div class="container">
              <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Ajouter</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" method="post" action="index.php?controller=Post&action=ajouterPost">
            <div class="row">             
              <div class="col-12">
                <div class="form-group">
                  Titre : <input class="form-control" type="text" name="titre">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Chapo : <input class="form-control" type="text" name="chapo">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  Contenu : <input class="form-control" type="text" name="contenu">
                </div>
              </div>     
            </div>
            <div class="form-group mt-3">
           <input type="submit" class="button button-contactForm" name="ajouter" value="poster">
            </div>
          </form>
        </div>       
      </div>
    </div>
</section>
