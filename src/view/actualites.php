<?php 

include("header.php");
require_once("../../bootstrap.php");

// Obtention du repository pour l'entité Actualite
$repository = $entityManager->getRepository('App\Classes\Actualite');

// Récupération de toutes les actualités avec Doctrine ORM
$actualites = $repository->findAll();

// Affichage des actualités
?>

<h1>ACTUALITÉS</h1>

<div class="container">
    <?php foreach ($actualites as $actualite) { ?>
                <div class="card custom-card wd-2">
                    <img src="<?php echo $actualite->getImageUrl(); ?>" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $actualite->getTitre(); ?> </h5>
                        <p class="card-text"><?php echo $actualite->getContenu(); ?> </p>
                        <?php if (!empty($actualite->getAuteur())) { ?>
                            <p class="card-text"><small class="text-muted">Auteur: <?php echo $actualite->getAuteur(); ?></small></p>
                        <?php } ?>
                        <p class="card-text"><small class="text-muted">Publié le <?php echo $actualite->getDatePublication(); ?></small></p>
                        <a href="#" class="btn btn-primary">Bouton</a>
                    </div>
                </div>
    <?php } ?>
</div>
