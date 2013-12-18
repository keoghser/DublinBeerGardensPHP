<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type"
content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>
<body>
<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include 'passwords.php'; 


if (isset($_SESSION['logged']) and array_key_exists($_SESSION['logged'],$USERS)) 
	{ 
     echo "You are logged in."; // if user is logged show a message  
	} else 
		{ 
	echo '<div id="login">';
     echo '<form action="login.php" method="post">';
	 echo '<input type="hidden" name="ac" value="login"> '; 
     echo '<label>Username:</label><input type="text" name="username" /></br>'; 
     echo '<label>Password:</label><input type="password" name="password"/></br>'; 
     echo '<input type="submit" value="Login"/>'; 
     echo '</form>'; 
	 echo '</div>';
	}

if (isset($_POST['ac']) and $_POST['ac']=='login') 
{ 
    if(!isset($_POST['username']) or $_POST['username']=='' or !isset($_POST['password']) or $_POST['password']==''){

		echo 'No username/password entered. Please, try again.'; 
	} else if ($USERS[$_POST["username"]]==md5($_POST["password"])) 
		{ /// check if submitted username and password exist in $USERS array 
          $_SESSION['logged']=$_POST["username"]; 
		  header("Location: ./index.php");
		} else 
		{ 
          echo 'Incorrect username/password. Please, try again.'; 
		}
	 
}


?>

</body>
</html>