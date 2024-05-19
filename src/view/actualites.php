<?php

use App\Classes\Actualite;

session_start();

require_once dirname(__FILE__) . '/header.php';
require_once dirname(__DIR__) . '/../bootstrap.php';

// Obtention du repository pour l'entité Actualite
$repository = $entityManager->getRepository(Actualite::class);

// Récupération de toutes les actualités avec Doctrine ORM
$actualites = $repository->findAll();

// Affichage des actualités
?>

<h1>ACTUALITÉS</h1>

<div class="container">
    <?php if (count($actualites) > 0) : ?>
        <?php foreach ($actualites as $actualite) : ?>
            <div class="card custom-card wd-2">
                <img src="<?php echo $actualite->getImageUrl(); ?>" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $actualite->getTitre(); ?> </h5>
                    <p class="card-text"><?php echo $actualite->getContenu(); ?> </p>
                    <?php if (!empty($actualite->getAuteur())) : ?>
                        <p class="card-text"><small class="text-muted">Auteur: <?php echo $actualite->getAuteur(); ?></small></p>
                    <?php endif; ?>
                    <p class="card-text"><small class="text-muted">Publié le <?php echo $actualite->getDatePublication(); ?></small></p>
                    <a href="javascript:void(0)" class="btn lire">Lire l'article</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucun article n'a été trouvé.</p>
    <?php endif; ?>
</div>
