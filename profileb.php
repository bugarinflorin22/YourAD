<?php 
include 'magie/connect.php';
session_start();
if (!isset($_SESSION['nume']))
{
    header("Location: index.php");
}
if (!isset($_GET["c"]))
{
    header("Location: index.php");
}
if ($_SESSION['ban']==1)
{
    header("Location: ailuatban.php");
}

$user = $_GET["c"];
$sql = "SELECT nume FROM reg WHERE nume='$user'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0) {
    header("Location: index.php");
}
$sql = "SELECT * FROM reg WHERE nume='$user'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Your Ad </title>
        <link rel="stylesheet" type="text/css" href="css/nav.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/profile.css">
        <link href="https://fonts.googleapis.com/css?family=Chakra+Petch&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href="images/icon.png" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=K2D&display=swap" rel="stylesheet">
    </head>
   <body>
    <div class="nav-bar">
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
    <div style="margin-bottom: 50px"></div>
    <h1><?php echo $row['nume'] ?> - Profile</h1>
    <div class="tot">
    <div class="pozasiranks">
        <img src="images/cskin.png">
        <h2><i style="color:red;" class="fas fa-user-circle"></i> <?php echo $row['nume']; ?> </h2>
        <h2><i style="color:green;" class="fas fa-bullhorn"></i> Anunturi active: <?php echo $row['ac']; ?> </h2>
        <h2><i style="color: blue;" class="fas fa-bullhorn"></i> Anunturi postate: <?php echo $row['ap']; ?></h2>
        <h2 class="ultim"><i style="color: green;" class="fas fa-donate" ></i> Donator: <?php if($row['premium'] == 1) { echo 'Da';} else {echo 'Nu';} ?> </h2><br>
        <?php 
        
        if ($row['level'] == 1){
        echo '
        <p class="dev"> <i class="fab fa-connectdevelop" style="font-size:15px"></i> Developer</p>
        <p class="adm"> <i class="fas fa-shield-alt" style="font-size:15px"></i> Admin</p>
        <p class="mod"> <i class="fas fa-user-edit" style="font-size:15px"></i> Moderator</p>
        <p class="civil"><i class="fas fa-user" style="font-size:15px"></i> Civilian</p>
        
        ';}
        if ($row['Ban'] == 1){
            echo '
            <p class="banned"><i class="fas fa-ban" color:red; style="font-size:15px"></i> Banned </p>
            
            ';}

        if ($row['level'] == 0 && $row['Ban'] == 0){
            echo '
            <p class="civil"><i class="fas fa-user" style="font-size:15px"></i> Civilian</p>
            
            ';}
        if ($row['level'] == 2){
                echo '
                <p class="mod"> <i class="fas fa-user-edit" style="font-size:15px"></i> Moderator</p>
                
                ';}
                if ($row['level'] == 3){
                    echo '
                    <p class="adm"> <i class="fas fa-shield-alt" style="font-size:15px"></i> Admin</p>
                    ';}
                    if ($row['level'] == 4){
                        echo '
                        <p class="mod"> <i class="fas fa-user-edit" style="font-size:15px"></i> Moderator</p>
                        
                        ';}
                        if ($row['premium'] == 1){
                            echo '
                            <p class="teh"> <i class="fa fa-star" style="font-size:15px"></i> Donator</p>
                            
                            ';}
        
        ?>
    </div>
    <div class="tdesp"> </div>
    <div class="info">
        <p><i style="color:#6600cc;" class="fab fa-discord" style='font-size:15px'></i> Discord: <?php echo $row['discord']; ?></p>
        <?php if($row['faceboock'] != NULL){ echo '<form action="'; echo $row['faceboock']; echo '">
        <button type="sumbit" formtarget="_blank"> Faceboock </button> </form>';} 
        if ($_SESSION['nume']!=$user){
        if ($_SESSION['level']==1)
        {
            if ($row['Ban']==0) {
            echo '
                <form method="POST" action="magie/profileb.php">
                <input name="inp" style="display:none" value="Ban">
                <input name="inp2" style="display:none" value="'; echo $user; echo '">
                <button class="ban" type="submit"> Baneaza </button>
                </form>';}
                if ($row['Ban']==1) {
                    echo '
                        <form method="POST" action="magie/profileb.php">
                        <input name="inp" style="display:none" value="UnBan">
                        <input name="inp2" style="display:none" value="'; echo $user; echo '">
                        <button class="unban" type="submit"> Debaneaza </button>
                        </form>';}
            if ($row['premium']==0) {
                    echo '
                        <form method="POST" action="magie/profileb.php">
                        <input name="inp" style="display:none" value="Premium">
                        <input name="inp2" style="display:none" value="'; echo $user; echo '">
                        <button class="ban" type="submit"> Donator </button>
                        </form>';} 
                 if ($row['premium']==1) {
                     echo '
                    <form method="POST" action="magie/profileb.php">
                    <input name="inp" style="display:none" value="UnPremium">
                    <input name="inp2" style="display:none" value="'; echo $user; echo '">
                    <button class="unban" type="submit"> UnDonator </button>
                    </form>';}
                    if ($row['level']==0) {
                        echo '
                            <form method="POST" action="magie/profileb.php">
                            <input name="inp" style="display:none" value="Moderator">
                            <input name="inp2" style="display:none" value="'; echo $user; echo '">
                            <button class="ban" type="submit"> MakeModerator </button>
                            </form>';}
                            if ($row['level']==2) {
                                echo '
                                    <form method="POST" action="magie/profileb.php">
                                    <input name="inp" style="display:none" value="UnModerator">
                                    <input name="inp2" style="display:none" value="'; echo $user; echo '">
                                    <button class="unban" type="submit"> UnModerator </button>
                                    </form>';}
                        if ($row['level']==0) {
                                echo '
                                    <form method="POST" action="magie/profileb.php">
                                    <input name="inp" style="display:none" value="Admin">
                                    <input name="inp2" style="display:none" value="'; echo $user; echo '">
                                    <button class="ban" type="submit"> MakeAdmin </button>
                                    </form>';} 
                             if ($row['level']==3) {
                                 echo '
                                <form method="POST" action="magie/profileb.php">
                                <input name="inp" style="display:none" value="UnAdmin">
                                <input name="inp2" style="display:none" value="'; echo $user; echo '">
                                <button class="unban" type="submit"> UnAdmin </button>
                                </form>';}
        }}
        ?>
        
    </div>
    </div>
   </body>
   <div class="footer"><p> © Copyright 2019 - yourad.com - Toate drepturile rezervate </p></div>
</html>