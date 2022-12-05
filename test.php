<?php include 'connect.php'; ?>

<?php

$valid = true;
$erreur = array();

if (isset($_POST['login'], $_POST['password'], $_POST['password_conf'])) {
    if (empty($_POST['login'])) {
        $valid = false;
        $erreur['login'] = "You must enter your name.";
    }
    if (empty($_POST['password'])) {
        $valid = false;
        $erreur['password'] = "You must enter your email address.";
    }
    if (empty($_POST['password_conf'])) {
        $valid = false;
        $erreur['password_conf'] = "You must enter a message.";
    } 
    /* if ($valide) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_conf = $_POST['password_conf'];
    $sql = "INSERT INTO utilisateur (login, password) VALUES ('$login','$password')";
    $user_check = "SELECT login FROM utilisateurs WHERE login = '$login'; ";
    $check = mysqli_query($connect, $user_check);
    }  if (mysqli_num_rows($check) > 0) {
        $erreur['login2'] = "Ce Login existe déja";
    } else {
        mysqli_query($connect, $sql);
        $erreur['succes'] = "Votre compte a bien était crée";
        header('Location: connexion.php');
    } */
}
$loginError = "";       

if ($_POST != NULL){
    $login=htmlspecialchars($_POST['login']);                 // On récupère le login saisi
    $password=htmlspecialchars($_POST['password']);           // On récupère le premier mdp saisi
    
    $testConnexion = false;          // On crée le booléen pour le test du login
    
    // On vérifie chaque login de la BDD
    for($i=0; isset($users[$i]); $i++){
        //Si les login correspondent et que les mdp correspondent
        if($users[$i][0] === $login && password_verify($password, $users[$i][3])){
            $testConnexion = true;                  // On passe sur true
            $_SESSION['login'] = $users[$i][0];     // On attribue des $_SESSION[''] avec les infos de l'user en BDD
            $_SESSION['nom'] = $users[$i][1];
            $_SESSION['prenom'] = $users[$i][2];
            $_SESSION['password'] = $users[$i][3];
            break;
        }
    }

    // Si $testConnexion est true : la connexion est ok
    if($testConnexion){
        header("location: index.php");   
    }
    // Si $testConnexion est false : connexion échouée
    else{
        $loginError = "<p id='msgerror'>Nom d'utilisateur ou mot de passe incorrect.</p>";
    }
}
?>

<main>
    <form action="" method="post" style="display:flex; flex-direction: column; width: 150px; ">
        <div class="error">
            <?php foreach($erreur as $message):?>
                <div><?php echo htmlspecialchars($message); ?></div>
            <?php endforeach; ?>
        </div>
        <input type="text" name="login" id="log" placeholder="login">
        <input type="password" name="pasword" id="log" placeholder="password">
        <input type="password" name="pasword_conf" id="log" placeholder="retape password">
        <input type="submit" value="submit">
    </form>
</main>