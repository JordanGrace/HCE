<?php 
session_start();
//brings code from a include file
include('includes/function_con.inc');
$tieNumber = 0;
$totalPrice = 0.00;

if(isset($_SESSION['cartName'])){
	for($i = 0; $i < count($_SESSION['cartName']); $i++){
		$tieNumber += $_SESSION['quantity'][$i];
		$totalPrice += ($_SESSION['cartPrice'][$i] * $_SESSION['quantity'][$i]);
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
<script src="js/cart.js"></script>
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
		echo '<a href="messages.php">Messages</a><span class="sep"></span>';}}
		else{echo "<a href='contact.php'>Contact Us</a><span class='sep'></span>";} ?>
        <a href="myCart.php" class="clicked">My Cart <?php echo "( <span id='cartNum'>$tieNumber</span> )"; ?></a>
		</div><!--Closes Nav--> 
	</div><!--Closes Header--> 
</div><!--Closes WrapperHeader-->

<div id="wrapper">
	<div id="cartWrap">
		<legend>Thank You for Ordering</legend>
        <div id="cart">
			<p class="cartItems" style="text-align:center;">Your order has been Processed and you should receive it in 2 - 4 Business Days</p>
        </div>
	</div><!--Closes CartWrap--> 
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