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
	// create connection
	$mysqli = new mysqli("localhost", "fuj16", "26081992", "fuj16mysql2");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	
	//Shipped/Waiting
	if (isset($_GET['action']))
	{
		$action = $_GET['action'];
	}

    switch ($action) 
	{
	case 'shipped':
		$gid=$_GET['id'];
		$update='UPDATE order2
		SET OrderStatus = "shipped"
		WHERE OrderID="'.$gid.'";';
		$ra=$mysqli->query($update);
		if (!$ra)
  		{exit("Error in SQL statement");}
		break;
	case 'waiting':
		$gid=$_GET['id'];
		$update='UPDATE order2
		SET OrderStatus = "waiting"
		WHERE OrderID='.$gid.";";

		$ra=$mysqli->query($update);
		if (!$ra)
  		{exit("Error in SQL statement");}
		break;
	}
	
	//Display Order
		$sql="SELECT order2.OrderID As oid,
					 order2.CustomerID As cid,
					 order2.Subtotal As sub,
					 order2.GST As gst,
					 order2.GrandTotal As gtotal,
					 order2.OrderStatus As ostatus 
			  FROM order2";

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
	  		<TH>  </TH>
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
		
		echo "<TD>$ostatus</TD>";
		if($ostatus=="waiting")
		{
			echo '<TD><a href="index.php?content_page=OrderAdmin&action=shipped&id='.$oid.'">shipped</a></TD>';	
		}
		else
		{
			echo '<TD><a href="index.php?content_page=OrderAdmin&action=waiting&id='.$oid.'">Waiting</a></TD>';	
		}
		
		echo "</TR>";
	}
	echo "</tbody></table>";
?>

	</div>

</body>
</html>
