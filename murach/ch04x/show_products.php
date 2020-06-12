<!DOCTYPE html>
<html>
	<head>
		<title>Show Products</title>
		<style>
			table {
				width: 40%;
			}
			table, tr, td {
				border: 1px solid black;
			}
		</style>
	</head>
	<body>
		<table>
			
			<?php foreach($products as $product) : ?>
			<tr>
				<td style="text-align: right"><?php echo $product['productID']; ?></td>
				<td style="text-align: right"><?php echo $product['categoryID']; ?></td>
				<td><?php echo $product['productCode']; ?></td>
				<td><?php echo $product['productName']; ?></td>
				<td style="text-align: right"><?php echo number_format($product['listPrice'], 2); ?></td>
			</tr>
			<?php endforeach; ?>
			
		</table>
	</body>
</html>