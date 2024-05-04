<?php

require_once "../../bootstrap.php";

use App\Classes\Utilisateur;
use App\Classes\Photo;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['date_naissance']) && !empty($_POST['email']) && !empty($_POST['password']) && isset($_FILES['photo_profil'])) {
        $utilisateur = new Utilisateur();
        $utilisateur->setNom($_POST['nom']);
        $utilisateur->setPrenom($_POST['prenom']);
        $utilisateur->setDateNaissance(new DateTime($_POST['date_naissance']));
        $utilisateur->setEmail($_POST['email']);
        $utilisateur->setMotDePasse(password_hash($_POST['password'], PASSWORD_DEFAULT));
        $photo_profil = $_FILES['photo_profil'];
        $photo_url =  $photo_profil['name'];
        $upload_directory = 'C:\wamp64\www\va-php-hugoc\images\\';
        $photo_url = $upload_directory . $photo_profil['name'];
        $is_uploaded = move_uploaded_file($photo_profil['tmp_name'], $photo_url);
        $photo = new Photo();
        $photo->setAuteur($utilisateur->getNom() . ' ' . $utilisateur->getPrenom());
        $photo->setUrlImage($photo_url);
        $photo->setUtilisateur($utilisateur);
        $utilisateur->getPhotos()->add($photo);
        // $entityManager->persist($utilisateur);
        // $entityManager->flush();
        echo "Utilisateur inséré avec succès.";
    } else {
        echo "Tous les champs obligatoires doivent être remplis.";
    }
}
