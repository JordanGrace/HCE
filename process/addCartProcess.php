<?php
session_start();
$newTie = $_GET['tieName'];
$newPrice = $_GET['tiePrice'];
$newQuantity = $_GET['tieQuantity'];
	
if(isset($_SESSION['cartName']) && isset($_SESSION['cartPrice'])){
	array_push($_SESSION['cartName'], $newTie);
	array_push($_SESSION['cartPrice'], $newPrice);
	array_push($_SESSION['quantity'], $newQuantity);
}
else{
	$_SESSION['cartName'] = array($newTie);
	$_SESSION['cartPrice'] = array($newPrice);
	$_SESSION['quantity'] = array($newQuantity);
}


?>