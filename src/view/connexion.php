<?php

include("header.php");
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