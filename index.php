<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type"
content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>
<body>
<p>


<?php
//echo 'boo';

session_start(); /// initialize session 
require_once("passwords.php"); 
check_logged();


if (isset($_SESSION['logged'])){
	include 'form.php';
	}


if (isset($_POST['pubtable'])){
	include 'pubtable.php';
	}


if (isset($_POST['addpubdetails'])){
	include 'addpubdetails.php';
	}

/*if (isset($_POST['editpubdetails'])){
	include 'editpubdetails.php';
	}*/

?>


</p>
</body>
</html>