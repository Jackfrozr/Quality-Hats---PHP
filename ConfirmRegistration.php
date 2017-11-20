<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Confirm Registration - Quality Hats</title>
</head>

<body>
<div class="container"> 
	<h2>Registration Successful</h2>
	<p>
        Thank you for confirming your email. Please <a runat="server" href="index.php?content_page=Login">click here</a> to login.
    </p>
</div>
</body>
</html>


<?php
	if($_GET['id']!=""){
		// create connection
		$mysqli = new mysqli("localhost", "fuj16", "26081992", "fuj16mysql2");
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}

		$gid=$_GET['id'];
		$update="UPDATE customer
		SET Enabled = 1
		WHERE Id=$gid;";

		$ra=$mysqli->query($update);
		if (!$ra)
		{exit("Error in SQL statement");}	
	}
?>

