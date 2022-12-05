<?php
session_start();
include 'connect.php';

$commentaire = "";
$id = $_SESSION['id'];
$currentDate = date('Y-m-d H:i:s');
$poster_com = "INSERT INTO `commentaires` (`id`,`commentaire`, `id`, `date`) VALUES ( NULL,'$commentaire', '$id', '$currentDate')";
$valid = true;
$errors = [];

if (isset($_POST['submit'])) {
    if (isset($_POST['message'])) {
        $valid = false;
        $errors['message'] = 'Zone message vide';
    }
    if ($valid) {
        $commentaire = $_POST['message'];
        $id = $_SESSION['id'];
        $currentDate = date('Y-m-d H:i:s');
        mysqli_query($connect, $poster_com);
    }
}
/* $row = mysqli_query($connect,"SELECT * FROM `commentaires` ORDER BY `date` ASC "); */
$row = mysqli_query($connect,"SELECT * FROM `commentaires`");
$result = $row->fetch_all();
var_dump($result);

for ($i=0; isset($result[$i]) ; $i++) { 
    echo "<tr>";
    for ($j=1; isset($result[$i][$j]) ; $j++) 
    { 
        echo "<td>" . $result[$i][$j] . "</td>"; 
    }
    echo "</tr>";
}

/* $id_user = mysqli_query($connect, "SELECT id_utilisateur FROM `commentaires`; ");
$result_user = $id_user->fetch_all();
$id_login = mysqli_query($connect, "SELECT id, login FROM `utilisateurs`; ");
$result_login = $id_login->fetch_all();

$login_user = [];

for ($i=0; isset($result_user[$i]) ; $i++) { 
    for ($i=0; isset($result_login[$i]) ; $i++) { 
        if ($result_user[$i][0] === $result_login[$i][0]) {
            echo $login_user['resutl'];
        }
    }
} */

?>



<div class="profil">
    <?php echo "Boujour"." ".$_SESSION['login'] ?>
</div>
<form action="" method="post">
    <div class="error">
        <?php foreach($errors as $message):?>
            <div><?php echo htmlspecialchars($message); ?></div>
     <?php endforeach; ?>
    </div>
    <textarea name="message" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="Poster un commentaire" name="submit">
    <legend>Derniers commentaires</legend>
    <div>
        <?php
        
        ?>
        <div class="error">
            <?php foreach($login_user as $message):?>
                <div><?php echo htmlspecialchars($message); ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</form>