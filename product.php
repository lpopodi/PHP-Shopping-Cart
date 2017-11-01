<?php

   //connect to database
    include 'includes/dbconn.php';

    $id = 0;
    
    if(isset($_GET["id"]) && !empty($_GET["id"])) {
       $id = (int) $_GET["id"];   
    }
    $sql = "SELECT * FROM products WHERE id = $id";
    
    //issue query
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($result);

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
	<div class="container">
        <? include 'includes/header.php';?>

        <section id="contents">
    	
		<!-- List view presentation begin. -->
		<section id="list">
			<div class="wrap">
				<div class="right-column">
					<section id="grid" class="product-details">
						<ul>
						    <li>								
								<div class="photo">
									<a href="products/large/<?php echo $row["image"]; ?>.jpg" title="Photo" class="product-image nivoZoom"><img src="products/small/<?php echo $row["image"]; ?>.jpg" alt="Photo" /></a>
								</div>
							</li>
						</ul>
                    <div>
                        <p><?php echo $row["name"];?></p>
						<p><?php echo $row["desciptionlong"];?></p>
					</div>
                        
					</section>
					

					
					<form method="post" action="cart.php">
					    <!--	
                        <div class="variants">
							<label for="id">Variants</label>
							<select name="id" id="id">
								<option value="1">Red ($9.99)</option>
								<option value="2">Green ($10.99)</option>
								<option value="3">Blue ($11.99)</option>
							</select>
						</div>
						-->
                        <div id="checkout">
							<h3><b><?php echo $row["price"]; ?></b></h3>
						    <input type="hidden" name="action" value="add">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
                            <input type="hidden" name="name" value="<?php echo $row["name"]; ?>">
                            <input type="hidden" name="image" value="<?php echo $row["image"]; ?>">
                            <input class="button" name="btnBuy" type="submit" value="Buy" />
						</div>	
					</form>
				</div>
            
            <? include 'includes/leftColumn.php';?>
            
            </section>
        </section>

    </div>

    <? include 'includes/footer.php';?>

    </div>

</body>

</html>

























