<?php
//starts the session
session_start();
//brings code from a include file
include('includes/function_con.inc');
//runs the function inside the include
//connects to the sql file and from what chosen_id is it decides on what info is shown from the WHERE statement
$results = connect_to_query('SELECT * FROM ties_table WHERE id ='.$_SESSION['tie']);
//make a var that represents the path to the XML data



//this while loop does what's in {} for each row retrieve by the query, stopping when it runs out of rows
	while($row = mysql_fetch_array($results)){
		//store name columns value in a variable
		$tName = $row['name'];
		$tPrice = $row['price'];
		$tLarge = $row['large'];
		$tDescription = $row['description'];
		$cid = $row['id'];
		
		if(isset($_SESSION['cartName'])){$tieNumber = count($_SESSION['cartName']);}else{$tieNumber = 0;}
?>
<!DOCTYPE HTML>
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
		<a href="products.php" class="clicked">Products</a><span class="sep"></span>
        		<?php if(isset($_SESSION['privilege'])){
		if($_SESSION['privilege']=='admin'){
		echo '<a href="messages.php">Messages</a><span class="sep"></span>';}}
		else{echo '<a href="contact.php">Contact Us</a><span class="sep"></span>';} ?>
        <a href="myCart.php">My Cart <?php echo "( <span id='cartNum'>$tieNumber</span> )"; ?></a>
        </div><!--Closes Nav-->
    </div><!--Closes Header-->
</div><!--Closes WrapperHeader-->
<div id='wrapper'>
<div id='detailItem'>
<?php
echo" 
<legend>$tName</legend>
<div id='detailImage'><img src='large/$tLarge'/></div>
<p id='price'>$$tPrice</p>
<hr>
<p id='desc'>$tDescription</p>
<form  class='ajaxform detail_form' action='process/addCartProcess.php'>
<input type='hidden' name='tieName' value='$tName'>
<input type='hidden' name='tiePrice' value='$tPrice'>
<input type='hidden' name='tieQuantity' value='1'>
<input type='hidden' name='tieId' value='$cid'>
<input type='submit' class='info' id='saveBtn' value='Add to Cart'>
</form>"; }?>


</form>

</div><!--Closes DetailItem-->
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