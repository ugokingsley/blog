<?php include 'includes/header.php'; ?>

<?php
$id=$_GET['id'];

	//create DB OBJECT
	$db=new Database();
	
	//create query
	$query="SELECT * FROM posts WHERE id= ".$id;
	//run query
	$post=$db->select($query)->fetch_assoc();
	
	
	//create query
	$query="SELECT * FROM categories";
	//run query
	$categories=$db->select($query);
	
?>
<?php

if(isset($_POST['submit'])){
	$title=mysqli_real_escape_string($db->link,$_POST['title']);
	$body=mysqli_real_escape_string($db->link,$_POST['body']);
	$category=mysqli_real_escape_string($db->link,$_POST['category']);
	$author=mysqli_real_escape_string($db->link,$_POST['author']);
	$tags=mysqli_real_escape_string($db->link,$_POST['tags']);
	if($title=='' || $body=='' || $category=='' || $author==''){
		//set error
		$error='please fill out all required fields';
	}else{
		$query="UPDATE posts SET 
		title='$title',
		body='$body',
		category='$category',
		author='$author',
		tags='$tags'
		WHERE id=".$id;
		
		$update_row=$db->update($query);
	}
	
}

?>
<?php

if(isset($_POST['delete'])){
	
//call delete method
	$query="DELETE FROM posts WHERE id=".$id;
	$delete_row=$db->delete($query);
}
?>

<form role="form" method="post" action="edit_post.php?id=<?php echo $id; ?>">
    <div class="form-group">
		<label>Post title</label>
        <input name="title" type="text" placeholder="Post title" class="form-control" value="<?php echo $post['title'] ;?>" />
    </div>
	<div class="form-group">
		<label>Post body</label>
        <textarea name="body" type="text" placeholder="Post body" class="form-control" ><?php echo $post['body'] ;?></textarea>
    </div>
	<div class="form-group">
		<label>Post title</label>
        <select name="category" class="form-control" />
		<?php while($row=$categories->fetch_assoc()):?>
			<?php if($row['id']==$post['category']){
				$selected='selected';
			}else{
				$selected='';
			}
			
			?>
			<option value="<?php echo $row['id'] ;?>" <?php echo $selected ;?> ><?php echo $row['name'] ;?></option>
		<?php endwhile;?>
			
		</select>
    </div>
	<div class="form-group">
		<label>Author</label>
        <input name="author" type="text" placeholder="Please enter author" value="<?php echo $post['author'] ;?>" class="form-control" />
    </div>
	
	<div class="form-group">
		<label>Tags</label>
        <input name="tags" type="text" placeholder="Please enter tags" value="<?php echo $post['tags'] ;?>" class="form-control" />
    </div>
	
	<div class="form-group">
        <input name="submit" type="submit" class="btn btn-md btn-info" value="Submit" />
		<a href="index.php" class="btn btn-default">Cancel</a>
		<input name="delete" type="submit" class="btn btn-md btn-danger" value="delete" />
    </div>
</form>
<?php include 'includes/footer.php'; ?>