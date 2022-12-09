<?php 
session_start(); 
include 'connect.php';  
?>


<?php if ($_SESSION['login'] === 'admin') { ?>

    
<?php 

$result = mysqli_query($connect,"SELECT * FROM `utilisateurs`");
$row = $result->fetch_all();
$count = mysqli_query($connect,"SELECT COUNT(*) FROM `utilisateurs`");
$compte = $count->fetch_all();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_copy.scss">
    <link rel="icon" href="images/bbule-logo.png">
    <title>Admin page</title>
</head>
<body>
    <?php include 'header.php'; ?>
                    <main class="main_com">
                        <section class="s1_connect">
                            <div class="warpper_admin">
                                    <div class="textfile">
                                        <div class="welcome_text">
                                            <p>Bienvenue sur la page Admin</p>
                                        </div>
                                        <div class="count_user">
                                            <?php
                                                echo "Il y a "."<b>".$compte[0][0]."</b>"." comptes utilisateurs enregistrés";
                                            ?>
                                        </div>
                                        <div class="admin_container">
                                            <table class="fl-table">
                                                <thead>
                                                    <tr>
                                                        <th class="th_table_alt1">Login</th>
                                                        <th class="th_table_alt1">Password</th>
                                                    </tr>
                                                </thead>
                                                        <?php
                                                        for ($i=0; isset($row[$i]) ; $i++)
                                                        {
                                                        echo "<tr>";
                                                            for ($j=1; isset($row[$i][$j]) ; $j++)
                                                            {
                                                                echo "<td>" . $row[$i][$j] . "</td>";
                                                            }
                                                        echo "</tr>";
                                                        }
                                                        ?>
                                            </table>
                                        </div>
                                                                        </div>
                                    </div>
                            </div>
                        </section>
                    </main>
        <?php include 'footer.php'; ?>
</body>
</html>

<?php } else { header('Location: index.php');} ?>