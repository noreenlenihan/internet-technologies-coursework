<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="Contact the Student Book Depot today to get in touch">
<meta name="keywords" content="Ireland,university,student,used books, second-hand">
<meta name="author" content="Noreen Lenihan">
<title>Contact Us</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image: url(images/subtle_stripes.png);
}
</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50785525-1', 'studentbookdepot.org');
  ga('send', 'pageview');

</script>
</head>

<body>
<?php include_once("analyticstracking.php") ?>
<div class="wrapper">
	<div class="headliner">Student Book Depot</div>
	<div class="header">Contact Us</div>
	
  <?php include("navbar.php"); ?>
	
	
    <div id="formarea">
  <form method="post" action="contact_form.php" id="contactusform">
    <p>
    What's your first name?<br />
    <input type="text" name="firstname" size="30" />
    </p>
    <p>
    What's your last name?<br />
    <input type="text" name="lastname" size="30" />
    </p>
    <p>
    Whats the subject of your query?<br />
    <input type="text" name="subject" size="30" />
    </p>
    <p>
    Please confirm your E-mail address: <br />
    <input type="email" name="email" size="30" />
    </p>
    <p>
    <textarea name="message" cols="50" rows="10" form="contactusform">Enter your message here</textarea>
    </p>
    <p>
    <input type="submit" value="Submit message" />
    </p>
  </form>
  </div>
    
    
</div>
</body>
</html>