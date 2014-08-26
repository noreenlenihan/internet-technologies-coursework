<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Message Sent</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image: url(images/subtle_stripes.png);
}
</style>
</head>

<body>
<div id="redirect_msg">Your message has been sent!</div>

<?php
$firstname = $_POST['firstname'];
$surname = $_POST['lastname'];
$subject = $_POST['subject'];
$sender = $_POST['email'];
$message = $_POST['message'];

$message = wordwrap($message, 70, "\r\n");
$headers = 'From: $sender' . "\r\n" .
    'Reply-To: $sender' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$full_msg = $message . "\n\n". $sender;
mail('noreen.lenihan@ucdconnect.ie', $subject, $full_msg);

echo '<div id="redirect_submsg">';
print "Thank your for getting in touch with us, $firstname.";
print "<p>We aim to get back to you within 24-48 hours hours. Sit tight!</p>";
echo '</div>';

echo '<div id="contact_box">';
print "<textarea name='message' cols='50' rows='10' disabled='disabled' class='textdisabled'>";
print $full_msg;
print "</textarea>";
echo '</div>';

?>
</body>
</html>