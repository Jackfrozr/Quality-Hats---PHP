<?php
require("ErrorFunctions.php");
//Sets a user function (error_handler) to handle errors in a script
$error_handler = set_error_handler("userErrorHandler");
?>	

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register </title>
</head>

<body>
<div class="container">
<?php
	// create connection
	if($_POST['email']!="")
	{
		$mysqli = new mysqli("localhost", "fuj16", "26081992", "fuj16mysql2");
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		//echo $mysqli->host_info . "\n";
			// create SQL statement 
			$sql = "INSERT INTO customer(Email,Password,Name,Address,HomePhoneNumber,WorkPhoneNumber,MobilePhoneNumber)
					VALUES('". $_POST['email'] . 	"','" 
							 . $_POST['password'] . "','" 
							 . $_POST['name'] . 	"','" 
							 . $_POST['address'] . 	"','"
							 . $_POST['hpnumber'] . "','" 
							 . $_POST['wknumber'] . "','" 
							 . $_POST['mbnumber'] . "')";

		// execute SQL statement and get results 
		if (!$mysqli->query($sql)) {
			echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		//Registration Successful
		else{
			//Since id is set to be automatically created by databse we have to retrieve it
			$sql="SELECT customer.Id As id
				  FROM customer
				  WHERE customer.
				  Email= '".$_POST['email']."';";

			$rs=$mysqli->query($sql);
			if (!$rs)
			{
				exit("Error in SQL statement when reading customer id");
			}
			
			while ($row = $rs->fetch_assoc())
			{
				$register = 'http://dochyper.unitec.ac.nz/fuj16/PHPAssignment/index.php?content_page=ConfirmRegistration&id='.$row['id'].'
				Please copy the link to your browser to activate your account.';
			}
			
			mail($_POST['email'], "Please Confirm your registration - Quality Hats", $register, "FROM: PHPPractical@dochyper.unitec.ac.nz");
			echo "You have been registered succesfully, please check your email to confirm your email address to activate your account.";
		}
		
	}else
	{
		echo "Required field is missing.";
		trigger_error("No data supplied", E_USER_ERROR);
	}
?>
</div>
</body>
</html>
