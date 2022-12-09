<?php
session_start();
include 'connect.php';
$row = mysqli_query($connect,"SELECT `date`,`login`,`commentaire` FROM `utilisateurs` INNER JOIN `commentaires` WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY `date` DESC;"); 
$result = $row->fetch_all();
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}
$ssql = "SELECT `date`,`login`,`commentaire` FROM `utilisateurs` INNER JOIN `commentaires` WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY `date` DESC;";
$rresult = mysqli_query($connect, $ssql);
while ($lrow = mysqli_fetch_assoc($rresult)){ 
    $ret[] = $lrow; 
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_table.scss">
    <link rel="icon" href="images/bbule-logo.png">
    <title>Section commentaires</title>
</head>
<body>
<?php include 'header.php' ?>
    <main class="main_com">
        <section class="warpper_com">
            <div class="profil">
                <?php echo "Boujour"." ".$_SESSION['login'] ?>
                <legend>Derniers commentaires</legend>
            </div>
            <div class="container_com">
                <div class="table-wrapper">
                    <div class="generate_tr" id="test_tr">
                        <?php
                            for ($i=0; isset($ret[$i]) ; $i++) { ?>
                                <div class="wapper_commentaire">
                                    <div class="titre_poster"><?php echo "Poster le ".$ret[$i]['date'] ." par ". $ret[$i]['login'] ;  ?></div>
                                    <div class="commentaire_class"><?php echo $ret[$i]['commentaire'];  ?></div>
                                </div>
                           <?php } ?>
                    </div>
                </div>
            </div>
            <div class="comment-add-1" style="padding-top: 24px;padding-bottom: 24px;">
                <?php if (isset($_SESSION['id']) != null) :?>
                    <a href="commentaire.php"  class="btn_footer3">Ajouter un commentaire</a>
                    <?php else : ?>
                    <button class="btn_footer1"><a href="connexion.php">Connecter-vous pour ajouter un commentaire</a></button>
                <?php endif ?>
            </div>
        </section>
    </main>
<?php
        include 'footer.php';
    ?>
</body>
</html>

