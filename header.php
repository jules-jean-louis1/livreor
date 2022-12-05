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
                        <ul id="sub_menu">
                            <li><a href='index.php'>Acceuil</a></li>
                            <li><a href="profil.php">Profil</a></li>
                            <li><a class='dropdown-arrow' href='http://'>Commenter</a>
                            <ul class='sub-menus'>
                                <li><a href='http://'>Poster</a></li>
                                <li><a href='http://'>Livre d'or</a></li>
                            </ul>
                            </li>
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
                    <li><button class="btn_co">
                        <img src="images/logout_FILL0_wght400_GRAD0_opsz48.svg" alt="" class="filter_blue">
                        <a href="">Deconnexion</a>
                        </button>
                    </li>
                    <li><button class="btn_co">
                        <img src="images/account_circle_FILL0_wght400_GRAD0_opsz48.svg" alt="" class="filter_blue">
                        <a href='connexion.php'>Connexion</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
