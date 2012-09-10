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
	<div id="checkWrap">
    	<div id="paypalCheck">
        	<legend>Paypal Checkout</legend>
        	<div id="paypalForm">
            <form action="#" name="contactForm" method="post" enctype="multipart/form-data" class="contact_form">
                <label for="uBox">Username</label>
                <p><input id="uBox" type="text" name="uBox"/></p>
                
                <label for="pBox">Password</label>
                <p><input id="pBox" type="password" name="pBox"/></p>
            
            <a href="process/checkoutProcess.php"><img src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif"  style=" width: 145px; margin: 0 auto; display: block; cursor:pointer; "></a>
            </form>
            </div>
        </div><!--Closes Paypal Checkout-->
        <div id="hceCheck">
        	<legend>HCE Checkout - <span id="typeCheck">Shipping</span> Info</legend>
            <div id="hceForm">
                <form action="process/checkoutProcess.php" name="contactForm" method="post" enctype="multipart/form-data" class="contact_form">
                    <div id="part1">
                        <label for="fNameBox">Full Name<a class="redStar">*</a></label>
                        <p><input id="fNameBox" type="text" name="fNameBox"/></p>
                        
                        <label for="uNumber">Phone Number<a class="redStar">*</a></label>
                        <p><input id="uNumber" type="text" name="uNumber"/></p>
                        
                         <label for="addressBox">Address<a class="redStar">*</a></label>
                        <p><input id="addressBox" type="text" name="addressBox"/></p>
                        
                         <label for="cityBox">City<a class="redStar">*</a></label>
                        <p><input id="cityBox" type="text" name="cityBox"/></p>
        
                         <label for="zipBox">ZipCode<a class="redStar">*</a></label>
                        <p><input id="zipBox" type="text" name="zipBox"/></p>
                        
                        <label for="state_picked">State<a class="redStar">*</a></label>
                        <p>
                            <select id="stateBox" name="state_picked">
                                <option value="">None
                                <option value="AL">Alabama
                                <option value="AK">Alaska
                                <option value="AZ">Arizona
                                <option value="AR">Arkansas
                                <option value="CA">California
                                <option value="CO">Colorado
                                <option value="CT">Connecticut
                                <option value="DE">Delaware
                                <option value="FL">Florida
                                <option value="GA">Georgia
                                <option value="HI">Hawaii
                                <option value="ID">Idaho
                                <option value="IL">Illinois
                                <option value="IN">Indiana
                                <option value="IA">Iowa
                                <option value="KS">Kansas
                                <option value="KY">Kentucky
                                <option value="LA">Louisiana
                                <option value="ME">Maine
                                <option value="MD">Maryland
                                <option value="MA">Massachusetts
                                <option value="MI">Michigan
                                <option value="MN">Minnesota
                                <option value="MS">Mississippi
                                <option value="MO">Missouri
                                <option value="MT">Montana
                                <option value="NE">Nebraska
                                <option value="NV">Nevada
                                <option value="NH">New Hampshire
                                <option value="NJ">New Jersey
                                <option value="NM">New Mexico
                                <option value="NY">New York
                                <option value="NC">North Carolina
                                <option value="ND">North Dakota
                                <option value="OH">Ohio
                                <option value="OK">Oklahoma
                                <option value="OR">Oregon
                                <option value="PA">Pennsylvania
                                <option value="RI">Rhode Island
                                <option value="SC">South Carolina
                                <option value="SD">South Dakota
                                <option value="TN">Tennessee
                                <option value="TX">Texas
                                <option value="UT">Utah
                                <option value="VT">Vermont
                                <option value="VA">Virginia
                                <option value="WA">Washington
                                <option value="DC">Washington D.C.
                                <option value="WV">West Virginia
                                <option value="WI">Wisconsin
                                <option value="WY">Wyoming
                            </SELECT>
                        </p>
                        <p><input id="sameInfo" type="checkbox" value="yes" /> Check if Billing Info is the same</p>
                        <input type="button" class="buttonStyle next" value="Continue"/>
					</div>
                    <div id="part2" style="display:none;">
                         <label for="fNameBox2">Full Name<a class="redStar">*</a></label>
                        <p><input id="fNameBox2" type="text" name="fNameBox2"/></p>
                        
                        <label for="uNumber2">Phone Number<a class="redStar">*</a></label>
                        <p><input id="uNumber2" type="text" name="uNumber2"/></p>
                        
                         <label for="addressBox2">Address<a class="redStar">*</a></label>
                        <p><input id="addressBox2" type="text" name="addressBox2"/></p>
                        
                         <label for="cityBox2">City<a class="redStar">*</a></label>
                        <p><input id="cityBox2" type="text" name="cityBox2"/></p>
        
                         <label for="zipBox2">ZipCode<a class="redStar">*</a></label>
                        <p><input id="zipBox2" type="text" name="zipBox2"/></p>
                        
                        <label for="state_picked2">State<a class="redStar">*</a></label>
                        <p>
                            <select id="stateBox2" name="state_picked2">
                                <option value="">None
                                <option value="AL">Alabama
                                <option value="AK">Alaska
                                <option value="AZ">Arizona
                                <option value="AR">Arkansas
                                <option value="CA">California
                                <option value="CO">Colorado
                                <option value="CT">Connecticut
                                <option value="DE">Delaware
                                <option value="FL">Florida
                                <option value="GA">Georgia
                                <option value="HI">Hawaii
                                <option value="ID">Idaho
                                <option value="IL">Illinois
                                <option value="IN">Indiana
                                <option value="IA">Iowa
                                <option value="KS">Kansas
                                <option value="KY">Kentucky
                                <option value="LA">Louisiana
                                <option value="ME">Maine
                                <option value="MD">Maryland
                                <option value="MA">Massachusetts
                                <option value="MI">Michigan
                                <option value="MN">Minnesota
                                <option value="MS">Mississippi
                                <option value="MO">Missouri
                                <option value="MT">Montana
                                <option value="NE">Nebraska
                                <option value="NV">Nevada
                                <option value="NH">New Hampshire
                                <option value="NJ">New Jersey
                                <option value="NM">New Mexico
                                <option value="NY">New York
                                <option value="NC">North Carolina
                                <option value="ND">North Dakota
                                <option value="OH">Ohio
                                <option value="OK">Oklahoma
                                <option value="OR">Oregon
                                <option value="PA">Pennsylvania
                                <option value="RI">Rhode Island
                                <option value="SC">South Carolina
                                <option value="SD">South Dakota
                                <option value="TN">Tennessee
                                <option value="TX">Texas
                                <option value="UT">Utah
                                <option value="VT">Vermont
                                <option value="VA">Virginia
                                <option value="WA">Washington
                                <option value="DC">Washington D.C.
                                <option value="WV">West Virginia
                                <option value="WI">Wisconsin
                                <option value="WY">Wyoming
                            </SELECT>
                        </p>
                        <input type="button" class="buttonStyle next" value="Continue"/>
                    </div><!--Closes Part2-->
                    <div id="part3" style="display:none;">
                    	<label for="cardType">Card Type<a class="redStar">*</a></label>
                        <p>	<span class="card" id="visa"></span>
                            <span class="card" id="master"></span>
                            <span class="card" id="american"></span>
                            <span class="card" id="discover"></span>
                       	</p>
                    
               		 	<label for="fNameCard">Name on Card<a class="redStar">*</a></label>
                        <p><input id="fNameCard" type="text" name="fNameCard"/></p>
                        
                        <label for="cardNum">Card Number<a class="redStar">*</a></label>
                        <p><input id="cardNum" type="text" name="cardNum"/></p>
                        
                      <label>Expiration date<a class="redStar">*</a></label>
                      <p><span id="expire">
                            <select id="month">
                              	<option value="01">01
                                <option value="02">02
                                <option value="03">03
                                <option value="04">04
                                <option value="05">05
                                <option value="06">06
                                <option value="07">07
                                <option value="08">08
                                <option value="09">09
                                <option value="10">10
                                <option value="11">11
                                <option value="12">12
          					</select>
                            <select id="year">
                        		<option value="2012">2012
                                <option value="2013">2013
                                <option value="2014">2014
                                <option value="2015">2015
                                <option value="2016">2016
                                <option value="2017">2017
                                <option value="2018">2018
                                <option value="2019">2019
                                <option value="2020">2020
                                <option value="2021">2021
                                <option value="2022">2022
                        	</select></span>
                      </p>  
                    <input type="submit" class="buttonStyle submit" value="CheckOut"/>
                    </div><!--Closes Part2-->
           		</form>
            </div><!--Closes Hce Form-->
        </div><!--Closes Hce Checkout-->
        
		
        
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