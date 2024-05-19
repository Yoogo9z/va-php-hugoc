<?php

session_start();

require_once dirname(__FILE__) . '/header.php';

?>
<h1>INSCRIPTION</h1>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Remplissez le formulaire d'inscription</h2>
            <form method="post" action="../insertion/insertUtilisateur.php" enctype="multipart/form-data" id="inscriptionForm">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" name="prenom" required>
                </div>
                <div class="form-group">
                    <label for="date_naissance">Date de Naissance</label>
                    <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" name="password" required>
                </div>
                <div class="form-group">
                    <label for="photo_profil">Photo de profil</label>
                    <input type="file" class="form-control-file" id="photo_profil" name="photo_profil" required>
                    <small id="photoHelp" class="form-text text-muted">Veuillez sélectionner une image au format JPG, JPEG, PNG ou GIF.</small>
                </div>

                <button type="submit" class="btn btn-block valider" id="submitButton" disabled>Valider</button>
            </form>
        </div>
    </div>
</div>
