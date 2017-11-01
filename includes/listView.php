<!-- List view presentation begin. -->
        <section id="list">
			<div class="wrap">
				<div class="right-column">
					<ul>
					<?php while($row = mysqli_fetch_array($result)) {; ?>
						<li>
						<div class="photo">
						<a href="" title="Product Title" class="product-image"><img src="images/<?php echo $row["image"]; ?>".jpg" alt="Product Title" /></a>
						</div>
						<div class="content">
						<h3><a href="product.php?id=<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a></h3>
						<p><?php echo $row["description"]; ?></p>
						</div>
						<div class="price">
							<a href="cart.php" title="More Details">Add to Cart</a>
							<span><?php echo $row["price"]; ?></span>
						</div>
						</li>
	                   <?php } ?>                        
                    </ul>
             </div>
         </section>
<!-- List view presentation end -->