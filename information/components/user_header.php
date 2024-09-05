<!-- <?php
        if (isset($message)) {
            foreach ($message as $message) {
                echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
            }
        }
        ?> -->

<header class="header">

    <nav class="navbar nav-2">
        <section class="flex">
            <!-- <div id="menu-btn" class="fas fa-bars"></div> -->

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
                            <li><a href="posts.php">Information</a></li>
                            <li><a href="all_category.php">Category</i></a></li>
                            <li><a href="authors.php">Authors</a></li>
                        </ul>
                    </li>

                    <li><a href="#">Account</a>
                        <ul>
                            <li><a href="login.php">Login Now</a></li>
                            <li><a href="register.php">Register</a></li>
                            <?php if ($user_id != '') { ?>

                                <li><a href="components/user_logout.php" onclick="return confirm('logout from this section?');">Logout</a>
                                <?php } ?></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </section>
    </nav>
</header>