<?php

if (isset($_POST['submit'])) {
    $currentDate = date('Y-m-d H:i:s');
    echo $currentDate;
} else {
    echo "Non";
}

?>

<form action="" method="post">
    <input type="submit" value="submit" name="submit">
</form>
