<?php
// Include MySQL class
require_once("/php-shopping/data_layer/data.inc.php");

class Business {
	//Display a summary of the shooping cart
	public static function writeShoppingCart() {
	if (isset($_SESSION['cart']))
	{
	$cart = $_SESSION['cart'];
	}
	
	if (!isset($cart) || $cart=='') {
		return '<p>You have no items in your shopping cart</p>';
	} 
		else 
	{
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<p>You have <a href="index.php?content_page=php-shopping/cart&action=display">'.count($items).' item'.$s.' in your shopping cart</a></p>';
		}
    }
	
	
	//Display shopping cart
	public static function showCart($input) {
	global $db;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		$total = 0;
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="index.php?content_page=php-shopping/cart&action=update" method="post" id="cart">';
		$output[] = '<table class="table">';
		$output[] = '<thead>';
		$output[] = '<th>Name</th>';
		$output[] = '<th>Price</th>';
		$output[] = '<th>Quantity</th>';
		$output[] = '<th>Total</th>';
		$output[] = '<th></th>';
		$output[] = '</thead>';
		$output[] = '<tbody>';
		foreach ($contents as $id=>$qty) 
		{
			$sql = 'SELECT * FROM Hat WHERE HatID ='.$id;
			$result = $db->query($sql);
				
			$row = $result->fetch();
			extract($row);
			$output[] = '<tr>';
			$output[] = '<td>'.$Name.'</td>';
			$output[] = '<td>&pound;'.$Price.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
			$output[] = '<td>$'.($Price * $qty).'</td>';
			$output[] = '<td><a href="index.php?content_page=php-shopping/cart&action=delete&id='.$id.'" class="r">Remove</a></td>';
			$total += $Price * $qty;

			
			$output[] = '</tr>';
		}
		$gst = ($total/100)*15;
		$grandtotal = $gst + $total;
		$output[] = '</tbody>';
		$output[] = '</table>';
		$output[] = '<p style="text-align:right"><strong>Total: </strong> $'.$total.'</p>';
		$output[] = '<p style="text-align:right"><strong>GST:
		</strong> $'.$gst.'</p>';
		$output[] = '<p style="text-align:right"><strong>Grand total:
		</strong> $'.$grandtotal.'</p>';
		$output[] = '<div style="text-align:right"><button type="submit">Update cart</button></div>';
		$output[] = '</form>';
		
		$output[] = '<p><a runat="server" href="index.php?content_page=php-shopping/cart&action=clear">Clear Cart</a></p>';
		
		//input=1 is for checkout page
		if($input>0){
			$output[] = '<a runat="server" href="index.php?content_page=ConfirmCheckout">Confirm checkout</a>';
		}
		else
		{
			$output[] = '<a runat="server" href="index.php?content_page=Checkout">Proceed to checkout</a>';
		}
	} else {
		$output[] = '<p>You shopping cart is empty.</p>';
	}
	return join('',$output);
}
	
    //Process shopping actions
	public static function processActions() {
	if (isset($_SESSION['cart']))
	{
		$cart = $_SESSION['cart'];
	}
	
	if (isset($_GET['action']))
	{
		$action = $_GET['action'];
	}

    switch ($action) {
	case 'add':
		if (isset($cart) && $cart!='') {
			$cart .= ','.$_GET['id'];
		} else {
			$cart = $_GET['id'];
		}
		break;
	case 'delete':
		if ($cart) {
			$items = explode(',',$cart);
			$newcart = '';
			foreach ($items as $item) {
				if ($_GET['id'] != $item) {
					if ($newcart != '') {
						$newcart .= ','.$item;
					} else {
						$newcart = $item;
					}
				}
			}
			$cart = $newcart;
		}
		break;
	case 'update':
	if ($cart) {
		$newcart = '';
		foreach ($_POST as $key=>$value) {
			if (stristr($key,'qty')) {
				$id = str_replace('qty','',$key);
				$items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
				$newcart = '';
				foreach ($items as $item) {
					if ($id != $item) {
						if ($newcart != '') {
							$newcart .= ','.$item;
						} else {
							$newcart = $item;
						}
					}
				}
				for ($i=1;$i<=$value;$i++) {
					if ($newcart != '') {
						$newcart .= ','.$id;
					} else {
						$newcart = $id;
					}
				}
			}
		}
	}
	$cart = $newcart;
	break;		
	case 'clear':
	$cart="";
	$_SESSION['cart']="";			
	break;		
	
	}
	$_SESSION['cart'] = $cart;
	}
	
	
}



?>
