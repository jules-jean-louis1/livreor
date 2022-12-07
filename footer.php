<footer>
    <div class="foot_nav">
        <div class="foot_warpper">
            <div class="foot_container">
                <ul id="list_foot">
                    <li><button class="btn_footer1"><a href="inscription.php">Inscription</a></button></li>
                    <li><?php if ($_SESSION['id'] != null) {?>
                        <button class="btn_footer1"><a href="profil.php"><?php echo $_SESSION['login'];?></a></button>
                        <?php } else { ?> 
                        <button class="btn_footer1"><a href="connexion.php">Connexion</a></button>
                        <?php } ?> 
                    </li>
                    <li><button class="btn_footer1"><a href="profil.php">Profil</a></button></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
    
    
    
    
    