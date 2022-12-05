<?php
session_start();
include 'connect.php';      //On joint la connexion à la base de donnée

$conn = mysqli_query($connect, "SELECT * FROM `utilisateurs`");
$row = $conn->fetch_all();
var_dump($row);
$valid = true;
$errors = [];
if (isset($_POST['login'], $_POST['password'])) {
    if (empty($_POST['login'])) {
        $valid = false;
        $errors['login'] = "Champs login vide.";
    }
    if (empty($_POST['password'])) {
        $valid = false;
        $errors['password'] = "Champs password vide.";
    }
    if ($valid) {
        for ($i=0; isset($row[$i]) ; $i++) { 
            if ($_POST['login'] === $row[$i][1] AND $_POST['password'] === $row[$i][2]) {
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['id'] = $row[$i][0];
                $errors['succes'] = 'Vous êtez connecter';
                sleep(2);
                header('Location: profil.php');
            } else {
                $errors['faild'] = 'Login / Password erroné';
            }
        }
    }
}

echo $_SESSION['login'];
?>

        <main class="flex-row">
            <div class="flex-row" id="form-container">
                <form action="" Method="POST" class="flex-column">
                    <label for="login">Nom d'utilisateur</label>
                    <input type="text" id="login" name="login" required>

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>

                    <input type="submit" id="mybutton" value="Se connecter">
                        <div class="error">
                            <?php foreach($errors as $message):?>
                                <div><?php echo htmlspecialchars($message); ?></div>
                            <?php endforeach; ?>
                        </div>
                </form>
            </div>
        </main>