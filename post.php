<?php include 'inc/header.php';?>
<?php include 'inc/top.php';?>


		<?php 

			if (!isset($_GET['id']) || $_GET['id'] == NULL) {
				header("Location:404.php");
			}else{
				
				$id = $_GET['id'];
			}


		 ?>


 	

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php 
					$quary = "select * from  tbl_post where id = $id" ;
        			$post = $db->select($quary);

        				if($post){
         				   while ( $result = $post->fetch_assoc()) {

				 ?>

				<h2><?php echo $result['title']; ?></h2>
				<h4><?php echo $formate->date_formate($result['date']); ?>, By -> <a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['author']; ?></a></h4>
				<img src="admin/<?php echo $result['images']; ?>" alt="post image"/>
				<p><?php echo $result['body']; ?></p>

				<div class="relatedpost clear">
					<h2>Related articles</h2>

					<?php

							$Related_catc_id = $result['cat'];
							$Related_quary = "select * from  tbl_post where cat='$Related_catc_id'limit 6" ;
							$Related_post = $db->select($Related_quary);

							if($Related_post){
         				   while ( $Related_result = $Related_post->fetch_assoc()) {

					?>

					<a href="post.php?id=<?php echo $Related_result['id']; ?>">

					<img src="admin/<?php echo $Related_result['images']; ?>" alt="post image"/></a>

					<?php } } else{ echo "There Is No Avaliable Related Post ";} ?>

				</div>

				<?php } }else{ header("Location:404.php");} ?>
			</div>
		</div>

		<!-- 		<div class="sidebar clear">
					<div class="samesidebar clear">
						<h2>Latest articles</h2>
							<ul>
								<li><a href="#">Category One</a></li>
								<li><a href="#">Category Two</a></li>
								<li><a href="#">Category Three</a></li>
								<li><a href="#">Category Four</a></li>
								<li><a href="#">Category Five</a></li>						
							</ul>
					</div>
					<div class="samesidebar clear">
						<h2>Popular articles</h2>
							<div class="popular clear">
								<h3><a href="#">Post title will be go here..</a></h3>
								<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
								<p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.</p>	
							</div>
							
							<div class="popular clear">
								<h3><a href="#">Post title will be go here..</a></h3>
								<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
								<p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.</p>	
							</div>
							
							<div class="popular clear">
								<h3><a href="#">Post title will be go here..</a></h3>
								<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
								<p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.</p>	
							</div>
							
							<div class="popular clear">
								<h3><a href="#">Post title will be go here..</a></h3>
								<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
								<p>Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.Sidebar text will be go here.</p>	
							</div>				
						
					</div>
					
				</div> -->
				<?php include 'inc/side.php';?>
	</div>

				
				<?php include 'inc/hoder.php';?>


