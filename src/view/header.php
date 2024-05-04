<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="js/animation.js"></script>
    <title>Header</title>
</head>

<body>
    <div class="header">
    <ul>
    <li><a href="actualites.php" <?php if (basename($_SERVER['PHP_SELF']) == 'actualites.php') echo 'class="active"'; ?>>Actualités</a></li>
    <?php if (isset($_SESSION['user_id'])) : ?>
        <!-- Afficher le bouton de déconnexion -->
        <li><a href="deconnexion.php">Déconnexion</a></li>
    <?php else : ?>
        <!-- Afficher le lien de connexion -->
        <li><a href="connexion.php" <?php if (basename($_SERVER['PHP_SELF']) == 'connexion.php') echo 'class="active"'; ?>>Connexion</a></li>
        <!-- Afficher le lien d'inscription uniquement si l'utilisateur n'est pas connecté -->
        <li><a href="inscription.php" <?php if (basename($_SERVER['PHP_SELF']) == 'inscription.php') echo 'class="active"'; ?>>Inscription</a></li>
    <?php endif; ?>
</ul>

        <?php if (isset($_SESSION['user_id'])) : ?>
            <!-- Afficher l'identifiant de l'utilisateur -->
            <div class="session"><span class="connecte">Connecté en tant que <?php echo $_SESSION['user_nom'] . ' ' . $_SESSION['user_prenom']; ?></span></div>
        <?php endif; ?>
    </div>

</body>

</html>