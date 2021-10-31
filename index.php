
<?php include 'inc/header.php';?>
<body>
<?php include 'inc/top.php';?>
<?php include 'inc/slide.php';?>






		<div class="contentsection contemplete clear">
		<div class="maincontent clear">

		<!--  pagination -->

		<?php
            $perpage =2;
            if (isset($_GET["page"])) {
               $page = $_GET["page"];
            }else{
                $page = 1;
            }

            $start_form = ($page-1)*$perpage;

    ?>

          <!--  pagination -->

     <?php 

          $quary = "select * from  tbl_post order by id desc limit $start_form, $perpage" ;
          $post = $db->select($quary);

          if($post){
              while ( $result = $post->fetch_assoc()) {
    ?>


			<div class="samepost clear">
      <br>
      
				<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
				<h4><?php echo $formate->date_formate($result['date']); ?>, By -> <a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['author']; ?></a></h4>
				  <a href="post.php?id=<?php echo  $result['id']; ?>"><img style="height: 150px;width: 250px; " src="admin/<?php echo $result['images']; ?>" alt="post image"/></a>
				  <?php echo $formate->ReadMore($result['body'],300); ?>
			
				<div class="readmore clear">
					 <a href="post.php?id=<?php echo  $result['id']; ?>">Read More</a>
				</div>
			</div>


	 <?php } ?>

    <!--  pagination -->

           <?php 
                $quary = "select * from  tbl_post" ;
                $result = $db->select($quary);
                $total_rows = mysqli_num_rows($result);
                $total_page =  ceil($total_rows/$perpage);

              echo "<span class='pagination'> <a href='index.php?page=1'>".'First'."</a>";

                for ($i=1; $i <=$total_page ; $i++) { 
                    echo "<a href='index.php?page=".$i."'>".$i."</a>";
                };

              echo "<a href='index.php?page=total_page'>".'Last'."</a></span"; 
             

            ?> 

           <!--  pagination -->
           <?php }else{ header("Location:404.php");} ?>
		</div>

					<!--  master middle  yield area -->

    				<!-- start side  area -->

<?php include 'inc/side.php';?>
	</div>
<?php include 'inc/hoder.php';?>




	

<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>



