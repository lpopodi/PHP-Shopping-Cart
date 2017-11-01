<?php
    session_start();
   
   echo session_id();
   
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
<meta charset="utf-8">
<title> Cart Project 2</title>
</head>

<body>
<a href="index.php">Home</a>
<a href="index.php?category=vitamins">Vitamins</a>
<a href="index.php?category=steroids">Steroids</a>
<a href="index.php?category=diet aids">Diet Aids</a>



<table border="1">

  <tr>
  <td><?php echo $row["name"]; ?></td>
  <td><?php echo $row["description"]; ?></td>
  <td><?php echo $row["price"]; ?></td>
  </tr>

<form action="cart.php" method="post">
<input type="hidden" name="action" value="add">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" name="btnBuy" value="Buy">
</form>
</table>
</body>
</html>