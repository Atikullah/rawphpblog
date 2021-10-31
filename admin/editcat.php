
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

   <?php 

            if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {
                header("Location:catlist.php");
            }else{
                
                $id = $_GET['catid'];
                
            }

   ?>



        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock">


               <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['name'];
                    $username = $formate->validation($_POST['name']);
                    $username = mysqli_real_escape_string($db->link,$username);
                    if (empty($username)) {
                        echo "<span class='error'>Field is require...!</span>";
                    }else{
                        $query = "UPDATE categoris SET name='$username' WHERE id = '$id'";
                        $categoris = $db->update($query);
                        if ($categoris) {
                              echo "<span class='success'>Data insert is successfully...!</span>";
                            
                        }

                        else{
                            echo "<span class='error'>Category not insert...!</span>";
                        }

                        }
                    }

                ?>

                <?php 
                    $quary = "select * from  categoris where id='$id' order by id desc" ;
                    $post = $db->select($quary);

                        if($post){
                           while ( $result = $post->fetch_assoc()) {
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>"  placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>

                   <?php } }else{ header("Location:editcat.php");} ?>

                </div>
            </div>
        </div>

 <?php include 'inc/hoder.php';?>

 