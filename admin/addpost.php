<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

                        $title  = mysqli_real_escape_string($db->link,$_POST['title']);
                        $cat    = mysqli_real_escape_string($db->link,$_POST['cat']);
                        $author = mysqli_real_escape_string($db->link,$_POST['author']);
                        $tags   = mysqli_real_escape_string($db->link,$_POST['tags']);
                        $body   = mysqli_real_escape_string($db->link,$_POST['body']);
                        $userid   = mysqli_real_escape_string($db->link,$_POST['userid']);
                       
                            $permited  = array('jpg', 'jpeg', 'png', 'gif','webp');
                            $file_name = $_FILES['images']['name'];
                            $file_size = $_FILES['images']['size'];
                            $file_temp = $_FILES['images']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                            $uploaded_image = "images/".$unique_image;

                            if ($title == "" || $cat == "" || $author == "" || $tags == "" || $body == "" || $file_name == "" ){
                                echo "<span class='error'>Fireld must not be empty...!</span>";

                                }elseif ($file_size >5242835) {
                                     echo "<span class='error'>Image Size should be less then MB!
                                     </span>";

                                    } elseif (in_array($file_ext, $permited) === false) {
                                     echo "<span class='error'>You can upload only:-"
                                     .implode(', ', $permited)."</span>";

                            }else{

                                             


                                move_uploaded_file($file_temp, $uploaded_image);
                                $query = "INSERT INTO  tbl_post(cat,title,body,images,author,tags,userid) VALUES('$cat','$title','$body','$uploaded_image','$author','$tags','$userid')"; 
                              
                                $inserted_rows = $db->insert($query);

                                    if ($inserted_rows) {
                                     echo "<span class='success'>Post Inserted Successfully..! </span>";
                                    

                                    }else {
                                     echo "<span class='error'>Post Not Inserted..!</span>";
                                    }

                            }
                     }



                 ?>
                <div class="block">               
                 <form action="addpost.php" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option> Select Category </option>
                                    <?php 
                                        $quary = "select * from  categoris" ;
                                        $categoris = $db->select($quary);
                                        if($categoris){
                                            while ( $result = $categoris->fetch_assoc()) {
                                     ?>
                                          <option value="<?php echo $result['id']; ?>"> <?php echo $result['name']; ?></option>

                                   <?php }}  ?>
                                </select>
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
                            <td>
                                <label>Status</label>
                            </td>
                            <td>
                                <input type="text" readonly name="author" value="<?php echo Session::get('username') ?>" class="medium" />
                                <input type="hidden" name="userid" value="<?php echo Session::get('userid') ?>" class="medium" />
                            </td>
                        </tr>

                          <tr>
                            <td>
                                <label>Writer Name</label>
                            </td>
                            <td>
                                <input type="text" name="tags" placeholder="Enter Language..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea>
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