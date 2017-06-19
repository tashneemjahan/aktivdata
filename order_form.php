<?php
require('/wp-blog-header.php');
get_header(); 
?>
 <script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<head>
<title><?php add_theme_support( 'title-tag' ); ?></title>
 
</head>
 <script>
  var dateToday = new Date(); 
$(function() {
    $( "#datepicker,#datepicker1").datepicker({
        numberOfMonths: 1,
        showButtonPanel: true,
        minDate: dateToday
    });
});
  
  </script>
  <script>
 
  
  </script>
<h1 style="text-align: center;"><strong>Custom Order Form</strong></h1>
<div class="login_form">
<h3 style="text-align: center;"><strong>Customer Information</strong></h3>
<form action="http://localhost/aktivdata/order_submit.php" method="POST">
<label>Company Name:</label><input name="c_name" type="text" />
<label>Name:</label><input name="name" type="text" />
<label>Address:</label><textarea class="name" name="address"></textarea>
<label>Email:</label><input class="email" name="email" type="text" />
<label>Date ordered:</label><input type="text" id="datepicker" name='order_date' size='9' value="" /> 
 
<h3 style="text-align: center;"><strong>Order Detail</strong></h3>
<label>Product:</label><input type="text" value="WayBills"class="product" name="product" readonly="readonly" />
<label>Quantity:</label><input class="quantity" value="1" name="quantity" type="text" readonly="readonly" />
<label>Price:</label><input type="text" class="price" value="150 Eur/year (VAT 0%)"name="order_information" readonly="readonly" />
</br>
</br>
<input class="submit_order"  type="submit" value=" Submit " />

</form></div>


<?php
require('/wp-blog-header.php');
get_footer(); 
?>
