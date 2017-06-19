<?php
require_once "Mail.php";
ob_start();
include("wp-config.php");
date_default_timezone_set('UTC');	
// Function to get the client ip address
function get_client_ip_server() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}
// Get the client ip address
$ipaddress = $_SERVER['REMOTE_ADDR'];
if(!empty($_POST['address'])){
 
		$db = new mysqli("aktivdata.fi.mysql.service.one.com","aktivdata_fi_wordpress1","kayroot","aktivdata_fi_wordpress1");
	
// Check connection
      	$c_name    = $_POST['c_name'];
		$name    = $_POST['name'];
		$address    = $_POST['address'];
		$email   = $_POST['email'];
		$order_date1   = $_POST['order_date'];
		$order_date=date("Y-m-d H:i:s", strtotime($order_date1));
		$due_date1 = $_POST['due_date'];
		$due_date=date('Y-m-d H:i:s', strtotime($due_date1));
		
		$product = $_POST['product'];
		$quantity =  $_POST['quantity'];
		$order_information = $_POST['order_information'];
		//this query is to insert form details into customer table with tehre ip_address informations
		$query1   = "INSERT into custom_order ( cname,name,address, email,order_date, due_date, total_order, product, quantity, order_information,ip_address)
		 VALUES('" . $c_name . "','".$name."','" . $address . "','" . $email . "','" . $order_date . "','" . $due_date . "','" . '1' . "','" . $product . "','" . $quantity . "','" . $order_information . "','".$ipaddress."')";
		$success  = $db->query($query1);


if (!$success) {
   // die("Couldn't enter data: ".$db->error);
	$info="Please fill all the columns..!!!";
	header("Location: http://www.aktivdata.fi/cancle.php?id=$info");
} else {
	// if upper query execute then this query is used as to save information in ntrax server also
	$url = "aktivdata.info/sites/wrlite/adm/order.php?cn=$c_name&un=$name";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
		// This is what solved the issue (Accepting gzip encoding)
		curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");     
		$response = curl_exec($ch);
		curl_close($ch);
		$arr = (json_decode($response, true));
		 $company=$arr["company"];
		 $username=$arr["user-name"];
		 $company_name=$arr["company-code"];
		 $password_gen=$arr["password"];
		 
 
if($response)
	{
	$to      = 'tashneemjava@gmail.com';
	$subject = 'Your username and password';
	$message='demo';
//	$message = 'Thank you for your order'."\r\n".'Your Company Code is:'.$company_name."\r\n".'Your username is'.$username."\r\n" .'Your password is:'.$password_gen;
	$headers = 'From: info@aktivadata.fi' . "\r\n" .
    'Reply-To: info@aktivadata.fi' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers))
	{
	$to      = 'tashneem45@gmail.com';
	$subject = 'New Order details';
	$message = 'Order Informations:'."\r\n".
	'Company Name:'.$name."\r\n".
	'Address:'.$address."\r\n".
	'Email:'.$email."\r\n".
	'Order Date:'.$order_date."\r\n".
	'Due Date:'.$due_date."\r\n".
	'Product:WayBills'."\r\n".
	'Quanitity:1'."\r\n" .
	'Price:150 Eur\month';
	$headers = 'From:'.$email. "\r\n" .
    'X-Mailer: PHP/' . phpversion();
		if(mail($to, $subject, $message, $headers))
		{
			//$url = "10.0.0.1/sites/wrlite/adm/order.php?cn=$name&login=$ipaddress";
		
			$login='1';
			header("Location: http://www.aktivdata.fi/order-details-submit.php?id=$login;");
		}
			$login='1';
			header("Location: http://www.aktivdata.fi/order-details-submit.php?id=$login;");
	}
	else
	{
		
		$companycode = urlencode( base64_encode( $company_name ) );
		$username1 = urlencode( base64_encode( $username ) );
		$passsword = urlencode( base64_encode( $password_gen ) );

		header("Location: http://www.aktivdata.fi/order-details-submit.php?id1=$companycode;&id2=$username1;&id3=$passsword;");
		
	}}
	}}?>