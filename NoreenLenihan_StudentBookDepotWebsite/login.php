<?php 
ob_start();
session_start(); 

error_reporting(E_ALL);

if (isset($_POST['username']))
{
	$userid = $_POST['username'];
} else {
	$userid = '';
}

if (isset($_POST['password']))
{
	$password = $_POST['password'];
	$encrypted_password=md5($password);
} else {
	$password = '';
}



/* Open a MySQL connection */
$link = mysqli_connect('localhost', 'noreen', 'porkchops411', 'regform');
if(!$link) {
/*die('Connection failed: ' . $link->error());*/
}
/* Create and execute a MySQL query*/

$sql_statement  = "SELECT email ";
$sql_statement .= "FROM reg_details ";
$sql_statement .= "WHERE email = '".$userid."' ";
$sql_statement .= "AND password = '".$encrypted_password."' ";



$result = mysqli_query($link, $sql_statement);


$myrowcount = 0;

if (!$result) {
	echo "<p style='color: red;'>MySQL No: ".mysqli_errno($link)."<br>";
	echo "MySQL Error: ".mysqli_error($link)."<br>";
	echo "<br>SQL: ".$sql_statement."<br>";
} else {

	$numresults = mysqli_num_rows($result);

	if ($numresults == 0)
	{
		header("Refresh: 5; url=user_login.php");
		echo '<style type="text/css">
		body {
		background-image: url(images/diag_pattern.png);
		background-repeat: repeat;
		}
		</style>';
	  	echo '<link href="stylesheet.css" rel="stylesheet" type="text/css">';
		echo '<div id="redirect_msg">Invalid Login</div>';
		echo '<div id="redirect_submsg">You will be redirected back to Log In to try again in 5 seconds...</div>';
	} 
	
	if ($numresults == 1){
		
		$_SESSION['user'] = $userid;
		$_SESSION['password'] = $encrypted_password;
		
		/*echo 'the value of session variable is'.$_SESSION['user'];
		print "Well done on logging in!";*/
		header("Location: http://studentbookdepot.org/login_success.php");
		exit();
	}
}

$link->close();
ob_end_flush();
?>