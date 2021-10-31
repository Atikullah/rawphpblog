<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Theme Update  </h2>

                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {

                        $theme  = mysqli_real_escape_string($db->link, $_POST['theme']);
                      

                       
                    if ($theme == ""  ){
                        echo "<span class='error'>Fireld must not be empty...!</span>";

                    }else{

                    
                            $query = "UPDATE   theme SET 

                                               theme  = '$theme'

                                              WHERE id = '1' ";
                                  
                                    $updated_row = $db->update($query);

                                        if ($updated_row) {
                                         echo "<span class='success'>theme updated Successfully..! </span>";
                                        

                                        }else {
                                         echo "<span class='error'>theme Not updated..!</span>";
                                        }


                        }
                    }

                 ?>

                <div class="block copyblock"> 

                <?php 
                    $quary = "select * from   theme where id='1' " ;
                    $data = $db->select($quary);

                    if($data){
                               
                    while ( $result = $data->fetch_assoc()) {

                ?> 

                  <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input <?php if($result['theme'] == 'default'){ echo "checked";}?>

                                type="radio" name="theme" value="default" />Default
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input <?php if($result['theme'] == 'green'){ echo "checked";}?>

                                type="radio" name="theme" value="green" />Green
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input <?php if($result['theme'] == 'red'){ echo "checked";}?>


                                type="radio" name="theme" value="red" />Red
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