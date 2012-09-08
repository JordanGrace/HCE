<?php
//creates variables fo the the inputed text
$userName= $_POST['adminUser'];
$userPassword = $_POST['adminPass'];
//runs the include file
include('../includes/function_con.inc');
//connects to the query and searches the SQL file if the username and password exist
$results = connect_to_query('SELECT * FROM user_table WHERE username="'.$userName.'"AND password ="'.$userPassword.'"');
//if the username and password have been found it will save the privilege and username and redirect you to the product page
if($row = mysql_fetch_array($results)){
session_start();

if($row['privilege']=='customer'){
	header('Location:../adminLog.php?error=notAdmin');
		}
else{

$_SESSION['privilege']=$row['privilege'];
$_SESSION['username']=$row['username'];
header('Location:../index.php');}
//if the search was a failure redirect back to the login page
}else{
header('Location:../adminLog.php?error=loginFailed');
}
?>