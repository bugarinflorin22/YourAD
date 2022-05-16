<?php 
include 'magie/connect.php';
session_start();
if(!isset($_SESSION['nume']) || $_SESSION['level'] != 1)
{
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Your Ad</title>
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        <link rel="stylesheet" type="text/css" href="css/nav.css">
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
    <center>
    <form method="POST" action="admin.php">
        <input name="search" style="padding: 10px; width: 550px; box-shadow: 0px 0px 2px 2px black; margin: 5px 5px 5px 5px; border:none;" placeholder="search">
        <input type='submit' name="submit" value="Cauta" style="padding: 5px; width:100px; cursor:pointer; border: none; 
        box-shadow: 0px 0px 2px 2px black; background-color:white;">
    </form>
    </center>

       <?php 
     echo '
     <table id="customers">
    <tr>
    <th>Id</th>
    <th>Nume</th>
    <th>E-mail</th>
    <th>Discord</th>
    <th>Anunturi postate</th>
    <th>Anunturi active</th>
  </tr>
     
     ';  
    $sql = "SELECT id, nume, email, discord, ap, ac FROM reg";
    $result = $conn->query($sql);

    if ($result->num_rows > 0 && !isset($_POST['submit'])) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>".
        
        "<td>" . $row["id"]. "</td>". 
        "<td>" . "<a href='http://localhost/YD/profileb.php?c=" .$row["nume"]."'>" .$row["nume"]. "</a>". "</td>" . 
        "<td>" . $row["email"]. "</td>".
        "<td>" . $row["discord"]. "</td>".
        "<td>" . $row["ap"]. "</td>".
        "<td>" . $row["ac"]. "</td>".

        "</tr>";
    }
    } else {
        $val = $conn->real_escape_string($_POST['search']);
        $sql = "SELECT * FROM reg WHERE nume LIKE '%$val%'";
        $result = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($result);
        if ($check > 0) 
        {
    while ($row=$result->fetch_array()) {
        echo "<tr>".
        
        "<td>" . $row["id"]. "</td>". 
        "<td>" . "<a href='http://localhost/YD/profileb.php?c=" .$row["nume"]."'>" .$row["nume"]. "</a>". "</td>" . 
        "<td>" . $row["email"]. "</td>".
        "<td>" . $row["discord"]. "</td>".
        "<td>" . $row["ap"]. "</td>".
        "<td>" . $row["ac"]. "</td>".

        "</tr>";
        }   
}
    }
    $conn->close(); ?>
    </table>
    </div>
    <div class="footer"><p> © Copyright 2019 - yourad.com - Toate drepturile rezervate </p></div>
    </body>
</html>