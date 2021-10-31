<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 

            if (!isset($_GET['edituser']) || $_GET['edituser'] == NULL) {
                header("Location:postlist.php");
            }else{
                
                $editpostid = $_GET['edituser'];
                
            }

   ?>


        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Add New user</h2>
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                         $name      = mysqli_real_escape_string($db->link,$_POST['name']);
                         $username  = mysqli_real_escape_string($db->link,$_POST['username']);
                         $category  = mysqli_real_escape_string($db->link,$_POST['category']);
                         $email     = mysqli_real_escape_string($db->link,$_POST['email']);
                         $status   = mysqli_real_escape_string($db->link,$_POST['status']);
                        

                            $permited  = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['image']['name'];
                            $file_size = $_FILES['image']['size'];
                            $file_temp = $_FILES['image']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                            $uploaded_image = "images/".$unique_image;

                            if ($name == "" || $username == "" ||  $category == "" || $email == "" || $status == "" 
                                 ){
                        echo "<span class='error'>Fireld must not be empty...!</span>";

                    }else{

                            if (!empty($file_name)) {
                                

                                if ($file_size >5242835) {
                                    echo "<span class='error'>Image Size should be less then MB! </span>";

                                        }elseif (in_array($file_ext, $permited) === false) {
                                         echo "<span class='error'>You can upload only:-"
                                         .implode(', ', $permited)."</span>";

                                }else{

                                    move_uploaded_file($file_temp, $uploaded_image);
                                        $query = "UPDATE  tbl_user SET 

                                                    name      = '$name',
                                                    username  = '$username',
                                                    category  = '$category',
                                                    image     = '$uploaded_image',
                                                    email     = '$email',
                                                    status   = '$status'

                                              WHERE id = '$editpostid' ";
                                  
                                    $updated_row = $db->update($query);

                                        if ($updated_row) {
                                         echo "<span class='success'>Post updated Successfully..! </span>";
                                        

                                        }else {
                                         echo "<span class='error'>post Not updated..!</span>";
                                        }

                                }

                            }else{
                                $query = "UPDATE  tbl_user SET 

                                    name      = '$name',
                                    username  = '$username', 
                                    category  = '$category', 
                                    email     = '$email',
                                    status   = '$status'

                                  WHERE id = '$editpostid' ";
                                  
                                    $updated_row = $db->update($query);

                                        if ($updated_row) {
                                         echo "<span class='success'>Posr updated Successfully..! </span>";
                                        

                                        }else {
                                         echo "<span class='error'>post Not updated..!</span>";
                                        }

                        }
                    }

                }

                 ?>
                
                <div class="block"> 
                <?php 
                     $quary = "SELECT * from tbl_user where id='$editpostid' order by id desc" ;
                        $post = $db->select($quary);
                        if($post){
                        while ( $result = $post->fetch_assoc()) {

                 ?>    

                        
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">


                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>"  class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo $result['username']; ?>"  class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $result['image'];?>" height="40px" width="72px" margin="-20px" margin-left="0px" margin-right="5px" margin-bottom="-15px"/>
                                <input name="image" type="file" />
                            </td>
                        </tr>
                       



                          <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $result['email']; ?>"  class="medium" />
                            </td>
                        </tr>

                        


                         <tr>
                            <td>
                                <label>Status</label>
                            </td>
                            <td>
                                <input type="text" name="category" value="<?php echo $result['category']; ?>"  class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td><label> Category:</label></td>
                             <td>
                                <select id="select" name="status">
                                    <option> Select Category </option>
                                    
                                    <option value="1"> Author </option>
                                    <option value="2"> Editor</option>
                                    <option value="3"> Moderator</option>
                                    <option value="4"> Admin </option>
                                </select>
                            </td>


                        </tr>


                        
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                   <?php }} ?>
                </div>
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