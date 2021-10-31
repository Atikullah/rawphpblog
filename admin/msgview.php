
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

</style>

   <?php 

            if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL) {
               echo "<script> window.location = 'inbox.php';</script>";
            }else{
                
                $id = $_GET['msgid'];
                
            }

   ?>


<div class="grid_10">
        
            <div class="box round first grid">
                <h2>View message</h2>
                                        
                                <?php 
                                    if (isset($_GET['msgid'])) {
                                        $msgid = $_GET['msgid'];

                                        $query = "UPDATE contact  SET

                                                status  ='1'

                                                WHERE id = '$msgid'";

                                                $seened = $db->update($query);
                                                    if ($seened) {
                                                          echo "<span class='success'>View this message...!</span>";
                                                        
                                                    }

                                                    else{
                                                        echo "<span class='error'>Not found this message ...!</span>";
                                                    }
                                     }
           
                                 ?>
                                        
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                         echo "<script> window.location = 'inbox.php';</script>";
                    }

                ?>

                <div class="block"> 


                 <?php 
                    $quary = "select * from  contact  where id='$id' order by id desc" ;
                    $post = $db->select($quary);

                        if($post){
                           while ( $result = $post->fetch_assoc()) {
                ?>              
                 <form action="" method="POST">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text"   readonly  value="<?php echo $result['fname'].' '.$result['lname']; ?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['email']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" readonly  value="<?php echo  $formate->date_formate($result['date']); ?>" class="medium" />
                            </td>
                        </tr>
                  
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea   class="tinymce">
                                        <?php  echo $result['body']; ?>
                                </textarea>
                              
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="  OK  " />
                                <span class="replay"><a href="msgreplay.php?replayid=<?php echo $result['id']; ?>">Reply</a></span>
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



 