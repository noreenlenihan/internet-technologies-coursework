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
$sql="delete from book_list where bookId='$id'";
$result = mysqli_query($link, $sql);
if($result)
{
header('Location: /manage_ads.php');
}
else{
	echo "Unsuccessful attempt";
}
}
?>