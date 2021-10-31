
<?php include 'inc/header.php';?>
<body>
<?php include 'inc/top.php';?>
<?php include 'inc/slide.php';?>


<?php 
	if (!isset($_GET['categoris']) || $_GET['categoris'] == NULL) {
		header("Location:404.php");
	}else{
		$categorie =  $_GET['categoris'];
	}
 ?>




<div class="contentsection contemplete clear">
		<div class="maincontent clear">
   <?php 

        $quary = "select * from  tbl_post where cat=$categorie " ;
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


			
		<?php } } else{ ?>

		<h1 style="color: red;    margin-top: 90px;text-align: center;">
				NO Post Available In This Category
		</h1>
		<?php }?>
		</div>

					

<?php include 'inc/side.php';?>
</div>
<?php include 'inc/hoder.php';?>

