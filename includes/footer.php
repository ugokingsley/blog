
          

          

          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
				<?php echo $site_description ; ?>
            </div>
          <div class="sidebar-module">
            <h4>Categories</h4>
			<?php if($categories): ;?>
            <ol class="list-unstyled">
				<?php while($row=$categories->fetch_assoc()): ;?>
              <li><a href="posts.php?category=<?php echo $row['id'] ;?>"><?php echo $row['name'] ;?></a></li>
				<?php endwhile ;?>
            </ol>
			<?php else: ;?>
			
				<p>there are no categories yet</p>
			
			<?php endif ;?>
          </div>
         
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for DaetaCity by <a href="http://daetacity.com">DaetaCity</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <script src="js/jquery-1.11.3-jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html><>