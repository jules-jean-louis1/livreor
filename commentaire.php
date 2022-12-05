<?php
include 'connect.php';
$row = mysqli_query($connect,"SELECT `commentaire`,`login`,`date` FROM `utilisateurs` INNER JOIN `commentaires` WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY `date` DESC;"); 
$result = $row->fetch_all();
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
}
?>
<?php include 'header.php' ?>
<?php if($_SESSION['login'] != null){ ?>
    <div class="profil">
    <?php echo "Boujour"." ".$_SESSION['login'] ?>
</div>
<form action="" method="post">
    <form action="" method="post">
        <input type="submit" value="logout" name="logout">
    </form>
    <legend>Derniers commentaires</legend>
    <table>
        <tr>
            <th>Message</th>
            <th>Auteur</th>
            <th>Date</th>
        </tr>
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
    </table>
    <div>
    </div>
</form>


<?php } else{header('location: connexion.php');} ?>