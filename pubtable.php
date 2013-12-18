<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type"
content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<script>
    function deleteAction() {
      var cancel=confirm("Are you sure you want to delete this pub?");
      if (cancel==true)
      {
		window.location.href = "index.php";
      }
      else
      {
        window.location.href = "delete.php";
      }
    }
 </script>
</head>
<body>
<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once 'connect.incl.php';
require_once("passwords.php"); 
check_logged();


$pubPicked = $_POST['pubtable']; 

$query = 'select * from pubdetails where pubID='.$pubPicked;
$result = mysqli_query($link,$query)or die('Invalid query: ' . mysql_error());


echo '<html><body><div id="pubtable"><table><tr>';
		$i = 0;
		while ($i < mysqli_num_fields($result))
		{
			$meta = mysqli_fetch_field($result);
			if($i!=mysqli_num_fields($result)-1){
				echo '<th>' . $meta->name . '</th>';
			}
			else{
				echo '<th>' . $meta->name . '</th>';
			}
			$i = $i + 1;
		}
		echo '</tr>';
	
$row = mysqli_fetch_row($result);
	
		echo '<tr>';
		$count = count($row);
		$y = 0;
		$c_row;
		while ($y < $count)
		{
			$c_row = current($row);
			if($y < $count-1){
				echo '<td>' . $c_row . '</td>';
			}
			else{
				if(strlen($c_row)>30){
				echo '<td style="height:150px">' . $c_row . '</td>';
				}
				else{
				echo '<td style="height:50px">' . $c_row . '</td>';
				}
			}
			next($row);
			$y = $y + 1;
		}
				echo '</tr>';
		
	echo '</table>';
	mysqli_free_result($result);
	mysqli_close($link);

	
	echo '<form  method="post" action="editpub.php">';
	echo '<input type="hidden" name="editpub" value="'.$pubPicked.'">';
	echo '<input type="submit" value="Edit">';
	echo '</form>';

	echo '<form  method="post" action="deletepub.php">';
	echo '<input type="hidden" name="deletepub" value="'.$pubPicked.'">';
	echo '<input type="submit" value="Delete" onClick="deleteAction()";>';
	echo '</form>';
	echo '</div></body></html>';

?>
</body>
</html>