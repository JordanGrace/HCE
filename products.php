<?php 
session_start();
//brings code from a include file
include('includes/function_con.inc');
//runs the function inside the include
//creates a value for the id
$sortTie = 'id';

if(isset($_GET['sortby'])){
	$sortTie=$_GET['sortby'];}
	//makes the page go in the order by whatever the variable is set to
$results = connect_to_query('SELECT * FROM ties_table ORDER BY '.$sortTie);

if(isset($_GET['spColor'])){
	$sColor=$_GET['spColor'];
	$results = connect_to_query("SELECT * FROM ties_table WHERE color = '$sColor' ORDER BY $sortTie");}
	
if(isset($_GET['spStyle'])){
	$sStyle=$_GET['spStyle'];
	$results = connect_to_query("SELECT * FROM ties_table WHERE style = '$sStyle' ORDER BY $sortTie");}
	
	
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
<link rel="stylesheet" type="text/css" href="css/styleAccordian.css" />
<noscript>
			<style>
				.st-accordion ul li{
					height:auto;
				}
				.st-accordion ul li > a span{
					visibility:hidden;
				}
			</style>
</noscript>
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
		<a href="products.php" class="clicked">Products</a><span class="sep"></span>
        		<?php if(isset($_SESSION['privilege'])){
		if($_SESSION['privilege']=='admin'){
		echo '<a href="messages.php">Messages</a><span class="sep"></span>';}}
		else{echo '<a href="contact.php">Contact Us</a><span class="sep"></span>';} ?>
        <a href="myCart.php">My Cart <?php echo "( <span id='cartNum'>$tieNumber</span> )"; ?></a>
		</div><!--Closes Nav--> 
	</div><!--Closes Header--> 
</div><!--Closes WrapperHeader-->

<div id="wrapper">
<div id="subNav">
<div id="st-accordion" class="st-accordion">
                    <ul>
                        <li>
                            <a href="#">Sorting<span class="st-arrow">Open or Close</span></a>
                            <div class="st-content">
								<ul>
									<li><a href="products.php?sortby=price">Sort by Price</a></li>
									<li><a href="products.php?sortby=style">Sort by Style</a></li>
                                	<li><a href="products.php?sortby=color">Sort by Color</a></li>
								</ul>
                            </div>
                        </li>
						<li>
                            <a href="#">Specific Style<span class="st-arrow">Open or Close</span></a>
                            <div class="st-content">
								<ul>
                                	<li><a href="products.php?spStyle=colored">Colored</a></li>
									<li><a href="products.php?spStyle=striped">Striped</a></li>
									<li><a href="products.php?spStyle=patterned">Patterned</a></li>
									<li><a href="products.php?spStyle=plaid">Plaid</a></li>
								</ul>
                            </div>
                        </li>
						<li>
                            <a href="#">Specific Color<span class="st-arrow">Open or Close</span></a>
                            <div class="st-content">
								<ul>
                                	<li><a href="products.php?spColor=red">Red</a></li>
									<li><a href="products.php?spColor=blue">Blue</a></li>
									<li><a href="products.php?spColor=green">Green</a></li>
									<li><a href="products.php?spColor=purple">Purple</a></li>
									<li><a href="products.php?spColor=brown">Brown</a></li>
									<li><a href="products.php?spColor=orange">Orange</a></li>
									<li><a href="products.php?spColor=silver">Silver</a></li>
									<li><a href="products.php?spColor=white">White</a></li>
									<li><a href="products.php?spColor=black">Black</a></li>
									<li><a href="products.php?spColor=pink">Pink</a></li>
									<li><a href="products.php?spColor=gray">Gray</a></li>
									<li><a href="products.php?spColor=yellow">Yellow</a></li>
								</ul>
                            </div>
                        </li>
                    </ul>
                </div>
</div><!--Closes SubNav-->
<div id="special"></div><!--Closes Special-->
<div id="content">
	
<?php
//this while loop does what's in {} for each row retrieve by the query, stopping when it runs out of rows
	while($row = mysql_fetch_array($results)){
		//store name columns calue in a variable
		$tName = $row['name'];
		$tPrice = $row['price'];
		$tThumb = $row['thumbnail'];
		$cid = $row['id'];
		//display the variable amid HTML

	echo"
	<div class='itemContainer'>
		<div class='item itemMove'> 
			<img src = 'thumbnails/$tThumb' />
			<div class='mask'>
				<h2>$tName</h2>
				<p>$$tPrice</p>
				<div class='detailBtn'>
				<form action='process/detail_process.php' enctype='multipart/form-data' method='post'>
				<input type='hidden' name='chosen_id' value='$cid'>
				<input type='submit' class='info' value='Click for Details'/>
				</form>

<form  class='ajaxform'>
<input type='hidden' name='tieName' value='$tName'>
<input type='hidden' name='tiePrice' value='$tPrice'>
<input type='hidden' name='tieQuantity' value='1'>
<input type='submit' class='info' id='saveBtn' value='Add to Cart'>
</form>			</div>
			</div>
		</div>
	</div>";
}//end of WHILE loop
?>
</div><!--Closes Content--> 
</div><!--Closes Wrapper-->
<div id="footer">
<div id="footerInfo">
    <p>Copyright © 2012 Jordan Grace Web Developer  -  </p>
    <?php if(isset($_SESSION['privilege'])){
		if($_SESSION['privilege']=='admin'){
		echo '<a href="process/logout_process.php">Admin Logout</a>';}}
		else{echo '<a href="adminLog.php">Admin Login</a>';} 
		?>
  </div><!--Closes FooterInfo-->
</div><!--Closes Footer-->
		<script type="text/javascript" src="js/jquery.accordion.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {
				$('#st-accordion').accordion();
            });
        </script>
</body>
</html>