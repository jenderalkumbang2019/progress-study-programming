<?php require_once('header.php'); ?>

<main>
    <h3>Product List</h3>
    
    <aside>
        <h4>Categories</h4>
        <ul>
            <?php foreach($categories as $category) : ?>
            <li>
                <a href=".?category_id=<?php echo $category->getID(); ?>">
                    <?php echo $category->getName(); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </aside>

    <section>
        <h4><?php echo $current_category->getName(); ?></h4>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
                <th></th>
            <tr>

            <?php foreach($products as $product) : ?>
            <tr>
                <td style="width: 20%"><?php echo $product->getCode(); ?></td>
                <td style="width: 40%"><?php echo $product->getName(); ?></td>
                <td style="text-align: right"><?php echo $product->getPrice(); ?></td>
                <td style="width: 20%; text-align: center">
                    <form action="." method="post">
                        <input type="hidden" value="delete_product" name="action">
                        <input type="hidden" value="<?php echo $current_category->getID(); ?>" name="category_id">
                        <input type="hidden" value="<?php echo $product->getID(); ?>" name="product_id">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            <tr>
            <?php endforeach; ?>

        </table>

        <p class="add_product"><a href="#">Add Product</a></p>

    </section>

    <br>

</main>

<?php require_once('footer.php'); ?>