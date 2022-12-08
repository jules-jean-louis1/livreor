<?php
session_start();
include 'connect.php';      //On inporte la connexion à la base de donnée

$conn = mysqli_query($connect, "SELECT * FROM `utilisateurs`");     // requête dans la table utilisateurs
$row = $conn->fetch_all();
$valid = true;                          // booleen pour les tests des champs vide
$errors = [];                           // Création d'un tableau pour afficher les erreurs
if (isset($_POST['login'], $_POST['password'])) {           // récuperation du login et password
    if (empty($_POST['login'])) {       //verification avec empty si le champs 'login' est vide
        $valid = false;
        $errors['login'] = "Champs login vide.";        //
    }
    if (empty($_POST['password'])) {
        $valid = false;
        $errors['password'] = "Champs password vide.";
    }
    if ($valid) {
        for ($i=0; isset($row[$i]) ; $i++) { 
            if ($_POST['login'] === $row[$i][1] AND $_POST['password'] === $row[$i][2]) {
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['id'] = $row[$i][0];
                $errors['succes'] = 'Vous êtez connecter';
                sleep(2);
                header('Location: profil.php');
            } else {
                $errors['faild'] = 'Login / Password erroné';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <link rel="icon" href="images/bbule-logo.png">
    <title>Se connecter</title>
</head>
<body>
<?php include 'header.php' ?>
        <main class="main_com">
            <section class="s1_connect">
                <div class="module_connexion">
                    <div class="wapper_com">
                        <div class="mcontainer2">
                            <div class="flex-row" id="form-container">
                            <img src="images/account_circle_FILL0_wght400_GRAD0_opsz48.svg" alt="account-logo" class="filter_blue" style="width: 95px;">
                                <form action="" Method="POST" class="flex-column">
                                    <div class="container_connect">
                                        <label for="login">Login</label>
                                        <input type="text" name="login" id="log_connec"  placeholder="Login">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="log_connec"  placeholder="Password">
                                        <p><a href="inscription.php">S'inscrire</a></p>
                                    </div>
                                    <input type="submit" value="Se connecter" class="btn_change" id="connect_btn">
                                        <div class="error">
                                            <?php foreach($errors as $message):?>
                                                <div><?php echo htmlspecialchars($message); ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php
        include 'footer.php';
    ?>
</body>
</html>