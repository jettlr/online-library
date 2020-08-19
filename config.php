
<!--Connect to database-->

<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "root";
 $database = "Onlinelibrary";

//Connect DB
 $db = new mysqli($dbhost, $dbuser, $dbpass, $database) or die ("Connect failed");


//Active Menu
 $current_page = basename($_SERVER['PHP_SELF']);



?>
