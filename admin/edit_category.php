
<?php include 'includes/header.php'; ?>
<?php
$id=$_GET['id'];

	//create DB OBJECT
	$db=new Database();
	
	//create query
	$query="SELECT * FROM categories WHERE id= ".$id;
	//run query
	$category=$db->select($query)->fetch_assoc();
	
	
	//create query
	$query="SELECT * FROM categories";
	//run query
	$categories=$db->select($query);
	
?>
<?php

if(isset($_POST['submit'])){
	$name=mysqli_real_escape_string($db->link,$_POST['name']);
	
	if($name==''){
		//set error
		$error='please fill out all required fields';
	}else{
		$query="UPDATE categories SET 
		name='$name'
		WHERE id=".$id;
		
		$update_row=$db->update($query);
	}
	
}

?>
<?php

if(isset($_POST['delete'])){
	
//call delete method
	$query="DELETE FROM categories WHERE id=".$id;
	$delete_row=$db->delete($query);
}
?>
<form role="form" method="post" action="edit_category.php?id=<?php echo $id ;?>">
    <div class="form-group">
		<label>Category Name</label>
        <input name="name" type="text" placeholder="Post title" class="form-control" value="<?php echo $category['name'] ;?>" />
    </div>
	<div class="form-group">
		<input name="submit" type="submit" class="btn btn-md btn-info" value="Submit">
		<a href="index.php" class="btn btn-default">Cancel</a>
		<input name="delete" type="submit" class="btn btn-md btn-danger" value="delete" />
    </div>
</form>
<?php include 'includes/footer.php'; ?>