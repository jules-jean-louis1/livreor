<?php
session_start();            //Démarage de la session
include 'connect.php';      // Ajout des variables pour la connexion a la base de données 

$valid = true;              // Varaible booleen pour testé si tout les champs sont bien remplie
$errors = array();          // initialisation de du tableau pour stocker les messages d'erreur
$login = "";                // ini des variable pour l'utilisation dans une requête
$password = "";
$password_conf = "";
$check_password= true;
$sql = "INSERT INTO `utilisateurs` (`login`, `password`) VALUES ('$login', '$password')";
$user_check = "SELECT login FROM utilisateurs WHERE login = '$login'; ";
$check = mysqli_query($connect, $user_check);

// Check if the form has been posted
if (isset($_POST['login'], $_POST['password'], $_POST['password_conf'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_conf = $_POST['password_conf'];
    if (empty($_POST['login'])) {
        $valid = false;
        $errors['login'] = "Le champs login est vide.";
    }
    if (empty($_POST['password'])) {
        $valid = false;
        $errors['password'] = "Le champs password est vide.";
    }
    if (empty($_POST['password_conf'])) {
        $valid = false;
        $errors['password_conf'] = "Le champs confirmation du password est vide.";
    }
    if ($valid) {
    }  if (mysqli_num_rows($check) > 0) {
        $errors['login2'] = "Ce Login existe déja";
    } elseif ($password === $password_conf) {
        mysqli_query($connect, $sql);
        $errors['succes'] = "Votre compte a bien était crée";
        header('Location: connexion.php');
        /* header('Location: connexion.php'); */
    } else {
        $errors['diffpassword'] = "les deux password entrée ne correspondent pas";
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
    <title>Livre d'or - S'inscrire</title>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <main class="main_com">
            <section class="s1_connect">
                <div class="module_connect">
                    <div class="wapper_com">
                        <div class="mcontainer">  
                            <img src="images/account_circle_FILL0_wght400_GRAD0_opsz48.svg" alt="account-logo" class="filter_blue" style="width: 95px;">
                            <form action="" method="post" accept-charset="utf-8" class="form_">
                                    <h2>S'inscrire</h2>
                                    
                                        <div class="error">
                                            <?php foreach($errors as $message):?>
                                                <div><?php echo htmlspecialchars($message); ?></div>
                                            <?php endforeach; ?>
                                        </div>
                                    <div class="row">
                                        <input id="log" type="text" name="login" placeholder="Login">
                                    </div>
                                    <div class="row">
                                        <input id="log" type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="row">
                                        <input id="log" type="password" name="password_conf" placeholder="Confirmer le password">
                                    </div>
                                    <div class="already_membre">
                                        <p>Déjà inscrit ? <a href="connexion.php">Connectez-Vous</a></p>
                                    </div>
                                    <div class="row">
                                        <input type="submit" value="s'inscrire" class="btn_login">
                                    </div>
                                    <div class="row">
                                        <a href="livre-or.php">
                                            <button class="btn_log">    
                                                <img src="images/comment.svg" alt="" class="filter_blue" style="width: 25px;">
                                                commenter
                                            </button>
                                        </a>
                                    </div>
                            </form>
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