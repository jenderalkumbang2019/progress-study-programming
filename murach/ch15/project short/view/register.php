<?php include('header.php'); ?>

<main>
    <form action="." method="post">
        <fieldset class="user_information">

            <legend>User Information</legend>

            <label>First Name:</label>
            <input 
                type="text" 
                name="firstName" 
                value="<?php echo htmlspecialchars($first_name); ?>" 
            />
            <?php echo $fields->getField('first_name')->getHTML(); ?>
            <br>

            <label>Last Name:</label>
            <input 
                type="text" 
                name="lastName" 
                value="<?php echo htmlspecialchars($last_name); ?>" 
            />
            <?php echo $fields->getField('last_name')->getHTML(); ?>
            <br>
            
            <label>Phone:</label>
            <input type="text" name="phone">
            <?php echo $fields->getField('phone')->getHTML(); ?>
            <br>

            <label>E-Mail:</label>
            <input type="text" name="email">
            <?php echo $fields->getField('email')->getHTML(); ?>
            <br>
            <br>
        </fieldset>
        <br>

        <fieldset class="submit_registration">
            <legend>Submit Registration</legend>
            <input type="submit" name="action" value="Register" class="btn_register">
            <input type="submit" name="action" value="Reset" class="btn_reset">
        </fieldset>
    </form>
</main>

<?php include('footer.php'); ?>