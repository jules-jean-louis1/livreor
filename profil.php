<?php
session_start();
include 'connect.php';
?>

<?php   if($_SESSION['login'] === NULL){
    header('location: index.php');
} 
?>
<?php
$errors = [];

if (isset($_POST['submit_btn'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $id = $_SESSION['id'];
    $conn = mysqli_query($connect,"SELECT * FROM `utilisateurs`");
    $row = $conn->fetch_all();
    $uplogin = "UPDATE `utilisateurs` SET `login` = '$login' WHERE `utilisateurs`.`id` = '$id'";
    $uppassword = "UPDATE `utilisateurs` SET `password` = '$password' WHERE `utilisateurs`.`id` = '$id'";
        if (!empty($_POST['login'])) {
            if (mysqli_query($connect, $uplogin)){
                $_SESSION['login'] = $login;
                $errors['up_login'] = 'Votre Login a bien était mise a jour';
            }
        }
        if (!empty($_POST['password'])) {
            if (mysqli_query($connect, $uppassword)){
                $_SESSION['password'] = $password;
                $errors['up_password'] = 'Votre password a bien était mise a jour';
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
    <title>Profil</title>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <main class="position-relative">
        <section class="s1_connect">
            <div class="module_connect">
                <div class="wapper_com">
                    <div class="mcontainer_connec">
                        <form action="" method="POST" class="form_connec">
                            <div class="compte_title">
                                <h2>Paramètres du compte utilisateur</h2>
                                <p>Vous pouvez ici effectuer des changements sur vos information personnels</p>
                            </div>
                            <div class="error">
                                    <?php foreach($errors as $message):?>
                                        <div><?php echo htmlspecialchars($message); ?></div>
                                    <?php endforeach; ?>
                            </div>
                            <label for=""><?php echo "Login : ".$_SESSION['login'];?></label>
                            <input type="text" name="login" id="log_connec" placeholder="Changer de login">
                            <label for=""><?php echo "Password : ".$_SESSION['password'];?></label>
                            <input type="text" name="password" id="log_connec" placeholder="Changer de Mot de passe">
                            <input type="submit" value="Validé les changements" name="submit_btn" class="btn_change" > 
                        </form>
                        <div class="btn_clear_connec">
                            <div class="link_com">
                                <button class="btn_livreor"><a href="livre-or.php">Livre d'or</a></button>
                            </div>
                            <div class="link_com">
                                <button class="btn_logout_connec"><a href="deconnexion.php">logout</a></button>
                            </div>
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