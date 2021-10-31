<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>

                    <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

                        $note  = $formate->validation($_POST['note']);
                       

                        $note  = mysqli_real_escape_string($db->link, $note);
                      

                       
                    if ($note == ""  ){
                        echo "<span class='error'>Fireld must not be empty...!</span>";

                    }else{

                    
                            $query = "UPDATE   copyright SET 

                                               note  = '$note'

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

                <div class="block copyblock"> 

                <?php 
                    $quary = "select * from   copyright where id='1' " ;
                    $data = $db->select($quary);

                    if($data){
                               
                    while ( $result = $data->fetch_assoc()) {

                ?> 

                  <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="note" value="<?php echo $result['note']; ?>" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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