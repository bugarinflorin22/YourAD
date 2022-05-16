<?php
include 'magie/connect.php';
session_start();

if (!isset($_SESSION['nume']) && $_SESSION['ban'] == 0){
    header("Location: index.php");
}


?>
<!Doctype html>
<html>
<head>
    <title> Ban </title>
</head>
<style>
    body {
        background-color: #990000;
    }
</style>    
    <body>
        <center>
        <h1 style="color:white"> Ai luat ban </h1>
        <p style="color:white"> Daca crezi ca ai fost neindreptatit, poti sa-mi scrii la adresa de discord: Delicat#6894 </p>
    </body>
</html
