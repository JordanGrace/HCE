<?php
session_start();
$delArray = $_GET['arrayNum'];

if (($key = array_search($delArray, $_SESSION['itemId'])) !== false) {
	array_splice($_SESSION['cartName'], $key, 1);
	array_splice($_SESSION['cartPrice'], $key, 1);
	array_splice($_SESSION['quantity'], $key, 1);
	array_splice($_SESSION['id'], $key, 1);
	array_splice($_SESSION['itemId'], $key, 1);
}

for($i = 0; $i < count($_SESSION['cartName']); $i++){
	$_SESSION['itemId'][$i] = $i;
}

header('Location:../myCart.php');
?>