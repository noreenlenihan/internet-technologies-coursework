<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /user_login.php");
}
else{
	
	header("Location: /index.html");
	
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Successful Log In</title>
</head>

<body>


<p>Log in Successful</p>
</body>
</html>