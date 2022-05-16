<?php 

session_start();
if (!isset($_SESSION['nume']))
{
    header("Location: index.php");
}
if ($_SESSION['ban']==1)
{
    header("Location: ailuatban.php");
}

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
    <h1>Your Profile</h1>
    <div class="tot">
    <div class="pozasiranks">
        <img src="images/cskin.png">
        <h2><i style="color:red;" class="fas fa-user-circle"></i> <?php echo $_SESSION['nume']; ?> </h2>
        <h2><i style="color:green;" class="fas fa-bullhorn"></i> Anunturi active: <?php echo $_SESSION['ac']; ?> </h2>
        <h2><i style="color: blue;" class="fas fa-bullhorn"></i> Anunturi postate: <?php echo $_SESSION['ap']; ?></h2>
        <h2 class="ultim"><i style="color: green;" class="fas fa-donate" ></i> Donator: <?php if($_SESSION['premium'] == 1) { echo 'Da';} else {echo 'Nu';} ?> </h2><br>
        <?php 
        
        if ($_SESSION['level'] == 1){
        echo '
        <p class="dev"> <i class="fab fa-connectdevelop" style="font-size:15px"></i> Developer</p>
        <p class="adm"> <i class="fas fa-shield-alt" style="font-size:15px"></i> Admin</p>
        <p class="mod"> <i class="fas fa-user-edit" style="font-size:15px"></i> Moderator</p>
        <p class="civil"><i class="fas fa-user" style="font-size:15px"></i> Civilian</p>
        
        ';}

        if ($_SESSION['level'] == 0){
            echo '
            <p class="civil"><i class="fas fa-user" style="font-size:15px"></i> Civilian</p>
            
            ';}
        if ($_SESSION['level'] == 2){
                echo '
                <p class="mod"> <i class="fas fa-user-edit" style="font-size:15px"></i> Moderator</p>
                
                ';}
                if ($_SESSION['level'] == 3){
                    echo '
                    <p class="adm"> <i class="fas fa-shield-alt" style="font-size:15px"></i> Admin</p>
                    ';}
                        if ($_SESSION['premium'] == 1){
                            echo '
                            <p class="teh"> <i class="fa fa-star" style="font-size:15px"></i> Donator</p>
                            
                            ';}
        
        ?>
    </div>
    <div class="tdesp"> </div>
    <div class="info">
        <p><i style="color:#6600cc;" class="fab fa-discord" style='font-size:15px'></i> Discord: <?php echo $_SESSION['discord']; ?></p>
        <p><i style="color:#9900ff;" class="fas fa-envelope" style='font-size:15px'></i> E-mail: <?php echo $_SESSION['email']; ?></p>
        <p><i style="color:#0033cc" class="fab fa-facebook-square" style='font-size:15px'></i> Faceboock: <?php echo $_SESSION['faceboock']; ?> </p>
        <p class="despa"> Change your info: </p>
        <form method="POST" action="magie/profile.php">
        <label> Discord:</label><input name="discord" type="text" id="input1" onchange="error()"><br>
        <label> Faceboock: </label><input name="faceboock" type="text" id="input2" onchange="error()"><br>
        <label> Parola: </label><input id="input3" name="parola" type="password" onchange="error()"><br>
        <p class="error" style="display:none;" id="eroare"> Cel putin un camp trebuie completat </p>
        <p class="error" style="display:none;" id="eroare2">  Discord invalid (nu uita de # si fara spatii) </p>
        <p class="error" style="display:none;" id="eroare3">  Faceboock invalid (trebuie sa ai 'https://www.') </p>
        <?php if(isset($_GET['info']) && $_GET['info'] == 'existadc') {echo '<p class="error" style="display:block;" id="eroare4">  Discord-ul este deja folosit </p>';} ?>
        <?php if(isset($_GET['info']) && $_GET['info'] == 'existafb') {echo '<p class="error" style="display:block;" id="eroare4">  Faceboock-ul este deja folosit </p>';} ?>
        <?php if(isset($_GET['info']) && $_GET['info'] == 'succes') {echo '<p class="succes" style="display:block;" id="succes">  Datele au fost inlocuite cu succes ! </p>';
        header("Refresh:3; url=logout.php");} ?>
        <button type="sumbit"> Change </button>
        </form>
    </div>
    </div>
   </body>
   <script src="js/profile.js"></script>
   <script src="js/profile2.js"></script>
   <div class="footer"><p> © Copyright 2019 - yourad.com - Toate drepturile rezervate </p></div>
</html>