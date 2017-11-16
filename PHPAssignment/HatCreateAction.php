<?php
require("ErrorFunctions.php");
//Sets a user function (error_handler) to handle errors in a script
$error_handler = set_error_handler("userErrorHandler");
?>	

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Hat </title>
</head>

<body>
<div class="container">
<?php
	//echo $_FILES['himage']['name'];	
	//Uploading Image
	if (isset($_FILES["himage"]) && ($_FILES["himage"]["error"] > 0))
	{
		echo "Error: " . $_FILES["himage"]["error"] . "<br />";
	}
	elseif (isset($_FILES["himage"]))
	{
		$upload=$_FILES["himage"]["tmp_name"];
		$upload2="../PHPAssignment/WAImages/HatImages/" . $_FILES["himage"]["name"];
	   	move_uploaded_file($upload,$upload2); //Save the file as the supplied name
	}
	else
	{
		echo "no image provided";
	}
	
	
	// create connection
	if($_POST['hname']!="")
	{
		$mysqli = new mysqli("localhost", "fuj16", "26081992", "fuj16mysql2");
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		$Fname="WAImages/HatImages/" . $_FILES["himage"]["name"];
		
		// create SQL statement 
			$sql = "INSERT INTO hat(Name,Description,Image,Price,CategoryID,SupplierID)
					VALUES('". $_POST['hname'] . "','" 
						 	 . $_POST['hdescription'] . "','" 
							 . $Fname . "','" 
							 . $_POST['hprice'] . "','" 
							 . $_POST['hcategory'] . "','" 
							 . $_POST['hsupplier'] . "')";

		// execute SQL statement and get results 
		if (!$mysqli->query($sql)) {
			echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		else{
			echo "Hat created successfully";
		}
		
	}
	else
	{
		echo "Required field is missing.";
		trigger_error("No data supplied", E_USER_ERROR);
	}
?>
</div>
</body>
</html>
