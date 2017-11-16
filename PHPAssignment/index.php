<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Quality Hats</title>
    <script src="WABootstrap/bootstrap.js" type="text/javascript">
	</script>
     <script src="WABootstrap/jquery-1.10.2.js" type="text/javascript">
	</script>
    <script src="WABootstrap/modernizr-2.6.2.js" type="text/javascript">
	</script>
    <script src="WABootstrap/respond.js" type="text/javascript">
	</script>
<link href="WABootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="WAStyleSheet/Practical.css" rel="stylesheet" type="text/css" />
      <!-- File Heading	
       Name:	    index.php
       Purpose:		Display a supplied content page with the defined master page
                    This is the main page to implement the master page concept in PHP
       Author:		Xiaosong Li									
       History:		Created on 28/5/2015
                    Modified by XL 28/5/2015
                    Modified by XL 26/5/2016
      -->
       <script type="text/javascript">
    		function current_time()
		{
			var currentTime = new Date()
			var month = currentTime.getMonth() + 1
			var day = currentTime.getDate()
			var year = currentTime.getFullYear()
			document.write( day+ "/" + month + "/" + year)
		}
    </script>
</head>

<body>

<div class="containter">

	<?php
	//Retrieve the requested content page name and construct the file name
	if (isset($_GET['content_page']))
	{
	   $page_name = $_GET['content_page'];
	   $page_content = $page_name.'.php';
	}
	elseif (isset($_POST['content_page']))
	{
	   $page_name = $_POST['content_page'];
	   $page_content = $page_name.'.php';
	}
	else
	{$page_content = 'Introduction.php';}

	//This must be below the setting of $page_content 
	include('WAMaster.php');
	?>
</div>

</body>
</html>

