
<?php include 'inc/header.php';?>
<?php include 'inc/top.php';?>
<body>



<?php 
	if (!isset($_GET['search']) || $_GET['search'] == NULL) {
		header("Location:404.php");
	}else{
		$search =  $_GET['search'];
	}
 ?>




<div class="contentsection contemplete clear">
		<div class="maincontent clear">
   <?php 

        $quary = "select * from  tbl_post where (title like '%$search%' or body like '%$search%' or author like '%$search%' or tags like '%$search%') ";
        	 $post = $db->select($quary);
        if($post){
            while ( $result = $post->fetch_assoc()) {
    ?>
			
			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
				<h4><?php echo $formate->date_formate($result['date']); ?>, By -> <a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['author']; ?></a></h4>
				 <a href="post.php?id=<?php echo  $result['id']; ?>"><img style="height: 150px;width: 250px; " src="admin/<?php echo $result['images']; ?>" alt="post image"/></a>
				  <?php echo $formate->ReadMore($result['body'],300); ?>
			
				<div class="readmore clear">
					 <a href="post.php?id=<?php echo  $result['id']; ?>">Read More</a>
				</div>
			</div>


			
		<?php } } else{?>
		<p>  not aviableable</p>
		<?php } ?>
			
		</div>

					

<?php include 'inc/side.php';?>
</div>
<?php include 'inc/hoder.php';?>

