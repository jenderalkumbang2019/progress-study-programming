<?php require('../view/header.php'); ?>
    <main>
        <h3>Add Product</h3>
        <aside class="add_product">

            <form action="." method="post">

                <input type="hidden" name="action" value="add_product">

                <label>Category:</label>
                <select name="category_id">
                    <?php foreach($categories as $category) :?>
                    <option value="<?php echo $category->getID(); ?>">
                        <?php echo $category->getName(); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <br>
                
                <label>Code:</label>
                <input type="text" name="code" value="<?php echo $product->getCode(); ?>">
                <br>

                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $product->getName(); ?>">
                <br>

                <label>List Price:</label>
                <input type="text" name="price" value="<?php echo $product->getPrice(); ?>">
                <br>

                <label>&nbsp;</label>
                <input type="submit" value="Add Product" class="btn_add_product">
                <br>
            </form>
            <br>
            <br>
            <p class="  _product"><a href=".?action=list_product">View Product List</a></p>

        </aside>

        <br>
        
    </main>
<?php require('../view/footer.php'); ?>