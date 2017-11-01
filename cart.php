<?php

session_start();

if(!isset($_SESSION["cart"])) {
	$_SESSION["cart"] = array();
}

if(isset($_GET["action"]) && $_GET["action"] == "delete") {
    $id = (int) $_GET["id"];
    if(array_key_exists($id, $_SESSION["cart"])) {
        unset($_SESSION["cart"][$id]);
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

	$id = (int) $_POST["id"];	

	//	add items to cart
	if(isset($_POST["action"]) && $_POST["action"] == "add") {
			$name = $_POST["name"];
			$price = $_POST["price"];
            $image = $_POST["image"];
		if(array_key_exists($id, $_SESSION["cart"])) {
			$_SESSION["cart"][$id]["quantity"] += 1;
		} else {
			$_SESSION["cart"][$id] = array(
                "id" => $id,
				"name" => $name,
				"quantity" => 1,
				"price" => $price,
                "image" => $image
			);
		}
	}	

	//	update cart items with new values
	if(isset($_POST["action"]) && $_POST["action"] == "update") {
		foreach($_POST["q"] as $key => $value) {
			if(array_key_exists($key, $_SESSION["cart"])) {
				if((int)$value > 0) {
					$_SESSION["cart"][$key]["quantity"] = $value;
				}
			}
		}
	}		

}

?>

<!doctype html>

<html>

<head>
    <title>PHP Shopping Cart</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
<? include 'includes/header.php';?>

<section id="contents">
        <section id="list">
			<div class="wrap">
				<div class="right-column">
	
                    <form action="cart.php" method="post">
                        <input type="hidden" name="action" value="update">
                        <?php foreach($_SESSION["cart"] as $key => $value) { ?>
                            <ul class="shopping-cart">
                                <li>
                                    <hr></hr>
                                    <div class="photo">
                                        <a href="" title="Product Title" class="product-image"><img src="products/small/<?php echo $value["name"]; ?>.jpg" alt="Product Title" /></a>
                                    </div>
                                    
                                    <div class="content">
                                        <h3><a href="" title="Product Title"><?php echo $value["name"]; ?></a></h3>
    							    	<p>
										<!-- Limit words to about 20 if possible - space will be limited. -->
										<?php echo $value["description"]; ?>
                                        <input type="text" class="field" name="q[<?php echo $key; ?>]" id="amount-product-1" value="<?php echo $value["quantity"]; ?>" />
                                        </p>
                                    </div>
                                    
                                    <div class="price">
    								<a href="cart.php?action=delete&id=<?php echo $value["id"]; ?>">Remove</a>
									<span><?php echo $value["price"]; ?></span>
							    	</div>
                                </li>
                            </ul>
                                    
                        <div id="checkout">
    					    <h3>Total: <b><?php echo ($value["quantity"] * $value["price"]); ?></b></h3>
						    <input type="submit" name="checkout" class="button" value="Checkout" />
						    <input type="submit" name="update" class="button" value="Update" />
                        </div>
                        <p></p>
                        <?php } ?>
                    </form>
                    
                </div>
                <? include 'includes/leftColumn.php';?>
            </div>
    
        </section>
</section>
    



<? include 'includes/footer.php';?>

    

</body>

</html>



























