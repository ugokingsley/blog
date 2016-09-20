<?php
session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: index.php");
}
?>
<?php include '../config/config.php'; ?>
<?php include '../libraries/database.php'; ?>
<?php include '../helpers/format_helper.php'; ?>

<?php
//create query for users
$query="SELECT * FROM user ORDER BY id DESC";
//run query for users
$users=$db->select($query);
//create query for admin
$query="SELECT * FROM admin ";
//run query for admin
$admin=$db->select($query);
$row=$admin->fetch_assoc();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UNICAF USERS</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen"> 

<link href="../css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
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
          
		  
            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#search">find a user</button>
			
         

		  
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
			
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $row['user_name']; ?>&nbsp;<span class="caret"></span></a>
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
	
	<?php  while($row=$users->fetch_assoc()): ?>
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
	<?php  endwhile; ?>
	
</table>
	
</div>






<!--search-->
<div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="mySigninLabel">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Filter a User</h4>
              </div>
              <div class="modal-body" style="padding:40px 40px;">
                <form role="form" method="post" action="results.php">
                	<div class="form-group">
						<label>Choose filter type</label>
						<select class="form-control" name="searchtype">
							<option value="user_email">Email Address</option>
							<option value="first_name">First Name</option>
							<option value="last_name">Last Name</option>
							<option value="user_name">Matric Number</option>
							<option value="time">Registration Date</option>
							
						</select>
					</div>
					<div class="form-group">
						<label>enter search term</label>
						<input type="text" class="form-control" name="searchterm">
					</div>
					
                    <div class="form-group">
                    	<hr>
                    </div>
                    <div class="form-group">
                    	<button type="submit" class="btn btn-md btn-info">Retrieve</button>
                    </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
</body>
</html>