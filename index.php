<?php
session_start();
if (isset($_SESSION['nume'])){
if ($_SESSION['ban']==1)
{
    header("Location: ailuatban.php");
}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Your Ad </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Chakra+Petch&display=swap" rel="stylesheet">
        <link rel="icon" type="images/png" href="images/icon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
        <div class="nav-bar" id="nav">
        <nav>
            <ul>
                <li> <a href="index.php"> Home </a> </li>
                <?php if(!isset($_SESSION['nume'])) {
                    echo '
                    <li> <a href="login.php"> Login </a> </li>
                    <li> <a href="register.php"> Register </a> </li>
                    ';
                } 
                if (isset($_SESSION['nume'])){
                    if ($_SESSION['level'] == 1){
                        echo '
                        <li> <a href="admin.php"> Admin </a> </li>
                        ';
                    }
                    echo '
                    <li> <a href="anunturi.php"> Anunturi </a> </li>
                    <li> <a href="adanunt.php"> Adauga anunt </a> </li>
                    <li> <a href="profile.php">'; echo $_SESSION['nume']; echo ' </a> </li>';
                    echo '<li> <a href="logout.php"> Logout </a> </li>
                    ';
                }
                ?>
            </ul>
        </nav>
    </div>
    
    <h1 class="has"> Cauta avere / conturi samp </h1>
    <h3 class="has2"> Sau </h3>
    <h1 class="has3"> Pune anunt cu contul tau sau averea ta, totul acum mai rapid ! </h1> 
    <center>
    <button class="buton" onclick="window.location.href='register.php'" > JOIN US ! </button>
    <p id="test"></p>
    </center>
    </body>
    <div class="footer"><p> © Copyright 2019 - yourad.com - Toate drepturile rezervate </p></div>
</html>