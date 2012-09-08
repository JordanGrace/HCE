<?php
session_start();

//make a var that represents the path to the XML data
$fileDir = "../xml/";
//create a new document in PHP's 'mind':
$doc = new DOMDocument();
//make a root element 'article' floating in the document
$root = $doc -> createElement('article');
//attach the floating element as the root of the XML structure
$doc -> appendChild($root);



//makes a headline element floating in the doc
$fName = $doc -> createElement('firstName');
//attach the headline element as a child of the root
$root -> appendChild($fName);
//put the headline words into the document

$newFirstName = $doc -> createTextNode($_POST['newFName']);
//attach that floating value as a child of the headline element
$fName -> appendChild($newFirstName);





//makes a headline element floating in the doc
$lName = $doc -> createElement('lastName');
//attach the headline element as a child of the root
$root -> appendChild($lName);
//put the headline words into the document

$newLastName = $doc -> createTextNode($_POST['newLName']);
//attach that floating value as a child of the headline element
$lName -> appendChild($newLastName);






//makes a headline element floating in the doc
$eAddress = $doc -> createElement('emailAddress');
//attach the headline element as a child of the root
$root -> appendChild($eAddress);
//put the headline words into the document

$newEmailAddress = $doc -> createTextNode($_POST['newEmail']);
//attach that floating value as a child of the headline element
$eAddress -> appendChild($newEmailAddress);




if($_POST['newNumber']==''){
	}
	else{
//makes a headline element floating in the doc
$pNumber = $doc -> createElement('phoneNumber');
//attach the headline element as a child of the root
$root -> appendChild($pNumber);
//put the headline words into the document
	$newPhoneNumber = $doc -> createTextNode($_POST['newNumber']);
//attach that floating value as a child of the headline element
$pNumber -> appendChild($newPhoneNumber);
	}






//makes a headline element floating in the doc
$message = $doc -> createElement('message');
//attach the headline element as a child of the root
$root -> appendChild($message);
//put the headline words into the document

$newMessage = $doc -> createTextNode($_POST['newMessage']);
//attach that floating value as a child of the headline element
$message -> appendChild($newMessage);


//make a var that stores the timestamp of this very moment in time

$now= date('H:i M d,Y');

//makes a headline element floating in the doc
$theTime = $doc -> createElement('timeAdded');
//attach the headline element as a child of the root
$root -> appendChild($theTime);
//put the headline words into the document
$newTime = $doc -> createTextNode($now);
//attach that floating value as a child of the headline element
$theTime -> appendChild($newTime);



$id= date('YmdHis');

//attach the id # as a attribute of our XML article element
$root -> setAttribute( 'id', $id);

//make a file name for the new file:
$newfilename = 'article'.$id.'.xml';

//save out the file
$doc -> save($fileDir.$newfilename);
//redirect the user back to view all articles
header('Location:../index.php');
?>