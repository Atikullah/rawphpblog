<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

                        $title    = mysqli_real_escape_string($db->link,$_POST['title']); 
                        $access   = mysqli_real_escape_string($db->link,$_POST['access']);
                        $status   = mysqli_real_escape_string($db->link,$_POST['status']);
                       
                            $permited  = array('jpg', 'jpeg', 'png', 'gif','webp');
                            $file_name = $_FILES['images']['name'];
                            $file_size = $_FILES['images']['size'];
                            $file_temp = $_FILES['images']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                            $uploaded_image = "images/slider/".$unique_image;

                            if ($title == "" || $access == "" ||  $file_name == "" ){
                                echo "<span class='error'>Fireld must not be empty...!</span>";

                                }elseif ($file_size >5242835) {
                                     echo "<span class='error'>Image Size should be less then MB!
                                     </span>";

                                    } elseif (in_array($file_ext, $permited) === false) {
                                     echo "<span class='error'>You can upload only:-"
                                     .implode(', ', $permited)."</span>";

                            }else{

                                             


                                move_uploaded_file($file_temp, $uploaded_image);
                                $query = "INSERT INTO  slider(title,access,status,images) VALUES('$title','$access','$status','$uploaded_image')"; 
                              
                                $inserted_rows = $db->insert($query);

                                    if ($inserted_rows) {
                                     echo "<span class='success'>slider Inserted Successfully..! </span>";
                                    

                                    }else {
                                     echo "<span class='error'>slider Not Inserted..!</span>";
                                    }

                            }
                     }



                 ?>
                <div class="block">               
                 <form action="addslider.php" method="POST" enctype="multipart/form-data">
                    <table class="form">

                        <tr>
                            <td>
                                <label>Access</label>
                            </td>
                            <td>
                                <input type="text" readonly name="access" value="<?php echo Session::get('username') ?>" class="medium" />
                                <input type="hidden" name="status" value="<?php echo Session::get('userid') ?>" class="medium" />
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter slider Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input name="images" type="file" />
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