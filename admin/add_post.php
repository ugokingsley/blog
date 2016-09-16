<?php include 'includes/header.php'; ?>
<?php 
//create DB OBJECT
$db=new Database();
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
		$query="INSERT INTO posts (title,body,category,author,tags) VALUES ('$title', '$body', $category, '$author', '$tags')";
		$insert_row=$db->insert($query);
	}
	
}

?>
<?php


	

	//create query
	$query="SELECT * FROM categories";
	//run query
	$categories=$db->select($query);
	
?>

<form role="form" method="post" action="add_post.php">
    <div class="form-group">
		<label>Post title</label>
        <input name="title" type="text" placeholder="Post title" class="form-control" />
    </div>
	<div class="form-group">
		<label>Post body</label>
        <textarea name="body" type="text" placeholder="Post body" class="form-control" ></textarea>
    </div>
	<div class="form-group">
		<label>Post title</label>
		<select name="category" class="form-control">
        <?php while($row=$categories->fetch_assoc()):?>
			<?php if($row['id']==$post['category']){
				$selected='selected';
			}else{
				$selected='';
			}
			
			?>
			<option <?php echo $selected ;?> value="<?php echo $row['id'];?>"><?php echo $row['name'] ;?></option>
		<?php endwhile;?>
			
		</select>
    </div>
	<div class="form-group">
		<label>Author</label>
        <input name="author" type="text" placeholder="Please enter author" class="form-control" />
    </div>
	
	<div class="form-group">
		<label>Tags</label>
        <input name="tags" type="text" placeholder="Please enter tags" class="form-control" />
    </div>
	
	<div class="form-group">
        <input name="submit" type="submit" class="btn btn-md btn-info" value="Submit" />
		<a href="index.php" class="btn btn-default">Cancel</a><br/>
    </div>
</form>
<?php include 'includes/footer.php'; ?>