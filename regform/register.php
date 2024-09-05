<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: register.php");
    die();
}

//Load Composer's autoloader
require 'vendor/autoload.php';

include 'config.php';
$msg = "";

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);
    $code = bin2hex(random_bytes(16));

    // Regex for validation
    $_email_pattern1 = "/^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$/";
    $_password_pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users_login WHERE email='{$email}'")) > 0) {
        $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
    } else if (strlen($name) < 3 || strlen($name) > 20) {
        $msg = "<div class='alert alert-danger'>{$name} - User Name should be 3-20 char!!!!.</div>";
    } else if (!preg_match($_email_pattern1, $email)) {
        $msg = "<div class='alert alert-danger'>{$email} - Invalid Email.</div>";
    } else if (!preg_match($_password_pattern, $password)) {
        $msg = "<div class='alert alert-danger'>Invalid Password.</div>";
    } else {
        if ($password === $confirm_password) {
            // Hash the password before storing it in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users_login (name, email, mobile, password, code) VALUES ('$name', '$email', '$mobile', '$hashed_password', '$code')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<div style='display: none;'>";
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'kawserahmedpk2017@gmail.com';                     //SMTP username
                    $mail->Password   = 'nsrkhvuoegfhjhtl';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('kawserahmedpk2017@gmail.com');
                    $mail->addAddress($email);

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'MY Sylhet';
                    $mail->Body    = 'Here is the verification link <b><a href="http://localhost/MySylhet/regform/index.php?verification=' . $code . '">http://localhost/MySylhet/regform/index.php?verification=' . $code . '</a></b>';

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
            } else {
                $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Registration Form</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

    <style>
    body {
        background-image: url("images/rbg.gif");
        background-repeat: no-repeat;
        background-size: cover;

    }
    </style>

</head>

<body>
    <!-- form section start -->
    <section class="w3l-mockup-form">
        <div class="container">

            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                        <span class="fa fa-close"></span>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="images/reg.png" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        <h2>Register Now</h2>
                        <?php echo $msg; ?>
                        <form action="" method="post">
                            <input type="text" class="name" name="name" placeholder="Enter Your Name" value="<?php if (isset($_POST['submit'])) {
                                                                                                                    echo $name;
                                                                                                                } ?>"
                                required>
                            <input type="email" class="email" name="email" placeholder="Enter Your Email"
                                value="<?php if (isset($_POST['submit'])) {
                                                                                                                        echo $email;
                                                                                                                    } ?>" required>
                            <input type="mobile" class="mobile" name="mobile" placeholder="Enter Your mobile"
                                value="<?php if (isset($_POST['submit'])) {
                                                                                                                            echo $mobile;
                                                                                                                        } ?>" required>
                            <input type="password" class="password" name="password" placeholder="Enter Your Password"
                                required>
                            <input type="password" class="confirm-password" name="confirm-password"
                                placeholder="Enter Your Confirm Password" required>
                            <button name="submit" class="btn" type="submit">Register</button>
                        </form>
                        <div class="social-icons">
                            <p>Have an account! <a href="index.php">Login</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->

    <script src="js/jquery.min.js"></script>
    <script>
    $(document).ready(function(c) {
        $('.alert-close').on('click', function(c) {
            $('.main-mockup').fadeOut('slow', function(c) {
                $('.main-mockup').remove();
            });
        });
    });
    </script>

</body>

</html>