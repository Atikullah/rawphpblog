<div class="slidersection templete clear">
        <div id="slider">

                    <?php 					 

				        $quary = "select * from  slider order by id limit 5 ";
				        
				        $data = $db->select($quary);

				        if($data){
				        	
				            while ( $result = $data->fetch_assoc()) {
      	
 				   ?>
            <a href="#"><img src="admin/<?php echo $result['images']; ?>" alt="<?php echo $result['title']; ?>" title="<?php echo $result['title']; ?>" /></a>

            <?php }} ?>
            
        </div>

</div>
