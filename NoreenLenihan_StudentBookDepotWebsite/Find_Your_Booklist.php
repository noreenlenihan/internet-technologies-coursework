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
	  echo '<div id="redirect_msg">Not so fast! You need to Register or Sign In to view this page! </div>';
	  echo '<div id="redirect_submsg">You will be redirected to the Log In page in 5 seconds</div>';
	  exit(); // Quit the script.
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="Find your semester book list now and source books cheaply and quickly from students on your campus">
<meta name="keywords" content="Ireland,university,student,used books, second-hand">
<meta name="author" content="Noreen Lenihan">
<title>Find Your Booklist</title>
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
<div class="header">Find Your Booklist</div>
 <p><div id="caption">Get your books for college in just a few clicks.</div></p>

<?php include("navbar.php"); ?>

<div class="mainarea_search">
	<h2>Quick Search</h2>
    <p>Perform a quick and dirty search using book title, author or subject as keywords!</p>
    <div class="quicksearch">
    <form method="post" action="quicksearch.php">
    	<input type= "text" name="search" placeholder="Enter keyword" width="300px" />
        <input type="submit" value="Search keywords" />
    
    
    </form>
    </div>
	<h2>Advanced Search</h2>
     <p>Search for books by filtering by university and subject area.</p>
     <form method="post" action="find_books.php">
     
     <p>Choose University:<br />
     <select name="university" size="1">
     	<option value="ucd">UCD</option>
        <option value="ucc">UCC</option>
        <option value="tcd">TCD</option>
        <option value="ul">UL</option>
        <option value="nuig">NUIG</option>
       </select>
     </p>
     
     <p>Choose Subject Area:<br />
     <input type= "checkbox" name = "biology" value = "biology"> Biology<br />
     <input type= "checkbox" name = "chemistry" value = "chemistry"> Chemistry<br />
     <input type= "checkbox" name = "economics" value = "economics"> Economics<br />
     <input type= "checkbox" name = "english" value = "english"> English<br />
     <input type= "checkbox" name = "french" value = "french"> French<br />
     <input type= "checkbox" name = "geography" value = "geography"> Geography<br />
     <input type= "checkbox" name = "irish" value = "irish"> Irish<br />
     <input type= "checkbox" name = "medicine" value = "medicine"> Medicine<br />
     <input type= "checkbox" name = "physiotherapy" value = "physiotherapy"> Physiotherapy<br />
     <input type= "checkbox" name = "psychology" value = "psychology"> Psychology<br />
     </p>
     
     <p>
     <input type="submit" value="Find Books">
     </p>
     </form>
</div>
<div class="adbar"><img src="images/despair.jpg" width="330" height="259" alt="studying is fun!"></div>
</div>
</body>
</html>