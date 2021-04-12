<?php
    session_start();

    $dbhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "weeble";

    $email = $_SESSION['email'];
    $con=mysqli_connect ($dbhost,$username,$password,$dbname);

    $connection=mysqli_connect ($dbhost,$username,$password,$dbname);
    if (mysqli_connect_errno()) {
        die ("Database connection failed ".mysqli_connect_error()."(".mysqli_connect_errno().")");
    }

    $premium = true;
    $sql = "UPDATE users SET  isPremium = '$premium' WHERE email = '$email'";

    $insert = $connection->query($sql);

    if ($insert == TRUE) {
        header('Location: profile.php');
    }
    else {
        die("Error: {$connection->errorno} : {$connection->error}");
    }

?>