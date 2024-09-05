<!-- header section starts  -->

<header class="header">

   <nav class="navbar nav-2">
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>

         <div class="logo">
            <a href="../Homepage/index.html">
               <img src="./images/MySylhet.png" alt="Your Logo" width="140px">
            </a>
         </div>
         <div class="menu">
            <ul>
               <li><a href="home.php">Home</a></li>
               <li><a href="#">My Listings</a>
                  <ul>
                     <li><a href="dashboard.php">Dashboard</a></li>
                     <li><a href="post_property.php">Add Property</i></a></li>
                     <li><a href="my_listings.php">My Listings</a></li>
                  </ul>
               </li>
               <li><a href="#">Search</a>
                  <ul>
                     <li><a href="search.php">Filter</a></li>
                     <li><a href="listings.php">All Listings</a></li>
                  </ul>
               </li>
               <li><a href="#">Help</a>
                  <ul>
                     <li><a href="about.php">About Us</a></li>
                     <li><a href="contact.php">Contact Us</a></li>
                     <li><a href="contact.php#faq">FAQ</a></li>
                  </ul>
               </li>
            </ul>
         </div>

         <ul>
            <li><a href="saved.php">Saved</a></li>
            <li><a href="#">Account</a>
               <ul>
                  <li><a href="login.php">Login Now</a></li>
                  <li><a href="register.php">Register</a></li>
                  <?php if ($user_id != '') { ?>
                     <li><a href="update.php">Update Profile</a></li>
                     <li><a href="components/user_logout.php" onclick="return confirm('logout from this website?');">Logout</a>
                     <?php } ?></li>
               </ul>
            </li>
         </ul>
      </section>
   </nav>

</header>

<!-- header section ends -->