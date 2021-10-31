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
    .leftsite{float: left;padding:30px; width: 55% }
    .rigntsite{ float: right; width: 425px; }
    .rigntsite img{height:220px;width:420px;}

</style>

<?php 

            if (!isset($_GET['viewslider']) || $_GET['viewslider'] == NULL) {
                header("Location:postlist.php");
            }else{
                
                $viewslider = $_GET['viewslider'];
                
            }

   ?>


        <div class="grid_10">
    
            <div class="box round first grid">
                <h2>view profile</h2>

                <div class="block"> 

                   <?php 
                    $quary = "select * from slider where id='$viewslider' order by id desc" ;
                    $post = $db->select($quary);
                    if ($post) {
                           while ( $result = $post->fetch_assoc()) {
                ?>     
                  <div class="leftsite" > <br><br><br><br>
                        
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">

                    <tr>
                            <td>
                                <label>Access</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['access']; ?>"  class="medium" />
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['title']; ?>"  class="medium" />
                            </td>
                        </tr>


                        
                       <tr>
                            <td></td>
                            <td>
                              <span class="replay"><a href="index.php">Close </a></span>

                            <?php
                                if (Session::get('userid')==$result['status'] || Session::get('userstatus')=='4' ) {?>
                                    <span class="replay"><a href="editslider.php?editslider=<?php echo $result['id']; ?>">Update</a></span>

                            <?php  } ?>
                             
                            </td>
                        </tr>


                    </table>
                    </form>

                </div>

                       <div class="rigntsite">
                             <img src="<?php echo $result['images']; ?>" alt="image"/>
                         
                       </div>
                  
                <?php } }?>
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