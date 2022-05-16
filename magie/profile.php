<?php

include 'connect.php';
session_start ();

$discord = $conn->real_escape_string($_POST['discord']);
$faceboock = $conn->real_escape_string($_POST['faceboock']);
$parola = $conn->real_escape_string($_POST['parola']);
$nume = $conn->real_escape_string($_SESSION['nume']);

$sql = "SELECT discord FROM reg WHERE discord='$discord'";
$result = mysqli_query($conn, $sql);
$check = mysqli_num_rows($result);

if ($check > 0) {
    header("Location: ../profile.php?info=existadc");
    die ();
}

if (isset($discord) && !empty($discord) || !empty($faceboock) && isset($faceboock) || !empty($parola) && isset($parola) ) {
    if (isset($discord) && !empty ($discord)) {
        $mystring = '#';
        $mystring2 = ' #';
        $pos = strpos($discord, $mystring);
        $pos2 = strpos($discord, $mystring2);
        if (($pos==true) && ($pos2==false)) {
            $sql = "UPDATE reg SET discord='$discord' WHERE nume= '$nume'";
            $result = mysqli_query($conn, $sql);
            header("Location: ../profile.php?info=succes");
        } else {
            header("Location: ../profile.php");
        }
    }
    
    if (isset($faceboock) && !empty ($faceboock)) {
    $sql = "SELECT faceboock FROM reg WHERE faceboock='$faceboock'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    $mystring3 = 'https://www.facebook.com/';
    $pos3 = strpos($faceboock, $mystring3);

    if ($check > 0) {
    header("Location: ../profile.php?info=existafb");
    die ();
    } else if ($pos3 == true){
        $sql = "UPDATE reg SET faceboock='$faceboock' WHERE nume= '$nume'";
            $result = mysqli_query($conn, $sql);
            header("Location: ../profile.php?info=succes");
    } else {
        header("Location: ../profile.php");
    }}

    if (isset($parola) && !empty ($parola)) {
        $parolahas = password_hash($parola, PASSWORD_DEFAULT);
        $sql = "UPDATE reg SET parola='$parolahas' WHERE nume= '$nume'";
        $result = mysqli_query($conn, $sql);
        header("Location: ../profile.php?info=succes");
    }
} else {
    header("Location: ../profile.php");
}
