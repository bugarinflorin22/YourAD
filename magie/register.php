<?php 
    include 'connect.php';

    $nume = $conn->real_escape_string($_POST['nume']);
    $parola = $conn->real_escape_string($_POST['parola']);
    $email = $conn->real_escape_string($_POST ['email']);
    $discord = $conn->real_escape_string($_POST ['discord']);
    $faceboock = $conn->real_escape_string($_POST ['faceboock']);

    if (!empty($nume) && !empty($parola) && !empty($email) 
    && !empty($discord) && isset($nume) && isset($parola)
    && isset($email) && isset($discord))
    {

    $fc = 0;

    if (!empty($faceboock) && isset($faceboock)) {
        $fc = 1;
    }

    $parola_hash = password_hash($parola, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM reg WHERE (nume='$nume' OR email='$email' OR discord='$discord')";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);

    if($fc == 1) {
        $mystring5 = 'https://www.facebook.com/';
        $pos5 = strpos($faceboock, $mystring5);
        if ($pos5 == true) {
        $sql = "SELECT * FROM reg WHERE (nume='$nume' OR email='$email' OR discord='$discord' OR faceboock='$faceboock')";
        $result = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($result);
        }
        else {
            header("Location: ../register.php?info=error2");
            die ();
        }
    }

    if ($check > 0) {
        header("Location: ../register.php?info=exista");
        die ();
    } else {

        $str = strlen($nume);
        $mystring = '@yahoo.com';
        $mystring2 = '@gmail.com';
        $mystring3 = '#';
        $mystring4 = ' #';
        $pos = strpos($email, $mystring);
        $pos2 = strpos($email, $mystring2);
        $pos3 = strpos($discord, $mystring3);
        $pos4 = strpos($discord, $mystring4);

        if (($str > 3 && $str < 15) && (($pos == true) || ($pos2 == true)) && (($pos3 == true) && ($pos4 == false))) {
        $sql = "INSERT INTO reg (nume, email, parola, discord, faceboock) VALUES
    ('$nume', '$email', '$parola_hash', '$discord', '$faceboock')";

    $result = mysqli_query($conn, $sql);

    header ('Location: ../register.php?info=succes');
} else {
    header ('Location: ../register.php');
    }
    }
    } else {
    header ('Location: ../register.php');
    }
?>