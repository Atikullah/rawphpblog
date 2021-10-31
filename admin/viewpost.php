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
    .leftsite{float: left;width:65% }
    .rigntsite{ float: right;margin-right:15px;width: 30%}
    .rigntsite img{height:200;width: 300px;}

</style>


<?php 

            if (!isset($_GET['viewpost']) || $_GET['viewpost'] == NULL) {
                header("Location:postlist.php");
            }else{
                
                $editpostid = $_GET['viewpost'];
                
            }

   ?>


        <div class="grid_10">
        
            <div class="box round first grid" style="height: 500px;">
                <h2>Add New Post</h2>
                
                <div class="block">     

                 <?php 
                    $quary = "select * from tbl_post where id='$editpostid' order by id desc" ;
                    $post = $db->select($quary);
                           while ( $result = $post->fetch_assoc()) {
                ?>          
                  <div class="leftsite" >
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['title']; ?>"  class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" readonly>
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
                                <label>Status</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['author']; ?>"  class="medium" />
                                 <input type="hidden"  value="<?php echo Session::get('userid') ?>" class="medium" />
                            </td>
                        </tr>

                          <tr>
                            <td>
                                <label>Writer</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['tags']; ?>"  class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea readonly class="tinymce">
                                  <?php echo $result['body']; ?>
                                </textarea>
                            </td>
                        </tr>
                         <tr>
                            <td></td>
                            <td>
                              <span class="replay"><a href="index.php">Close </a></span>

                            <?php
                                if (Session::get('userid')==$result['userid'] || Session::get('userstatus')=='4' ) {?>
                                    <span class="replay"><a href="editpost.php?editpost=<?php echo $result['id']; ?>">Update</a></span>

                            <?php  } ?>
                             
                            </td>
                        </tr>
                    </table>
                    </form>
                    </div>

                        <div class="rigntsite">
                             <img src="<?php echo $result['images']; ?>" alt="image"/>
                         
                       </div>
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