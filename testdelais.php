
<?php
session_start();
$_SESSION['login'] = "jules";
/* echo "<script>alert('Welcome ". $_SESSION['login'] ."');</script>"; */

if (isset($_POST['submit'])) {
    echo "<script>alert('Welcome ". $_SESSION['login'] ."');</script>";
}
?>

<form action="" method="post">
    <input type="submit" value="submit" name="submit">
</form>


