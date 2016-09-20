<?php
/**

	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$user_name = $_POST['user_name'];
		$matric = $_POST['matric'];
		$user_email = $_POST['user_email'];
		$dept = $_POST['dept'];
		$user_password = $_POST['user_password'];
		$joining_date =date('Y-m-d H:i:s');
		
		
		$password = md5($user_password);
		
		
		
		
		if(empty($first_name)){
			$errMSG = "Please Enter First name.";
		}
		else if(empty($last_name)){
			$errMSG = "Please Enter Your Last name.";
		}
		else if(empty($matric)){
			$errMSG = "Please Enter Your Matric Number.";
		}
		else if(empty($user_password)){
			$errMSG = "Please Enter Your password.";
		}
		
		else
		{

		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
							
			$stmt = $DB_con->prepare('INSERT INTO tbl_users(first_name,last_name,user_name,matric,user_email,dept,user_password,userPic,joining_date) VALUES(:fname, :lname, :uname, :mat, :email, :dept, :pass, :pic, :jdate)');
			$stmt->bindParam(":fname",$first_name);
			$stmt->bindParam(":lname",$last_name);
			$stmt->bindParam(":uname",$user_name);
			$stmt->bindParam(":mat",$matric);
			$stmt->bindParam(":email",$user_email);
			$stmt->bindParam(":dept",$dept);
			$stmt->bindParam(":pass",$password);
			$stmt->bindParam(":pic",$userPic);
			$stmt->bindParam(":jdate",$joining_date);
					
			if($stmt->execute())
			{
				$successMSG = "new record succesfully inserted ...";
				header("refresh:5;../index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
		
	}
	*/
?>
	
<?php include 'config/config.php'; ?>
<?php include 'libraries/database.php'; ?>
<?php include 'helpers/format_helper.php'; ?>
<?php 
//create DB OBJECT
$db=new Database();
if(isset($_POST['submit'])){
	$user_name=mysqli_real_escape_string($db->link,$_POST['user_name']);
	$user_email=mysqli_real_escape_string($db->link,$_POST['user_email']);
	$first_name=mysqli_real_escape_string($db->link,$_POST['first_name']);
	$last_name=mysqli_real_escape_string($db->link,$_POST['last_name']);
	$tel=mysqli_real_escape_string($db->link,$_POST['tel']);
	$date=mysqli_real_escape_string($db->link,$_POST['date']);
	$user_password=mysqli_real_escape_string($db->link,$_POST['user_password']);
	$user_password=md5($user_password);
	
	
	
	if($user_name=='' || $user_email=='' || $first_name=='' || $last_name=='' || $tel==''  || $date=='' || $user_password=='' ){
		//set error
		$error='please fill out all required fields';
	}else{
		$query="INSERT INTO user (user_name,user_email,first_name,last_name,tel,date,user_password,time) VALUES 
		('$user_name','$user_email','$first_name','$last_name','$tel','$date','$user_password','now()')";
		$insert_row=$db->insert($query);
	}
	
}

?>

	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Form using jQuery Ajax and PHP MySQL</title>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 

<link href="style.css" rel="stylesheet" type="text/css" media="screen">

<script  src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</head>

<body>

<
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">UNICAF</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Login</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><br/><br/>
    
<div class="signin-form">
	<div class="container">
     
        
       <form class="form-signin" method="post" action=" register.php "id="register-for">
      
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        
        <div id="error">
        <!-- error will be showen here ! -->
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" required placeholder="Username" name="user_name" id="user_name" />
        </div>
		
		<div class="form-group">
        <input type="email" class="form-control" required placeholder="Email address" name="user_email" id="user_email" />
        <span id="check-e"></span>
        </div>
		
		<div class="form-group">
        <input type="text" class="form-control" required placeholder="First Name" name="first_name" id="first_name" />
        </div>
		
		<div class="form-group">
        <input type="text" class="form-control" required placeholder="Last Name" name="last_name" id="last_name" />
        </div>
		
		<div class="form-group">
        <input type="tel" class="form-control" required placeholder="Telephone" name="tel" id="tel" />
        </div>
		
		<div class="form-group">
        <input type="date" class="form-control" required placeholder="birth date" name="date" id="tel" />
        </div>
		
		
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="user_password" id="password" />
		<small id="passwordHelpInline" class="text-muted">
			Must be 8-20 characters long.
		</small>
        </div>
       
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="submit" id="btn-submit">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button> 
        </div>  
      
      </form>

    </div>
    
</div>
 



<script  src="js/validation1.min.js"></script> 


</body>
</html>