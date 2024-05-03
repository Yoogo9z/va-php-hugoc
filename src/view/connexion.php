<?php

include("header.php");
use App\Classes\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
?>

<h1>CONNEXION</h1>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Entrez vos identifiants</h2>
            <form>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Entrez votre email">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                <button type="submit" class="btn btn-primary btn-block inscription"><a href="inscription.php">Inscription</a></button>
            </form>
        </div>
    </div>
</div>

<?php 
// Vérification que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Récupérer l'utilisateur par email depuis la base de données
    $repository = $entityManager->getRepository(Utilisateur::class);
    $utilisateur = $repository->findOneBy(['email' => $email]);

    if ($utilisateur) {
        // Vérifier si le mot de passe est correct
        if (password_verify($password, $utilisateur->getMotDePasse())) {
            // Rediriger l'utilisateur vers la page d'accueil après connexion réussie
            header("Location: actualites.php");
            exit;
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }
} else {
    echo "Le formulaire de connexion n'a pas été soumis.";
}