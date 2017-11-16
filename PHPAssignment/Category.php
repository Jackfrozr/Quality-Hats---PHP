<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Category Page - Quality Hats</title>
</head>

<body>
   <div class="container">
    <h2>Category</h2>
	</br>
<?php
	// create connection
	$mysqli = new mysqli("localhost", "fuj16", "26081992", "fuj16mysql2");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	
	//Select the file information
	$sql="SELECT Category.Name As name,
				 Category.CategoryID As cid
		  FROM Category";

	$rs=$mysqli->query($sql);
	if (!$rs)
	  {exit("Error in SQL");}
	
	//Check if admin
	if($_SESSION['admin'] == true)
	{
		echo '<a runat="server" href="index.php?content_page=CategoryCreate">Create New Category</a></br></br>';	
		
		while ($row = $rs->fetch_assoc())
		{
		  $name=$row["name"];
		  $cid=$row["cid"];
		  echo "<b>Category ID:</b> $cid</br>";
		  echo "<b>Name:</b> $name</br>";
		  echo "</br>";
		}
	}
	else
	{
		while ($row = $rs->fetch_assoc())
		{
		  $name=$row["name"];

		  echo "<h3>$name</h3></br>";
		}
	}
?>

	</div>

</body>
</html>
