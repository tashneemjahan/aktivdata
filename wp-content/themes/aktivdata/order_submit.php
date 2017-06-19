
<?php
//require_once "Mail.php";
   include("wp-config.php");
   session_start();
   
  	if(!empty($_POST['address'])){
 
		$db = new mysqli("localhost","root","","aktivdata1");
		
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$name    = $_POST['name'];
$address    = $_POST['address'];
$email   = $_POST['email'];
$order_date   = $_POST['order_date'];
$due_date = $_POST['due_date'];
$total_order = $_POST['total_order'];
$product = $_POST['product'];
$quantity =  $_POST['quantity'];
$order_information = $_POST['order_information'];

$query1   = "INSERT into custom_order ( name,address, email,order_date, due_date, total_order, product, quantity, order_information)
 VALUES('" . $name . "','" . $address . "','" . $email . "','" . $order_date . "','" . $due_date . "','" . $total_order . "','" . $product . "','" . $quantity . "','" . $order_information . "')";
$success  = $db->query($query1);

if (!$success) {
   // die("Couldn't enter data: ".$db->error);
   
	$info="Please fill all the columns..!!!";
	header("Location: http://localhost/aktivdata/order_failed");
} else {
	
/*$to = 'tashneemjava@gmail.com';
$subject = 'the subject';
$from = 'tashneemjava@gmail.com';
$message = 'hello';
if(mail($to, $subject, $message,$from))
{}else{
	
	echo "error";
}*/
	header("Location: http://localhost/aktivdata/wp-content/themes/aktivdata/order-details-submit.php");


 
		}
	}
?>