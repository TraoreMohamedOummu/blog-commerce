<?php
$title = "New password";

?>
<div class="row">
  <div class="col-md-4 m-auto card p-0">
      <form action="" method="POST">
          <div class="card-header bg-primary">
            <h1 class="text-white text-center fs-5">Mot de passe oublié</h1>
          </div>
          <?php if ($messageError != null) : ?>
            <div class="alert alert-danger text-center m-3"><?= $messageError ?></div>
          <?php endif; ?>
          <div class="card-body">
            <div class="form-group">
                <label for="" class="forl-label">Email :</label>
                <input type="email" name="customermail" class="form-control" placeholder="Votre login">
            </div>  
          </div>
          <div class="card-footer">
                <button type="submit" class="btn btn-primary">Envoyer</button>
          </div>
      </form>
  </div>
</div>