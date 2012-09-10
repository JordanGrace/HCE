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
<meta charset="UTF-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<title>High Class Emporium</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link rel="icon" type="image/x-icon" href="images/favicon.ico" />
<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Economica:700,400italic' rel='stylesheet' type='text/css'>
		<noscript>
			<link rel="stylesheet" type="text/css" href="css/nojs.css" />
		</noscript>
</head>

<body>
<div id="wrapperHeader">
	<div id="header">
    	<div id="logo"></div><!--Closes Logo-->
		<div id="nav">
		<a href="index.php" class="clicked">Home</a><span class="sep"></span>
		<a href="products.php">Products</a><span class="sep"></span>
        
		<?php if(isset($_SESSION['privilege'])){
		if($_SESSION['privilege']=='admin'){
		echo '<a href="messages.php">Messages</a><span class="sep"></span>';}}
		else{echo '<a href="contact.php">Contact Us</a><span class="sep"></span>';} ?>
        <a href="myCart.php">My Cart <?php echo "( <span id='cartNum'>$tieNumber</span> )"; ?></a>
		</div><!--Closes Nav-->
    </div><!--Closes Header-->
</div><!--Closes WrapperHeader-->

			<div id="da-slider" class="da-slider">
				<div class="da-slide">
					<h2>New Career? or Just Graduated?</h2>
					<p>Check out the deals we have this month on ties just for your new career.</p>
					
					<div class="da-img"><img src="images/man.png" alt="image01" /></div>
				</div>
				<div class="da-slide">
					<h2>Looking for some ties that fit your style?</h2>
					<p>Check out the different styles of ties in store for you!</p>
					
					<div class="da-img"><img src="images/tie.png" alt="image01" /></div>
				</div>
				<div class="da-slide">
					<h2>Need new Ties?</h2>
					<p>You came just in time for the Holiday Sale...20% off all new Ties!</p>
					
					<div class="da-img"><img src="images/redTie.png" alt="image01" /></div>
				</div>
				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>
			</div>
        </div>

<div id="wrapper">
    <div id="itemArea">
    	<div class="item2 adItem">
         <img src="images/present.jpg" />
                    <div class="mask">
                        <h2>Father's Day Weekend</h2>
                        <p></p>
                        <a href="products.php" class="info">See More</a>
                    </div>
        </div><!--Closes Item1-->
    	<div class="item2 adItem">
         <img src="images/shirt.jpg" />
                    <div class="mask">
                        <h2>Grad Sell</h2>
                        <p></p>
                        <a href="products.php" class="info">See More</a>
                    </div>
        </div><!--Closes Item1-->
	    	<div class="item2 adItem">
         <img src="images/ties.jpg" />
                    <div class="mask">
                        <h2>Need More Ties?</h2>
                        <p></p>
                        <a href="products.php" class="info">See More</a>
                    </div>
        </div><!--Closes Item1-->
	    	<div class="item2 adItem">
         <img src="images/man.jpg" />
                    <div class="mask">
                        <h2>Just got a job?</h2>
                        <p></p>
                        <a href="products.php" class="info">See More</a>
                    </div>
        </div><!--Closes Item1-->
    </div><!--Closes ItemArea-->
	
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
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.cslider.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#da-slider').cslider({
					autoplay	: true,
					bgincrement	: 450
				});
			});
		</script>	
</body>
</html>