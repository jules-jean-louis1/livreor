<?php
session_start();
?>

<header>
    <div class="navbar_">
        <div class="navbarsub">
            <div class="navbar_r">
                <div class="container_nav">
                    <nav id='menu'>
                        <input type='checkbox' id='responsive-menu' onclick='updatemenu()'>
                        <ul>
                            <li><a href='index.php'>Acceuil</a></li>
                            <li><a href="profil.php">Profil</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="logo_l">
                <div class="container_logo">
                    <img src="images/logo.png" alt=""/> 
                </div>
            </div>
            <div id="menu" class="color_btn">
                <ul>
                    <li class="btn_inscri">
                        <form action="index.php" class="form01">
                            <input type="submit" value="Deconnexion" name="logout">
                        </form>
                    </li>
                    <li><button class="btn_co"><a href='connexion.php'>Connexion</a></button></li>
                </ul>
            </div>
        </div>
    </div>
<img src="images/header.png" width="1920" height="50" alt=""/> 
</header>
