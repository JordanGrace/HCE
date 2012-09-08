<?php
function connect_to_query($q){
	
//connects to the server with the server name and username
$handle = mysql_connect('localhost', 'root');

//creates a if statement where if it can not connect it will show this message
if($handle == false){
	die('No Server connect!'.mysql_error());
}

//connects to the database
$db = mysql_select_db('jordangr_highClassData') or die ('Connection Failed'.mysql_error());

//runs the query
$results = mysql_query($q) or die ('Problem with Querry'.mysql_error());

//closes the connection
mysql_close($handle);

//sends back the ressults to where the function was called
return $results;

}//ends the function
?>