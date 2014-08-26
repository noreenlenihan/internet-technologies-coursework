<?php 
session_start();
if (isset($_SESSION['user']))
   {}
else if (!isset($_SESSION['user'])) {
	header("Refresh: 5; url=user_login.php");
	  echo '<style type="text/css">
body {
	background-image: url(images/diag_pattern.png);
	background-repeat: repeat;
}
</style>';
	  echo '<link href="stylesheet.css" rel="stylesheet" type="text/css">';
	  echo '<div id="redirect_msg">Not So Fast! You need to Register or Sign In to view this page! </div>';
	  echo '<div id="redirect_submsg">You will be redirected to the Log In page in 5 seconds</div>';
	  exit(); // Quit the script.
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="Manage your current adverts with Student Book Depot">
<meta name="keywords" content="Ireland,university,student,used books, second-hand">
<meta name="author" content="Noreen Lenihan">
<title>Manage Your Adverts</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image: url(images/lightpaperfibers.png);
}
</style>
</head>

<body>
<div class="wrapper">
<div class="headliner">Student Book Depot</div>
<div class="header">Manage Your Adverts</div>
<div class="navbar">
<p></p>
  	<ul>
  	<li><div class="navbars"><a href="index.html">Home</a></div></li>
   	<li><div class="navbars"><a href="About_Us.html">About Us</a></div></li>
  	<li><div class="navbars"><a href="Find_Your_Booklist.php">Find Your Booklist</a></div></li>
  	<li><div class="navbars"><a href="sell_books.php">Sell Your Books</a></div></li>
  	<li><div class="navbars"><a href="manage_ads.php">Manage Your Ads</a></div></li>
  	<li><div class="navbars"><a href="Contact_Us.html">Contact Us</a></div></li>
    <li><div class="navbars"><a href="logout.php">Log Out</a></div></li>
  	 </ul>
</div>
<div class="mainarea_search"><span id="bookstack"><img src="images/three_books.jpg" width="640" height="239" alt="bookstack"></span>
</div>
<div class="advertlisting">

<h1>Your adverts:</h1>

<?php
/* Open a MySQL connection */

$link = new mysqli('localhost', 'noreen', 'porkchops411', 'regform');
if(!$link) {
die('Connection failed: ' . $link->error());
}
/* Create and execute a MySQL query*/

$advertiser = $_SESSION['user'];
/*echo $advertiser;*/
$sql = "SELECT bookId, bookTitle, bookAuthor, subjectArea, university, isbn, format, price, delivery, phone, email, comments, advertiser, availability FROM book_list WHERE email= '$advertiser'";

if($stmt = $link->prepare($sql))
{
$stmt->execute();
$stmt->bind_result($bookId, $bookTitle, $bookAuthor, $subjectArea, $university, $isbn, $format, $price, $delivery, $phone, $email, $comments, $advertiser, $availability);


/* store result */
	
   	$stmt->store_result(); //required to get num_rows
   	printf("Your search returned : %d records <br/>", $stmt->num_rows);
   	echo "<br />";
   	echo "</div>";
	echo "<table><th>Book Title</th><th>Book Author</th><th>Subject</th><th>University</th><th>ISBN</th><th>Format</th><th>Price</th><th>Edit Advert</th><th>Close Advert</th>";
/* fetch values */
while ($stmt->fetch()) {

echo "<tr><td>"  . $bookTitle . "</td><td>" . $bookAuthor . "</td>";

echo "<td>". $subjectArea . "</td><td>" . $university . "</td><td>" . $isbn . "</td><td>" . $format . "</td><td>" .$price . "</td><td><a href='edit_adverts.php?id=" . $bookId . "'>Edit Ad</a></td><td><a href='delete_adverts.php?id=" . $bookId . "'>Close Ad</a></td></tr>";


}	
echo "</table>";
//close the crecordset
$stmt->close();
}

$link->close();
?>


</div>
</body>
</html>