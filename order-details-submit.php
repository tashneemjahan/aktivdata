<?php
require('/wp-blog-header.php');
get_header(); 
?>
 <script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>
<div class="order_submit">
<h1 Style="text-align:center">Thank you for your order..!!</h1>
<h1 Style="text-align:center">Your Order Details</h1>
<?php
require 'wp-config.php';


$db = new mysqli("localhost","root","","aktivdata1");
$sql = "select max(id) as id from custom_order";
	$result  = $db->query($sql);
	
	while($row = $result->fetch_assoc()) {
		$id = $row["id"];
$query   = "select name,email,address,date(order_date) as order_date,product,quantity,order_information from custom_order where id='". $id ."'";
$success  = $db->query($query);

if (!$success) {
    die("Couldn't enter data: ".$db->error);
}

else {
	
	 echo "<table class='new_table' >
      <tr class='tr'>
	  <thead >
         <th class='th'>Name</th>
         <th class='th'>Email</th>
     
         <th class='th'>Address</th>
         <th class='th'>Order Date</th>
      
         
         <th class='th'>Product</th>

         <th class='th'>Quantity</th>
         <th class='th'>Product Price</th>
      </tr>
	  </thead>
	  ";

   while($row = $success->fetch_assoc()) { 
  
      echo "<tbody class='tbody'><tr class='tr'>";
      echo "<td class='td'>" . $row['name'] . "</td>";
      echo "<td class='td'>" . $row['email'] . "</td>";
      
      echo "<td class='td'>" . $row['address'] . "</td>";
      echo "<td class='td'>" . $row['order_date'] . "</td>";
      
     
      echo "<td class='td'>" . $row['product'] . "</td>";
      
      echo "<td class='td'>" . $row['quantity'] . "</td>";
      echo "<td class='td'>" . $row['order_information'] . "</td>";
      echo "</tr></tbody>";
   }
   echo "</table>";
 
			
$db->close();
		}

}

?>
</div>
<?php
$login_match = $_GET['id'];
$Company_name = $_GET['id1'];
$user_name = $_GET['id2'];
$pass_word = $_GET['id3'];
$Company = base64_decode( urldecode( $Company_name ) );
$username = base64_decode( urldecode( $user_name ) );
$password = base64_decode( urldecode( $pass_word ) );
if($login_match==1)
{
	
?>	

<table>
<tr>
<td><h3 style="color:red;padding:10px;">Please check you email for your Login Details..!</td>
<td><a href="http://10.0.0.1/sites/wrlite/clogin.php">
		<span style="color:red;">
			<button>Click here to Login</button>
		</span>
	</a>
</h3>
</td>
</tr>
</table>

<?php
}else
{?>

</br>
<hr>
</br>
<div class="gmail_box">
<table class="new_login">
<tr >
<td colspan=2><h4 style="color:red;text-align:center">Email is not send to your giving email address.</h4></td>
</tr>
<tr>
<td class="td1">Your Company code is:</td>
<td class="td1"><?php echo $Company; ?></td>
</tr>
<tr>
<td class="td1">Your Username is:</td>
<td class="td1"><?php echo $username; ?></td>
</tr>
<tr>
<td class="td1">Your Password is:</td>
<td class="td1"><?php echo $password; ?></td>
</tr>
</table>
</br>
	
	
	<a href="http://10.0.0.1/sites/wrlite/clogin.php"><span style="color:red;"> <button>Click here to Login &nbsp;&nbsp;&#8594;</button></span></a>
</div>

<?php}
?>	



<?php
}
require('/wp-blog-header.php');
get_footer(); 
?>
