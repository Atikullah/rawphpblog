<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                    	// $name  = $formate->validation($_POST['name']);
                     //    $body = $formate->validation($_POST['body']);

                        $name   = mysqli_real_escape_string($db->link,$_POST['name']);
                        $body   = mysqli_real_escape_string($db->link,$_POST['body']);
                       
                            
                            if ($name == "" || $body == ""){
                                echo "<span class='error'>Fireld must not be empty...!</span>";

                                }else{
									
                                		$query = "INSERT INTO  pages(name,body) VALUES('$name','$body')"; 
                              
                               			 $inserted_rows = $db->insert($query);

			                                    if ($inserted_rows) {
			                                     echo "<span class='success'>Data Inserted Successfully..! </span>";
			                                    

			                                    }else {
			                                     echo "<span class='error'>Data Not Inserted..!</span>";
			                                    }

                            }
                     }



                 ?>
                <div class="block">               
                 <form action="" method="POST">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Page Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" placeholder="Enter page..." class="medium" />
                            </td>
                        </tr>
                  
                     
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Description</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
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