<?php

session_start();
include 'connect.php';

$nume = $conn->real_escape_string($_POST['nume']);
$parola = $conn->real_escape_string($_POST['parola']);


if (isset($nume) && !empty($nume) && isset($parola ) && !empty($parola )){


    $sql = "SELECT * FROM reg WHERE nume='$nume'";
    $result = mysqli_query($conn, $sql);
    $row = $result -> fetch_assoc();

    $hash = $row['parola'];

    $check = password_verify($parola, $hash);

    if($check == 0) {
        header("Location: ../login.php?info=nu");
        die ();
    } else {
        $sql = "SELECT * FROM reg WHERE nume='$nume' AND parola='$hash'";
        $result = mysqli_query($conn, $sql);

        if (!$row = $result->fetch_assoc()){
            header("Location: ../login.php?info=nu");
        } else {
            $_SESSION['id'] = $conn->real_escape_string ($row['id']);
            $_SESSION['nume'] = $conn->real_escape_string ($row['nume']);
            $_SESSION['parola'] = $conn->real_escape_string ($row['parola']);
            $_SESSION['email'] = $conn->real_escape_string ($row['email']);
            $_SESSION['discord'] = $conn->real_escape_string ($row['discord']);
            $_SESSION['faceboock'] = $conn->real_escape_string ($row['faceboock']);
            $_SESSION['level'] = $conn->real_escape_string ($row['level']);
            $_SESSION['ac'] = $conn->real_escape_string ($row['ac']);
            $_SESSION['ap'] = $conn->real_escape_string ($row['ap']);
            $_SESSION['ban'] = $conn->real_escape_string ($row['Ban']);
            $_SESSION['premium'] = $conn->real_escape_string ($row['premium']);
        }
        header("Location: ../index.php");
    }
}