<?php 
//starts the session
session_start();
//brings code from a include file
include('../includes/function_con.inc');
//runs the function inside the include
$tie_id = $_POST['chosen_id'];
$_SESSION['tie'] = $tie_id;
header('Location:../details.php');
?>