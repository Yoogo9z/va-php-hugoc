<?php

require_once dirname(__DIR__) . '/../bootstrap.php';
// require_once "../../bootstrap.php";

use App\Classes\Actualite;

$jsonData = [
    file_get_contents('../../actualites_json/franceinfo.json'),
    file_get_contents('../../actualites_json/lemonde.json'),
    file_get_contents('../../actualites_json/symfony.json'),
];

foreach ($jsonData as $json) {
    $detailActu = json_decode($json, true);
    $JsonFiles = $detailActu['rss']['channel']['item'];
    foreach ($JsonFiles as $item) {
        $description = isset($item['description']) ? trim($item['description']) : 'description indescriptible';
        $contentDescription = isset($item['content']['description']) ? trim($item['content']['description']) : $description;
        $credit = isset($item['content']['credit']) ? trim($item['content']['credit']) : 'Auteur non spécifié';
        $comments = isset($item['comments']) ? trim($item['comments']) : 'No comments';
        
        $actu = new Actualite();
        $actu->setTitre(trim($item['title']));
        $actu->setContenu($contentDescription);
        $actu->setDatePublication(($item['pubDate']));
        $actu->setUrl(trim($item['link']));
        $actu->setImageUrl(trim($item['enclosure']));
        $actu->setAuteur(isset($item['creator']) ? trim($item['creator']) : 'Auteur non spécifié');
        $actu->setCredit($credit);
        $actu->setComments($comments);
        var_dump($actu);
        // $entityManager->persist($actu);
    }
}
// $entityManager->flush();

echo "Actualités insérées avec succès.";