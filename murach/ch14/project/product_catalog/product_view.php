<?php require_once('../view/header.php'); ?>
<main>
    
    <aside class="product_catalog">
        <h3>Category</h3>
        <ul>
            <?php foreach($categories as $category) : ?>
            <li>
                <a href=".?action=catalog_product&category_id=<?php echo $category->getID(); ?>">
                    <?php echo $category->getName(); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </aside>
    
    <section class="product_catalog">
        <h3><?php echo $product->getName(); ?></h3>
        <img src="<?php echo $file_image; ?>">
        <div>
            <p><b>List Price:</b> $<?php echo $product->getPrice(); ?></p>
            <p><b>Discount:</b> <?php echo $product->getDiscountPercent(); ?>%</p>
            <p><b>Your Price:</b> $<?php echo $product->getDiscountPrice(); ?>
            ( you save $<?php echo $product->getDiscountAmount(); ?> )</p>
            <p>
                <form action="." method="post">
                    <input type="hidden" name="action" value="add_to_cart">
                    <input type="hidden" name="product_id" 
                        value="<?php echo $product->getID(); ?>" 
                    />
                    <label><b>Quantity:</b></label>
                    <input type="text" name="qty" value="1" style="width: 30px; height: 20px; margin-left: 10px;"><br>
                    <input type="submit" value="Add to Cart" style="margin-top: 20px; width: 100px; height: 40px; background-color: mediumaquamarine">
                </form>
            </p>
            
        </div>
    </section>

    <br>
</main>
<?php require_once('../view/footer.php'); ?>