<?php include 'config/config.php'; ?>
<?php include 'libraries/database.php'; ?>
<?php include 'includes/header.php'; ?>
<?php
	//create DB OBJECT
	$db=new Database();

?>



          <div class="blog-post">
            <h2 class="blog-post-title">International PHP conference</h2>
            <p class="blog-post-meta">January 1, 2014 by <a href="#">Mark</a></p>

            <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
			<a class="readmore" href="post.php?id=1">Read more...</a>
          </div><!-- /.blog-post -->

		  <div class="blog-post">
            <h2 class="blog-post-title">PHP 5.6Beta Release</h2>
            <p class="blog-post-meta">December 23, 2013 by <a href="#">Jacob</a></p>

            <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
            <blockquote>
              <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </blockquote>
			
			<a class="readmore" href="post.php?id=1">Read more...</a>
            </div><!-- /.blog-post -->
<?php include 'includes/footer.php'; ?>