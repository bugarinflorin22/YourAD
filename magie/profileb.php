<?php 
include 'connect.php';

$inp = $conn->real_escape_string($_POST['inp']);
$inp2 = $conn->real_escape_string($_POST['inp2']);;

if ($inp == 'Ban') {
    $sql = "UPDATE reg SET ban='1' WHERE nume= '$inp2'";
    $result = mysqli_query($conn, $sql);
    header("location:javascript://history.go(-1)");
}

if ($inp == 'UnBan') {
    $sql = "UPDATE reg SET ban='0' WHERE nume= '$inp2'";
    $result = mysqli_query($conn, $sql);
    header("location:javascript://history.go(-1)");
}

if ($inp == 'Premium') {
    $sql = "UPDATE reg SET premium='1' WHERE nume= '$inp2'";
    $result = mysqli_query($conn, $sql);
    header("location:javascript://history.go(-1)");
}

if ($inp == 'UnPremium') {
    $sql = "UPDATE reg SET premium='0' WHERE nume= '$inp2'";
    $result = mysqli_query($conn, $sql);
    header("location:javascript://history.go(-1)");
}

if ($inp == 'Admin') {
    $sql = "UPDATE reg SET level='3' WHERE nume= '$inp2'";
    $result = mysqli_query($conn, $sql);
    header("location:javascript://history.go(-1)");
}

if ($inp == 'UnAdmin') {
    $sql = "UPDATE reg SET level='0' WHERE nume= '$inp2'";
    $result = mysqli_query($conn, $sql);
    header("location:javascript://history.go(-1)");
}

if ($inp == 'Moderator') {
    $sql = "UPDATE reg SET level='2' WHERE nume= '$inp2'";
    $result = mysqli_query($conn, $sql);
    header("location:javascript://history.go(-1)");
}

if ($inp == 'UnModerator') {
    $sql = "UPDATE reg SET level='0' WHERE nume= '$inp2'";
    $result = mysqli_query($conn, $sql);
    header("location:javascript://history.go(-1)");
}