
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




  <?php include("template/head.php");?>

  <?php include("template/header.php");?>


  <div class="heading">
    Admin Page
 </div>


<div class="pagecontent">

<meta name="viewport" content="width=device-width, initial-scale=1">








<!--FILE UPLOAD-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--Upload form-->
<form id="uploadfile" method="POST" enctype="multipart/form-data">
  <input  name="fileupload" id="fileupload"  type="file"  >
  <p style="margin-top:7%;" >Drag your file here.</p>
  <button type="submit" name="uploadfile">Upload</button>
</form>





<script>
	$(document).ready(function(){
  $('form input').change(function () {
    $('form p').text(this.files.length + " file selected");
  });
})
</script>





<?php
// Imagepath
if (isset($_POST['uploadfile']))  {
$target_dir = "image/";
$target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo $imageFileType;





// Check if file not already exists // Check if file size is too big // Do not allow other file formats
if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" ) {

		if (!(file_exists($target_file)) && ($_FILES["fileupload"]["size"] < 1048576)) {


    $query = "INSERT INTO gallery(picture)
	VALUES ('".$target_file."')"; //filepath
	mysqli_query($db,$query);

	 move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file);


     echo "The file ". basename( $_FILES["fileupload"]["name"]). " has been uploaded.";




}
else {
	echo "<div class='abouttext'>Upload failed";
}

}
else {
	echo "<div class='abouttext'>Choose the right file type";
}
}

?>




















<!--Create User -->
<p class="addposter">ADD A USER</p>

 <td><form id='newuser' method='POST'>

 <!--ADD USER form-->
    <label for ='newusername'></label>
    <input type='text' id='newusername' name='newusername' placeholder='Username:'>

     <label for = 'newpassword'></label>
    <input type='text' id='newpassword' name='newpassword' placeholder='Password:'>

    <button type='submit' name='upload'>Add User</button>
    </form></td>
    </tr>





    <?php

    if(isset($_POST['upload']) && !empty($_POST['newusername']) && !empty($_POST['newpassword'])){

      $newusername = trim($_POST['newusername']);
      $newusername = stripslashes($newusername);
      $newusername = htmlspecialchars($newusername);

      $newpassword = trim($_POST['newpassword']);
      $newpassword = stripslashes($newpassword);
      $newpassword = htmlspecialchars($newpassword);
      $newpassword = md5($newpassword);

      $query = mysqli_query("SELECT username FROM user WHERE username = $newusername", $db);


      if (mysqli_num_rows($query) == 0)
      {
        $query = "INSERT INTO user (username, password, type) VALUES ('$newusername', '$newpassword', 'user')";


        mysqli_query($db,$query);
        header("Location:admin.php");;

      }


}

     ?>











     <p class="add">LIST OF ALL USERS</p>


<?php
//delete user
if (isset($_GET['userid']))  {
  $deleteuser = $_GET['userid'];

  $query = "DELETE FROM user
              WHERE user.user_id='".$deleteuser."'";
  if ($db->query($query) === TRUE) {
    header("Refresh:0; url=admin.php");
}
}


$query = "SELECT user.username, user.user_id FROM user ";



//result from database
$stmt = $db -> prepare($query);
$stmt -> bind_result($username, $id);
$stmt -> execute();



/* Table of all Books*/
echo "<table>";

 echo "<tr>
    <th>Username</th>

   <th></th>
  </tr>";

while ($stmt -> fetch()) {

    echo "<tr>
    <td>$username</td>";
    echo "<td><form method='get' action=''>
    <button name='userid' value='".$id."' id='submit' type='submit'>Delete</button>
    </form></td>
    </tr>";




   }


  echo "</table>";


?>


<!--Create Book -->
<p class="addposter">ADD A BOOK</p>

 <td><form id='newbook' method='POST'>

 <!--ADD USER form-->
    <label for ='newtitle'></label>
    <input type='text' id='newusername' name='newtitle' placeholder='Title:'>

     <label for = 'newfirst'></label>
    <input type='text' id='newpassword' name='newfirst' placeholder='First Name:'>

    <label for = 'newlast'></label>
   <input type='text' id='newpassword' name='newlast' placeholder='Last Name:'>

   <label for = 'newpage'></label>
  <input type='text' id='newpassword' name='newpage' placeholder='Page Number:'>

  <label for = 'newisbn'></label>
 <input type='text' id='newpassword' name='newisbn' placeholder='ISBN:'>

 <label for = 'newpuplication'></label>
