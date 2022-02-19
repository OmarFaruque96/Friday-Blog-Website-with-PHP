<?php 
    include "includes/connection.php";
    ob_start();
    global $pass_error;
?>

<?php 
                        
    if(isset($_POST['signup'])){
        $name       = $_POST['name'];
        $email      = $_POST['email'];
        $pass       = $_POST['pass'];
        $re_pass    = $_POST['re_pass'];

        $pass_count = strlen($pass);

        if($pass_count < 8){
            $pass_error = '<span class="alert alert-danger">Password should be more than 8 characters long!</span>';
            
        }else{
            if($pass != $re_pass){
                $pass_error = '<span class="alert alert-danger">Password not matched!</span>';
            }else{
                $hass_pass = sha1($pass);

                $reg_query = "INSERT INTO users(u_name,u_mail,u_pass,user_role,u_status) VALUES('$name', '$email', '$hass_pass', 0, 0)";
                $result = mysqli_query($db, $reg_query);

                if($result){
                    header('Location: index.php');
                }else{
                    die('User Registration Error!'.mysqli_error($db));
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Khela Hobe Blog Registration</title>

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
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/ required="required">
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/ required="required">
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/ required="required">
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/ required="required">

                                <?php 

                                    if(!empty($pass_error)){
                                        echo '<div class="alert alert-danger" role="alert">'.$pass_error.'!</div>';
                                    }

                                ?>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>

                        
                    </div>
                    <div class="signup-image">
                        <figure><img src="login-assets/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="login-assets/vendor/jquery/jquery.min.js"></script>
    <script src="login-assets/js/main.js"></script>
    <?php ob_end_flush(); ?>
</body>
</html>