<?php
$title = "Home";
?>
<div class="container-perso  mb-5">
    <div class="filter-category">
        <h2 class="text-center pt-2">Filtrez les produits par categories</h2>
        <p class="text-center">Filtrez les meilleurs par votre choix.</p>
        <ul class="filter-text">
            
            <?php foreach($categories as $category): ?>
                <li >
                <a href="<?= $category->url ?>"><?= $category->getName() ?><a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

<div class="container-perso carousel-slider  mb-5">
   <div class="carousel-header mb-3">
        <h2 class="header-title">Nos produits</h2>
        <a class="text-right" href="#">Voir plus</a>
   </div>

   <button class="slider-arrow next-arrow">
        <ion-icon  class="icon" id="search-icon" name="arrow-forward-circle-outline"></ion-icon>
   </button>
   <button class="slider-arrow prev-arrow">
        <ion-icon  class="icon" id="search-icon" name="arrow-back-circle-outline"></ion-icon>
   </button>
    <div class="row post-carousel">
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


<div class="container-perso mb-5 ">
    <div class="carousel-header mb-3">
        <h2 class="header-title">Nos 6 derniers produits</h2>
    </div>
    <div class="row">
        <?php foreach($postsSive as $post):?>
        <div class="col-md-4">
            <div id="post-six" class="card m-1">
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

<section class="container-perso div-contact  mb-5">
    <div id="contact">
        <div class="row">
            <div class="col-md-6 contact-text">
                <h2 style="color: #fff">Restez informé</h2>
                <p style="color: #fff">Obtenez les dernières informations et tendances de la mode.</p>
            </div>
            <div class="col-md-6">
                <form action="" method="POST">
                <div class="row my-3">
                    <div class="col-md-8">
                        <div class="form-group ">
                            <input type="email" placeholder="Entrer votre email" name="customeremail" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">S'abonner</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- le modal d'inscription!-->