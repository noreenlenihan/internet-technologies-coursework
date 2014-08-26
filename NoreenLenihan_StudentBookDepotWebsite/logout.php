<?php 
session_start();
session_destroy();
?>

<html>
<head>
<meta charset="utf-8">
<title>Logged Out</title>
<style type="text/css">
body {
	background-image: url(images/stardust.png);
	background-repeat: repeat;
}
</style>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="logout_msg">Successfully logged out. We miss you already!</div>
<div id="logout_submsg">Return to <a href="index.html">SBD Homepage</a></div>

</body>
</html>