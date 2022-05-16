<?php
session_start();
include 'connect.php';

date_default_timezone_set('Europe/Bucharest');

$select1 = $conn->real_escape_string ($_POST['select1']);
$nume = $conn->real_escape_string ($_SESSION['nume']);
$discord = $conn->real_escape_string ($_SESSION['discord']);
$pret = $conn->real_escape_string ($_POST['pret']);
$select2 = $conn->real_escape_string ($_POST['select2']);
$select3 = $conn->real_escape_string ($_POST['select3']);
$avere2 = $conn->real_escape_string($_POST['avere2']);
$altceva = $conn->real_escape_string ($_POST['altceva']);
$select4 = $conn->real_escape_string ($_POST['select4']);
$type = $conn->real_escape_string ($_POST['type']);
$premium = $conn->real_escape_string($_SESSION['premium']);
$manevra = $conn->real_escape_string ($_POST['mesajulnume']);

date_default_timezone_set('Europe/Bucharest');
$data = date('Y-m-d H:i:s');
$fc = 0;
$fb = 0;
$sw = 0;
$da = 0;
$manevraa = 0;

$lungime = strlen($avere2);
$lungime2 = strlen($altceva);
$lungime69 = strlen($manevra);

if ($lungime > 0 && $lungime <= 5) {
    if (isset($avere2) && !empty($avere2) && isset($select3) && !empty($select3)){
         $fc = 1;
    }
}
if ($lungime2 > 0 && $lungime2 < 30) {
    if (isset($altceva) && !empty($altceva)){
        $fb = 1;
    }
}
if ($lungime69 > 0 && $lungime69 < 250) {
    if (isset($manevra) && !empty($manevra)){
        $manevraa = 1;
    }
}


if ( isset($nume) && isset($discord) && isset($select1) && isset($select2) && isset($select3) && isset($pret)
    && !empty($nume) && !empty($discord) && !empty($select1) && !empty($select2) && !empty($select3) && !empty($pret)) {

        $lungime3 = strlen($pret);

        if ($lungime3 <= 5) {
                $sql = "SELECT nume, server, type FROM ad WHERE nume='$nume'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                if ($row['server'] == $select1 && $row['type'] == $type) {
                    $da = 1;
                }
                while($row = $result->fetch_assoc()) {

                    if ($row['server'] == $select1 && $row['type'] == $type) {
                        $da = 1;
                    }
                }

                if ($da != 0) {
                    header("Location: ../anunturi.php?info=error");
                }
                 else if ($fc == 1 && $fb == 0){
                    $pret = $pret.$select2;
                    $avere2 = $avere2." lei ".$select4;
                    $sql = "INSERT INTO ad (nume, server, discord, data, pret, ofera, type, premium) VALUES
                    ('$nume', '$select1', '$discord', '$data', '$pret', '$avere2', '$type', $premium)";
                    $result = mysqli_query($conn, $sql);
                    $sql = "SELECT * FROM reg WHERE nume='$nume'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $ap = $conn->real_escape_string ($row['ap']);
                    $ac = $conn->real_escape_string ($row['ac']);
                    $ap += 1;
                    $ac += 1;
                    $sql = "UPDATE reg SET ap='$ap' WHERE nume='$nume'";
                    $result = mysqli_query($conn, $sql);
                    $sql = "UPDATE reg SET ac='$ac' WHERE nume='$nume'";
                    $result = mysqli_query($conn, $sql);
                    header("Location: ../anunturi.php?info=succes");
                }else if ($fc == 0 && $fb == 0){
                    $pret = $pret.$select2;
                    $select3 = $select3. " lei " .$select4;
                    $sql = "INSERT INTO ad (nume, server, discord, data, pret, ofera, type, premium) VALUES
                    ('$nume', '$select1', '$discord', '$data', '$pret', '$select3', '$type', $premium)";
                    $result = mysqli_query($conn, $sql);
                    $sql = "SELECT * FROM reg WHERE nume='$nume'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($result);
                    $ap = $conn->real_escape_string ($row['ap']);
                    $ac = $conn->real_escape_string ($row['ac']);
                    $ap += 1;
                    $ac += 1;
                    $sql = "UPDATE reg SET ap='$ap' WHERE nume='$nume'";
                    $result = mysqli_query($conn, $sql);
                    $sql = "UPDATE reg SET ac='$ac' WHERE nume='$nume'";
                    $result = mysqli_query($conn, $sql);
                    header("Location: ../anunturi.php?info=succes");

                }else if ($fc == 0 && $fb == 1){
                    $pret = $pret.$select2;
                    $altceva = $altceva;
                    if ($manevraa == 0){
                    $sql = "INSERT INTO ad (nume, server, discord, data, pret, ofera, type, premium) VALUES
                    ('$nume', '$select1', '$discord', '$data', '$pret', '$altceva', '$type', '$premium')";
                     $result = mysqli_query($conn, $sql);
                     $sql = "SELECT * FROM reg WHERE nume='$nume'";
                     $result = mysqli_query($conn, $sql);
                     $row = mysqli_fetch_array($result);
                     $ap = $conn->real_escape_string ($row['ap']);
                     $ac = $conn->real_escape_string ($row['ac']);
                     $ap += 1;
                     $ac += 1;
                     $sql = "UPDATE reg SET ap='$ap' WHERE nume='$nume'";
                     $result = mysqli_query($conn, $sql);
                     $sql = "UPDATE reg SET ac='$ac' WHERE nume='$nume'";
                     $result = mysqli_query($conn, $sql);
                     header("Location: ../anunturi.php?info=succes");
                    } else {
                        $sql = "INSERT INTO ad (nume, server, discord, data, pret, ofera, detalii, type, premium) VALUES
                    ('$nume', '$select1', '$discord', '$data', '$pret', '$altceva', '$manevra', '$type', '$premium')";
                     $result = mysqli_query($conn, $sql);
                     $sql = "SELECT * FROM reg WHERE nume='$nume'";
                     $result = mysqli_query($conn, $sql);
                     $row = mysqli_fetch_array($result);
                     $ap = $conn->real_escape_string ($row['ap']);
                     $ac = $conn->real_escape_string ($row['ac']);
                     $ap += 1;
                     $ac += 1;
                     $sql = "UPDATE reg SET ap='$ap' WHERE nume='$nume'";
                     $result = mysqli_query($conn, $sql);
                     $sql = "UPDATE reg SET ac='$ac' WHERE nume='$nume'";
                     $result = mysqli_query($conn, $sql);
                     header("Location: ../anunturi.php?info=succes");
                    }

                }else {
                    header("Location: ../index.php");
                }
            }else {
                header("Location: ../anunturi.php?info=error2");
            }
} else {
    header("Location: ../anunturi.php?info=error3");
}