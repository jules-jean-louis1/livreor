<?php
session_start();
include 'connect.php';
?>

<code type="php">
    <?php
    $conn = mysqli_query($connect, "SELECT `date2`,`login`,`reply` FROM `tb_reply` INNER JOIN `utilisateurs` WHERE utilisateurs.id = tb_reply.id_user;");     // requête dans la table utilisateurs
    $row = $conn->fetch_all();
    var_dump($row);
    ?>
</code>