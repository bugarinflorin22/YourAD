<?php
session_start();
if (isset($_SESSION['nume']))
{
    header("Location: index.php");
}
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
        <link rel="stylesheet" type="text/css" href="css/nav.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Chakra+Petch&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href="images/icon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=K2D&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    </head>
   <body>
    <div class="nav-bar">
        <nav>
            <ul>
                <li> <a href="index.php"> Home </a> </li>
                <li> <a href="login.php"> Login </a> </li>
                <li> <a href="register.php"> Register </a> </li>
            </ul>
        </nav>
    </div>
    <center>
    <div class="desp">
            <p style="display:none;" id="eroare"> Fiecare camp trebuie completat </p>
            <p style="display:none;" id="eroare2"> Numele introdus trebuie sa aiba cel putin 3 caractere </p>
            <p style="display:none;" id="eroare3"> Numele introdus trebuie sa aiba cel mult 15 caractere </p>
            <p style="display:none;" id="eroare4"> E-mail invalid (doar gmail si yahoo mail merg !) </p>
            <p style="display:none;" id="eroare5">  Discord invalid (nu uita de # si fara spatii) </p>
            <p style="display:none;" id="eroare6">  Faceboock invalid (trebuie sa ai 'https://www.') </p>
            <?php
            if (isset($_GET['info']) && $_GET['info'] == 'exista')
            echo '<p style="display:block;" id="eroare7">  Numele sau discord-ul sau e-mailul sau faceboock-ul sunt deja luate </p>';
            if (isset($_GET['info']) && $_GET['info'] == 'succes'){
            echo '<p class="succes" style="display:block;" id="eroare8">  Te-ai inregistrat cu succes ! </p>';
            header("Refresh:2 url=login.php");}
            ?>

            </div>
    <div class="container">
        <h1> Inregistreaza-te </h1><br><br>
        <form method="POST" action="magie/register.php">
            <p> Username:  </p>
            <input type="text" name="nume" onchange="error()" id="input1"><br>
            <p> Password: <i onclick="ochi2()" style="display:none; cursor:pointer;" id="ochi1" class="fas fa-eye"></i> <i onclick="ochi3()" style="display:none; cursor:pointer;" class="fas fa-eye-slash" id="ochi2"></i> </p>
             <input type="password" name="parola" onchange="error(); ochi()" id="input2"><br>
             <p> E-mail: </p>
             <input type="text" name="email" onchange="error()" id="input3"><br>
             <p> Discord: </p>
             <input  type="text" name="discord" onchange="error()" id="input4"><br>
             <p> Faceboock (optional): </p>
             <input  type="text" name="faceboock" onchange="error()" id="input5" placeholder="https://www.facebook.com/profile.php"><br>
        <input class="buton" type="submit" name="buton" value="Register">
        </form>
    </div>
</center>
   </body>
   <div class="footer"><p> © Copyright 2019 - yourad.com - Toate drepturile rezervate </p></div>
    <script src="js/register.js"></script>
    <script src="js/register2.js"></script>
    <script src="js/login.js"></script>
</html>