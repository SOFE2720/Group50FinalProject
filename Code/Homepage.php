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

    $error = $_SESSION['error']; 

}
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Style sheet -->
        <link rel="stylesheet" href="homepage.css">
        <!-- Bootstrap CSS  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Bootstrap JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </head>

    <body>
        <section class = "Form my-4 mx-5">
            <div class = "container">
                <div class = "row no-gutters" id = "happy_couple_border">
                    <div class = "col-lg-5">
                        <img src = "happy_couple.jpg" class = "img-fluid" id = "happy_couple">
                    </div>
                    <div class = "col-lg-7 px-5 pt-5">
                        <a>
                            <img src = "weeble_logo.png"> 
                        </a>
                        <h4>Sign into your account</h4>
                        <form method ="POST" action = "login.php">
                            <div class = "form-row">
                                <div class = "col-lg-7">
                                    <input type = "email" name = "email" placeholder = "Email Address" class = "form-control my-3 p-4" required></input>
                                </div>
                            </div>
                            <div class = "form-row">
                                <div class = "col-lg-7">
                                    <input type = "password" name = "password" placeholder = "**********" class = "form-control my-3 p-4" required></input>
                                </div>
                            </div>
                            <div class = "form-row">
                                <div class = "col-lg-7">
                                        <button type = "submit" class = "btnLogin my-2">Login</button>
                                    <!-- Modal -->
                                    <button type = "button" class = "btnCreate my-3"data-toggle="modal" data-target="#createAccount">Create an account</button>                        
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

         <!-- Modal for item 1 -->
        <div class="modal fade" id="createAccount" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create an account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form method = "POST" action = "signup.php">
                        <div class="form-group">
                            <div class = "row">
                                <div class = "col-lg-6 pb-3">
                                    <label>First name</label>
                                    <input type ="text" name="fname" class = "form-control" placeholder="First name" required>
                                </div>
                                <div class = "col-lg-6 pb-3">
                                    <label>Last name </label>
                                    <input type ="text" name="lname" class = "form-control" placeholder="Last name" required>
                                </div>
                            </div>

                            <div class = "mb-2">
                                <label>Email</label>
                                <input type = "email" name = "email" class ="form-control" placeholder="example@email.com" required>
                            </div>

                            <div>
                                <label>Password</label>
                                <input type ="password" name="password" class = "form-control" placeholder="*********" required>
                            </div>

                            <div class = "my-3">
                                <label>Date of birth</label>
                                <form> 
                                    <input type="date" id="birthdate" name="birthdate" min="1900-01-01" required>
                                </form>
                            </div>

                            <label> Gender </label> <br>
                                <label for="male">Male</label>
                                <input type="radio" id="male" name="gender" value="male" required>

                                <label for="female">Female</label>
                                <input type="radio" id="female" name="gender" value="female">
                                
                                <button type = "submit" class = "btnCreate my-3" onclick = "">Create an account</button>   
                        </div>  
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            </div>
        </div>
        </section>
    </body>        
</html>