
<?php 
    session_start();

    $dbhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "weeble";


    $con=mysqli_connect ($dbhost,$username,$password,$dbname);
    if (mysqli_connect_errno()) {
        die ("Database connection failed ".mysqli_connect_error()."(".mysqli_connect_errno().")");
    }
    $hobbies1 = $_SESSION['hobbies1'];
    $pref = $_SESSION['pref'];

    $matchNewCount = $_POST['matchNewCount'];
    $match = mysqli_query($con, "SELECT * FROM users WHERE hobbies1='" . $hobbies1 . "' AND gender = '" . $pref . "' LIMIT $matchNewCount");
        if (mysqli_num_rows($match) > 0) {
            while ($matchRow = mysqli_fetch_assoc($match)) {
                $matchFname =  $matchRow['fname'];
                $matchBio = $matchRow['bio'];
                $matchPfp = $matchRow['pfp'];;
                
            }
            
        } else {
            echo "No match found!";
        }
        echo($matchFname);
        echo ("<h1>$matchFname</h1>");
        $_SESSION['matchFname'] = $matchFname;
          

?>



