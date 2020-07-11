<?php include('../view/header.php'); ?>
	
	<main>
	
		<?php include('../view/category_nav.php'); ?>
		
		<section>
			<h2><?php echo $category_name ?></h2>
			<nav>
				<ul>
					<?php foreach($products as $product) : ?>
					
						<li>
							<a href="?action=view_product&product_id=
								<?php echo $product['productID']; ?>">
									<?php echo $product['productName']; ?>
							</a>
						</li>
						
					<?php endforeach?>
				</ul>
			</nav>
		</section>
		
	</main>
	
<?php include('../view/footer.php'); ?>