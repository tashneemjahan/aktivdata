
<?php
//require_once "Mail.php";
   include("wp-config.php");
   session_start();
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

//echo 'Your IP address (using $_SERVER[\'REMOTE_ADDR\']) is ' . $ipaddress . '<br />';
//echo 'Your IP address (using get_client_ip_env function) is ' . get_client_ip_env() . '<br />';
//echo 'Your IP address (using get_client_ip_server function) is ' . get_client_ip_server() . '<br />';
if(!empty($_POST['address'])){
 
		$db = new mysqli("localhost","root","","aktivdata1");
	
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
		$c_name    = $_POST['c_name'];
		$name    = $_POST['name'];
		$address    = $_POST['address'];
		$email   = $_POST['email'];
		$order_date1   = $_POST['order_date'];
		$order_date=date("Y-m-d H:i:s", strtotime($order_date1));
		//$due_date1 = $_POST['due_date'];
		//$due_date=date('Y-m-d H:i:s', strtotime($due_date1));
		$total_order = $_POST['total_order'];
		$product = $_POST['product'];
		$quantity =  $_POST['quantity'];
		$order_information = $_POST['order_information'];
		//this query is to insert form details into customer table with tehre ip_address informations
		$query1   = "INSERT into custom_order ( name,cname,address, email,order_date, total_order, product, quantity, order_information,ip_address)
		 VALUES('" . $name . "','".$cname."','" . $address . "','" . $email . "','" . $order_date . "','" . '1' . "','" . $product . "','" . $quantity . "','" . $order_information . "','".$ipaddress."')";
		$success  = $db->query($query1);

if (!$success) {
   // die("Couldn't enter data: ".$db->error);
	$info="Please fill all the columns..!!!";
	header("Location: http://localhost/aktivdata/cancle.php?id=$info");
} else {
	// if upper query execute then this query is used as to save information in ntrax server also
		$url = "10.0.0.1/sites/wrlite/adm/order.php?cn=$c_name&un=$name";
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
		 $company_name=$arr["company-code"];
		 $username=$arr["user name"];
		 $password_gen=$arr["password"];
 
if($response)
	{
	$to      = $email;
	$subject = 'Your username and password';
	$message = 'Thank you for your order'."\r\n".'Your Company Code is:'.$company_name."\r\n".'Your username is'.$username."\r\n" .'Your password is:'.$password_gen;
	$headers = 'From: info@aktivadata.fi' . "\r\n" .
    'Reply-To: info@aktivadata.fi' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers))
	{
	$to      = 'info@aktivdata.fi';
	$subject = 'New Order details';
	$message = 'Order Informations:'."\r\n".
	'Company Name:'.$name."\r\n".
	'Address:'.$adress."\r\n".
	'Email:'.$email."\r\n".
	'Order Date:'.$order_date."\r\n".
	
	'Product:WayBills'."\r\n".
	'Quanitity:1'."\r\n" .
	'Price:150 Eur\month';
	$headers = 'From:'.$email. "\r\n" .
    'X-Mailer: PHP/' . phpversion();
		if(mail($to, $subject, $message, $headers))
		{
			//$url = "10.0.0.1/sites/wrlite/adm/order.php?cn=$name&login=$ipaddress";
			$login='1';
				$login='1';?>
			<script>window.location = "http://localhost/aktivdata/order-details-submit.php<?php  $id=1;?>";</script>
		<?php
			//header("Location:http://localhost/aktivdata/order-details-submit.php?id=$login;");
		}
	}
	else
	{
		
		$companycode = urlencode( base64_encode( $company_name ) );
		$username1 = urlencode( base64_encode( $username ) );
		$passsword = urlencode( base64_encode( $password_gen ) );

		header("Location: http://localhost/aktivdata/order-details-submit.php?id1=$companycode;&id2=$username1;&id3=$passsword;");
		
	}


 
		}
	}
	}
?>