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

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $birthdate = $_POST['birthdate'];
        $gender = isset($_POST['gender']);

        $date = new DateTime($birthdate);
        $now = new DateTime();
        $interval = $now->diff($date);
        $age = $interval->y;

        $sql = "select * from users where email='" . $email . "'";
        $insert = $connection->query($sql);

    if ($insert->fetch_row()!= NULL){
        echo("email is taken!");
    }
    else if ($age<=17)
    {
        echo("You need to be 18+ to access this website.");
    }
    else if (empty($fname)|| empty($lname)||empty($email)||empty($password)||empty($birthdate || empty($gender)))
    {
        echo ("Error: Missing input!");
    }
    else
    {
        $sql = "INSERT INTO users (fname, lname, email, password, dob, gender, pfp, age) VALUES (
            '{$connection->real_escape_string($_POST['fname'])}',
            '{$connection->real_escape_string($_POST['lname'])}',
            '{$connection->real_escape_string($_POST['email'])}',
            '{$connection->real_escape_string($_POST['password'])}',
            '{$connection->real_escape_string($_POST['birthdate'])}',
            '{$connection->real_escape_string($_POST['gender'])}',
            'placeholder.png',
            '{$connection->real_escape_string($age)}'
            
            )";
    
            $insert = $connection->query($sql);
    
            if ($insert == TRUE) {
                $_SESSION['email'] = $email;
                header('Location: profile.php');
            }
            else {
                die("Error: {$connection->errorno} : {$connection->error}");
            }
            
             
            $connection->close();   
    }


}
?>