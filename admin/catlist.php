 <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

                <?php 

                   if (isset($_GET['deletecat'])) {
                      $delid = $_GET['deletecat'];
                      $delcatid = " DELETE  FROM  categoris WHERE id='$delid'" ;
                      $deldata = $db->delete($delcatid);
                      if ( $deldata) {
                            echo "<span class='success'>Data deleted is successfully...!</span>";
                      }else{
                             echo "<span class='error'>Category not deleted...!</span>";
                      }

                   }

                 ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>

				
					<tbody>
	<?php 					 

        $quary = "select * from  categoris order by id desc " ;
        $data = $db->select($quary);

        if($data){
        	$i=0;
            while ( $result = $data->fetch_assoc()) {

            	$i++;
    ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><a class="btn btn-denger" href="editcat.php?catid=<?php echo $result['id']; ?>">Edit</a> || <a onclick="return confirm('are u sure to delete');" class="btn btn-denger" href="?deletecat=<?php echo $result['id']; ?>">Delete</a></td>
						</tr>
			<?php }}  ?>
					</tbody>
					
				</table>
               </div>
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

   