
<?php include 'includes/header.php'; ?>

<?php
	//create DB OBJECT
	$db=new Database();

	//chech URL for category
	
	if(isset($_GET['category'])){
	
		$category=$_GET['category'];
		//create query
	$query="SELECT * FROM posts WHERE category= ".$category;
	//run query
	$posts=$db->select($query);
		
	}else{
	//create query
	$query="SELECT * FROM posts";
	//run query
	$posts=$db->select($query);
	}
	
	
	
	//create query
	$query="SELECT * FROM categories";
	//run query
	$categories=$db->select($query);
	
?>

<?php if($posts): ;?>
	<?php while($row=$posts->fetch_assoc()): ;?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'] ;?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']) ;?> <a href="#"><?php echo $row['author'] ;?></a></p>
				<?php echo shortentext($row['body'],450) ;?>
			<a class="readmore" href="post.php?id=<?php echo urlencode($row['id']) ;?>">Read more...</a>
          </div><!-- /.blog-post -->
	<?php endwhile ;?>
<?php else: ;?>

	<p>there are no posts yet</p>

<?php endif ;?>
			

<?php include 'includes/footer.php'; ?>