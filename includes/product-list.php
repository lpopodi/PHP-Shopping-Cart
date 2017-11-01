    <section id="contents">
		
		<!-- List view presentation begin. -->
		<section id="list">
			<div class="wrap">
				<div class="right-column">
					<section id="grid" class="product-details">
						<ul>
							<li>								
								<div class="photo">
									<a href="assets/cards-large.jpg" title="Photo" class="product-image nivoZoom"><img src="assets/cards-small.jpg" alt="Photo" /></a>
								</div>
							</li>
						</ul>
					</section>
					
					<div>
						<p><?php echo $row["descriptionlong"]; ?></p>
					</div>
					
					<form method="post" action="cart.php">
					<!--	<div class="variants">
							<label for="id">Variants</label>
							<select name="id" id="id">
								<option value="1">Red ($9.99)</option>
								<option value="2">Green ($10.99)</option>
								<option value="3">Blue ($11.99)</option>
							</select>
						</div> -->
						<div id="checkout">
							<h3><b>$9.99</b> <del>$13.99</del></h3>
							<input class="button" type="submit" value="Add to Cart" />
						</div>	
					</form>
				</div>
            </section>
        </section>