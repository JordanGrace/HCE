<?php 
session_start();
//brings code from a include file
include('includes/function_con.inc');

//make a var that represents the path to the XML data
$fileDir = "xml/";
//open a connection to the folder full of XML files
$handle = opendir($fileDir);
if(isset($_SESSION['cartName'])){$tieNumber = count($_SESSION['cartName']);}else{$tieNumber = 0;}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>High Class Emporium</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="fonts/familiar-pro-fontfacekit/stylesheet.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>

<body>
<div id="wrapperHeader">
	<div id="header">
		<div id="logo"></div><!--Closes Logo-->
		<div id="nav">
		<a href="index.php">Home</a><span class="sep"></span>
		<a href="products.php" >Products</a><span class="sep"></span>
		<?php if(isset($_SESSION['privilege'])){
		if($_SESSION['privilege']=='admin'){
		echo '<a href="messages.php" class="clicked">Messages</a><span class="sep"></span>';}}
		else{echo '<a href="contact.php">Contact Us</a><span class="sep"></span>';} ?>
        <a href="myCart.php">My Cart <?php echo "( <span id='cartNum'>$tieNumber</span> )"; ?></a>
		</div><!--Closes Nav--> 
	</div><!--Closes Header--> 
</div><!--Closes WrapperHeader-->

<div id="wrapper">
<div id="messageWrap">
<legend>Contact Messages</legend>
<?php
//begin a loop to execute the same series of commands in {} to each XML file in the folder
while (($file = readdir($handle)) !==FALSE){
	//skip to the next item in the folder if $file is a folder
	if(is_dir($fileDir.$file))
	continue;
	//load the XML data from the current file into an array variable
	$articleFile = simplexml_load_file($fileDir.$file);
	//store each of the array's values (id, headline, body) in a different variable
	$f_name = $articleFile -> firstName;
	$l_name = $articleFile -> lastName;
	$eAddress = $articleFile -> emailAddress;
	$pNumber = $articleFile -> phoneNumber;
	$newMessage = $articleFile -> message;
	$newTime = $articleFile -> timeAdded;
	//$now -= $newTime;
	
			//create a pretty HTML structure, displaying the variables at the right points.
			echo "
				<div class='contactWrap'>
					<div class='infoSection'>$f_name $l_name</div>
					<div class='messageArea'>$newMessage<br><div class='timeSent'>$newTime</div></div>
					<div class='contactArea'><a href='mailto:$eAddress'>$eAddress</a></div>
				</div>
			";
	}//end of WHILE loop ?>


</div><!--Closes MessageWrap--> 
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