<?php include('header.php'); ?>
<main>
    <h2>Success</h2>
    <p>The following registration information has been successfully submitted.</p>
    <ul>
        <li><b>Email:</b> <?php echo htmlspecialchars($email); ?></li>
        <li><b>Password:</b> <?php echo htmlspecialchars($password); ?></li>
        <li><b>Verify Password:</b> <?php echo htmlspecialchars($verify_password); ?></li>
        <li><b>First Name:</b> <?php echo htmlspecialchars($first_name); ?></li>
        <li><b>Last Name:</b> <?php echo htmlspecialchars($last_name); ?></li>
        <li><b>Address:</b> <?php echo htmlspecialchars($address); ?></li>
        <li><b>City:</b> <?php echo htmlspecialchars($city); ?></li>
        <li><b>State:</b> <?php echo htmlspecialchars($state); ?></li>
        <li><b>ZIP Code:</b> <?php echo htmlspecialchars($zip_code); ?></li>
        <li><b>Phone:</b> <?php echo htmlspecialchars($phone); ?></li>
        <li><b>Birth Date:</b> <?php echo htmlspecialchars($birthdate); ?></li>
        <li><b>Card Type:</b> <?php echo htmlspecialchars($card_type); ?></li>
        <li><b>Card Number:</b> <?php echo htmlspecialchars($card_number); ?></li>
        <li><b>Expiration Date:</b> <?php echo htmlspecialchars($exp_date); ?></li>
    </ul>
</main>
<?php include('footer.php'); ?>