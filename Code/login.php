<?php

session_start();

if (!empty($_POST)){
    $dbhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "weeble";

    $connection=mysqli_connect ($dbhost,$username,$password,$dbname);
    if (mysqli_connect_errno()) {
        die ("Database connection failed ".mysqli_connect_error()."(".mysqli_connect_errno().")");
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users where email='" . $email . "' AND password = '" . $password . "'";
    $insert = $connection->query($sql);


    if ($insert == TRUE) {
        if ($insert->fetch_row()!= NULL)
        {
            echo("success");
            
            $_SESSION['email'] = $email;
            header('Location: main.php');
           
        }

        else 
        {
            echo("Incorrect username/password. Please try again");
        }
    }

    else {
        die("Error: {$connection->errorno} : {$connection->error}");
    }

    $connection->close();
}

?>



