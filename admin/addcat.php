
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
               <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['name'];
                    $username = $formate->validation($_POST['name']);
                    $username = mysqli_real_escape_string($db->link,$username);
                    if (empty($username)) {
                        echo "<span class='error'>Field is require...!</span>";
                    }else{
                        $query = "INSERT INTO  categoris (name) VALUES('$username')";
                        $categoris = $db->insert($query);
                        if ($categoris) {
                              echo "<span class='success'>Data insert is successfully...!</span>";
                        }

                        else{
                            echo "<span class='error'>Category not insert...!</span>";
                        }

                        }
                    }

                ?>

                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                             <td><label>category</label></td>
                            <td>
                                <input type="text" name="name"  placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                         <td><label></label></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>

                </div>
            </div>
        </div>

            <?php include 'inc/hoder.php';?>

 <!-- <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script> -->
