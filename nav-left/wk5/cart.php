<?php
    session_start();
    
	if(!isset($_SESSION["cart"])) {
		$_SESSION["cart"] = array();
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$id = (int) $_POST["id"];
		
		//add items to the cart
		if(isset($_POST["action"]) && $_POST["action"] == "add"){
			
			if(array_key_exists($id, $_SESSION["cart"])) {
				$_SESSION["cart"][$id]["quantity"] += 1;
			} else {
				$_SESSION["cart"][$id] = array(
					"name" => "",
					"quantity" => 1,
					"price" => 0.00,
					);
			}
		}
	}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<table border="1">
<tr>
<th>Product</th>
<th>Quantity</th>
<th>Price</th>
<th>Total</th>
</tr>
<tr>
<?php foreach($_SESSION["cart"] as $key => $value) { ?>
</tr>
<td><?php echo $value["name"]; ?></td>
<td><?php echo $value["quantity"]; ?></td>
<td><?php echo $value["price"]; ?></td>
<td><?php echo ($value["quantity"] * $value ["price"]); ?></td>
<?php } ?>
</table>

</body>
</html>