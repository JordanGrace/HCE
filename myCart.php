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
		<legend>My Cart</legend>
        <div id="cart">
        
        
			<?php 
			
            if(isset($_SESSION['cartName'])){
				if(count($_SESSION['cartName']) === 0){ echo "<div class='cartItems'><p class='noItem'>You have no Items in your Cart</p></div>";}
                for($i = 0; $i < count($_SESSION['cartName']); $i++){
                    echo "<div class='cartItems'><div class='cName'>".$_SESSION['cartName'][$i]."</div><div class='cPrice'>$".$_SESSION['cartPrice'][$i]."</div><div class='cQuantity'>Quantity: <input type='text' maxlength='2' value=".$_SESSION['quantity'][$i]."></div><form action='process/deleteCartProcess.php' class='ajaxDel'><input name='arrayNum' type='hidden' value='".$_SESSION['itemId'][$i]."'/><input class='delete' type='submit' value='X'/></form></div>";
                }
            }
			else{ echo "<div class='cartItems'><p class='noItem'>You have no Items in your Cart</p></div>";}
            ?></br>
            <form action="checkout.php" method="post" enctype="multipart/form-data" class="cart_form">
            <input type="submit" value="Checkout"/>
            </form>
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