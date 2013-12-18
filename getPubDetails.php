<?php

	require_once 'connect.incl.php';
	
	// array for JSON response
	$response = array();
	//$sent_variable=@file_get_contents('php://input');
	//$sent_variable= http_get_request_body (); //this works also


	// check for post data
	if (isset($_GET["pubdetails"])) {
		 
		$query = 'select * from pubdetails';
		$result = mysqli_query($link,$query);
	
 
		if (!empty($result)) {
				// check for empty result
				if (mysqli_num_rows($result) > 0) {
						
						$response["pubs"] = array();

						while ($row = mysqli_fetch_array($result)){
							$pubs[]=array('pubID'=>$row['pubID'],'name'=>$row['name'],'address'=>$row['address'],'locationEast'=>$row['locationEast'],
								'locationNorth'=>$row['locationNorth'],'seatingCapacity'=>$row['seatingCapacity'],'phone'=>$row['phone'],'gardenSize'=>$row['gardenSize'],
								'url'=>$row['url'],'imageLink'=>$row['imageLink'],'description'=>$row['description'],'updatedate'=>$row['updatedate']);
							}

							array_push($response["pubs"], $pubs);
							// success
							$response["success"] = 1;
							// echoing JSON response
							header ("Content-Type: application/json");
							echo json_encode($response);
					} else {
					// no pub found
					$response["success"] = 0;
					$response["message"] = "No pub found";
		 
					// echo no users JSON
					header ("Content-Type: application/json");
					echo json_encode($response);
					} // end else if
			 } else {
				// no pub found
				$response["success"] = 0;
				$response["message"] = "No pub found";
		 
				// echo no users JSON
				header ("Content-Type: application/json");
				echo json_encode($response);
			}// end else if
			

		} else {
			// required field is missing
			$response["success"] = 0;
			$response["message"] = "Required field(s) is missing";
		 
			// echoing JSON response
			header ("Content-Type: application/json");
			echo json_encode($response);
		}// end empty else if

?>