<?php
include 'connect.php';

$valid = true;
$errors = array();
$check_password= true;
$login = $_POST['login'];
$password = $_POST['password'];
$password_conf = $_POST['password_conf'];
$sql = "INSERT INTO `utilisateurs` (`login`, `password`) VALUES ('$login', '$password')";
$user_check = "SELECT login FROM utilisateurs WHERE login = '$login'; ";
$check = mysqli_query($connect, $user_check);

// Check if the form has been posted
if (isset($_POST['login'], $_POST['password'], $_POST['password_conf'])) {
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
        /* header('Location: connexion.php'); */
    } else {
        $errors['diffpassword'] = "les deux password entrée ne correspondent pas";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="test2.php" method="post" accept-charset="utf-8">
        <fieldset>
            <legend>Contact Us</legend>
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
            <div class="row">
                <input type="submit" value="s'inscrire">
            </div>
        </fieldset>
    </form>
</body>
</html>