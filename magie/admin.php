<?php
include 'connect.php';
$val = $conn->real_escape_string($_POST['search']);

$sql = "SELECT nume FROM reg WHERE nume LIKE '%$val%'";
$result = mysqli_query($conn, $sql);
$check = mysqli_num_rows($result);
if ($check > 0) 
{
    while ($data=$result->fetch_array()) {
        echo $data['nume'];
    }
}