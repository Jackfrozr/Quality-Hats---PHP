<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Confirm checkout</title>
</head>

<body>
	<div class="container">
	<h2>Checkout</h2>
	<?php
		
		// create connection for orderdetails
		$mysqli = new mysqli("localhost", "fuj16", "26081992", "fuj16mysql2");
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		
		require_once("/php-shopping/data_layer/data.inc.php");

		require("CheckLogin.php");

		if($_SESSION['userid']!="")
		{
			//Generate OrderID
			$orderid=  date("ymdhisa").$_SESSION['userid'];
			
			//Dissecting Cart Content
			global $db;
			$cart = $_SESSION['cart'];
			if ($cart) 
			{
				$items = explode(',',$cart);
				$contents = array();
				$total = 0;
				foreach ($items as $item) 
				{
					$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
				}
				
				foreach ($contents as $id=>$qty) 
				{
					$sql = 'SELECT * FROM Hat WHERE HatID ='.$id;
					$result = $db->query($sql);
					$row = $result->fetch();
					extract($row);
					$total += $Price * $qty;
				}
				$gst = ($total/100)*15;
				$grandtotal = $gst + $total;
			}

			//Insert Order
			$sql = "INSERT INTO order2(OrderID,CustomerID,Subtotal,GST,GrandTotal)
					VALUES('". $orderid. 	"','" 
							 . $_SESSION['userid']. 	"','" 
							 . $total . "','" 
							 . $gst . 	"','" 
							 . $grandtotal . "')";
			$result = $db->query($sql);
			if (!$result)
			{
				exit("Error when inserting into order table");
			}	
			
			
			//Insert Order Detail
			$cart = $_SESSION['cart'];
			if ($cart) 
			{
				$items = explode(',',$cart);
				$contents = array();
				$total = 0;
				foreach ($items as $item) 
				{
					$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
				}
				
				foreach ($contents as $id=>$qty) 
				{
					$sql = 'SELECT * FROM Hat WHERE HatID ='.$id;
					$result = $db->query($sql);
					$row = $result->fetch();
					extract($row);
					//Insert Orderdetails

					$sql2 = "INSERT INTO orderdetail(HatID,OrderID,Quantity,UnitPrice) VALUES('"
					. $id.		"','" 
					. $orderid."','" 
					. $qty . 	"','"  
					. $Price . "')";

					$rs=$mysqli->query($sql2);
					if (!$rs)
					  {exit("Error in SQL statement");}
				}
			}
			
			echo "Order Completed successfully!";
			$_SESSION['cart']="";
		}
		else
		{
			echo "Error required field (id) not found";
		}
	?>
	</div>
	
</body>
</html>
