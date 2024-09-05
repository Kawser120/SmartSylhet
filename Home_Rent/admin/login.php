<?php

// Include the file that establishes the database connection
include '../components/connect.php';

// Check if the form has been submitted
if(isset($_POST['submit'])){

   // Sanitize and retrieve the username from the form
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING); 

   // Sanitize and hash the password using SHA-1
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING); 

   // Prepare and execute a SELECT query to check if the username and password match
   $select_admins = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ? LIMIT 1");
   $select_admins->execute([$name, $pass]);

   // Fetch the result as an associative array
   $row = $select_admins->fetch(PDO::FETCH_ASSOC);

   // Check if a row was found
   if($select_admins->rowCount() > 0){
      // If a match is found, set a cookie with the admin ID and redirect to the dashboard
      setcookie('admin_id', $row['id'], time() + 60*60*24*30, '/');
      header('location:dashboard.php');
   }else{
      // If no match is found, display a warning message
      $warning_msg[] = 'Incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en"> 
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body style="padding-left: 0;">

<!-- login section starts  -->

<section class="form-container" style="min-height: 100vh;">

   <form action="" method="POST">
      <h3>welcome back!</h3>
      <!-- <p>default name = <span>admin</span> & password = <span>111</span></p> -->
      <input type="text" name="name" placeholder="enter username" maxlength="20" class="box" required oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" placeholder="enter password" maxlength="20" class="box" required oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" name="submit" class="btn">
   </form>

</section>

<!-- login section ends -->


















<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include '../components/message.php'; ?>

</body>
</html>