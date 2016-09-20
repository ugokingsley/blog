<?php
session_start();

if(isset($_SESSION['user_session'])!="")
{
	header("Location: home.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>admin login</title>
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="includes/validation.min.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="includes/script.js"></script>
<script src="../js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">UNICAF ADMIN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
		  
        </div>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<br/><br/>
<div class="container-fluid" style="padding-top:50px;padding-bottom:0px">
	
</div>  



<br/><br/>
<div class="container-fluid" style="padding-top:50px;padding-bottom:0px">
	
</div>  
<div class="sigin-form">


	<div class="container">
	<div class="jumbotron">
		
		<h5><b><span><img src="images/1.jpg"/></span>
		E-campus Portal is a robust campus management solution with 
		everything needed to to completely automate a tertiary institution. 
		It is currently the most robust campus educational institution management solution in Nigeria. 
		</b></h5>
	</div>
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Administrator.</h2><hr />
        
        <div id="error">
        <!-- error will be shown here ! -->
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="username" name="user_name" id="user_name" />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="user_password" id="user_password" />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="submit" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
        </div>
      </form>

    </div>
    
</div>
    


</body>
</html>