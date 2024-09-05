<?php

// Include the file that establishes the database connection
include '../components/connect.php';

// Check if the admin_id cookie is set
if (isset($_COOKIE['admin_id'])) {
   // Retrieve the admin_id from the cookie
   $admin_id = $_COOKIE['admin_id'];
} else {
   // If admin_id cookie is not set, set $admin_id to an empty string and redirect to login page
   $admin_id = '';
   header('location:login.php');
}

// Check if the form has been submitted for admin deletion
if (isset($_POST['delete'])) {

   // Sanitize and retrieve the delete_id from the form
   $delete_id = $_POST['delete_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   // Prepare and execute a SELECT query to verify if the admin with delete_id exists
   $verify_delete = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
   $verify_delete->execute([$delete_id]);

   // Check if an admin with the specified delete_id exists
   if ($verify_delete->rowCount() > 0) {
      // If admin exists, prepare and execute a DELETE query to remove the admin
      $delete_admin = $conn->prepare("DELETE FROM `admins` WHERE id = ?");
      $delete_admin->execute([$delete_id]);
      $success_msg[] = 'Admin deleted!';
   } else {
      // If no admin with the specified delete_id is found, display a warning message
      $warning_msg[] = 'Admin deleted already!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admins</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>

<body>

   <?php include '../components/admin_header.php'; ?>

   <section class="grid">

      <h1 class="heading">Admins</h1>

      <form action="" method="POST" class="search-form">
         <input type="text" name="search_box" placeholder="search admins..." maxlength="100" required>
         <button type="submit" class="fas fa-search" name="search_btn"></button>
      </form>

      <div class="box-container">

         <?php
         // Check if a search is performed
         if (isset($_POST['search_box']) or isset($_POST['search_btn'])) {
            $search_box = $_POST['search_box'];
            $search_box = filter_var($search_box, FILTER_SANITIZE_STRING);
            $select_admins = $conn->prepare("SELECT * FROM `admins` WHERE name LIKE '%{$search_box}%'");
            $select_admins->execute();
         } else {
            // If no search, select all admins
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
         }
         // Check if admins are found
         if ($select_admins->rowCount() > 0) {
            // Loop through each admin and display their information
            while ($fetch_admins = $select_admins->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <?php if ($fetch_admins['id'] == $admin_id) { ?>
                  <!-- Display the current admin's box with update and register links -->
                  <div class="box" style="order: -1;">
                     <p>name : <span><?= $fetch_admins['name']; ?></span></p>
                     <a href="update.php" class="option-btn">update account</a>
                     <a href="register.php" class="btn">register new</a>
                  </div>
               <?php } else { ?>
                  <!-- Display other admins' boxes with delete button -->
                  <div class="box">
                     <p>name : <span><?= $fetch_admins['name']; ?></span></p>
                     <form action="" method="POST">
                        <input type="hidden" name="delete_id" value="<?= $fetch_admins['id']; ?>">
                        <input type="submit" value="delete admin" onclick="return confirm('delete this admin?');" name="delete" class="delete-btn">
                     </form>
                  </div>
               <?php } ?>
            <?php
            }
         } elseif (isset($_POST['search_box']) or isset($_POST['search_btn'])) {
            // Display a message if no search results are found
            echo '<p class="empty">no results found!</p>';
         } else {
            ?>
            <!-- Display a message if no admins are added yet -->
            <p class="empty">no admins added yet!</p>
            <div class="box" style="text-align: center;">
               <p>create a new admin</p>
               <a href="register.php" class="btn">register now</a>
            </div>
         <?php
         }
         ?>

      </div>

   </section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

<?php include '../components/message.php'; ?>

</body>

</html>