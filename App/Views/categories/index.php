<?php 
$title = $category->getName();
?>
<div class="container-perso">
   <h2 class="text-start my-3"><?= $category->getName() ?></h2>
   <?php if($posts == []):?>
        <div class="alert alert-warning m-auto text-center">
            Il y'aucun article pour la categorie "<?= $category->getName() ?>"
        </div>
    <?php endif; ?>
    <?php foreach($posts as $post):?>
            <div class="col-md-4">
                <div class="card m-1">
                    <div class="div-img">
                        <img src="images/<?=$post->getPicture() ?>" class="card-img-top img-height" alt="Produit image">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title fw-bold title"><?= $post->getNom() ?></h3>
                        <p class="content-title"><?= $post->extract ?></p>
                        <div class="row">
                            <div class="col-6">
                            <p class="text-left"><?= $post->getDateValue()?></p>
                            </div>
                            <div class="col-6">
                            <div class="text-right">
                                <a href="<?= $post->url ?>" class="link">
                                    Voir plus
                                    <span class="link-icon p-0">
                                        <ion-icon  name="arrow-forward-outline"></ion-icon>
                                    </span>
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
            
    </div>
</div>
