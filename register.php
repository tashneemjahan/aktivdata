
<?php
//require_once "Mail.php";
   include("wp-config.php");
   session_start();
  	if(!empty($_POST['fname'])){
 
		$db = new mysqli("localhost","root","","aktivdata1");
		
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$last_name    = $_POST['lname'];
$first_name   = $_POST['fname'];
$email   = $_POST['email'];
$password = $_POST['password'];
$hash_password = md5($password);
//$re_password = $_POST['re-password'];
//$re_hash_password = md5($re_password);
$mobile = $_POST['phone'];

$query1   = "INSERT into wp_register_user (first_name,last_name,email,password,re_password,mobile,status) VALUES('" . $first_name . "','" . $last_name . "','" . $email . "','" . $hash_password . "','" . $mobile . "','" . '1' . "')";
$success  = $db->query($query1);

if($success)
{
$query2   = "INSERT into login_user (id,username,password,login_time) VALUES('" . $email . "','" . $password . "',now())";

$success1=$db->query($query2);


}

else
{
	$info="Password not match..!!!";
	header("Location: http://localhost/aktivdata/register");
}



if (!$success) {
   // die("Couldn't enter data: ".$db->error);
   
	$info="Please fill all the columns..!!!";
	header("Location: http://localhost/aktivdata/register");
} else {
	
/*$to = 'tashneemjava@gmail.com';
$subject = 'the subject';
$from = 'tashneemjava@gmail.com';
$message = 'hello';
if(mail($to, $subject, $message,$from))
{}else{
	
	echo "error";
}*/
	header("Location: http://localhost/aktivdata/register");


 
		}
	}
?>