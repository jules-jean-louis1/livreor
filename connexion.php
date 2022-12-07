<?php
session_start();
include 'connect.php';      //On joint la connexion à la base de donnée

$conn = mysqli_query($connect, "SELECT * FROM `utilisateurs`");
$row = $conn->fetch_all();
$valid = true;
$errors = [];
if (isset($_POST['login'], $_POST['password'])) {
    if (empty($_POST['login'])) {
        $valid = false;
        $errors['login'] = "Champs login vide.";
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
                <div class="module_connect">
                    <div class="wapper_com">
                        <div class="mcontainer2">
                            <div class="flex-row" id="form-container">
                                <form action="" Method="POST" class="flex-column">
                                    <label for="login">Nom d'utilisateur</label>
                                    <input type="text" id="login" name="login" class="log_01">
                                    <label for="password">Mot de passe</label>
                                    <input type="password" id="password" name="password" class="log_01">
                                    <input type="submit" id="mybutton" value="Se connecter" class="btn_login_01">
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