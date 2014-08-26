<!doctype html>
<html>
<head>
<meta charset="utf-8">
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
<div class="header">Book Search Results</div>
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
	$university = $_POST['university']; 
	
	if (isset($_POST['biology']))
	{
		$item1 = $_POST['biology'];
	} else {
		$item1 = "";
	}
	
	if (isset($_POST['chemistry']))
	{
		$item2 = $_POST['chemistry'];
	} else {
		$item2 = "";
	}
	
	if (isset($_POST['economics']))
	{
		$item3 = $_POST['economics'];
	} else {
		$item3 = "";
	}
	
	if (isset($_POST['english']))
	{
		$item4 = $_POST['english'];
	} else {
		$item4 = "";
	}
	
	if (isset($_POST['french']))
	{
		$item5 = $_POST['french'];
	} else {
		$item5 = "";
	}
	
	if (isset($_POST['geography']))
	{
		$item6 = $_POST['geography'];
	} else {
		$item6 = "";
	}
	
	if (isset($_POST['irish']))
	{
		$item7 = $_POST['irish'];
	} else {
		$item7 = "";
	}
	
	if (isset($_POST['medicine']))
	{
		$item8 = $_POST['medicine'];
	} else {
		$item8 = "";
	}
	
	if (isset($_POST['physiotherapy']))
	{
		$item9 = $_POST['physiotherapy'];
	} else {
		$item9 = "";
	}
	
	if (isset($_POST['psychology']))
	{
		$item10 = $_POST['psychology'];
	} else {
		$item10 = "";
	}
	
	print "<p>Results for materials related to ";
	print "$item1 $item2 $item3 $item4 $item5 $item6 $item7 $item8 $item9 $item10 on the campus of $university are: </p>";
	





/* Open a MySQL connection */
$link = new mysqli('localhost', 'noreen', 'porkchops411', 'regform');
if(!$link) {
die('Connection failed: ' . $link->error());
}
/* Create and execute a MySQL query*/


$sql = "SELECT bookId, bookTitle, bookAuthor, subjectArea, university, isbn, format, price, delivery, phone, email, comments, advertiser, availability FROM book_list WHERE university=? AND (subjectArea=? OR subjectArea=? OR subjectArea=? OR subjectArea=? OR subjectArea=? OR subjectArea=? OR subjectArea=? OR subjectArea=? OR subjectArea=? OR subjectArea=?)";
if($stmt = $link->prepare($sql))
{
$stmt->bind_param('sssssssssss', $_POST['university'], $_POST['biology'] ,$_POST['chemistry'], $_POST['economics'], $_POST['english'], $_POST['french'], $_POST['geography'], $_POST['irish'], $_POST['medicine'], $_POST['physiotherapy'], $_POST['psychology']);
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
echo "</table>";	
//close the crecordset
$stmt->close();
}
$link->close();
?>
</div>
</div>
</body>
</html>