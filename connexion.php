<?php include 'connect.php';      //On joint la connexion à la base de donnée
    
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

        <main class="flex-row">
            <div class="flex-row" id="form-container">
                <form action="" Method="POST" class="flex-column">
                    <label for="login">Nom d'utilisateur</label>
                    <input type="text" id="login" name="login" required>

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>

                    <input type="submit" id="mybutton" value="Se connecter">
                    <?php echo $loginError; ?>
                    
                    <p>Mot de passe admin : Admin@!!123</p>
                </form>
            </div>
        </main>