<?php include('../view/header.php'); ?>

<main>

	<?php include('../view/category_nav.php'); ?>
	
	<section>
		<h2><?php echo $name; ?></h2>
		
		<div id="left_column">
			<p>
				<img src="<?php echo $image_fileName ?>" alt="<?php echo $image_alt ?>">
			</p>
		</div>
		
		<div id="right_column">
				<p><b>List Price: </b><?php echo "$" . $price; ?></p>
				<p><b>Discount: </b><?php echo $discount_percent . "%"; ?></p>
				<p><b>Your Price: </b><?php echo "$" . $unit_price_f . " (you save $ " . 
					$discount_amount_f . ")"; ?></p>
					
				<form action="." method="post">
					<b>Quantity: </b>
					<input type="hidden" name="action" value="add">
					<input type="text" name="quantity" value="1" size="2">
					<input type="hidden" name="product_id" 
						value="<?php echo $product_id ?>">
					<br><br>
					<input type="submit" value="Add to Cart">
				</form>
		</div>
		
	</section>
	
</main>

<?php include('../view/footer.php'); ?>