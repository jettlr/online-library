

<?php

session_start();


if ($_SESSION['userip'] !== $_SERVER['REMOTE_ADDR']){
#destroys the session if ip of the user is different
session_unset();
session_destroy();
  }

if(isset($_SESSION['username']))
{
  echo "Welcome ". $_SESSION['username'];
echo "<a href='logout.php'> logout</a>";
}


  ?>


  <body>

  <?php include("template/head.php");?>

  <?php include("template/header.php");?>

  <div class="heading">
    Contact
 </div>


  <div class="pagecontent">


    <p>My first paragraph.</p>

  </div>


  </body>

  <footer>
  <?php include("template/footer.php");?>
  </footer>
