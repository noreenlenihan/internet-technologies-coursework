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
<meta name="description" content="Place adverts for old or used college books today and earn some cash">
<meta name="keywords" content="Ireland,university,student,used books, second-hand">
<meta name="author" content="Noreen Lenihan">
<title>Sell Your Books</title>
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
<div class="header">Sell Your Books</div>
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
<div class="form_sell">
<form method="post" action="books_sale.php" id="book_advert">

<p>
Book title*:<br />
<input type="text" name="title" size="30">
</p>

 <p>Subject Area*:<br />
     <select name="subject" size="1">
        <option value="biology">Biology</option>
        <option value="chemistry">Chemistry</option>
        <option value="economics">Economics</option>
        <option value="english">English</option>
        <option value="french">French</option>
        <option value="geography">Geography</option>
        <option value="irish">Irish</option>
        <option value="medicine">Medicine</option>
        <option value="physiotherapy">Physiotherapy</option>
        <option value="pscyhology">Psychology</option>
       </select>
     </p>
     
     <p>University to sell book at*:<br />
     <select name="university" size="1">
     	<option value="ucd">UCD</option>
        <option value="ucc">UCC</option>
        <option value="tcd">TCD</option>
        <option value="ul">UL</option>
        <option value="nuig">NUIG</option>
       </select>
     </p>
     
<p>
Book author*:<br />
<input type="text" name="author" size="30">
</p>

<p>
ISBN:<br />
<input type="text" name="isbn" size="30">
</p>

 <p>Book Format*:<br />
     <select name="format" size="1">
     	<option value="hardcover">Hardcover</option>
        <option value="paperback">Paperback</option>
        <option value="ebook">Ebook</option>
       </select>
     </p>
     
<p>
List Price*:<br />
<input type="text" name="price" size="10">
</p>

 <p>Preferred Delivery Method*:<br />
     <select name="delivery" size="1">
     	<option value="oncampus">On-Campus</option>
        <option value="mail">By Mail</option>
        <option value="selected_location">Selected Location</option>
       </select>
     </p>

<p>
Contact Number*:<br />
<input type="text" name="phone" size="20">
</p>

<p>
E-mail address*:<br />
<input type="email" name="email" size="20">
</p>

<textarea name="comments" cols="50" rows="10" form="book_advert">Comments</textarea>
    </p>
    <p>
    <input type="submit" value="Place Ad" />
    </p>

</form>
</div>
</div>
</div>
</body>
</html>