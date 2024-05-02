<?php

require_once "../../bootstrap.php";

use App\Classes\Actualite;

// $jsonData = file_get_contents('../../actualites_json/franceinfo.json');

// $detailActu = json_decode($jsonData, true);

// $items = $detailActu['rss']['channel']['item'];

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

// Liste des chemins vers les fichiers JSON à traiter
$jsonData = [
    file_get_contents(__DIR__ . '/actualites_json/franceinfo.json'),
    file_get_contents(__DIR__ . '/actualites_json/lemonde.json'),
    file_get_contents(__DIR__ . '/actualites_json/symfony.json'),
];

foreach ($jsonData as $json) {
    $detailActu = json_decode($json, true);
    $JsonFiles = $detailActu['rss']['channel']['item'];
    foreach ($JsonFiles as $item) {
        $description = isset($item['description']) ? trim($item['description']) : 'No description available';
        $contentDescription = isset($item['content']['description']) ? trim($item['content']['description']) : $description;
        $credit = isset($item['content']['credit']) ? trim($item['content']['credit']) : 'Unknown creator';
        $comments = isset($item['comments']) ? trim($item['comments']) : 'No comments';
        // Création d'une nouvelle instance de l'entité Actualite
        $actu = new Actualite();
        $actu->setTitre(trim($item['title']));
        $actu->setContenu($contentDescription);
        $actu->setDatePublication(($item['pubDate']));
        $actu->setUrl(trim($item['link']));
        $actu->setAuteur(isset($item['creator']) ? trim($item['creator']) : 'Unknown creator');
        // $actu->setCredit($credit);
        // $actu->setComments($comments);
        // Persist et flush de l'entité
        $entityManager->persist($actu);
    }
}
// Exécution des opérations persistées
$entityManager->flush();

echo "Actualités insérées avec succès.";