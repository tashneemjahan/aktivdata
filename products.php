<?php
//Include DB configuration file
include 'dbConfig.php';

//Set useful variables for paypal form
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'Insert_PayPal_Email'; //Business Email

?>
<?php
    //Fetch products from the database
    $results = $db->query("SELECT * FROM products");
    while($row = $results->fetch_assoc()){
?>
    <img src="images/<?php echo $row['image']; ?>"/>
    Name: <?php echo $row['name']; ?>
    Price: <?php echo $row['price']; ?>
    <form action="<?php echo $paypalURL; ?>" method="post">
        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="<?php echo $row['name']; ?>">
        <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="amount" value="<?php echo $row['price']; ?>">
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
        <input type='hidden' name='return' value='http://localhost/paypal_integration_php/success.php'>
        
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    </form>
<?php } ?>