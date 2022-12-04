<?php include 'connect.php'; ?>

<?php
$message ="";

if ($_POST != NULL) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_conf = $_POST['password_conf'];
    
} 
else {
    echo $message = "Le champs est vide";
}

?>

<main>
    <form action="" method="post" style="display:flex; ">
        <input type="text" name="login" id="log" placeholder="login">
        <input type="password" name="pasword" id="log" placeholder="password" require>
        <input type="password" name="pasword_conf" id="log" placeholder="retape password" require>
        <input type="submit" value="envoyer">
        <?php echo $message; ?>
    </form>
</main>