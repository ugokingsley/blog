<?php
session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: index.php");
}
?>
<?php include 'config/config.php'; ?>
<?php include 'libraries/database.php'; ?>
<?php include 'helpers/format_helper.php'; ?>

<?php
//create query
$query="SELECT * FROM user ORDER BY id DESC";
//run query
$users=$db->select($query);
$row=$users->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>user details</title>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"> 

<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="js/jquery.js"></script>
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
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $row['user_name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><br/><br/><br/><br/><br/><br/>
    
<table class="table table-stripped">
	<tr>
		<th> User ID</th>
		<th> username</th>
		<th> Email</th>
		<th> First name</th>
		<th> Last name </th>
		<th> Phone Number </th>
		<th> Birthday </th>
		<th> Registration Date </th>
	</tr>
	
	<tr>
		<td><?php echo $row['id'] ;?></td>
		<td><a href="edit.php?id=<?php echo $row['id'] ;?>"><?php echo $row['user_name'] ;?></a></td>
		<td><?php echo $row['user_email'] ;?></td>
		<td><?php echo $row['first_name'] ;?></td>
		<td><?php echo $row['last_name'] ;?></td>
		<td><?php echo $row['tel'] ;?></td>
		<td><?php echo $row['date'] ;?></td>
		<td><?php echo formatDate($row['time']); ?></td>
	</tr>
	<?php  //endwhile; ?>
	

</table>
	
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>