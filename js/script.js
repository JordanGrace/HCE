// JavaScript Document

onload = init;

function init(){
	$('#uMessage').click(function(){getBig();});
	
	
	}
	
function getBig(){
	document.getElementById('uMessage').className = 'grow';
	
	}
	
	
function validateForm(){
	var FN=document.forms["contactForm"]["newFName"].value;
	var LN=document.forms["contactForm"]["newLName"].value;
	var E=document.forms["contactForm"]["newEmail"].value;
	var atpos=E.indexOf("@");
	var dotpos=E.lastIndexOf(".");
	var M=document.forms["contactForm"]["newMessage"].value;
if (FN==null || FN=="")
  {
  document.getElementById('fNameBox').className = 'error';
  return false;
  }
else if (LN==null || LN=="")
  {
  document.getElementById('lNameBox').className = 'error';
  return false;
  }
else if (E==null || E=="")
  {
  document.getElementById('uEmail').className = 'error';
  return false;
  }
else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
	document.getElementById('uEmail').className = 'error';
  return false;
  }
else if (M==null || M=="")
  {
  document.getElementById('uMessage').className = 'error';
  return false;
  }
  else{return true;}
	}