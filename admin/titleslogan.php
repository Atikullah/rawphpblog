
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>



<style>
    .leftsite{float: left;width: 70% }
    .rigntsite{ float: left;width: 20%}
    .rigntsite img{height: 160px;width: 170px;}
</style> 
           
  
        <?php 
            $quary = "select * from  title where id='1' " ;
            $data = $db->select($quary);

            if($data){
                       
            while ( $result = $data->fetch_assoc()) {

        ?>       

        <div class="grid_10">	
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                
                 <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

                        $title  = $formate->validation($_POST['title']);
                        $slogan = $formate->validation($_POST['slogan']);

                        $title  = mysqli_real_escape_string($db->link, $title);
                        $slogan = mysqli_real_escape_string($db->link, $slogan);

                       
                            $permited  = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['image']['name'];
                            $file_size = $_FILES['image']['size'];
                            $file_temp = $_FILES['image']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $same_image = 'image'.'.'.$file_ext;
                            $uploaded_image = "images/".$same_image;

                    if ($title == "" || $slogan == ""){
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
                                        $query = "UPDATE  title SET 

                                                
                                                title  = '$title',
                                                slogan   = '$slogan',
                                                image = '$uploaded_image'
                                                
                                              WHERE id = '1' ";
                                  
                                    $updated_row = $db->update($query);

                                        if ($updated_row) {
                                         echo "<span class='success'>Data  updated Successfully..! </span>";
                                        

                                        }else {
                                         echo "<span class='error'>Data Not updated..!</span>";
                                        }

                                }

                        }else{
                            $query = "UPDATE  title SET 

                                               title  = '$title',
                                               slogan = '$slogan'

                                              WHERE id = '1' ";
                                  
                                    $updated_row = $db->update($query);

                                        if ($updated_row) {
                                         echo "<span class='success'>Data updated Successfully..! </span>";
                                        

                                        }else {
                                         echo "<span class='error'>Data Not updated..!</span>";
                                        }


                        }
                    }


                     }



                 ?>


                

                <div class="block sloginblock">
                <div class="leftsite"> 

                      
                   <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $result['title']; ?>"  class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text"  name="slogan" value="<?php echo $result['slogan']; ?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Upload Logo</label>
                            </td>
                            <td>
                               
                                <input name="image"  type="file" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    </div> 
                      <div class="rigntsite">
                    <img src="<?php echo $result['image']; ?>" alt="image"/>
                       
                    </div>
                </div>


                <?php }} ?>

            </div>

        </div>

<?php include 'inc/hoder.php';?>