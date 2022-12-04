<?php include 'connect.php'; ?>
<?php
$message = "";  //Variable pour stocker les messages d'erreur ou réussite
$login10 = $_POST['login'];
        // requte pour connaître si l'utilisateur est deja dans la base de données
$user_exist ="SELECT * FROM utilisateur WHERE login = '$login10'";
$rs = mysqli_query($mysqli,$user_exist);

if ($_POST != NULL) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $password_re = htmlspecialchars($_POST['password_re']);

    $regex_password = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";

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
    <main class="position-relative">
            <section class="s1_connect">
                <div class="module_connect">
                    <div class="module_warpper">
                        <div class="module_container">  <!-- Zone de connection -->
                            <form action="" method="post" class="form_">
                                <div class="text_form">
                                    <h2>Inscrivez-vous</h2>
                                </div>
                                <input type="text" name="login" id="log" placeholder="Nom d'utilisateur" required>
                                <input type="password" name="password" id="log" placeholder="Mot de passe" required>
                                <input type="password" name="password_re" id="log" placeholder="Ressaisir le mot de passe" required>
                                <input type="submit" value="S'inscrire" id="submit" name="envoyer">
                                <?php echo $message; ?>
                                <p id="text_membre">Déjà membre ? <a href="connexion.php" id="text_link_form">Se connecter</a></p>
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