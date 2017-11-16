
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
<title>Hat Page - Quality Hats</title>
</head>

<body>
   <div class="container">
    <h2>Hats</h2>
	
	<div class="form-action no-color">
		<p>
			Find by name or supplier: <input type="text" name="SearchString" value="" />
			<input type="submit" value="search" class="btn btn-default" />
			
		</p>
	</div>
	
<?php

	// create connection
	$mysqli = new mysqli("localhost", "fuj16", "26081992", "fuj16mysql2");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	
	//Check if admin
	if($_SESSION['admin'] == true)
	{
		echo '<a runat="server" href="index.php?content_page=HatCreate">Create New Hat</a></br></br>';	
	}	   
	   
	//Display Hat
	   $sql="SELECT Hat.Name As name,
	   		 Hat.Image As image,
			 Hat.Description As description,
			 Hat.SupplierID As sid,
			 Hat.CategoryID As cid,
			 Hat.Price as price,
			 Hat.HatID as hid
      FROM Hat";
	  
	$rs=$mysqli->query($sql);
	$rs2=$mysqli->query($sql);
	if (!$rs)
	  {exit("Error in SQL statement");}
	


	   
	if($_SESSION['admin'] == true)
	{
		echo "<TABLE class=\"table\">
		  <thead>
			<TR>
				<TH> HatID </TH>
				<TH> Image </TH>
				<TH> Name </TH>
				<TH> Category </TH>
				<TH> Supplier </TH>
				<TH> Description </TH>
				<TH> Price </TH>
				<TH>  </TH>
			</TR>
		  </thead>
		  <tbody>";
	}
	else{
		echo "<TABLE class=\"table\">
		  <thead>
			<TR>
				<TH> Image </TH>
				<TH> Name </TH>
				<TH> Category </TH>
				<TH> Supplier </TH>
				<TH> Description </TH>
				<TH> Price </TH>
				<TH>  </TH>
			</TR>
		  </thead>
		  <tbody>";
	}
	
	//Create Pages
	
	//Current Page

	if (isset($_GET['pagenumber']))
	{
		$currentpage = $_GET['pagenumber'];
	}else{
			$currentpage =0;
	}
	   
	$maxhat=0;
	while ($row = $rs2->fetch_assoc())
	{
		$maxhat+=1;
		$page= floor($maxhat/4);
	}
	   
	$counthat=0;
	$offset=$currentpage*4;
	$maxhatdisplay=$offset+4;  
	//Fetch Hat
	while ($row = $rs->fetch_assoc())
	{
	if(($counthat>=$offset)&&($counthat<$maxhatdisplay))//4 hat per page
	{
		//Get Supplier Name
		$sid=$row["sid"];
		$supplier="SELECT Supplier.Name As sname
			  FROM Supplier
			  WHERE SupplierID=$sid;";
		$rs2=$mysqli->query($supplier);
		if (!$rs2){exit("Error in SQL statement");}
			$row2 = $rs2->fetch_assoc();

		//Get Category Name
		$cid=$row["cid"];
		$supplier="SELECT Category.Name As cname
			  FROM Category
			  WHERE CategoryID=$cid;";
		$rs2=$mysqli->query($supplier);
		if (!$rs2){exit("Error in SQL statement");}
			$row3 = $rs2->fetch_assoc();

		//Display Hat

			$sname=$row2["sname"];
			$cname=$row3["cname"];
			$hid=$row["hid"];
			$name=$row["name"];
			$image=$row["image"];
			$description=$row["description"];
			$price=$row["price"];
			echo "<TR>";	
			if($_SESSION['admin'] == true)
			{
				echo "<TD>$hid</TD>";
			}
			if($image=="")
			{
				echo '<TD><img style="width: 250px; height: auto;" src="WAImages/HatImages/error.jpg"></TD>';
			}
			else
			{
				echo "<TD><img style=\"width: 250px; height: auto;\" src=\"$image\"></TD>";
			}

			echo "<TD>$name</TD>";
			echo "<TD>$cname</TD>";
			echo "<TD>$sname</TD>";
			echo "<TD width=\"30%\">$description</TD>";
			echo "<TD>$price</TD>";	
			if($_SESSION['admin'] != true)//Is not admin
			{
			echo '<TD><a href="index.php?content_page=php-shopping/cart&action=add&id='.$row['hid'].'">Add to cart</a></TD>';	
			}
			echo "</TR>";
		}
		$counthat+=1;
	}

	  echo "</tbody></table>";
	for($i=0;$i<=$page;$i++){
	$but='
	<a href="index.php?content_page=hat&pagenumber='.$i.'style="text-decoration:none"> 
	<button label="Press Me"">Page '.$i.' </button>
	</a>';
	echo $but;
	}   
	
?>
<hr>


<?php
if($_SESSION['admin'] != true)
{
	echo "<h2>Shopping Cart</h2>";
	echo Business::ShowCart();
}
?>

</div>

</body>
</html>
