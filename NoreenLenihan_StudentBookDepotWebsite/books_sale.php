<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Advert Submitted</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image: url(images/linedpaper.png);
}
</style>
</head>

<body>
<div class="wrapper">
<div class="header">Advert Submission</div>
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

<h3>Your advert has been submitted</h3>
<?php

$connection = new mysqli('localhost', 'noreen', 'porkchops411', 'regform');



if(!$connection){
	die('Could not connect: ' . $connection->error());
}

/*echo 'Connected successfully';*/
echo '<p>';

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

if (empty($title)){
	print "You must enter a book title.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

if (empty($subject)){
	print "You must enter a subject.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

if (empty($university)){
	print "You must enter a university.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

if (empty($author)){
	print "You must enter an author.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

if (empty($isbn)){
	print "You must enter an ISBN.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

if (empty($format)){
	print "You must enter a book format.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
} 
if (empty($price)){
	print "You must enter a selling price.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
} 
else{
	if (!is_numeric($price)){
		print "List price must be numeric.";
		print "<br /> Go back and try again.";
		print "</body></html>";
		exit;
	}
	
}

if (empty($delivery)){
	print "You must enter a delivery method.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
} 

if (empty($phone)){
	print "You must enter a contact number.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

if (empty($email)){
	print "You must enter an email.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}  



$sql = $connection->prepare("INSERT INTO book_list(bookTitle, bookAuthor, subjectArea, university, isbn, format, price, delivery, phone, email, comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql->bind_param('ssssisisiss', $title, $author, $subject, $university, $isbn, $format, $price, $delivery, $phone, $email, $comments);
$sql->execute();
echo '</p>';
//echo "Your advert has successfully been added to SBD's ad listings: ";
$sql->close();

?>

<table width="70%">
	
   		<th>Description</th>
        <th>Answers</th>
    
    
<?php

	print "<tr><td>Book title:</td><td>$title</td></tr>\n";
	print "<tr><td>Subject Area:</td><td>$subject</td></tr>\n";
	print "<tr><td>University:</td><td>$university</td></tr>\n";
	print "<tr><td>Book author:</td><td>$author</td></tr>\n";
	print "<tr><td>ISBN:</td><td>$isbn</td></tr>\n";
	print "<tr><td>Book format:</td><td>$format</td></tr>\n";
	print "<tr><td>List Price:</td><td>$price</td></tr>\n";
	print "<tr><td>Delivery method:</td><td>$delivery</td></tr>\n";
	print "<tr><td>Phone:</td><td>$phone</td></tr>\n";
	print "<tr><td>E-mail adress:</td><td>$email</td></tr>\n";
	print "<tr><td>Comments:</td><td>$comments</td></tr>\n";

?>
</table>
</div>
</div>
</body>
</html>