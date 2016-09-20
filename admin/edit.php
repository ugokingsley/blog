<?php include '../config/config.php'; ?>
<?php include '../libraries/database.php'; ?>
<?php include '../helpers/format_helper.php'; ?>

<?php
$id=$_GET['id'];

	//create DB OBJECT
	$db=new Database();
	
	//create query
	$query="SELECT * FROM user WHERE id= ".$id;
	//run query
	$post=$db->select($query)->fetch_assoc();
	
	
	
	
?>
<?php

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
		$query="UPDATE user SET 
		user_name='$user_name',
		user_email='$user_email',
		first_name='$first_name',
		last_name='$last_name',
		tel='$tel',
		date='$date',
		user_password='$user_password'
		WHERE id=".$id;
		$update_row=$db->update($query);
	}
	
}

?>
<?php

if(isset($_POST['delete'])){
	
//call delete method
	$query="DELETE FROM user WHERE id=".$id;
	$delete_row=$db->delete($query);
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>user details</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen"> 

<link href="../css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<link href="style.css" rel="stylesheet" media="screen">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
			
		
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $post['user_name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><br/><br/><br/><br/><br/><br/>
    
<div class="container">
<form role="form" method="post" action="edit.php?id=<?php echo $id; ?>">
      
        <h2 class="form-signin-heading">Sign Up</h2><hr />
        
        <div id="error">
        <!-- error will be showen here ! -->
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" required placeholder="Username" name="user_name" id="user_name" value="<?php echo $post['user_name'] ;?>" />
        </div>
		
		<div class="form-group">
        <input type="email" class="form-control" required placeholder="Email address" name="user_email" id="user_email" value="<?php echo $post['user_email'] ;?>" />
        <span id="check-e"></span>
        </div>
		
		<div class="form-group">
        <input type="text" class="form-control" required placeholder="First Name" name="first_name" id="first_name" value="<?php echo $post['first_name'] ;?>" />
        </div>
		
		<div class="form-group">
        <input type="text" class="form-control" required placeholder="Last Name" name="last_name" id="last_name" value="<?php echo $post['last_name'] ;?>" />
        </div>
		
		<div class="form-group">
        <input type="tel" class="form-control" required placeholder="Telephone" name="tel" id="tel" value="<?php echo $post['tel'] ;?>"/>
        </div>
		
		<div class="form-group">
        <input type="date" class="form-control" required placeholder="birth date" name="date" id="date" value="<?php echo $post['date'] ;?>" />
        </div>
		
		
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="user_password" id="password" />
		<small id="passwordHelpInline" class="text-muted">
			Must be 8-20 characters long.
		</small>
        </div>
       
        <div class="form-group">
			<input name="submit" type="submit" class="btn btn-md btn-info" value="Submit" />
			<a href="index.php" class="btn btn-default">Cancel</a>
			<input name="delete" type="submit" class="btn btn-md btn-danger" value="delete" />
		</div>
      
 </form>
</div>












<?php //include 'includes/footer.php'; ?>