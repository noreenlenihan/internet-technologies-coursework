<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="Register today with Ireland's Online University Student Second Hand Book Buy and Sell Forum">
<meta name="keywords" content="Ireland,university,student,used books, second-hand">
<meta name="author" content="Noreen Lenihan">
<title>Register</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image: url(images/fabric_plaid.png);
}
</style>
</head>
<body>
<div class="wrapper">
<div class="headliner">Student Book Depot</div>
<div class="header">Registration</div>
 <div class="navbar">
  	<ul>
  	<li><div class="navbars"><a href="index.html">Home</a></div></li>
   	<li><div class="navbars"><a href="About_Us.html">About Us</a></div></li>
  	<li><div class="navbars"><a href="Find_Your_Booklist.php">Find Your Booklist</a></div></li>
  	<li><div class="navbars"><a href="sell_books.php">Sell Your Books</a></div></li>
  	<li><div class="navbars"><a href="manage_ads.php">Manage Your Ads</a></div></li>
  	<li><div class="navbars"><a href="Contact_Us.html">Contact Us</a></div></li>
  	 </ul>
 
	</div>
	
<div class="mainarea">
<div class="maintext">
<?php

$connection = new mysqli('localhost', 'noreen', 'porkchops411', 'regform');



if(!$connection){
	die('Could not connect: ' . $connection->error());
}

//echo 'Connected successfully';
echo '<p>';

$value1 = $_POST['fname'];
$value2 = $_POST['lname'];
$value3 = $_POST['college'];
$value4 = $_POST['email'];
$value5 = $_POST['email_con'];
$value6 = $_POST['phone'];
$value7 = $_POST['pass1'];
$value8 = $_POST['pass2'];

if (empty($value1)){
	print "You must enter a first name.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

if (empty($value2)){
	print "You must enter a surname.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

if (empty($value3)){
	print "You must enter a university.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

if (empty($value4)){
	print "You must enter an e-mail.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

if (empty($value5)){
	print "You must confirm your e-mail.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

if ( strcmp ( $value4, $value5) != 0  ){
  	print "These e-mails do not match.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}


if (empty($value6)){
	print "You must enter a phone number.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
} 
else{
	if (!is_numeric($value6)){
		print "Phone number must be numeric.";
		print "<br /> Go back and try again.";
		print "</body></html>";
		exit;
	}
	else{
		$length_phone = strlen($value6);
		
		if ($length_phone != 10){
			print "Your mobile phone number must be exactly 10 digits.";
			print "<br /> Go back and try again.";
			print "</body></html>";
			exit;
		}
	}
}

if (empty($value7)){
	print "You must enter a password.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

$length_passwd = strlen($value7);

if ($length_passwd < 8){
			print "Your password is too weak. It must be at least 8 digits/characters long.";
			print "<br /> Go back and try again.";
			print "</body></html>";
			exit;
}

if (empty($value8)){
	print "You must confirm your password";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

if ( strcmp ( $value7, $value8) != 0  ){
  	print "The password and password confirmation provided do not match.";
	print "<br />Go back and try again.";
	print "</body></html>";
	exit;
}

$encrypted_pass1=md5($value7);
$encrypted_pass2=md5($value8);

$sql = $connection->prepare("INSERT INTO reg_details(fname, lname, college, email, email_con, phone, password, password_con) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$sql->bind_param('sssssiss', $value1, $value2, $value3, $value4, $value5, $value6, $encrypted_pass1, $encrypted_pass2);
$sql->execute();
echo '</p>';
echo "Congratulations, $value1! You have successfully registered!";
echo "<br />";
echo '<br />You can now <a href="/sell_books.php">place adverts</a> or <a href="/Find_Your_Booklist.php">find your book wishlist</a>!';
$sql->close();


?>
</div>
</div>
</div>
</body>
</html>