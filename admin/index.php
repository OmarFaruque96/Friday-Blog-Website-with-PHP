<?php 

    include "includes/connection.php";
    ob_start();
    session_start();

    // if(!empty($_SESSION['u_id'])){
    //   header('Location: dashboard.php');
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Friday Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="login-assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="login-assets/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="login-assets/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="registration.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Email / Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>

                        <?php 

                            if(isset($_POST['signin'])){
                                $username  = mysqli_real_escape_string($db, $_POST['your_name']);
                                $your_pass  = mysqli_real_escape_string($db, $_POST['your_pass']);
                                $hass_pass = sha1($your_pass);

                                $login_query = "SELECT * FROM users WHERE u_name='$username' OR u_mail='$username'";
                                $result = mysqli_query($db,$login_query);
                                while($row = mysqli_fetch_assoc($result)){

                                    $_SESSION['u_id']       = $row ['u_id'];
                                    $_SESSION['u_name']     = $row ['u_name'];
                                    $_SESSION['u_mail']     = $row ['u_mail'];
                                    $u_pass                 = $row ['u_pass'];
                                    $_SESSION['u_address']  = $row ['u_address'];
                                    $_SESSION['u_phone']    = $row ['u_phone'];
                                    $_SESSION['u_biodata']  = $row ['u_biodata'];
                                    $_SESSION['u_gender']   = $row ['u_gender'];
                                    $_SESSION['user_role']  = $row ['user_role'];
                                    $_SESSION['u_status']   = $row ['u_status'];
                                    $_SESSION['u_image']    = $row ['u_image'];

                                }
                                // check the username and pass
                                if(($_SESSION['u_name'] == $username || $_SESSION['u_mail'] == $username) && $u_pass == $hass_pass){

                                    if($_SESSION['user_role'] == 0){
                                        header('Location: ../index.php');
                                    }else{
                                        header('Location: dashboard.php');
                                    }
                                    
                                }
                                elseif(($_SESSION['u_name'] != $username || $_SESSION['u_mail'] != $username) && $u_pass != $hass_pass){
                                    header('Location: index.php');
                                }else{
                                    header('Location: index.php');
                                }
                            }

                        ?>


                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

       

    </div>

    <!-- JS -->
    <script src="login-assets/vendor/jquery/jquery.min.js"></script>
    <script src="login-assets/js/main.js"></script>
    <?php ob_end_flush();?>
</body>
</html>