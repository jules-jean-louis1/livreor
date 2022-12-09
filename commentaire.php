<?php
session_start();
include 'connect.php';
?>


<?php
$valid = true;
$errors = [];

if (isset($_POST['submit'])) {
    $commentaire = mysqli_real_escape_string($connect,htmlspecialchars($_POST['message']));
    $id = $_SESSION['id'];
    
    if ($_POST['message'] !== "") {
        $requete = "INSERT INTO `commentaires` (`commentaire`, `id_utilisateur`, `date`) VALUES ('$commentaire', '$id', NOW())";
        $push_com = $connect -> query($requete);
        header('Location: livre-or.php');
    } else {
        $errors['no_message'] = "Aucun message a poster";
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
    <title>Livre d'or</title>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <main class="main_com">
        <section class="warpper_add_com">
            <div class="container_com">
                <div class="form_04">
                    <h2>Poster un commentaire</h2>
                    <div class="profil">
                        <?php echo "Boujour"." ".$_SESSION['login'] ?>
                    </div>
                    <form action="" method="post">
                        <div class="error">
                            <?php foreach($errors as $message):?>
                                <div><?php echo htmlspecialchars($message); ?></div>
                        <?php endforeach; ?>
                        </div>
                        <textarea name="message" id="" style="width: 850px; height: 265px;" placeholder="Entrer votre commentaire ici"></textarea>
                        <input type="submit" value="Poster un commentaire" name="submit" id="submit_btn">
                    </form>
                </div>
            </div>
        </section>
    </main>
<?php
    include 'footer.php';
?>
</body>
</html>
