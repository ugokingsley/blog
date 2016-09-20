<?php
	session_start();
	 
	  include 'libraries/dbconfig.php';

	  //$db=new Database();
	  
	if(isset($_POST['submit']))
	{
		//$user_name = $_POST['user_name'];
		$user_name = trim($_POST['user_name']);
		$user_password = trim($_POST['user_password']);
		
		$user_password = md5($user_password);
		
		try
		{	
		
			$stmt = $db->prepare("SELECT * FROM user WHERE user_name=:username");
			$stmt->execute(array(":username"=>$user_name));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			
			if($row['user_password']==$user_password){
				
				echo "ok"; // log in
				$_SESSION['user_session'] = $row['user_name'];
			}
			else{
				
				echo "username or password does not exist."; // wrong details 
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
		
		


	}

?>