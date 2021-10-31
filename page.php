<?php include 'inc/header.php';?>
<?php include 'inc/top.php';?>

								<?php 

						            if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
						                 header("Location:404.php");
						            }else{
						                
						                $editpostid = $_GET['pageid'];
						                
						            }

   								?>


				


 								<?php 
                                        $quary = "select * from  pages where id='$editpostid' order by id desc" ;
                                        $categoris = $db->select($quary);
                                        if($categoris){
                                            while ( $result = $categoris->fetch_assoc()) {
                                ?>
                                         
                                          

                                   

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				
	
				<p><?php echo $result['body']; ?></p>
				
	</div>

		</div>
<?php } }else{ header("Location:404.php");} ?>
                                
		<?php include 'inc/side.php';?>
		<?php include 'inc/hoder.php';?>