


<?php

define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '\wp-blog-header.php' );
$db = new mysqli("localhost","root","","aktivdata1");
$sql = "select max(id) as id from custom_order";
	$result  = $db->query($sql);
	
	while($row = $result->fetch_assoc()) {
		$id = $row["id"];
$query   = "select name,email,address,date(order_date) as order_date,date(due_date) as due_date,product,quantity,order_information from custom_order where id='". $id ."'";
$success  = $db->query($query);

if (!$success) {
    die("Couldn't enter data: ".$db->error);
}
else {
	
	 echo "<table border='1'>
      <tr>
         <th>Name</th>
         <th>Email</th>
     
         <th>Address</th>
         <th>Order Date</th>
      
         <th>Due Date</th>
         <th>Product</th>

         <th>Quantity</th>
         <th>Order Information</th>
      </tr>
	  ";

   while($row = $success->fetch_assoc()) { 
  
      echo "<tr>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      
      echo "<td>" . $row['address'] . "</td>";
      echo "<td>" . $row['order_date'] . "</td>";
      
      echo "<td>" . $row['due_date'] . "</td>";
      echo "<td>" . $row['product'] . "</td>";
      
      echo "<td>" . $row['quantity'] . "</td>";
      echo "<td>" . $row['order_information'] . "</td>";
      echo "</tr>";
   }
   echo "</table>";
 
			
$db->close();
		}

}

?>
<?php get_footer(); ?>
