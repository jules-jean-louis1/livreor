<?php
session_start();
include 'connect.php';
?>

<?php if($_SESSION['login'] != null){ ?>

<?php
$commentaire = "";
$id = $_SESSION['id'];
$currentDate = date('Y-m-d H:i:s');
$valid = true;
$errors = [];

if (isset($_POST['submit'])) {
    if ($_POST['message'] != null) {
        $commentaire = $_POST['message'];
        $id = $_SESSION['id'];
        $currentDate = date('Y-m-d H:i:s');
        $push_com = mysqli_query($connect,"INSERT INTO `commentaires` (`id`,`commentaire`, `id_utilisateur`, `date`) VALUES (NULL,'$commentaire', '$id', '$currentDate')");
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
                            <img src="images/cancel_logo.svg" alt="" style="width: 30px;padding-right: 5px;" class="filter_red">
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
<?php } else{header('location: connexion.php');} ?>