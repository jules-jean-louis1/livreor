<?php

if (isset($_POST['submit'])) {
    $currentDate = date('Y-m-d H:i:s');
    echo $currentDate;
} else {
    
}

?>

<form action="" method="post">
    <input type="submit" value="submit" name="submit">
</form>
<?php
session_start();
$_SESSION['login'] = "jules";
echo "<script>alert('Welcome ". $_SESSION['login'] ."');</script>";
?> 
{
