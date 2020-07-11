<?php include('../view/header.php'); ?>

<main>

	<h2>Add Product</h2>
		
	<form action="./index.php" method="post" id="add_product_form">
		
		<input type="hidden" name="action" value="add_product">
		
		<label>Category:</label>
		<select name="category_id">
			<?php $selected = false; ?> <!-- -->
			<?php foreach($categories as $category) : ?>
				<?php if ($category['categoryID'] == $category_id) {
					$selected = true;
				} else {$selected = false;} ?>
				
				<option value="<?php echo $category['categoryID']?>" <?php if ($selected == true) {echo "selected";} ?>>
				
					<?php echo $category['categoryName']?>
				</option>
			<?php endforeach ?>
		</select><br>
		<label>Code:</label>
		<input 
			type="text" 
			name="code"
			value="<?php echo htmlspecialchars($code); ?>"
		/>
		<span><?php echo $fields->getField('code')->getHTML(); ?></span>
		<br>
		
		<label>Name:</label>
		<input 
			type="text" 
			name="name"
			value="<?php echo htmlspecialchars($name); ?>"
		/>
		<span><?php echo $fields->getField('name')->getHTML(); ?></span>
		<br>
		
		<label>List Price:</label>
		<input 
			type="text" 
			name="price"
			value="<?php echo htmlspecialchars($price); ?>"
		/>
		<span><?php echo $fields->getField('price')->getHTML(); ?></span>
		<br>
		
		<label>&nbsp;</label>
		<input type="submit" value="Add Product"><br>
		
	</form>
	
	<p class="last_paragraph">
		<a href="?action=list_products">View Product List</a>
	</p>

</main>
	
<?php include('../view/footer.php'); ?>
		
	
