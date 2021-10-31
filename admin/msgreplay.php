
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

            if (!isset($_GET['replayid']) || $_GET['replayid'] == NULL) {
               echo "<script> window.location = 'inbox.php';</script>";
            }else{
                
                $id = $_GET['replayid'];
                
            }

   ?>



   

<div class="grid_10">
        
            <div class="box round first grid">
                <h2>View message</h2>
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    		$toemail    = $formate->validation($_POST['toemail']);
                    		$fromemail  = $formate->validation($_POST['fromemail']);
                    		$sub        = $formate->validation($_POST['sub']);
                    		$message    = $formate->validation($_POST['message']);

                    		$sendmail   = mail($toemail, $fromemail, $sub, $message); 
                    		if($sendmail) {
                    			 echo "<span class='success'>Message send Successfully..! </span>";
                    		}else{
                    			 echo "<span class='error'>Message not send Successfully..! </span>";
                    		}
                        
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
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" name="toemail" readonly value="<?php echo $result['email']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="fromemail" <?php echo Session::get('email'); ?> class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="sub" placeholder="Subject"  class="medium" />
                            </td>
                        </tr>
                  
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea name="message" class="tinymce">
                                      
                                </textarea>
                              
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
                                <span class="replay"><a href="inbox.php?draftid=<?php echo $result['id']; ?>">Draft box</a></span>
                                 
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



 