<nav class="navbar navbar-inverse navbar-fixed-top" >
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Data Retrieval Portal</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
		  <div class="form-group">
            <div class="col-sm-3">
            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#signupModal">find a student</button>
        	</div>
        </div>
		
		
		
		
		
          <ul class="nav navbar-nav navbar-right">
            <li><a href="registration/index.php">Register</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	
	<!--search modal-->
	
	<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="mySigninLabel">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Search for a Student</h4>
              </div>
              <div class="modal-body" style="padding:40px 40px;">
                <form role="form" method="post" action="results.php">
                	<div class="form-group">
						<label>Choose search type</label>
						<select class="form-control" name="searchtype">
							<option value="first_name">First Name</option>
							<option value="last_name">Last Name</option>
							<option value="matric">Matric Number</option>
							<option value="dept">Department</option>
							<option value="email">Email Address</option>
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
