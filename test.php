<?php include 'connect.php'; ?>

<?php

$valid = true;
$erreur = array();

if (isset($_POST['login'], $_POST['password'], $_POST['password_conf'])) {
    if (empty($_POST['login'])) {
        $valid = false;
        $erreur['login'] = "You must enter your name.";
    }
    if (empty($_POST['password'])) {
        $valid = false;
        $erreur['password'] = "You must enter your email address.";
    }
    if (empty($_POST['password_conf'])) {
        $valid = false;
        $erreur['password_conf'] = "You must enter a message.";
    } 
    /* if ($valide) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_conf = $_POST['password_conf'];
    $sql = "INSERT INTO utilisateur (login, password) VALUES ('$login','$password')";
    $user_check = "SELECT login FROM utilisateurs WHERE login = '$login'; ";
    $check = mysqli_query($connect, $user_check);
    }  if (mysqli_num_rows($check) > 0) {
        $erreur['login2'] = "Ce Login existe déja";
    } else {
        mysqli_query($connect, $sql);
        $erreur['succes'] = "Votre compte a bien était crée";
        header('Location: connexion.php');
    } */
}
?>

<main>
    <form action="" method="post" style="display:flex; flex-direction: column; width: 150px; ">
        <div class="error">
            <?php foreach($erreur as $message):?>
                <div><?php echo htmlspecialchars($message); ?></div>
            <?php endforeach; ?>
        </div>
        <input type="text" name="login" id="log" placeholder="login">
        <input type="password" name="pasword" id="log" placeholder="password">
        <input type="password" name="pasword_conf" id="log" placeholder="retape password">
        <input type="submit" value="submit">
    </form>
</main>