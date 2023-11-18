<?php

$post = App::getInstance()->getTable('post')->findPostWithCategoryAndSize($_GET['id']);
$category = App::getInstance()->getTable('category')->find($post->getIdCategory());

$title = $post->getNom();

?>

<div class="post-global container-perso">
    <div class="col-md-6 m-auto">
        <div id="post-detail" class="card m-1 no-border">
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
</div>