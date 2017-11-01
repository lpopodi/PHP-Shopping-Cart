<?php
   session_start();
   
   echo session_id();
   
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
    
    echo $sql;
    
    //issue query
    $result = mysqli_query($connect, $sql);    

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Cart Project wk5</title>
</head>

<body>
<a href="index.php">Home</a>
<a href="index.php?category=vitamins">Vitamins</a>
<a href="index.php?category=steroids">Steroids</a>
<a href="index.php?category=diet aids">Diet Aids</a>



<table border="1">

<?php while($row = mysqli_fetch_array($result)) { ?>
  <tr>
  <td>
        <a href="product.php?id=<?php echo $row["id"]; ?>">
        <?php echo $row["name"]; ?>
        </a>
  </td>
  <td><?php echo $row["description"]; ?></td>
  <td><?php echo $row["price"]; ?></td>
  </tr>
  
  <?php   }  ?>

</body>
</html>