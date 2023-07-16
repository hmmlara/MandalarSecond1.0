<?php
include_once "controller/registerController.php";
$registercontroller=new RegisterController;

if(isset($_POST['register']))
{
   
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['pass'];

    $registercontroller->registerUser($fname,$lname,$email,$password);

    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <!-- <link rel="stylesheet" href="css/material-design-iconic-font.min.css"> -->

    <!-- Main css -->
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="mdbbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="css/registerandlogin.css">
    <link rel="stylesheet" href="css/register.css">
</head>

<body>


    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form " id="register-form">

                        <div class="field image d-flex  justify-content-center align-items-center mb-4">
                            <div id="cross" class="d-none ">

                            <i class="fa-solid fa-xmark fa-xl cancel-icon  " ></i>
                            </div>
                            <img src="image/user-profile/mylove.jpg" class="img-circle mb-4" id="show_photo" alt="">

                            <div class="d-flex  justify-content-center align-items-center cover-icon">
                                <i class="fa-solid fa-camera fa-xl camera_icon" style="color: #4e9c81;"></i>
                            </div>
                            <!-- hidden file -->
                            <div class="hideinputfile">
                                <input type="file" name="image" id="inputphoto" class="" id="">
                            </div>


                        </div>
                        <div class="form-group mt-5">
                            <label for="name"><i class="fa-solid fa-user"></i></i></label>
                            <input type="text" name="fname" id="name" placeholder="First Name" />
                        </div>
                        <div class="form-group ">
                            <label for="name"><i class="fa-solid fa-user"></i></i></label>
                            <input type="text" name="lname" id="name" placeholder="Last Name" />
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fa-solid fa-envelope"></i></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="fa-solid fa-lock"></i></label>
                            <input type="password" name="pass" id="pass" placeholder="Password" />
                            <!-- <i class="fas fa-eye eye"></i> -->
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="" id="">
                            <!-- <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" /> -->
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <button type="submit" name="register" id="signup" class="btn btn-primary" value="Register"></button>
                            <!-- <input type="submit"  /> -->
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="image/user-profile/mylove.jpg" alt="sing up image"></figure>
                    <a href="login.php" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
    <!-- <script src="js/main.js"></script> -->
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="mdbbootstrap/js/mdb.min.js"></script>
    <script src="js/register_img.js"></script>
    <script src="js/pass-show-hide.js"></script>
    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>