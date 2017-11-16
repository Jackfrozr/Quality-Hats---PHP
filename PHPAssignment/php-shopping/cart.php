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
	<title>PHP Shopping Cart Demo &#0183; Cart</title>
	<link rel="stylesheet" href="php-shopping/css/shopping-styles.css"/>
</head>

<body>
<div class="container">
	<div id="shoppingcart">

	<h2>Shopping Cart</h2>

	<?php
	echo Business::writeShoppingCart();
	?>

	</div>

	<div id="contents">
	<?php
	echo Business::showCart();
	?>

	<p><a href="index.php?content_page=Hat">Back to hats...</a></p>

	</div>
</div>

</body>
</html>