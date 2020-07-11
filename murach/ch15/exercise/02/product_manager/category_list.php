<?php include('../view/header.php'); ?>

<main>
	
		<h2>Category List</h2>
		<table>
			
			<tr>
				<th>Name</th>
				<th>&nbsp;</th>
			</tr>
			
			<?php foreach($categories as $category) : ?>
			<tr>
				<td><?php echo $category['categoryName'] ?></td>
				<td>
					<form action="." method="post">
						<input type="hidden" name="action" value="delete_category">
						<input type="hidden" name="category_id" 
							value="<?php echo $category['categoryID'] ?>">
						<input type="submit" value="Delete">
					</form>
				</td>
			</tr>
			<?php endforeach ?>
			
		</table>
		
		<h2>Add Category</h2>
		<form action="." method="post"> <!-- ./index.php ??? -->
			<label>Name:</label>
			<input type="text" name="name">
			<input type="hidden" name="action" value="add_category">
			<input type="submit" value="Add">
		</form><br>
		
		<p>
			<a href=".">List Products</a>
		</p>
	
</main>

<?php include('../view/footer.php'); ?>