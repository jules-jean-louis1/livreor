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
                            <li><a id="logo_title" href="acceuil.php">guestbook</a></li>
                            <li style="padding-top: 0.5px;"><a href='index.php'>Acceuil</a></li>
                            <li style="padding-top: 0.5px;"><a href="profil.php">Profil</a></li>
                            <li style="padding-top: 0.5px;"><a class='dropdown-arrow' href='http://'>Commenter</a>
                            <ul class='sub-menus'>
                                <li><a href='http://'>Poster</a></li>
                                <li><a href='http://'>Livre d'or</a></li>
                            </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div id="menu" class="color_btn">
                <ul>
                    <li><button class="btn_inscri">
                        <a href="">S'inscrire</a>
                        </button>
                    </li>
                    <li><button class="btn_co">
                        <img src="images/account_circle_FILL0_wght400_GRAD0_opsz48.svg" alt="" class="filter_blue">
                        <a href='connexion.php'>Se connecter</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
