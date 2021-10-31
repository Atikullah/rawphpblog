<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
        if (!Session::get('userstatus')==  '4') {?>
             header("Location:index.php");

<?php } ?>





        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New User</h2>

            <?php 
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username  = $formate->validation($_POST['username']);
                    $category  = $formate->validation($_POST['category']);
                    $email  = $formate->validation($_POST['email']);
                    $password  = $formate->validation(md5($_POST['password']));
                    $status   = $formate->validation($_POST['status']);
                    
                    $username = mysqli_real_escape_string($db->link,$username);
                    $category = mysqli_real_escape_string($db->link,$category);
                    $email = mysqli_real_escape_string($db->link,$email);
                    $password = mysqli_real_escape_string($db->link,$password);
                    $status = mysqli_real_escape_string($db->link,$status);

                    $error = "";
                    if (empty($username)) {
                        $error = "First name must not be empty...!";
                    }elseif (empty($category)) {
                        $error = "email must not be empty...!";
                    }elseif (empty($email)) {
                        $error = "email must not be empty...!";
                    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $error = "invalide email address...!";
                    }elseif(empty($password)){
                    
                        $error = "password not be empty...!";

                    }elseif(empty($status)){
                    
                        $error = "status not be empty...!";

                    }


                    $quary = "select * from tbl_user where email='$email' limit 1 " ;
                    $post = $db->select($quary);
                    if ($post!= false) {
                         $error ="Email already Exist..!";

                    }else{
                        $query = "INSERT INTO  tbl_user(username,category,email,password,status) VALUES('$username','$category','$email','$password','$status')"; 
                              
                            $inserted_rows = $db->insert($query);

                            if ($inserted_rows) {
                                
                                $mag ="Message send Successfully..!";
                                                

                            }else {
                                  $error ="Message not send Successfully..!";
                            }
                        }
                    } 
                
            ?>


                <?php 
                        if (isset($error)) {
                            echo "<span style='color:red'>$error</span>";
                        }
                        if(isset($mag)){
                            echo "<span style='color:green'>$mag</span>";

                        }


                ?>

                             <form action="" method="POST">
                    <table class="form">                    
                        <tr>
                             <td><label>User Name :</label></td>
                            <td>
                                <input type="text" name="username"  placeholder="Enter User  Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                             <td><label>User Status :</label></td>
                            <td>
                                <input type="text" name="category"  placeholder="Enter User  category..." class="medium" />
                            </td>
                        </tr>
                         <tr>
                             <td><label>Email :</label></td>
                            <td>
                                <input type="email" name="email"  placeholder="Enter Email..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                             <td><label>Password :</label></td>
                            <td>
                                <input type="password" name="password"  placeholder="Enter Password..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td><label> Category:</label></td>
                             <td>
                                <select id="select" name="status">
                                    <option> Select Category </option>
                                    
                                    <option value="1"> Author </option>
                                    <option value="2"> Editor</option>
                                    <option value="3"> Moderator</option>
                                    <option value="4"> Admin </option>
                                </select>
                            </td>


                        </tr>

                        <tr> 
                            <td><label> </label></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
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
