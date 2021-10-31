<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>


<style>
    .replay{margin-left: 10px;}
    .replay a{
        background: #f0f0f0 none repeat scroll 0 0;
        border: 1px solid #ddd;
        color: #444;
        cursor: pointer;
        font-size: 19px;
        font-weight: normal;
        padding: 2px 10px;
    }
    .leftsite{float: left;width: 70% }
    .rigntsite{ float: right;width: 30%}
    .rigntsite img{height: 200px;width: 250px;}

</style>

<?php 

           $userId = Session::get('userid');
           $UserStatus = Session::get('userstatus');

   ?>


        <div class="grid_10">
    
            <div class="box round first grid">
                <h2>view profile</h2>
                <?php 
                   $quary = "SELECT * from tbl_user where id='$userId' AND status=' $UserStatus'" ;
                      $post = $db->select($quary);
                      if($post){
                      while ( $result = $post->fetch_assoc()) {

                 ?>  
               
                <div class="block"> 
                  
                  <div class="leftsite" > 
                        
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">

                    <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['username']; ?>"  class="medium" />
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['name']; ?>"  class="medium" />
                            </td>
                        </tr>

                        

                         <tr>
                            <td>
                                <label>Status</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['category']; ?>"  class="medium" />
                            </td>
                        </tr>

                          <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['email']; ?>"  class="medium" />
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
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
                        </tr>


                        


                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea readonly style="height: 140px;width: 450px;">
                                  <?php echo $result['details']; ?>
                                </textarea>
                            </td>
                        </tr>
                       <tr>
                            <td></td>
                            <td>
                              <span class="replay"><a href="profile.php">Update </a></span>
                            </td>
                        </tr>


                    </table>
                    </form>

                </div>

                       <div class="rigntsite">
                             <img src="<?php echo $result['image']; ?>" alt="image"/>
                         
                       </div>
                  
                
            </div>
             <?php }} ?>
        </div>
        </div>
        
 <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>

    <?php include 'inc/hoder.php';?>