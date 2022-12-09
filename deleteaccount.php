<?php
session_start();
include 'connect.php';
if (isset($_POST['delete'])) {
    $id = $_SESSION['id'];
    $delete_ac = mysqli_query($connect,"DELETE FROM `utilisateurs` WHERE `utilisateurs`.`id` = '$id'");
}

?>