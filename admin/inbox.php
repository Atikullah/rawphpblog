<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">

 		<!--  start Inbox -->

            <h2>Inbox</h2>
                                <!--  SEEN and Draft -->
					
					<?php 
						if (isset($_GET['seenid'])) {
							$seenid = $_GET['seenid'];

							$query = "UPDATE contact

								 SET
								 	status  ='1'

								 WHERE id = '$seenid'";
                        $seened = $db->update($query);
                        if ($seened) {
                              echo "<span class='success'>Message move in the seen box successfully...!</span>";
                            
                        }

                        else{
                            echo "<span class='error'>Messahe not move in the seen box ...!</span>";
                        }

						}else{

							if (isset($_GET['draftid'])) {
							$draftid = $_GET['draftid'];

							$query = "UPDATE contact

								 SET
								 	status  ='2'

								 WHERE id = '$draftid'";
                        $seened = $db->update($query);
                        if ($seened) {
                              echo "<span class='success'>Message move in the draft box successfully...!</span>";
                            
                        }

                        else{
                            echo "<span class='error'>Messahe not move in the draft box ...!</span>";
                        }

					}

						}

					 ?>

					  <!--  published and delete -->


					  <?php 
						if (isset($_GET['publishedseenid'])) {
								$publishedseenid = $_GET['publishedseenid'];

								$query = "UPDATE contact

									 SET
									 	status  ='0'

									 WHERE id = '$publishedseenid'";
	                        $seened = $db->update($query);
	                        if ($seened) {
	                              echo "<span class='success'>Message published successfully...!</span>";
	                            
	                        }

	                        else{
	                            echo "<span class='error'>Messahe not published ...!</span>";
	                        }
	                    }else{
							if (isset($_GET['delseenid'])) {
                      $delseenid = $_GET['delseenid'];
                      $delid = " DELETE  FROM  contact WHERE id='$delseenid'" ;
                      $deldata = $db->delete($delid);
                      if ( $deldata) {
                            echo "<span class='success'>Data deleted is successfully...!</span>";
                      }else{
                             echo "<span class='error'>Category not deleted...!</span>";
                      }

                   }

					}


					 ?>
					
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Date</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 					 

				        $quary = "select * from  contact where status='0' order by id desc " ;
				        $data = $db->select($quary);

				        if($data){
				        	$i=0;
				            while ( $result = $data->fetch_assoc()) {

				            	$i++;
   					 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['fname'].' '.$result['lname']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $formate->date_formate($result['date']); ?></td>
							<td><?php echo $formate->ReadMore($result['body'],1); ?></td>
							<td>
							     <a href="msgview.php?msgid=<?php echo $result['id']; ?>">View</a> || 
							     <a href="msgreplay.php?replayid=<?php echo $result['id']; ?>">Reply</a> ||
							     <a onclick="return confirm('are u sure to move');" href="?seenid=<?php echo $result['id']; ?>">Seen</a>
							</td>
						</tr>
						<?php }}  ?>
					</tbody>
				</table>
               </div>
            </div>
				<!--  start Inbox -->

					
        <br>
        			<!-- Seen Message sector -->

              
            <div class="box round first grid">
                <h2>Seen Message</h2>


                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Date</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 					 

				        $quary = "select * from  contact where status='1' order by id desc " ;
				        $data = $db->select($quary);

				        if($data){
				        	$i=0;
				            while ( $result = $data->fetch_assoc()) {

				            	$i++;
   					 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['fname'].' '.$result['lname']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $formate->date_formate($result['date']); ?></td>
							<td><?php echo $formate->ReadMore($result['body'],1); ?></td>
							<td>
							     <a href="msgview.php?msgid=<?php echo $result['id']; ?>">View</a> ||
							      <a href="?draftid=<?php echo $result['id']; ?>">Draft</a> ||
							      <a onclick="return confirm('are u sure to published');" href="?publishedseenid=<?php echo $result['id']; ?>">Published</a> ||
							     
							     <a onclick="return confirm('are u sure to delete');" href="?delseenid=<?php echo $result['id']; ?>">Delete</a>
							</td>
						</tr>
						<?php }}  ?>
					</tbody>
				</table>
               </div>
            </div>

            <!-- End Seen Message sector -->


<br>

<!-- Draft sector -->

             <div class="box round first grid">
                <h2>Draft Message</h2>
               
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Date</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 					 

				        $quary = "select * from  contact where status='2' order by id desc " ;
				        $data = $db->select($quary);

				        if($data){
				        	$i=0;
				            while ( $result = $data->fetch_assoc()) {

				            	$i++;
   					 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['fname'].' '.$result['lname']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $formate->date_formate($result['date']); ?></td>
							<td><?php echo $formate->ReadMore($result['body'],1); ?></td>
							<td>
							    
							     
							     <a onclick="return confirm('are u sure to delete');" href="?delseenid=<?php echo $result['id']; ?>">Delete</a>
							</td>
						</tr>
						<?php }}  ?>
					</tbody>
				</table>
               </div>
            </div>



            <!--  End draft  sector -->

        </div>

 <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
        
      <?php include 'inc/hoder.php';?>
