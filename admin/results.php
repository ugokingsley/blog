

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form using jQuery Ajax and PHP MySQL</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<link href="style.css" rel="stylesheet" media="screen">

</head>

<body>

<?php 
// create short variable names 


 include '../libraries/dbconfig.php'; 

$searchtype=$_POST['searchtype']; 
$searchterm=$_POST['searchterm'];
$searchterm= trim($searchterm);
if (!$searchtype || !$searchterm) { 
	echo 'You have not entered search details.  Please go back and try again.'; 
	exit; 
}
$stmt = $db->prepare("select * from user where ".$searchtype." like '%".$searchterm."%'");
$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
	echo '<h1>search results for: '.$searchterm.'</h1> ';
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-md-4">
				<p class="page-header">
				<?php echo 'Last Name: '. $row['user_name']; ?>
				</p>
				<p class="page-header">
				<?php echo 'Last Name: '. $row['last_name']; ?>
				</p>
				
				<p class="page-header">
				
				<?php echo 'Matric Number: '. $row['first_name']; ?>
				
				</p>
				<p class="page-header">
				
				<?php echo 'Email Address: '. $row['user_email']; ?>
				
				</p>
				<p class="page-header">
				
				<?php echo 'Department: '. $row['tel']; ?>
				
				</p>
				<p class="page-header">
				
				
				
				</p>
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	


?>

<!-- Latest compiled and minified JavaScript -->
<script src="../js/bootstrap.min.js"></script>


</body>
</html>