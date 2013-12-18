<?php 
$USERS["admin"] = "b42c3e8c815924a3eccdfbaafbec90f2"; 
  
function check_logged(){ 
     global $_SESSION, $USERS; 
     if (!array_key_exists($_SESSION['logged'],$USERS)) { 
          header("Location: login.php"); 
     }; 
}; 
?>