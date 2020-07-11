<?php include('header.php'); ?>

<main>
    <form action="." method="post">

        <!-- fieldset account_information -->
        <fieldset class="user_information">

            <legend>Account Information</legend>

            <!-- email -->
            <label>E-Mail:</label>
            <input 
                type="text" 
                name="email" 
                value="<?php echo htmlspecialchars($email); ?>" 
            />
            <p><?php echo $fields->getField('email')->getHTML(); ?></p>
            <br>

            <!-- password -->
            <label>Password:</label>
            <input 
                type="password" 
                name="password" 
                value="<?php echo htmlspecialchars($password); ?>" 
            />
            <p><?php echo $fields->getField('password')->getHTML(); ?></p>
            
            <br>

            <!-- verify password -->
            <label>Verify Password:</label>
            <input 
                type="password" 
                name="verifyPassword"
                value="<?php echo htmlspecialchars($verify_password); ?>"
            />
            <p><?php echo $fields->getField('verify_password')->getHTML(); ?></p>
            
            <br>
            <br>
        </fieldset>

        <!-- fieldset user_information -->
        <fieldset class="user_information">

            <legend>User Information</legend>

            <!-- first name -->
            <label>First Name:</label>
            <input 
                type="text" 
                name="firstName" 
                value="<?php echo htmlspecialchars($first_name); ?>" 
            />
            <p><?php echo $fields->getField('first_name')->getHTML(); ?></p>
            <br>

            <!-- last name -->
            <label>Last Name:</label>
            <input 
                type="text" 
                name="lastName" 
                value="<?php echo htmlspecialchars($last_name); ?>" 
            />
            <p><?php echo $fields->getField('last_name')->getHTML(); ?></p>
            <br>
            
            <!-- address -->
            <label>Address:</label>
            <input 
                type="text" 
                name="address"
                value="<?php echo htmlspecialchars($address); ?>" 
            />
            <p><?php echo $fields->getField('address')->getHTML(); ?></p>
            
            <br>

            <!-- city -->
            <label>City:</label>
            <input 
                type="text" 
                name="city"
                value="<?php echo htmlspecialchars($city); ?>" 
            />
            <p><?php echo $fields->getField('city')->getHTML(); ?></p>
            
            <br>

            <!-- state -->
            <label>State:</label>
            <input 
                type="text" 
                name="state"
                value="<?php echo htmlspecialchars($state); ?>"
            />
            <p><?php echo $fields->getField('state')->getHTML(); ?></p>

            <br>

            <!-- zipcode -->
            <label>ZIP Code:</label>
            <input 
                type="text" 
                name="zipCode"
                value="<?php echo htmlspecialchars($zip_code); ?>"
            />
            <p><?php echo $fields->getField('zip_code')->getHTML(); ?></p>
            
            <br>

            <!-- phone -->
            <label>Phone Number:</label>
            <input 
                type="text" 
                name="phone"
                value="<?php echo htmlspecialchars($phone); ?>" 
            />
            <p><?php echo $fields->getField('phone')->getHTML(); ?></p>
            <br>

            <!-- birthdate -->
            <label>Birth Date:</label>
            <input 
                type="text" 
                name="birthdate"
                value="<?php echo htmlspecialchars($birthdate); ?>" 
            />
            <p><?php echo $fields->getField('birthdate')->getHTML(); ?></p>
            <br>

            <br>
        </fieldset>

        <!-- payment_information -->
        <fieldset class="user_information">

            <legend>Payment Information</legend>

            <!-- cartType -->
            <label>Cart Type:</label>
            <select name="cardType">
                <option 
                    value="m" 
                    <?php if($card_type == 'm') {echo "selected";}?>
                />MasterCard</option>
                <option value="v" <?php if($card_type == 'v') {echo "selected";}?>>Visa</option>
                <option value="a" <?php if($card_type == 'a') {echo "selected";}?>>American Express</option>
                <option value="d" <?php if($card_type == 'd') {echo "selected";}?>>Discover</option>
            </select>
            <p><?php echo $fields->getField('card_type')->getHTML(); ?></p>

            <br>

            <!-- cardNumber -->
            <label>Card Number:</label>
            <input 
                type="text" 
                name="cardNumber"
                value="<?php echo htmlspecialchars($card_number); ?>"
            />
            <p><?php echo $fields->getField('card_number')->getHTML(); ?></p>
            <br>

            <!-- expirationDate -->
            <label>Expiration Date:</label>
            <input 
                type="text" 
                name="expDate"
                value="<?php echo htmlspecialchars($exp_date); ?>"
            />
            <p><?php echo $fields->getField('exp_date')->getHTML(); ?></p>
            <br>
            <br>
        </fieldset>
        <br>

        <!-- fieldset submit_registration -->
        <fieldset class="submit_registration">
            <legend>Submit Registration</legend>
            <input type="submit" name="action" value="Register" class="btn_register">
            <input type="submit" name="action" value="Reset" class="btn_reset">
        </fieldset>
    </form>
</main>

<?php include('footer.php'); ?>