<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Order Page - Quality Hats</title>
</head>

<body>
   <div class="container">
    <h2>Orders</h2>
	</br>

<?php
	//Check credentials
	require("CheckLogin.php");
	// create connection
	$mysqli = new mysqli("localhost", "fuj16", "26081992", "fuj16mysql2");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	
	//Display Order
		$sql="SELECT order2.OrderID As oid,
					 order2.CustomerID As cid,
					 order2.Subtotal As sub,
					 order2.GST As gst,
					 order2.GrandTotal As gtotal,
					 order2.OrderStatus As ostatus 
			  FROM order2
			  WHERE order2.CustomerID=".$_SESSION['userid'].";";

		$rs=$mysqli->query($sql);
		if (!$rs)
		  {exit("Error in SQL");}

	echo "<TABLE class=\"table\">
      <thead>
	  	<TR>
      		<TH> OrderID </TH>
      		<TH> CustomerID </TH>
      		<TH> Subtotal </TH>
      		<TH> GST </TH>
	  		<TH> GrandTotal </TH>
	  		<TH> OrderStatus </TH>
      	</TR>
	  </thead>
	  <tbody>";
	
	while ($row = $rs->fetch_assoc())
	{
		$oid=$row["oid"];
		$cid=$row["cid"];
		$sub=$row["sub"];
		$gst=$row["gst"];
		$gtotal=$row["gtotal"];
		$ostatus=$row["ostatus"];
		
		echo "<TR>";	
		echo "<TD>$oid</TD>";
		echo "<TD>$cid</TD>";
		echo "<TD>$sub</TD>";
		echo "<TD>$gst</TD>";
		echo "<TD>$gtotal</TD>";
		echo "<TD>$ostatus</TD>";	
		
		echo "</TR>";
	}
	echo "</tbody></table>";
?>

	</div>

</body>
</html>
