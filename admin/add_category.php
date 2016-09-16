
<?php include 'includes/header.php'; ?>
<?php 
//create DB OBJECT
$db=new Database();
if(isset($_POST['submit'])){
	$name=mysqli_real_escape_string($db->link,$_POST['name']);
	
	if($name==''){
		//set error
		$error='please fill out all required field';
	}else{
		$query="INSERT INTO categories (name) VALUES ('$name')";
		$update_row=$db->update($query);
	}
	
}

?>

<form role="form" method="post" action="add_category.php">
    <div class="form-group">
		<label>Category Name</label>
        <input name="name" type="text" placeholder="Post title" class="form-control" />
    </div>
	<div class="form-group">
        <input name="submit" type="submit" class="btn btn-md btn-info" value="Submit" />
		<a href="index.php" class="btn btn-default">Cancel</a><br/>
    </div>
</form>
<?php include 'includes/footer.php'; ?>