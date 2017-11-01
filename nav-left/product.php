<?php
    //connect to database
    $connect = mysqli_connect("gdwa343mon.db.11053868.hostedresource.com", "gdwa343mon", "a!pX4b343m", "gdwa343mon");

    $id = 0;
    
    if(isset($_GET["id"]) && !empty($_GET["id"])) {
       $id = (int) $_GET["id"];   
    }
    $sql = "SELECT * FROM products WHERE id = $id";
    
    echo $sql;
    
    //issue query
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($result);

?>


<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product</title>
       <link href="css/style.css" rel="stylesheet" />
    </head>

<body>
        <div id="wrapper">
            <header>HEADER</header>
            <div id="columnLeft">
                <h3>Site Nav</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?category=vitamins">Vitamins</a></li>
                    <li><a href="index.php?category=steroids">Steroids</a></li>
                    <li><a href="index.php?category=diet aids">Diet Aids</a></li>
                </ul>
            </div>
            <div id="columnMain">
                <h1>ColumnMain</h1>
					  <img src="images/product.jpg" width="300" height="300" align="left" alt=""/>
                      <p class="productName"><?php echo $row["name"]; ?></p>
                      <p class="productPrice"><?php echo $row["price"]; ?></p>
                      <p class="productDescription"><?php echo $row["description"]; ?></p>                    
            </div>
            <footer class="cleaner">FOOTER</footer>
        </div>

</body>
</html>