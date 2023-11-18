<?php
$title = "Login";

?>
<div class="row">
  <div class="col-md-4 m-auto card p-0">
      <form action="" method="POST">
          <div class="card-header bg-primary">
            <h1 class="text-white text-center fs-5">Connexion</h1>
          </div>
          <?php if ($message != null) : ?>
            <div class="alert alert-danger text-center m-3"><?= $message ?></div>
          <?php endif; ?>
          <?php if ($errors) : ?>
            <div class="alert alert-danger text-center m-3">"Email ou Mot de passe incorrects</div>
          <?php endif; ?>
          <div class="card-body">
            <div class="form-group">
                <label for="" class="forl-label">Email :</label>
                <input type="email" name="adressemail" class="form-control" placeholder="Votre login">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Mot de passe : </label>
                <input type="password" name="password" class="form-control" placeholder="Votre mot de passe">
            </div>  
          </div>
          <div class="card-footer">
            <div class="form-group my-3 text-center m-auto">
                <button type="submit" class="btn btn-primary my-2 ">Se connecter</button>
                <button type="button" class="btn btn-danger my-2">
                  <a href="/" class="text-white">Annuler</a>
                </button>
            </div>
            <div class="row ">
              <div class="col-md-8 m-auto ">
                <a class="link text me-5" href="?page=users.ClientSignup">S'inscrire</a>
                <a href="?page=users.newpassword" target="_blank" class="link text">Mot de passe oublié ? </a>              </div>
            </div>
          </div>
      </form>
  </div>
</div>