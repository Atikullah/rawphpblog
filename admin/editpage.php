<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<style>
    .delete{margin-left: 10px;}
    .delete a{
        background: #f0f0f0 none repeat scroll 0 0;
        border: 1px solid #ddd;
        color: #444;
        cursor: pointer;
        font-size: 19px;
        font-weight: normal;
        padding: 2px 10px;
    }

</style>

    <?php 

            if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
                 header("Location:index.php");
            }else{
                
                $editpostid = $_GET['pageid'];
                
            }

   ?>

             
        <div class="grid_10">
        
            <div class="box round first grid">
                <h2>update page</h2>
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

                        $name  = mysqli_real_escape_string($db->link,$_POST['name']);
                        $body  = mysqli_real_escape_string($db->link,$_POST['body']);
                       
                           

                    if ($name == "" || $body == ""){
                        echo "<span class='error'>Fireld must not be empty...!</span>";

                    }else{

                           
                                    
                                  $query = "UPDATE  pages SET 
                                                name = '$name',
                                                body   = '$body'
                                             
                                              WHERE id = '$editpostid' ";
                                  
                                    $updated_row = $db->update($query);

                                        if ($updated_row) {
                                         echo "<span class='success'>Page updated Successfully..! </span>";
                                        

                                        }else {
                                         echo "<span class='error'>page Not updated..!</span>";
                                        }

                                }

                        }

                 ?>


               

                <div class="block">     

                 <?php 
                    $quary = "select * from  pages  where id='$editpostid' order by id desc" ;
                    $post = $db->select($quary);

                        if($post){
                           while ( $result = $post->fetch_assoc()) {
                ?>

                 <form action="" method="POST" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>"  class="medium" />
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
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <span class="delete"><a onclick="return confirm('are u sure to delete');"  href="delpage.php?deletepost=<?php echo $result['id']; ?>">Delete</a></span>

                            </td>
                        </tr>
                    </table>
                    </form>
                     <?php }}  ?>
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