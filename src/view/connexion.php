<?php
session_start();
require_once dirname(__FILE__) . '/header.php';
?>

<h1>CONNEXION</h1>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Entrez vos identifiants</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block connexion">Connexion</button>
                <button type="submit" class="btn btn-primary btn-block inscription"><a href="inscription.php">Inscription</a></button>
            </form>
            <?php
            $host = 'localhost';
            $dbname = 'va_php';
            $user = 'root';
            $password = '';
            try {
                // Création d'une instance PDO
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if (isset($_POST['email'])) {
                    $email = $_POST['email'];
                    // Préparation de la requête SQL
                    $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE email = :email');
                    $stmt->bindValue(':email', $email);
                    // Exécution de la requête SQL
                    $stmt->execute();
                    // Récupération du résultat de la requête SQL
                    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($utilisateur && password_verify($_POST['password'], $utilisateur['motDePasse'])) {
                        // Connexion réussie
                        $_SESSION['user_id'] = $utilisateur['id'];
                        $_SESSION['user_nom'] = $utilisateur['nom'];
                        $_SESSION['user_prenom'] = $utilisateur['prenom'];
                        header('Location: actualites.php');
                        exit();
                    } else {
                        // Connexion échouée
                        echo 'Adresse e-mail ou mot de passe incorrect.';
                    }
                }
            } catch (PDOException $e) {
                echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
            }
            ?>
        </div>
    </div>
</div>