<?php

$msg = "";
$css_class = "";

if (!empty($_POST)){
    $dbhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "weeble";

    $connection=mysqli_connect ($dbhost,$username,$password,$dbname);
    if (mysqli_connect_errno()) {
        die ("Database connection failed ".mysqli_connect_error()."(".mysqli_connect_errno().")");
    }


if (isset($_POST['saveChanges'])) 
{
    $bio = $_POST['bio'];
    $bio = str_replace("'","''",$bio);
    $pfpName = time() . '_' . $_FILES['pfp']['name'];
    $email = $_SESSION['email'];
    $pref = $_POST['pref'];
    $hobbies1 = $_POST['hobbies1'];
    $hobbies2 = $_POST['hobbies2'];
    $hobbies3 = $_POST['hobbies3'];
    $location = $_POST['location'];

    $premium = isset($_POST['p']);

    if ($premium != 1)
    {
        $premium = 0;
    }

    $target =  'pfp/' . $pfpName;

    if (move_uploaded_file($_FILES['pfp']['tmp_name'], $target)){
        $sql = "UPDATE users SET pfp = '$pfpName' WHERE email = '$email'";
        $insert = $connection->query($sql);
        
        if ($insert == TRUE)
        {
            $msg = "Profile has been successfully updated";
            $css_class = "alert-success";
        } else {
            $msg = "Profile has failed to update";
            $css_class = "alert-danger";
            echo "query failed: (" . $connection->errno . ") " . $connection->error;
        }
    }
    
    $sql = "UPDATE users SET  bio = '$bio', pref = '$pref', hobbies1 = '$hobbies1', hobbies2 = '$hobbies2', hobbies3 = '$hobbies3', location = '$location', isPremium = '$premium' WHERE email = '$email'";

    $insert = $connection->query($sql);
        
        if ($insert == TRUE)
        {
            $msg = "Profile has been successfully updated";
            $css_class = "alert-success";
        } else {
            $msg = "Profile has failed to update";
            $css_class = "alert-danger";
            echo "query failed: (" . $connection->errno . ") " . $connection->error;
        }



}
}