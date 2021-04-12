<?php
    session_start();

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
    $_SESSION['hobbies1'] = $row['hobbies1'];
    $_SESSION['hobbies2'] = $row['hobbies2'];
    $_SESSION['pref'] = $row['pref'];
    $_SESSION['id'] = $row['user_id'];
    $_SESSION['isPremium'] = $row['isPremium'];
    $_SESSION['gender'] = $row['gender'];

    $hobbies1 = $_SESSION['hobbies1'];
    $hobbies2 = $_SESSION['hobbies2'];
    $hobbies3 = $_SESSION['hobbies3'];

    $pref = $_SESSION['pref'];
    $id = $_SESSION['id'];
    $btndisplay = "";

    $gender =  $_SESSION['gender'];

    $premium = $_SESSION['isPremium'];
    if ($premium ==1)
    {
        $btndisplay = "none";
    }

    $test = "test232";

?>

<!doctype html>
<html lang="en">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Style sheet -->
        <link rel="stylesheet" href="main.css">
        <!--Ajax Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Bootstrap CSS  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <!-- Bootstrap JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
        <script src="scripts.js"></script>
        <!-- Sweet alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
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
                        <li class="dropdown mx-3">
                            <a class="nav-link dropdown" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"><i class="bi bi-bell"></i></a>
                            <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    
                                </li> 
                                <li class = "nav-item">
                
                                </li> 
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
                                <li><a class="dropdown-item" href="profile.php">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="Homepage.php">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mx-2">
                            <button id = "btnGetPremium" type="button"  class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style = "display: <?php echo $btndisplay?>;">Get premium!</button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Get premium today!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    With premium, you can get unlimited matches!
                                </div>
                                <div class="modal-footer">
                                    <div class ="mx-auto">
                                        <form action = "getPremium.php">
                                            <button type="submit" class="btn btn-success">Get premium!</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
        </nav>

        



        <?php 
            if ($premium ==1)
            {
                $match = mysqli_query($con, "SELECT * FROM users WHERE user_id != '" .$id . "' AND ((hobbies1='" . $hobbies1 . "' OR hobbies1='" . $hobbies2 . "' OR hobbies1='" . $hobbies3 . "') OR (hobbies2='" . $hobbies1 . "' OR hobbies2='" . $hobbies2 . "' OR hobbies2='" . $hobbies3 . "')OR (hobbies3='" . $hobbies1 . "' OR hobbies3='" . $hobbies2 . "' OR hobbies3='" . $hobbies3 . "')) AND gender = '" . $pref . "' AND pref = '" . $gender . "' ");   
            }
            else 
            {
                $match = mysqli_query($con, "SELECT * FROM users WHERE user_id != '" .$id . "' AND ((hobbies1='" . $hobbies1 . "' OR hobbies1='" . $hobbies2 . "' OR hobbies1='" . $hobbies3 . "') OR (hobbies2='" . $hobbies1 . "' OR hobbies2='" . $hobbies2 . "' OR hobbies2='" . $hobbies3 . "')OR (hobbies3='" . $hobbies1 . "' OR hobbies3='" . $hobbies2 . "' OR hobbies3='" . $hobbies3 . "')) AND gender = '" . $pref . "' AND pref = '" . $gender . "'   LIMIT 5");
            }
            
            $matchNum = mysqli_num_rows($match);
            if ($matchNum > 0) {
                
                    while ($matchRow = mysqli_fetch_assoc($match)) {
                       echo("
                       <div id = 'noMatches'>
                        
                       </div>
                       <div class = 'row' >
                            <div class = 'col-4 offset-md-4 p-5' id = '". $matchRow["user_id"] ."'>
                                <div class='card' style='width: 36rem;' >
                                    <img src='pfp/". $matchRow["pfp"] ."' class='card-img-top'> </img>
                                        <div class='card-body'>
                                            <div>
                                                <h3 class='card-title'> ". $matchRow["fname"] . '&nbsp' . $matchRow["lname"] ."</h3>
                                                <h6 class='card-subtitle mb-2 text-muted'>". $matchRow["location"] ."</h6>
                                            </div>
                                        <p class='card-text' id = 'matchBio'>". $matchRow["bio"] ."  </p>
                                        <div class = 'text-center'>
                                            <button type='button' class = 'matchRejectbtn' id = 'matchFname.$matchRow[user_id].'> <i class='bi bi-check-circle mx-5' id = 'iconAccept' onclick = 'matchSent($matchRow[user_id], $matchNum, $premium)'>  </i></button>
                                            <button type='button' class = 'matchRejectbtn'> <i class='bi bi-x-circle mx-5' id = 'iconReject' onclick = 'matchReject($matchRow[user_id], $matchNum, $premium)'></i></button>
                                        </div>
                                        <div> 
                                </div>
                           </div>
                       </div>      
                   </div>
                   </div>

                       ");
                    }  
                    } else {
                    echo ("
                    <div class = 'row'>
                    <div class = 'col-4 offset-md-4 p-5' >
                        <div class='card' style='width: 36rem; '>
                        <img src='pfp/placeholder.png' class='card-img-top' > </img>
                        <div class='card-body'>
                        <div>
                        <h3 class='card-title'>No matches found!</h3>
                        </div>
                        </div>
                    </div>      
                </div>

                    ");
                }
            ?>
            
       
            <script>

            var counter = 0;
            
            function matchSent(id, matchNum, premium)
            {
                console.log(premium);
                console.log("test");
                swal("Match sent!", "", "success")
                var prem = premium;
                console.log(prem);
                counter++;
                var remove = document.getElementById(id);
                remove.parentNode.removeChild(remove);

                
                if (matchNum==counter)
                {
                    noMatches(prem);
                }

            }
            function matchReject(id, matchNum, premium)
            {
                var prem = premium;
                counter++;
                var remove = document.getElementById(id);
                remove.parentNode.removeChild(remove);

                if (matchNum==counter)
                {
                    noMatches(prem);
                }
            }

            function noMatches(prem) 
            {
                if (prem != 1)
                {
                    swal("Get premium to see more matches!", "", "info");
                } 
                document.getElementById('noMatches').innerHTML =  `
                <div class = 'row'>
                    <div class = 'col-4 offset-md-4 p-5' >
                        <div class='card' style='width: 36rem; '>
                        <img src='pfp/placeholder.png' class='card-img-top' > </img>
                        <div class='card-body'>
                        <div>
                        <h3 class='card-title'>No matches found!</h3>
                        </div>
                        </div>
                    </div>      
                </div>  
                `;
            }

            </script>
            

    </body>