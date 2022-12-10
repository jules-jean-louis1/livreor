<?php
if (isset($_POST['reply'])) {
    header('Location: reponse.php');
}
?>

<form action="" method="post">
    <input type="submit" value="Repondre" name="reply">
</form>