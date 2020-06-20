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
        <h3><?php echo $current_category->getName(); ?></h3>
        <ul>
            <?php foreach($products as $product) : ?>
            <li>
                <a href=".?action=view_product&product_id=<?php echo $product->getID(); ?>">
                    <?php echo $product->getName(); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <br>
</main>
<?php require_once('../view/footer.php'); ?>