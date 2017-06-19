
<?php
   include("wp-config.php");
   session_start();
 
	if(!empty($_POST['username']) )
	{
		
		$db = new mysqli("localhost","root","","aktivdata1");
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	
		// create query
		$query = "SELECT password FROM login_user WHERE username='".$_POST['username']."'";
			echo   $query;
		// execute query
		$result  = $db->query($query);
		while($row = $result->fetch_assoc()) 
		{
			
			$password_data = $row["password"];
			
			// if $password_data match it mean their is an existing record that match base on your query above 
			if($password_data == $_POST['password']){
				header("Location: http://localhost/aktivdata/login");
			} 
				else 
				{
					 $id="Username or Password is Wrong..!!";
					 header("Location: http://localhost/aktivdata/wrong-user");
				}
		}
		
		
	}
?>