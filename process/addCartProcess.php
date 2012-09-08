<?php
session_start();
$newTie = $_GET['tieName'];
$newPrice = $_GET['tiePrice'];
$newQuantity = $_GET['tieQuantity'];
$newId = $_GET['tieId'];
$testNum = 0;
	
if(isset($_SESSION['cartName']) && isset($_SESSION['cartPrice'])){
	for($i = 0; $i < count($_SESSION['cartName']); $i++){
		if($newId === $_SESSION['id'][$i]){
			$_SESSION['quantity'][$i] = $_SESSION['quantity'][$i] + 1;
		}else{$testNum += 1;}
	}
	
	
if($testNum === count($_SESSION['cartName'])){
	array_push($_SESSION['cartName'], $newTie);
	array_push($_SESSION['cartPrice'], $newPrice);
	array_push($_SESSION['quantity'], $newQuantity);
	array_push($_SESSION['id'], $newId);
	array_push($_SESSION['itemId'], count($_SESSION['cartName']) - 1);}
}
else{
	$_SESSION['cartName'] = array($newTie);
	$_SESSION['cartPrice'] = array($newPrice);
	$_SESSION['quantity'] = array($newQuantity);
	$_SESSION['id'] = array($newId);
	$_SESSION['itemId'] = array(count($_SESSION['cartName']) - 1);
}
?>