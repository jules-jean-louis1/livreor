<?php
session_start();
include 'connect.php';
?>

<?php   if($_SESSION['login'] === NULL){
    header('location: index.php');
} 
?>
<?php
$conn = mysqli_query($connect,"SELECT * FROM `utilisateurs`");
$row = $conn->fetch_all();
$errors = [];

if (isset($_POST['submit_btn'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $id = $_SESSION['id'];
    $uplogin = "UPDATE `utilisateurs` SET `login` = '$login' WHERE `connexion`.`id` = '$id'";
    $uppassword = "UPDATE `utilisateurs` SET `password` = '$password' WHERE `connexion`.`id` = '$id'";
        if (!empty($_POST['login'])) {
            if (mysqli_query($mysqli, $uplogin)){
                $_SESSION['login'] = $login;
                $errors['up_login'] = 'Votre Login a bien était mise a jour';
            }
        }
        if (!empty($_POST['password'])) {
            if (mysqli_query($mysqli, $uppassword)){
                $_SESSION['password'] = $password;
                $errors['up_password'] = 'Votre password a bien était mise a jour';
            }
        }
    }
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <title>Profil</title>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <main class="position-relative">
        <section class="s1_connect">
            <div class="module_connect">
                <div class="module_warpper">
                    <div class="module_container">
                        <form action="" method="POST" class="form_">
                            <div class="compte_title">
                                <h2>Paramètres du compte utilisateur</h2>
                                <p>Vous pouvez ici effectuer des changements sur vos information personnels</p>
                            </div>
                            <label for=""><?php echo "Login : ".$_SESSION['login'];?></label>
                            <input type="text" name="login" id="log" placeholder="Changer de login">
                            <label for=""><?php echo "Password : ".$_SESSION['password'];?></label>
                            <input type="text" name="mdp" id="log" placeholder="Changer de Mot de passe">
                            <input type="submit" value="Effectuer les changements" name="submit_btn"  id="submit" >
                                <div class="error">
                                    <?php foreach($errors as $message):?>
                                        <div><?php echo htmlspecialchars($message); ?></div>
                                    <?php endforeach; ?>
                                </div>
                        </form>
                        <div class="link_com">
                            <button><a href="livre-or.php">Livre d'or</a></button>
                        </div>
                        <form action="" method="post">
                            <input type="submit" value="logout" name="logout">
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