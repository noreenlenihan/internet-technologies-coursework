<?php
/* Open a MySQL connection */
error_reporting(E_ALL);
$link = new mysqli('localhost', 'noreen', 'porkchops411', 'regform');
if(!$link) {
die('Connection failed: ' . $link->error());
}
/* Create and execute a MySQL query*/
if(isset($_GET['id']))
{

$id=$_GET['id'];
if(isset($_POST['submit'])){
$title = $_POST['title'];
$subject = $_POST['subject'];
$university = $_POST['university'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$format = $_POST['format'];
$price = $_POST['price'];
$delivery = $_POST['delivery'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$comments = $_POST['comments'];

$sql="update book_list set bookTitle='$title', bookAuthor='$author', subjectArea = '$subject', university = '$university', isbn = '$isbn', format = '$format', price = '$price', delivery = '$delivery', phone = '$phone', email = '$email', comments = '$comments' where bookId='$id'";
$result = mysqli_query($link, $sql);
if($result)
{
header('Location: /manage_ads.php');
}
else{
	echo "Unsuccessful attempt";
}
}

$sql1="select * from book_list where bookId='$id'";
$result1 = mysqli_query($link, $sql1);
$row = mysqli_fetch_array($result1, MYSQLI_ASSOC);
echo '<style type="text/css">
body {
	background-image: url(images/lightpaperfibers.png);
	background-repeat: repeat;
}
</style>';
	  echo '<link href="stylesheet.css" rel="stylesheet" type="text/css">';
?>
<div class="headliner">Student Book Depot</div>
<div class="edit_adform"><form method="post" action="">
Book Title:<input type="text" name="title" value="<?php echo $row["bookTitle"]; ?>" /><br />
Book Author:<input type="text" name="author" value="<?php echo $row["bookAuthor"]; ?>" /><br />
Subject Area:<input type="text" name="subject" value="<?php echo $row["subjectArea"]; ?>" /><br />
University:<input type="text" name="university" value="<?php echo $row["university"]; ?>" /><br />
ISBN:<input type="text" name="isbn" value="<?php echo $row["isbn"]; ?>" /><br />
Format:<input type="text" name="format" value="<?php echo $row["format"]; ?>" /><br />
Price:<input type="text" name="price" value="<?php echo $row["price"]; ?>" /><br />
Delivery:<input type="text" name="delivery" value="<?php echo $row["delivery"]; ?>" /><br />
Phone:<input type="text" name="phone" value="<?php echo $row["phone"]; ?>" /><br />
Email:<input type="text" name="email" value="<?php echo $row["email"]; ?>" /><br />
Comments:<input type="text" name="comments" value="<?php echo $row["comments"]; ?>" /><br />
<br />
<input type="submit" name="submit" value="Update Ad" />
</form>
</div>
<?php
}
?>