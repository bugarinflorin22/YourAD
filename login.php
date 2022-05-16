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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">    </head>
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
    </div>
    <div class="container">
        <h1> Logheaza-te </h1><br><br>
        <form method="POST" action="magie/login.php">
            <p> Username: </p>
            <i style="color:blue" id="icon" class="fas fa-user-alt"> &nbsp; </i><input type="text" name="nume" onchange="error()" id="input1"> &nbsp; <br>
            <p> Password: <i onclick="ochi2()" style="display:none; cursor:pointer;" id="ochi1" class="fas fa-eye"></i> <i onclick="ochi3()" style="display:none; cursor:pointer;" class="fas fa-eye-slash" id="ochi2"></i> </p>
            <i style="color:blue" id="icon" class="fas fa-key"> &nbsp;</i> <input type="password" name="parola" onchange="error(); ochi()" id="input2"> &nbsp; <br>
        <input class="buton" type="submit" name="buton" value="Login">
        </form>
    </div>
</center>
   </body>
   <div class="footer"><p> © Copyright 2019 - yourad.com - Toate drepturile rezervate </p></div>
    <script src="js/ppag.js"></script>
</html>