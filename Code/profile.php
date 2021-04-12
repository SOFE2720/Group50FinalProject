<?php
    session_start();
    include 'processForm.php'; 

    $dbhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "weeble";

    $email = $_SESSION['email'];
    $con=mysqli_connect ($dbhost,$username,$password,$dbname);
    $q = mysqli_query($con, "SELECT * FROM users where email = '$email' ");
    $row = mysqli_fetch_assoc($q);

    $_SESSION['fname'] = $row['fname'];
    $_SESSION['pfp'] = $row['pfp'];
    $_SESSION['bio'] = $row['bio'];
    $_SESSION['location'] = $row['location'];
    $_SESSION['hobbies1'] = $row['hobbies1'];
    $_SESSION['hobbies2'] = $row['hobbies2'];
    $_SESSION['hobbies3'] = $row['hobbies3'];
    $_SESSION['pref'] = $row['pref'];
    $_SESSION['birthdate'] = $row['dob'];
    
    $birthday = $_SESSION['birthdate'];

    

    

    if ($row['isPremium'] == 1)
    {
        $_SESSION['isPremiumChecked'] = "checked";
    }
    else 
    {
        $_SESSION['isPremiumChecked'] = "";
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Style sheet -->
        <link rel="stylesheet" href="profile2.css">
        <!-- Bootstrap CSS  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <!-- Bootstrap JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    </head>
    

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="main.php"><img src = "weeble_Transparent.png"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse " id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto mx-5 px-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-chat"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            </ul>
                        </li>
                        <li class="nav-item dropdown mx-3">
                            <a class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-bell"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            </ul>
                        </li>

                        <li class="nav-item dropdown ">
                        <img src= "pfp/<?php echo $_SESSION['pfp']; ?>"  width="32" height="32" class="rounded-circle">
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            </ul>
                        </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo ($_SESSION['fname']);?> </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="Homepage.php">Logout</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>

        <div class = "container my-4">
            <div class = "row">
                <div class = "col-4 offset-md-4 form-div"> 
                    <form action = "profile.php" method = "post" enctype = "multipart/form-data"> 

                        <h2 class = "text-center"> Edit your profile</h2>

                        <?php if (!empty($msg)):?>
                            <div class = "alert <?php echo $css_class; ?>">
                                <?php echo $msg; ?>
                            </div>
                        <?php endif ?>
                        <div class = "form-group">
                            <div class = "text-center">
                                <img class = "rounded-circle rounded mx-auto " src = "pfp/<?php echo $_SESSION['pfp']; ?>" id = "pfpDisplay"  width = "150" height = "150"> 
                            </div>
                            <div class = "text-center my-3">
                                <label for = "pfp">Profile picture </label>
                             </div>
                            
                            <input type = "file" name = "pfp" class = "form-control" onchange = "displayPFP(this)" >
                        </div>  
                        <div class = "form-group my-3">
                            <label for = "bio">Bio </label>
                            <textarea name = "bio" class = "form-control" required><?php echo $_SESSION['bio']; ?> </textarea>
                        </div> 
                        <div class = "form-group my-3">
                            <label for = "premium">Premium </label>
                            <input name = "p" class="form-check-input" type="checkbox" value="1" <?php echo $_SESSION['isPremiumChecked'];?>>
                        </div> 
                        <div class = "form-group my-3">
                            <label for = "location">Location </label>
                            <input type="text" name="location" class = "form-control" value = "<?php echo $_SESSION['location']; ?>"></input>
                        </div> 
                        <div class = "form-group my-2">
                            <label for = "pref">Preference </label>
                            <select name = "pref" id = "pref" required>
                                <option value="<?php echo $_SESSION['pref']; ?>" selected hidden><?php echo $_SESSION['pref'];?></option>
                                <option value="Male">Male </option>
                                <option value="Female">Female</option>
                            </select> 
                        </div> 
                        <div class = "form-group my-2">
                            <label for = "hobbies1">Hobbies/Interests: </label>
                            <select name = "hobbies1" id = "hobbies1" class = "hobbies" >
                                <option value="<?php echo $_SESSION['hobbies1']; ?>" selected hidden><?php echo $_SESSION['hobbies1']; ?></option>
                                <option value="Anime">Anime</option>
                                <option value="Films">Films</option>
                                <option value="Video games">Video games</option>
                                <option value="Programming">Programming</option>
                                <option value="Reading">Reading</option>
                                <option value ="Drawing">Drawing</option>
                                <option value ="Cosplaying">Cosplaying</option>
                                <option value ="Music">Music</option>
                                <option value ="Cooking">Cooking</option>
                            </select> 
                            <select name = "hobbies2" id = "hobbies2" class = "hobbies">
                                <option value="<?php echo $_SESSION['hobbies2']; ?>" selected hidden><?php echo $_SESSION['hobbies2']; ?></option>
                                <option value="Anime">Anime</option>
                                <option value="Films">Films</option>
                                <option value="Video games">Video games</option>
                                <option value="Programming">Programming</option>
                                <option value="Reading">Reading</option>
                                <option value ="Drawing">Drawing</option>
                                <option value ="Cosplaying">Cosplaying</option>
                                <option value ="Music">Music</option>
                                <option value ="Cooking">Cooking</option>
                            </select> 
                            <select name = "hobbies3" id = "hobbies3" class = "hobbies">
                                <option value="<?php echo $_SESSION['hobbies3']; ?>" selected hidden><?php echo $_SESSION['hobbies3']; ?></option>
                                <option value="Anime">Anime</option>
                                <option value="Films">Films</option>
                                <option value="Video games">Video games</option>
                                <option value="Programming">Programming</option>
                                <option value="Reading">Reading</option>
                                <option value ="Drawing">Drawing</option>
                                <option value ="Cosplaying">Cosplaying</option>
                                <option value ="Music">Music</option>
                                <option value ="Cooking">Cooking</option>
                            </select> 
                        </div> 

                        <div class = "form-group text-center">
                            <button type = "submit" name = "saveChanges" class = "btn btn-primary my-3">Save Changes</button>
                        </div> 
                        
                    </form>
    
        <script src = "scripts.js"></script>
    </body>
</html>
