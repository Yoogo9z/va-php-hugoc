<?php

require_once dirname(__DIR__) . '/../bootstrap.php';

use App\Classes\Utilisateur;
use App\Classes\Photo;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['date_naissance']) && !empty($_POST['email']) && !empty($_POST['password']) && isset($_FILES['photo_profil'])) {

        $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8');
        $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES, 'UTF-8');
        $date_naissance = htmlspecialchars($_POST['date_naissance'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $password = $_POST['password']; // password_hash() prendra soin du mot de passe

        $utilisateur = new Utilisateur();
        $utilisateur->setNom($nom);
        $utilisateur->setPrenom($prenom);
        $utilisateur->setDateNaissance(new DateTime($date_naissance));
        $utilisateur->setEmail($email);
        $utilisateur->setMotDePasse(password_hash($password, PASSWORD_DEFAULT));

        $photo_profil = $_FILES['photo_profil'];

        // Vérification de l'extension de l'image
        $extension = pathinfo($photo_profil['name'], PATHINFO_EXTENSION);
        if (!in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Le fichier sélectionné n'est pas une image valide.";
            exit;
        }

        // Vérification de la taille de l'image
        $taille_max = 2000000; // Taille maximale autorisée en octets
        if ($photo_profil['size'] > $taille_max) {
            echo "La taille de l'image dépasse la limite autorisée.";
            exit;
        }

        // Vérification du type de l'image
        $types_autorises = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($photo_profil['type'], $types_autorises)) {
            echo "Le type de l'image sélectionnée n'est pas autorisé.";
            exit;
        }

        $upload_directory = dirname(__DIR__).'/view/images/';
        $photo_url = $upload_directory . $photo_profil['name'];
        $is_uploaded = move_uploaded_file($photo_profil['tmp_name'], $photo_url);

        if (!$is_uploaded) {
            echo "Une erreur s'est produite lors du téléchargement de l'image.";
            exit;
        }

        $photo = new Photo();
        $photo->setAuteur($nom . ' ' . $prenom);
        $photo->setUrlImage($photo_url);
        $photo->setUtilisateur($utilisateur);
        $utilisateur->getPhotos()->add($photo);
        $entityManager->persist($utilisateur);
        $entityManager->flush();
        echo "Utilisateur inséré avec succès.";
    } else {
        echo "Tous les champs obligatoires doivent être remplis.";
    }
}