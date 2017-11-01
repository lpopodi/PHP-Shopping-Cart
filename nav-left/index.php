<?php
    //connect to database
    $connect = mysqli_connect("gdwa343mon.db.11053868.hostedresource.com", "gdwa343mon", "a!pX4b343m", "gdwa343mon");
   
 //   $db = mysql_select_db("gdwa343mon", $connect);
//    $result = mysql_query("SELECT * FROM products");

    $category = "";
    $where = "";

    if(isset($_GET["category"]) && !empty($_GET["category"])) {
        $category = $_GET["category"];
        $where = "WHERE category = '$category'";
    }    
    
    $sql = "SELECT * FROM products $where";
    
   // echo $sql;
    
    //issue query
    $result = mysqli_query($connect, $sql);    

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
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
                    <div>
					<?php while($row = mysqli_fetch_array($result)) { ?>
                    		<div class="category"><img src="images/product_small.jpg" width="100" height="100" alt=""/>
                            <p><a href="product.php?id=<?php echo $row["id"]; ?>">
                            <?php echo $row["name"]; ?>
                            </a><br />
                      		<class="productDescription"><?php echo $row["description"]; ?><br />
                     		<class="productPrice"><?php echo $row["price"]; ?></p></div>
                      <?php   }  ?>
                      </div>
            </div>
            <footer class="cleaner">FOOTER</footer>
        </div>
    </body>
</html>