<input type='text' id='newpassword' name='newpublication' placeholder='Publication Date:'>

<label for = 'newedition'></label>
<input type='text' id='newpassword' name='newedition' placeholder='Edition:'>

<label for = 'newpublisherid'></label>
<input type='text' id='newpassword' name='newpublisherid' placeholder='Publisher Id:'>

    <button type='submit' name='uploadbook'>Add Book</button>
    </form></td>
    </tr>





    <?php

    if(isset($_POST['uploadbook']) && !empty($_POST['newtitle']) && !empty($_POST['newfirst']) && !empty($_POST['newlast']) && !empty($_POST['newpage']) && !empty($_POST['newisbn']) && !empty($_POST['newpublication']) && !empty($_POST['newedition']) && !empty($_POST['newpublisherid'])){


      $newtitle = trim($_POST['newtitle']);
      $newtitle = stripslashes($newtitle);
      $newtitle = htmlspecialchars($newtitle);

      $newfirst = trim($_POST['newfirst']);
      $newfirst= stripslashes($newfirst);
      $newfirst = htmlspecialchars($newfirst);

      $newlast = trim($_POST['newlast']);
      $newlast= stripslashes($newlast);
      $newlast = htmlspecialchars($newlast);

      $newpage = trim($_POST['newpage']);
      $newpage= stripslashes($newpage);
      $newpage = htmlspecialchars($newpage);

      $newisbn = trim($_POST['newisbn']);
      $newisbn= stripslashes($newisbn);
      $newisbn = htmlspecialchars($newisbn);

      $newpublication = trim($_POST['newpublication']);
      $newpublication= stripslashes($newpublication);
      $newpublication = htmlspecialchars($newpublication);

      $newedition = trim($_POST['newedition']);
      $newedition= stripslashes($newedition);
      $newedition = htmlspecialchars($newedition);

      $newpublisherid = trim($_POST['newpublisherid']);
      $newpublisherid= stripslashes($newpublisherid);
      $newpublisherid = htmlspecialchars($newpublisherid);


//
        $query = "INSERT INTO books (title, page, isbn, publication_date, edition, publisher_id, is_reserved ) VALUES ('$newtitle', '$newpage','$newisbn','$newpublication','$newedition','$newpublisherid','0')";
        $query1 = "SET @books_id = LAST_INSERT_ID()";
        $query2 = "INSERT INTO authors (first_name, last_name) VALUES ('$newfirst', '$newlast')";
        $query3 = "SET @authors_id = LAST_INSERT_ID()";
        $query4 = "INSERT INTO authors_books (books_id,authors_id) VALUES (@books_id, @authors_id)";



        mysqli_query($db,$query);
        mysqli_query($db,$query1);
        mysqli_query($db,$query2);
        mysqli_query($db,$query3);
        mysqli_query($db,$query4);
        header("Location:admin.php");


}

     ?>



















<p class="add">LIST OF ALL BOOKS</p>


<?php

if (isset($_GET['bookid']))  {
$deletebook = $_GET['bookid'];

$query = "DELETE FROM books
         WHERE books.books_id='".$deletebook."'";
if ($db->query($query) === TRUE) {
header("Refresh:0; url=admin.php");
}
}


$query = "SELECT books.title, books.books_id FROM books ";



//result from database
$stmt = $db -> prepare($query);
$stmt -> bind_result($bookname, $id);
$stmt -> execute();




/* Table of all Posters*/
echo "<table>";

echo "<tr>
<th>Title</th>

<th></th>
</tr>";

while ($stmt -> fetch()) {

echo "<tr>
<td>$bookname</td>";
echo "<td><form method='get' action=''>
<button name='bookid' value='".$id."' id='submit' type='submit'>Delete</button>
</form></td>
</tr>";




}


echo "</table>";


?>



</body>
</html>



  <footer>
  <?php include("template/footer.php");?>
  </footer>
