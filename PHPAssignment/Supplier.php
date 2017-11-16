<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supplier Page - Quality Hats</title>
</head>

<body>
   <div class="container">
    <h2>Our Brands</h2>
	</br>

<?php
	
	// create connection
	$mysqli = new mysqli("localhost", "fuj16", "26081992", "fuj16mysql2");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	//Select the file information
		$sql="SELECT Supplier.SupplierID As sid,
					 Supplier.EmailAddress As semail,
					 Supplier.HomePhoneNumber As hphone,
					 Supplier.WorkPhoneNumber As wphone,
					 Supplier.MobilePhoneNumber As mphone,
					 Supplier.Name As sname 
			  FROM Supplier";

		$rs=$mysqli->query($sql);
		if (!$rs)
		  {exit("Error in SQL");}

	//Check if Admin
	if($_SESSION['admin'] == true)
	{
		echo '<a runat="server" href="index.php?content_page=SupplierCreate">Create New Supplier</a></br></br>';	
		
		while ($row = $rs->fetch_assoc())
		{
		  $email=$row["semail"];
		  $name=$row["sname"];
		  $sid=$row["sid"];
		  $hphone=$row["hphone"];
		  $wphone=$row["wphone"];
		  $mphone=$row["mphone"];
		  echo "<b>Supplier ID:</b> $sid</br>";
		  echo "<b>Name:</b> $name</br>";
		  echo "<b>EmailAddress:</b> $email</br>";
		  echo "<b>HomePhoneNumber:</b> $hphone</br>";
		  echo "<b>WorkPhoneNumber:</b> $wphone</br>";
		  echo "<b>MobilePhoneNumber:</b> $mphone</br>";
		  echo "</br>";
		}
	}
	else{
	
		while ($row = $rs->fetch_assoc())
		{
		  $email=$row["semail"];
		  $name=$row["sname"];

		  echo "<b>Name: $name</b></br>";
		  echo "EmailAddress: $email</br>";
		  echo "</br>";
		}
	}
?>

	</div>

</body>
</html>
