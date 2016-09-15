<?php include 'includes/header.php'; ?>
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
        <select name="category" class="form-control" />
			<option value="">News</option>
			<option value="">PHPEvents</option>
		</select>
    </div>
	<div class="form-group">
		<label>Post title</label>
        <input name="title" type="text" placeholder="Post title" class="form-control" />
    </div>
	<div class="form-group">
        <button name="submit" type="submit" class="btn btn-md btn-info">Sign Me Up</button>
    </div>
</form>
<?php include 'includes/footer.php'; ?>