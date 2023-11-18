<?php
$title = "Update password";

?>
<div class="row">
  <div class="col-md-4 m-auto card p-0">
      <form action="" method="POST">
          <div class="card-header bg-primary">
            <h1 class="text-white text-center fs-5">Modification de mot de passe</h1>
          </div>
          <div class="card-body">
            <?php if(!$confirm): ?>
                <div class="alert alert-danger m-3">Les deux mots de passe ne correspondent pas</div>
            <?php endif ?>
            <div class="form-group">
                <label for="" class="forl-label">Nouveau mot de passe :</label>
                <input type="password" name="customerpassword" class="form-control" placeholder="Votre nouveau mot de passe">
            </div><br>
            <div class="form-group">
                <label for="" class="form-label">Confirmation de nouveau mot de passe : </label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe de confirmation">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Envoyer</button>
          </div>
      </form>
  </div>
</div>