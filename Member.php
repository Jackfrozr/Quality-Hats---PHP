
<?php
ob_start(); //set buffer on
session_start(); //starting session

// Include business layer
require_once("/php-shopping/business_layer/business.inc.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Member Page - Quality Hats</title>
</head>

<body>
   <div class="container">
    <h2>Customers</h2>
	
<?php
	// create connection
	$mysqli = new mysqli("localhost", "fuj16", "26081992", "fuj16mysql2");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	   
	//Enable/Disable
	if (isset($_GET['action']))
	{
		$action = $_GET['action'];
	}

    switch ($action) {
	case 'enable':
		$gid=$_GET['id'];
		$update="UPDATE customer
		SET Enabled = 1
		WHERE Id=$gid;";

		$ra=$mysqli->query($update);
		if (!$ra)
  		{exit("Error in SQL statement");}
		break;
	case 'disable':
		$gid=$_GET['id'];
		$update="UPDATE customer
		SET Enabled = 0
		WHERE Id=$gid;";

		$ra=$mysqli->query($update);
		if (!$ra)
  		{exit("Error in SQL statement");}
		break;
	}
?>
	
<?php
//Select the file information
$sql="SELECT customer.Name As name,
			 customer.Email As email,
			 customer.Address As address,
			 customer.Enabled As enabled,
			 customer.Id As id
      FROM customer
	  WHERE customer.Role = 0;";
	  
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL statement");}
	

echo "<TABLE class=\"table\">
      <thead>
	  	<TR>
      		<TH> ID </TH>
      		<TH> Name </TH>
      		<TH> Email </TH>
      		<TH> Address </TH>
	  		<TH> Enabled </TH>
	  		<TH>  </TH>
      	</TR>
	  </thead>
	  <tbody>";
	
while ($row = $rs->fetch_assoc())
{
	$name=$row["name"];
	$email=$row["email"];
	$address=$row["address"];
	$id=$row["id"];
	echo "<TR>";	
	
	echo "<TD>$id</TD>";
	echo "<TD>$name</TD>";
	echo "<TD>$email</TD>";
	echo "<TD>$address</TD>";
	if($row["enabled"]==1)
	{
		echo "<TD>Enabled</TD>";
		echo '<TD>
		<a href="index.php?content_page=Member&action=disable&id='.$row['id'].'">Disable</a></TD>';	
	}
	else
	{
		echo "<TD>Disabled</TD>";
		echo '<TD>
		<a href="index.php?content_page=Member&action=enable&id='.$row['id'].'">Enable</a></TD>';	

	}
	echo "</TR>";

}

	echo "</tbody></table>";
	   
?>
	   
</body>
</html>
