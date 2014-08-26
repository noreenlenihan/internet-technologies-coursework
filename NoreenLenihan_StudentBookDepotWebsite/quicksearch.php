<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="Find your books for the college semester today by using Student Book Depot's quick search">
<meta name="keywords" content="Ireland,university,student,used books, second-hand">
<meta name="author" content="Noreen Lenihan">
<title>Booklist Results</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image: url(images/linedpaper.png);
}
</style>
</head>

<body>
<div class="wrapper">
<div class="headliner">Student Book Depot</div>
<div class="header">Quick Search Results</div>
 <p><div id="caption">Get your books for college in just a few clicks.</div></p>
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
  	 </ul></div>
<div class="mainarea_search">

<h3>Book Search Results</h3>

<?php
/* Open a MySQL connection */
$link = new mysqli('localhost', 'noreen', 'porkchops411', 'regform');
if(!$link) {
die('Connection failed: ' . $link->error());
}
/* Create and execute a MySQL query*/

$keyword = $_POST['search'];

$result = "SELECT bookId, bookTitle, bookAuthor, subjectArea, university, isbn, format, price, delivery, phone, email, comments, advertiser, availability FROM book_list WHERE (bookTitle LIKE '%$keyword%' OR bookAuthor LIKE '%$keyword%' OR subjectArea LIKE '%$keyword%')";
if($stmt = $link->prepare($result))
{
//$stmt->bind_param('s', $_POST['search'], $_POST['search']);
$stmt->execute();
$stmt->bind_result($bookId, $bookTitle, $bookAuthor, $subjectArea, $university, $isbn, $format, $price, $delivery, $phone, $email, $comments, $advertiser, $availability);


/* store result */
   	$stmt->store_result(); //required to get num_rows
   	printf("Your search returned : %d records <br/>", $stmt->num_rows);
   	echo "<br />";
	echo '<table width="70%"><th>Book ID</th><th>Book Title</th><th>Author</th><th>ISBN</th><th>Format</th><th>Price</th><th>Delivery</th><th>Phone</th><th>Email</th><th>Comments</th>';

/* fetch values */
while ($stmt->fetch()) {
echo "<tr><td>"  . $bookId . "</td><td>" . $bookTitle . "</td>";

echo "<td>". $bookAuthor. "</td><td>" . $isbn. "</td><td>" . $format . "</td><td>" . $price. "</td><td>" .$delivery. "</td><td>" . $phone. "</td><td>" . $email . "</td><td>" . $comments . "</td><td>";


}	
//close the crecordset
echo "</table>";
$stmt->close();
}
$link->close();


?>
</div>
</div>
</body>
</html>