<?php 
session_start();
//brings code from a include file
include('includes/function_con.inc');

$tieNumber = 0;

if(isset($_SESSION['cartName'])){
	for($i = 0; $i < count($_SESSION['cartName']); $i++){
		$tieNumber += $_SESSION['quantity'][$i];
	}
}else{$tieNumber = 0;}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>High Class Emporium</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="fonts/familiar-pro-fontfacekit/stylesheet.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="js/script.js"></script>
</head>

<body>
<div id="wrapperHeader">
	<div id="header">
		<div id="logo"></div><!--Closes Logo-->
		<div id="nav">
		<a href="index.php">Home</a><span class="sep"></span>
		<a href="products.php" >Products</a><span class="sep"></span>
        <a href="contact.php" class="clicked">Contact Us</a><span class="sep"></span>
        <a href="myCart.php">My Cart <?php echo "( <span id='cartNum'>$tieNumber</span> )"; ?></a>
		</div><!--Closes Nav--> 
	</div><!--Closes Header--> 
</div><!--Closes WrapperHeader-->

<div id="wrapper">
<div id="contact">
<legend>Send Us Some Feedback</legend>
<form action="process/article_process.php" name="contactForm" method="post" enctype="multipart/form-data" class="contact_form" onSubmit="return validateForm()">
<label for="fNameBox">First Name<a class="redStar">*</a></label>
<p><input id="fNameBox" type="text" name="newFName"/></p>

<label for="lNameBox">Last Name<a class="redStar">*</a></label>
<p><input id="lNameBox" type="text" name="newLName"/></p>

<label for="uEmail">Email Address<a class="redStar">*</a></label>
<p><input id="uEmail" type="text" name="newEmail"/></p>

<label for="uNumber">Phone Number</label>
<p><input id="uNumber" type="text" name="newNumber"/></p>

<label for="uMessage">Message<a class="redStar">*</a></label>
<p><textarea id="uMessage" name="newMessage"></textarea></p>

<input type="submit" value="Submit"/>
</form>
</div><!--Closes Contact--> 
</div><!--Closes Wrapper-->
<div id="footer">
 <div id="footerInfo">
    <p>Copyright © 2012 Jordan Grace Web Developer  -  </p>
    <?php if(isset($_SESSION['privilege'])){
		if($_SESSION['privilege']=='admin'){
		echo '<a href="process/logout_process.php">Admin Logout</a>';}}
		else{echo '<a href="adminLog.php">Admin Login</a>';} ?>
  </div><!--Closes FooterInfo-->
</div><!--Closes Footer-->
</body>
</html>