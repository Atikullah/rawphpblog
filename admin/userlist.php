
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

                   if (!isset($_GET['deleteuser']) || $_GET['deleteuser'] == NULL) {
                         

                    }else{
                      $delid = $_GET['deleteuser'];

                      $delpostid = "SELECT * FROM  tbl_user WHERE id='$delid' ";
                      $getdata = $db->select($delpostid);

                        if ($getdata) {
                          while ( $delimg = $getdata->fetch_assoc()) {
                            $delimglink = $delimg['image'];
                            unlink($delimglink);
                          }
                        }

                        $delquery = " DELETE  FROM  tbl_user WHERE id='$delid' ";
                        $deldata = $db->delete($delquery);
                        if ($deldata) {
                                echo "<span class='success'>User deleted is successfully...!</span>";
                              
                                
                        }
                          else{
                              echo "<span class='error'>User not deleted...!</span>";
                             
                             
                          }

                   }

                ?>
                <div class="block">  
                    <table class="data display datatable   table-bordered table-dark "  id="example">
          <thead>
            <tr class="text" >
              <th  width="1%">No</th>
              <th  width="10%">Image</th>
              <th  width="10%">User Name</th>
              <th  width="15%">Name</th>
              <th  width="10%">Category</th>
              <th  width="10%">Status</th>
              <th  width="15%">Email</th>
              
              <th  width="15%">Action</th>
            </tr>
          </thead>
          <tbody>

          <?php            

              $quary = "select * from  tbl_user order by id desc " ;
              $data = $db->select($quary);

              if($data){
                $i=0;
                  while ( $result = $data->fetch_assoc()) {

                    $i++;
           ?>
            <tr class="oddgradeX" >
              <td><?php echo $i; ?></td>
              <td>
              
              <img src="<?php echo $result['image']; ?>" height="50px" width="80px" alt="post image"/>
              </td>
              <!-- <td><a href="profile.php?editpost=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></td> -->
              <td><?php echo $result['username']; ?></td>
              <td><?php echo $result['name']; ?></td>
              <td><?php echo $result['category']; ?></td>
              <td>
                  <?php
                    if ($result['status'] == '1') {
                      echo "Author";
                     }elseif ($result['status'] == '2') {
                       echo "Editor";
                     }elseif ($result['status'] == '3') {
                       echo "Moderator";
                     }elseif ($result['status'] == '4') {
                       echo "Admin";
                     } 

                  ?>
                
              </td>
              <td><?php echo $result['email']; ?></td>
              


             
              <td><a href="edituser.php?edituser=<?php echo $result['id']; ?>">Edit</a> ||
              <a onclick="return confirm('are u sure to delete');"  href="?deleteuser=<?php echo $result['id']; ?>">Delete</a></td>
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
