<?php
ob_start(); //set buffer on
session_start(); //starting session

// Include functions
require_once("/php-shopping/business_layer/business.inc.php");
// Process actions for this page
Business::processActions();
?>
<!DOCTYPE>
<html>
<head>
	<title>Checkout</title>
</head>

<body>


<div class="container">
	<?php
	echo Business::showCart(1);
	?>


</div>

</body>
</html>