
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$msg = "";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


if(isset($_POST['submit']))
{
$name = $_POST['name'];
$subject = $_POST['subject'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];


try {
    //Server settings
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kawserahmedpk2017@gmail.com';                     //SMTP username
    $mail->Password   = 'nsrkhvuoegfhjhtl';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('kawserahmedpk2017@gmail.com');
    $mail->addAddress($email);     //Add a recipient
   
  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Message recived from contact:'.$name;
    // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->Body = "Name: $name <br> Subject: $subject <br> Email: $email <br> Mobile: $number <br> Message: $message";

    $mail->send();
    // echo 'Message has been sent';
  
} 
catch (Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
echo "</div>";
$msg = "<div class='alert alert-info'> Message has been sent.</div>";
} else {
// $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/home.css">

    <title>Document</title>
</head>
<body>
    <?php
    include('navbar.php');
    ?>
<div>
  <div class="contact_form_container">
          <h3 class="heading">My Sylhet</h3>

          <div class="main_content">

              <div class="left">
                  <form action=" " method="post">

                      <div class="form_input_wraper">
                          <input type="text" id="name" name="name" required>
                          <label for="name">Your Name</label>
                      </div>

                      <div class="form_input_wraper">
                          <input type="text" id="subject" name="subject" required>
                          <label for="subject">Subject</label>
                      </div>

                      <div class="form_input_wraper">
                          <input type="text" id="email" name="email" required>
                          <label for="email">Email</label>
                      </div>

                      <div class="form_input_wraper">
                          <input type="text" id="number" name="number" required>
                          <label for="number">Mobile</label>
                      </div>

                      <div class="form_input_wraper">
                          <textarea id="message" name="message" required></textarea>
                          <label for="message">Message</label>
                      </div>

                      <button type="submit" name="submit" aria-label="Submit Button" class="submit_button">
                          <i class="fa fa-angle-right"></i>
                      </button>
                  </form>
                  <?php echo $msg; ?>
              </div>

              <div class="right">
                  <h3 class="heading">Office Location</h3>

                  <ul>
                      <li>
                          <span class="icon">
                              <i class="fa fa-phone"></i>
                          </span>
                          <span class="text">01750160850</span>
                      </li>
                      <li>
                          <span class="icon">
                              <i class="fa fa-envelope"></i>
                          </span>
                          <span class="text">
                              mysylhet@gmail.com
                          </span>
                      </li>
                      <li>
                          <span class="icon">
                              <i class="fa fa-location-arrow"></i>
                          </span>
                          <span class="text">
                              658 Road, #block-c Waposohor Point, Apt-124
                          </span>
                      </li>
                  </ul>
              </div>

          </div>
      </div>
</div>
</body>
</html>