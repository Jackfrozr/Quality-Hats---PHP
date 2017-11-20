<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Detail</title>
</head>

<body>
	<?php
	   function checkUserCredentals($inputUsername, $inputPassword)
	   {
	   /*
	   This function takes input username and password as parameters and 
	   returns TRUE if the user is authenticated, FALSE if the user is not authenticated
	   */

		// create connection
		$mysqli = new mysqli("localhost", "fuj16", "26081992", "fuj16mysql2");
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		  // query the users table for name and surname 
		  $sql = "
		  SELECT Email, Password, Role, Id 
		  FROM Customer Where Email='".$inputUsername."' 
		  AND Password='".$inputPassword."'
		  AND Enabled=1";

		 //Execute query
		$rs=$mysqli->query($sql);
		if (!$rs)
		  {
			exit("Error in SQL");
		  }
		 
		//Count the record number
		$counter = $rs->num_rows;

		  if ($counter>0)
		  {
			  $_SESSION['admin'] = false;
			  //authentication succeeded
			  //get role
			  while ($row = $rs->fetch_assoc())
				{
				//Check if role is 1(Admin)
				$rid=$row["Role"];
				  if($rid==1)
				  {
					  $_SESSION['admin'] = true;
				  }
				  
				//Add user Id to session
				$_SESSION['userid'] = $row["Id"];  
			  	}
			  return (true);
		  }
		  else
		  {
			  //authentication failed
			  return (false);	
		  }
	   }

	

	?>

</body>
</html>
