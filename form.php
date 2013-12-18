<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type"
content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<?php
date_default_timezone_set('Europe/Dublin');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once 'connect.incl.php';
require_once("passwords.php"); 
check_logged();

	$query = 'select * from pubdetails';
	$result = mysqli_query($link,$query)or die('Invalid query: ' . mysql_error());
	
	echo '<div id="choose">';
	echo '<h>Select a Pub Record:</h></br>';
	echo '<form method="post" action="">';
		echo '<select name="pubtable">';
		while($row = mysqli_fetch_row($result))
		  {
			echo '<option value="'.$row[0].'">'.$row[1].'</option>';
		  }
		echo '</select>';
	echo '<tr><td><input type="submit" value="Display"></td>';
	echo '</form>';
	echo '</div>';

	echo '<div id="addpub">';
	echo '<form  method="post" action="addpub.php">';
	echo '<h>Add a New Pub Record:</h></br>';
	echo '<input type="hidden" name="addpub"/>';
	echo '<input type=submit value="Add">';
	echo '</form>';
	echo '</div>';

?>

</body>
</html>

