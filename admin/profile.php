<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<style>
    .leftsite{float: left;width: 70% }
    .rigntsite{ float: left;width: 20%}
    .rigntsite img{height: 160px;width: 170px;}
</style>

<?php 

           $userId = Session::get('userid');
           $UserStatus = Session::get('userstatus');

   ?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New user</h2>
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                         $name  = $formate->validation($_POST['name']);
                         $username  = $formate->validation($_POST['username']);
                         $email  = $formate->validation($_POST['email']);
                         $password  = $formate->validation(md5($_POST['password']));
                         $details  = $formate->validation($_POST['details']);

                    	 $name      = mysqli_real_escape_string($db->link, $name);
                         $username  = mysqli_real_escape_string($db->link,$username);
                         $email     = mysqli_real_escape_string($db->link,$email);
                         $password = mysqli_real_escape_string($db->link,$password);
                         $details   = mysqli_real_escape_string($db->link,$details);
                        

                            $permited  = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['image']['name'];
                            $file_size = $_FILES['image']['size'];
                            $file_temp = $_FILES['image']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                            $uploaded_image = "images/".$unique_image;

                            if ($name == "" || $username == "" || $email == "" || $password == "" ||
                                $details == ""  
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
				                                    image     = '$uploaded_image',
                                                    email     = '$email',
				                                    
				                                    details   = '$details'

                                              WHERE id = '$userId' ";
                                  
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
                                    email     = '$email',
                                    password  = '$password',
                                    details   = '$details'

                                  WHERE id = '$userId' ";
                                  
                                    $updated_row = $db->update($query);

                                        if ($updated_row) {
                                         echo "<span class='success'>Post updated Successfully..! </span>";
                                        

                                        }else {
                                         echo "<span class='error'>post Not updated..!</span>";
                                        }

                        }
                    }

				}

                 ?>
                
                <div class="block"> 
                <?php 
                	 $quary = "SELECT * from tbl_user where id='$userId' AND status=' $UserStatus'" ;
                	    $post = $db->select($quary);
                	    if($post){
                	    while ( $result = $post->fetch_assoc()) {

                 ?>    

                        
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">

                     <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" readonly name="username" value="<?php echo $result['username']; ?>"  class="medium" />
                            </td>
                        </tr>
                       
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
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly name="email" value="<?php echo $result['email']; ?>"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="password" name="password"   class="medium" />
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
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>User Details</label>
                            </td>
                            <td>
                                <textarea name="details" class="tinymce">
                                  <?php echo $result['details']; ?>
                                </textarea>
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