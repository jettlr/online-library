

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



<?php

//Update status of the book
if (isset($_GET['bookid'])) {


  $bookid = $_GET['bookid'];
  $query = "UPDATE books
              SET is_reserved = '".$_SESSION['user_id']."'
              WHERE books_id = '$bookid'";

      $res = mysqli_query($db,$query);
    
}


//Input search form
if (isset($_POST) && !empty($_POST)) {
  $searchauthor = trim($_POST['author']);
  $searchtitle = trim($_POST['title']);
}



//search in database from input in form
$query = "SELECT books.books_id, books.title, authors.first_name, authors.last_name, books.isbn FROM books
JOIN authors_books ON books.books_id = authors_books.books_id
JOIN authors ON authors.authors_id = authors_books.authors_id
WHERE books.is_reserved =0";


if ($searchtitle && !$searchauthor){

  $query = $query . "AND WHERE books.title LIKE '%" . $searchtitle . "%'";
}

if (!$searchtitle && $searchauthor){

  $query = $query . "AND WHERE authors.first_name LIKE '%" . $searchauthor . "%'";
}

if ($searchtitle && $searchauthor){

  $query = $query . "AND WHERE books.title LIKE '%" . $searchtitle . "%' AND authors.first_name LIKE '%" . $searchauthor . "%'";
}

 ?>








    <div class="heading">
      Browse Books
   </div>

   <div class="notif">
     !Enter author's name or title of the book
  </div>


    <div class="pagecontent">
      <div class="wrap">
         <div class="search">
            <form action="<?php echo ($_SERVER["PHP_SELF"]);?>"method="post" class="searchbar">
            <input class="author" name="author" type="text" placeholder="Author of the book">
            <input class="title" name="title" type="text" placeholder="Book Title">
                  <button class="searchButton" type="submit"><h6>Search</h6></button>
                </form>

                </div>
                </div>
                </div>


                <?php

                //Table Header/Content



                $res = mysqli_query($db,$query);


                echo "<table>";
                echo "<tr>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Reserve</th>
                </tr>";


            while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

              $bookid = $row['books_id'];
              $title = $row['title'];
              $authorF = $row['first_name'];
              $authorL = $row['last_name'];
              $isbn = $row['isbn'];




              echo "<tr>
              <td>".$title."</td>
              <td>".$authorF." ".$authorL."</td>
              <td>".$isbn."</td>

              <td><form method='get' action=''>
              <button name='bookid' value='".$bookid."' id='submit' type='submit'>RESERVE</button>
              </form></td>
              </tr>";

              }


            echo"</table>"



              ?>
