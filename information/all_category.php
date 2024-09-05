<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

include 'components/like_post.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>category</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <!-- header section starts  -->
   <?php include 'components/user_header.php'; ?>
   <!-- header section ends -->




   <section class="categories">

      <h1 class="heading">post categories</h1>

      <div class="box-container">
         <div class="box"><span>1</span><a href="category.php?category=City Corporation">City Corporation</a></div>
         <div class="box"><span>2</span>
            <a href="category.php?category=Citizen Engagement">Citizen Engagement
            </a>
         </div>
         <div class="box"><span>3</span><a href="category.php?category=City Planning">City Planning</a></div>
         <div class="box"><span>4</span><a href="category.php?category=Historical Urban Evolution">Historical Urban
               Evolution</a></div>
         <div class="box"><span>5</span><a href="category.php?category=Safety and Security Updates">Safety and
               Security Updates</a></div>
         <div class="box"><span>6</span><a href="category.php?category=Health and Wellness Resources">Health and
               Wellness Resources</a></div>
         <div class="box"><span>7</span><a href="category.php?category=Digital Inclusion Initiatives">Digital
               Inclusion Initiatives</a></div>
         <div class="box"><span>8</span><a href="category.php?category=Authentic Offerings">Authentic Offerings</a>
         </div>
         <div class="box"><span>9</span><a href="category.php?category=food and drinks">food and drinks</a></div>
         <div class="box"><span>10</span><a href="category.php?category=lifestyle">lifestyle</a></div>


   </section>

   <?php include 'components/footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>