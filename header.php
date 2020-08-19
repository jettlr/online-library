
<?php

include "config.php";

 ?>


  <!-- BG -->
<div class="bg-img">


  <!-- MAIN MENU -->
  <!-- w3schools -->


  <div class="container">
    <div class="topnav">

  <!--Active Menu-->
        <a class="<?php echo ($current_page == 'index.php') ? 'active' : NULL ?>"
                      href="index.php">Home</a>

        <a class="<?php echo ($current_page == 'browse.php') ? 'active' : NULL ?>"
                      href="browse.php">Browse</a>

        <a class="<?php echo ($current_page == 'gallery.php') ? 'active' : NULL ?>"
                      href="gallery.php">Gallery</a>

        <a class="<?php echo ($current_page == 'about.php') ? 'active' : NULL ?>"
                      href="about.php">About</a>

        <a class="<?php echo ($current_page == 'contact.php') ? 'active' : NULL ?>"
            					href="contact.php">Contact</a>

       <a class="<?php echo ($current_page == 'mybooks.php') ? 'active' : NULL ?>"
                      href="mybooks.php">My Books</a>

      <a class="<?php echo ($current_page == 'login.php') ? 'active' : NULL ?>"
                      href="login.php">Log In</a>


    </div>
  </div>
</div>
