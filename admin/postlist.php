
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<style>
	.text th{
		text-align: center;
	}


</style>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>

                <?php 

                   if (!isset($_GET['deletepost']) || $_GET['deletepost'] == NULL) {
                    		

                   	}else{
                   		$delid = $_GET['deletepost'];

                   		$delpostid = "SELECT * FROM  tbl_post WHERE id='$delid' ";
                   		$getdata = $db->select($delpostid);

                   			if ($getdata) {
                   				while ( $delimg = $getdata->fetch_assoc()) {
                   					$delimglink = $delimg['images'];
                   					unlink($delimglink);
                   				}
                   			}

                   			$delquery = " DELETE  FROM  tbl_post WHERE id='$delid' ";
                   			$deldata = $db->delete($delquery);
                   			if ($deldata) {
                           			echo "<span class='success'>Data deleted is successfully...!</span>";
                           		
                           			
                     		}
                      		else{
			                        echo "<span class='error'>Category not deleted...!</span>";
			                       
			                       
			                    }

                   }

                ?>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr class="text" >
							<th  width="1%">No</th>
							<th  width="10%">Image</th>
							<th  width="15%">Title</th>
							<th  width="7%">Category</th>
							<th  width="10%">Author</th>
							<th  width="10%">P.Language</th>
							<th  width="15%">Date</th>
							<th  width="15%">Description</th>
							<th  width="15%">Action</th>
						</tr>
					</thead>
					<tbody>

					<?php 					 

				        $quary = "select tbl_post.*,categoris.name from tbl_post inner join categoris on tbl_post.cat = categoris.id order by tbl_post.title desc";
				        
				        $data = $db->select($quary);

				        if($data){
				        	$i=0;
				            while ( $result = $data->fetch_assoc()) {

				            	$i++;
 				   ?>
						<tr class="oddgradeX" >
							<td><?php echo $i; ?></td>
							<td>
							
							<img src="<?php echo $result['images']; ?>" height="50px" width="80px" alt="post image"/>
							</td>
							<td><?php echo $result['title']; ?></a></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['author']; ?></td>
							<td><?php echo $result['tags']; ?></td>
							<td><?php echo $result['date']; ?></td>
							<td><p><?php echo $formate->ReadMore($result['body'],30); ?></p></td>

							
								<td>
								<a href="viewpost.php?viewpost=<?php echo $result['id']; ?>">View</a>

								<?php
							 if (Session::get('userid')==$result['userid'] || Session::get('userstatus')=='4' ) {?>

								|| <a href="editpost.php?editpost=<?php echo $result['id']; ?>">Edit</a> ||<a onclick="return confirm('are u sure to delete');"  href="?deletepost=<?php echo $result['id']; ?>">Delete</a>


								</td>
							<?php  } ?>
							
						</tr>
						<?php }} ?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>

 <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
        
      <?php include 'inc/hoder.php';?>
