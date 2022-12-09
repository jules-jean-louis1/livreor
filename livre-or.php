<?php
session_start();
include 'connect.php';
$row = mysqli_query($connect,"SELECT `date`,`login`,`commentaire` FROM `utilisateurs` INNER JOIN `commentaires` WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY `date` DESC;"); 
$result = $row->fetch_all();
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
                        <table class="fl-table">
                            <tr class="sticky-top">
                                <th class="th_table_alt1">Date</th>
                                <th class="th_table_alt1">Auteur</th>
                                <th class="th_table_alt1">Message</th>
                            </tr>
                            <div class="generate_tr">
                                <?php
                                    for ($i=0; isset($result[$i]) ; $i++) {
                                        echo "<tr>";
                                        for ($j=0; isset($result[$i][$j]) ; $j++)
                                        {
                                            echo "<td>" . $result[$i][$j] . "</td>";
                                        }
                                        echo "</tr>";
                                    }
                                ?>
                            </div>
                        </table>
                    </div>
                </form>
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

