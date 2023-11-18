<?php
$title = "Signup";

?>

<div class="row">
  <div class="col-md-4 m-auto card p-0">
      <form action="" method="POST">
          <div class="card-header bg-primary">
            <h1 class="text-white text-center fs-5">Création d'un compte</h1>
          </div>
          <div class="card-body">
            <?= $form->input('customername', 'Votre nom') ?>
            <?= $form->input('customermail', 'Votre email', 'email') ?>
            <?= $form->input('customerpassword', 'Votre mot de passe', 'password') ?>   
          </div>
          <div class="card-footer">
            <div class="form-group my-3 text-center m-auto">
                <button type="submit" class="btn btn-primary my-2 ">S'inscrire</button>
                <button type="button" class="btn btn-danger my-2">
                  <a href="/" class="text-white">Annuler</a>
                </button>
            </div>
            <div class="row ">
              <div class="col-md-8 m-auto ">
                <a class="link text mx-2 " href="?page=users.Clientlogin">Se connecter</a>
                <a href="?page=users.newpassword" target="_blank" class="link text">Mot de passe oublié ? </a>              </div>
            </div>
          </div>
      </form>
  </div>
</div>