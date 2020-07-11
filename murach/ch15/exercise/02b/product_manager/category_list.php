<?php require('../view/header.php'); ?>
<main>
    <h3>Category List</h3>
    <aside class="del_category">
        <table>
            <tr>
                <th style="width=60%">Name</th>
                <th style="width=40%"></th>
            </tr>

            <?php foreach($categories as $category) : ?>
            <tr>
                <td style="width: 60%"><?php echo $category->getName(); ?></td>
                <td style="width: 40%">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_category">
                        <input type="hidden" name="category_id" value="<?php echo $category->getID(); ?>">
                        <input type="submit" value="Delete" class="btn_del_category">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
    </aside>
    
    <br>
    <br>

    <h3>Add Category</h3>
    <aside class="add_category">
        <form action="." method="post">
            <input type="hidden" name="action" value="add_category">
            <label>Name</label>
            <input type="text" name="categoryName">
            <input type="submit" value="Add">
        </form>
    </aside>
    <br>
    <br>
    <br>

    <p class="show_category"><a href=".?action=list_product">List Products</a></p>
    <br>
    <br>
<?php require('../view/footer.php'); ?>