<?php session_start();
?>





<?php echo $_SESSION['com']; ?>

<main>
    <form action="" method="post">
        <textarea name="reponse" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="repondre">
    </form>
</main>