<?php

	session_start();

   //connect to database
    include 'includes/dbconn.php';

	$featured = "1";
//	$where = "";

	if(isset($_GET["featured"]) && !empty($_GET["featured"])) {
		$featured = $_GET["featured"];
	//	$where = "WHERE featured = $featured";
	}
	$sql = "SELECT * FROM products WHERE featured = $featured";
    

	//	2. issue query 
	$result = mysqli_query($connect, $sql);
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

<div class="wrap">
    <section id="contents">
		<section id="list">
			<div class="wrap">
    			<div class="right-column">
					<ul>
					<?php while($row = mysqli_fetch_array($result)) {; ?>
						<li>
						<div class="photo">
						<a href="" title="Product Title" class="product-image"><img src="products/small/<?php echo $row["image"];?>.jpg" alt="Product Title" /></a>
						</div>
						<div class="content">
						<h3><a href="product.php?id=<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a></h3>
						<p><?php echo $row["description"]; ?></p>
						</div>
						<div class="price">
							<a href="product.php?id=<?php echo $row["id"]; ?>" title="More Details">More Details</a>
							<span><?php echo $row["price"]; ?></span>
						</div>
						</li>
	                   <?php } ?>                        
                    </ul>
             </div>
            
            <? include 'includes/leftColumn.php';?>

            </section>
    </section>

</div>     

<? include 'includes/footer.php';?>

</div>



</body>

</html>

























