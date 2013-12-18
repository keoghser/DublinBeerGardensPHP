<?php
require_once 'connect.incl.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once("passwords.php"); 
check_logged();

/*$pubID=$_POST['editpubdetails'];
$name=escape_data($_POST['name']); 
$address=escape_data($_POST['address']);
$locationeast=escape_data($_POST['locationeast']); 
$locationnorth=escape_data($_POST['locationnorth']); 
$seatingcapacity=escape_data($_POST['seatingcapacity']); 
$phone=escape_data($_POST['phone']); 
$gardensize=escape_data($_POST['gardensize']); 
$url=escape_data($_POST['url']); 
$imagelink=escape_data($_POST['imagelink']); 
$description=escape_data($_POST['description']); */

$pubID=$_POST['editpubdetails'];
$name=$_POST['name']; 
$address=$_POST['address'];
$locationeast=$_POST['locationeast']; 
$locationnorth=$_POST['locationnorth']; 
$seatingcapacity=$_POST['seatingcapacity']; 
$phone=$_POST['phone']; 
$gardensize=$_POST['gardensize']; 
$url=$_POST['url']; 
$imagelink=$_POST['imagelink']; 
$description=$_POST['description']; 


$query = 'UPDATE pubdetails SET
			name="'.$name.'",
			address="'.$address.'",
			locationeast="'.$locationeast.'",
			locationnorth="'.$locationnorth.'",
			seatingcapacity="'.$seatingcapacity.'",
			phone="'.$phone.'",
			gardensize="'.$gardensize.'",
			url="'.$url.'",
			imagelink="'.$imagelink.'",
			description="'.$description.'",
			updatedate=CURDATE()
			WHERE pubID="'.$pubID.'"';



if(!mysqli_query($link,$query)){
	$error = 'Error adding pub details: '.mysqli_error($link);
	include 'error.html.php';
	exit();
}

header('Location: ./index.php');
exit();

// Create a function for escaping the data
function escape_data ($data) 
{
global $link; // Connection to database.
return mysql_real_escape_string(trim($data));
} // End of function.
?>