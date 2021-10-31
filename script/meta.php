<?php 
								if (isset($_GET['pageid'])) {
									$pageid = $_GET['pageid'];
									
                                        $quary = "select * from  pages where id='$pageid'" ;
                                        $categoris = $db->select($quary);
                                        if($categoris){
                                            while ( $result = $categoris->fetch_assoc()) { ?>
                            
                                         <title><?php echo TITLE; ?>-<?php echo $result['name']; ?></title>

                                         

                                   <?php }} }elseif (isset($_GET['id'])) {
									$pageid = $_GET['id'];
									
                                        $quary = "select * from  tbl_post where id='$pageid'" ;
                                        $categoris = $db->select($quary);
                                        if($categoris){
                                            while ( $result = $categoris->fetch_assoc()) { ?>
                            
                                         <title><?php echo TITLE; ?>-<?php echo $result['title']; ?></title>

                                         

                                   <?php }} }else{ ?>
                                   			<title><?php echo TITLE; ?>-<?php echo $formate->title(); ?></title>
                                   <?php } ?>


                         
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
		
		<?php 
			if (isset($_GET['id'])){

				$keywordid = $_GET['id'];
				$quary = "select * from  tbl_post where id='$keywordid'" ;
                $keywords = $db->select($quary);
                if ($keywords) {
                	 while ( $result = $keywords->fetch_assoc()) { ?>
                	 <meta name="keywords" content="<?php echo $result['tags']; ?>">
                	 
                <?php }} }else{ ?>

 				<meta name="keywords" content="<?php echo KEYWORD; ?>">

			 <?php } ?>
	


	
	<meta name="author" content="Delowar">