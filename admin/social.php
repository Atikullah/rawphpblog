<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>

                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

                        $fb  = $formate->validation($_POST['fb']);
                        $tw = $formate->validation($_POST['tw']);
                        $ln = $formate->validation($_POST['ln']);
                        $gp = $formate->validation($_POST['gp']);

                        $fb  = mysqli_real_escape_string($db->link, $fb);
                        $tw = mysqli_real_escape_string($db->link, $tw);
                        $ln = mysqli_real_escape_string($db->link, $ln);
                        $gp = mysqli_real_escape_string($db->link, $gp);

                       
                    if ($fb == "" || $tw == "" || $ln == "" || $gp == ""){
                        echo "<span class='error'>Fireld must not be empty...!</span>";

                    }else{

                    
                            $query = "UPDATE   social_media SET 

                                               fb  = '$fb',
                                               tw  = '$tw',
                                               ln  = '$ln',
                                               tw  = '$tw'

                                              WHERE id = '1' ";
                                  
                                    $updated_row = $db->update($query);

                                        if ($updated_row) {
                                         echo "<span class='success'>Data updated Successfully..! </span>";
                                        

                                        }else {
                                         echo "<span class='error'>Data Not updated..!</span>";
                                        }


                        }
                    }

                 ?>


                <div class="block"> 
        <?php 
            $quary = "select * from   social_media where id='1' " ;
            $data = $db->select($quary);

            if($data){
                       
            while ( $result = $data->fetch_assoc()) {

        ?>      

                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php echo $result['fb']; ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" value="<?php echo $result['tw']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value="<?php echo $result['ln']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp" value="<?php echo $result['gp']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php }} ?>
                </div>
            </div>
        </div>
<?php include 'inc/hoder.php';?>