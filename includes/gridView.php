<!-- Grid view presentation begin. -->
		<section id="grid">
			<div class="wrap">
				<ul>
					<?php while($row = mysqli_fetch_array($result)) {; ?>
                    <li>
						<div class="photo">
							<a href="" title="Product Title" class="product-image"><img src="products/<?php echo $row["image"]; ?>".jpg" alt="Product Title" /></a>
						</div>
						<div class="content">
							<h3><a href="product.php?id=<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></a></h3>
							<!-- Limit words to about 30 if possible - space will be limited. -->
							<p><?php echo $row["description"]; ?></p>
						</div>
						<div class="price">
							<a href="" title="More Details">More Details</a>
							<!-- You can also wrap the price in <del></del> tags — they will be shown in red then. -->
							<span><?php echo $row["price"]; ?></span>
						</div>
					</li>
                    <?php } ?> 
                <!-- Repeatable area end. -->
            </div>
        </section>
					