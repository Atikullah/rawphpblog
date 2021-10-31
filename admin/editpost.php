<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 

            if (!isset($_GET['editpost']) || $_GET['editpost'] == NULL) {
                header("Location:postlist.php");
            }else{
                
                $editpostid = $_GET['editpost'];
                
            }

   ?>


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
                        $userid = mysqli_real_escape_string($db->link,$_POST['userid']);
                       
                            $permited  = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['images']['name'];
                            $file_size = $_FILES['images']['size'];
                            $file_temp = $_FILES['images']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                            $uploaded_image = "images/".$unique_image;

                    if ($title == "" || $cat == "" || $author == "" || $tags == "" || $body == ""  ){
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
                                        $query = "UPDATE  tbl_post SET 

                                                cat    = '$cat',
                                                title  = '$title',
                                                body   = '$body',
                                                images = '$uploaded_image',
                                                author = '$author',
                                                tags   = '$tags',
                                                userid   = '$userid'

                                              WHERE id = '$editpostid' ";
                                  
                                    $updated_row = $db->update($query);

                                        if ($updated_row) {
                                         echo "<span class='success'>Posr updated Successfully..! </span>";
                                        

                                        }else {
                                         echo "<span class='error'>post Not updated..!</span>";
                                        }

                                }

                        }else{
                            $query = "UPDATE  tbl_post SET 

                                                cat    = '$cat',
                                                title  = '$title',
                                                body   = '$body',
                                                author = '$author',
                                                tags   = '$tags',
                                                userid = '$userid'

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
                    $quary = "select * from tbl_post where id='$editpostid' order by id desc" ;
                    $post = $db->select($quary);
                           while ( $result = $post->fetch_assoc()) {
                ?>          
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $result['title']; ?>"  class="medium" />
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
                                            while ( $catname = $categoris->fetch_assoc()) {
                                     ?>
                                                <option 
                                                     <?php 

                                                        if($result['cat'] == $catname['id']) { ?>
                                                                selected = "selected"

                                                    <?php  }?>


                                                        value="<?php echo $catname['id']; ?>"> <?php echo $catname['name']; ?>
                
                                                              
                                                </option>

                                   <?php } }  ?>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td> 
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $result['images'];?>" height="40px" width="72px" margin="-20px" margin-left="0px" margin-right="5px" margin-bottom="-15px"/>
                                <input name="images" type="file" />
                            </td>
                        </tr>

                          <tr>
                            <td>
                                <label>Writer Name</label>
                            </td>
                            <td>
                                <input type="text" readonly name="author" value="<?php echo $result['author']; ?>"  class="medium" />
                                 <input type="hidden" name="userid" value="<?php echo Session::get('userid') ?>" class="medium" />
                            </td>
                        </tr>

                          <tr>
                            <td>
                                <label>Programing Language</label>
                            </td>
                            <td>
                                <input type="text" name="tags" value="<?php echo $result['tags']; ?>"  class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce">
                                  <?php echo $result['body']; ?>
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>`
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                     <?php }  ?>
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