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
require_once("passwords.php"); 
check_logged();
?>
<script>

function ValidateForm()
// Creates variable from entries and passes them through each validation function
		{
		
		// Extracts data and creates variables from form entries		
		var name=document.forms.addpubdetails.name.value;	
		var address=document.forms.addpubdetails.address.value;
		var locationeast=document.forms.addpubdetails.locationeast.value;
		var locationnorth=document.forms.addpubdetails.locationnorth.value;
		var seatingcapacity=document.forms.addpubdetails.seatingcapacity.value;
		var phone=document.forms.addpubdetails.phone.value;
		var gardensize=document.forms.addpubdetails.gardensize.value;
		var url=document.forms.addpubdetails.url.value;
		var imagelink=document.forms.addpubdetails.imagelink.value;
		var description=document.forms.addpubdetails.description.value;		
		
	
		// Creates validation check data	
		var numericExpression = /^[0-9" "\-.]+$/;
		var alphabetExpression = /^[a-zA-Z" "\-\'!:,.;]+$/;
		var alphaNumExpression = /^[0-9a-zA-Z" "\-\'!:,.;]+$/;
		var webExpression = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
		
		

		//Checks pub name
		if ((name=="")||(!name.match(alphabetExpression))){
			alert ("Invalid pub name, please re-enter")
			return false;
			}
		

		//Checks address
		if ((address=="")||(!address.match(alphaNumExpression))){
			alert ("Invalid address entry, please re-enter")
			return false;
			}
		
		//Checks locationeast
		if ((locationeast=="")||(!locationeast.match(numericExpression))||(locationeast.length<8)){
			alert ("Invalid location (east) entry, please re-enter")
			return false;
			}

		//Checks locationnorth
		if ((locationnorth=="")||(!locationnorth.match(numericExpression))||(locationnorth.length<8)){
			alert ("Invalid location (north) entry, please re-enter")
			return false;
			}

		//Checks seatingcapacity
		if ((seatingcapacity=="")||(!seatingcapacity.match(numericExpression))){
			alert ("Invalid seating capacity entry, please re-enter")
			return false;
			}
		
		//Checks phone
		if ((phone=="")||(!phone.match(numericExpression))||(phone.length<9)){
			alert ("Invalid phone entry, please re-enter")
			return false;
			}

		//Checks gardensize	
		if ((gardensize=="")||(!gardensize.match(numericExpression))){
			alert ("Invalid garden size entry, please re-enter")
			return false;
			}

		//Checks url
		if ((url=="")||(!url.match(webExpression))){
			alert ("Invalid web address entry, please re-enter")
			return false;
			}
		
		//Checks imagelink
		if ((imagelink=="")||(!imagelink.match(alphaNumExpression))){
			alert ("Invalid imagelink entry, please re-enter")
			return false;
			}

		//Checks description
		if ((description=="")||(!description.match(alphabetExpression))||(description.length>100)){
			alert ("Invalid description entry, please re-enter")
			return false;
			}
		
</script>
<script>
    function cancelAction() {
      var cancel=confirm("Are you sure you want to cancel?")
      if (cancel==true)
      {
      window.location.href = "index.php";
      }
      else
      {
        <!--  nothing happens-->
      }
    }
 </script>

</head>
<body>


<div id='addpubdetails'>
<form  name="addpubdetails" method="post" action="index.php" onsubmit="return ValidateForm();">
<input type="hidden" name="addpubdetails"/>
<label>Pub name:</label> <input type='text' name='name'><br>
<label>Address:</label> <input type='text' name='address'><br>
<label>Location (Easting):</label> <input type='text' name='locationeast'><br>
<label>Location (Northing):</label> <input type='text' name='locationnorth'><br>
<label>Seating Capacity:</label> <input type='text' name='seatingcapacity'><br>
<label>Phone Number:</label> <input type='text' name='phone'><br>
<label>Garden Size:</label> <input type='text' name='gardensize'><br>
<label>Web URL:</label> <input type='text' name='url'><br>
<label>Image: </label><input type='text' name='imagelink'><br>
<label>Description:</label> <textarea name='description' rows='4' cols='40'></textarea></br>
<!--<?php echo $_SESSION['loggedin']; ?>-->
<input type="submit" value="Save">
<input type="button" value="Cancel" onClick="cancelAction();"/>

</form>
</div>

</body>
</html>