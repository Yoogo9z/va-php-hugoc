<?php

require_once "../../bootstrap.php";

use App\Classes\Actualite;

$jsonData = file_get_contents('../../actualites_json/franceinfo.json');

$detailActu = json_decode($jsonData, true);

$items = $detailActu['rss']['channel']['item'];

// foreach ($items as $attribut) {
//     $actu = new Actualite();
//     $actu->setTitre($attribut['title']);
//     $actu->setContenu($attribut['description']);
//     $actu->setDatePublication($attribut['pubDate']);
//     $actu->setUrl($attribut['link']);
//     $actu->setImageUrl($attribut['enclosure']);

//     // Vérifier si 'content' existe et contient 'credit'
//     if (isset($attribut['content']) && isset($attribut['content']['credit'])) {
//         $content = $attribut['content'];
//         $actu->setAuteur($content['credit']);
//     } else {
//         // Si 'content' ou 'credit' est manquant, attribuer une valeur par défaut
//         $actu->setAuteur('symfony');
//     }

//     $entityManager->persist($actu);
// }

// $entityManager->flush();

// echo "Données insérées avec succès !";

