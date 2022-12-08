<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_index.css">
    <link rel="icon" href="images/bbule-logo.png">
    <title>Livre d'or</title>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <main class="position-relative">
        <section class="main-container_s1">
            <div class="main_warpper">
                <div class="main_container">
                    <div class="main_title_index">
                        <h2>Livre d'or</h2>
                        <?php if (isset($_SESSION['id']) == true) { ?>
                            <h5><?php echo 'Bienvenue' . ' ' . $_SESSION['login']; ?></h5>
                        <?php } else {?>
                            <p>Crée-vous un compte pour commencer à commenter.</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
        include 'footer.php';
    ?>
</body>
</html>