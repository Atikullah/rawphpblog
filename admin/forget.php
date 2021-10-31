<?php 
	include '../lib/Session.php'; 
	Session::checklogin();
?>

<?php include '../config/config.php'; ?>
<?php include '../lib/Database.php'; ?>
<?php include '../helpers/formate.php'; ?>


 
 <?php 
    $db = new Database();
    $formate = new DateFormate();

 ?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Password recovary</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
			<?php 
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$email     = $formate->validation($_POST['email']);
					$email = mysqli_real_escape_string($db->link,$email);


							if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

								echo "<span style='color:red;font-size:18px;'>Envalid email!!</span>";

							}else{
								$mailquary = "select * from tbl_user where email='$email' limit 1 " ;
			                    $post = $db->select($mailquary);
			                       if ($post!= false) {

			                    	   while ($value = $post->fetch_assoc()){
				                    		$userid = $value['id'];
				                    		$username = $value['username'];
			                    		# code...
			                    	}
			                    	$text        =  substr($email, 0, 4);
			                    	$rend        =  rand(10000 , 99999);
			                    	$newpassword =  "$text$rend";
			                    	$password    =  md5($newpassword);

			                    	 $query = "UPDATE  tbl_user SET 

                                                password    = '$password'
                                             
                                              WHERE id = '$userid' ";
                                  
                                    $updated_row = $db->update($query);
                                    $to       = "$email";
                                    $from     = "atiqurrahman1503@gmail.com";
                                    $headers  = "From:$from\n";
                                    $headers .= 'MIME-Version: 1.0' . "\r\n";
									$headers .= 'Content-type: text/html; charset=iso-8859-1'. "\r\n";
									$subject  = "Youe password";
									$message  =  "your user name is".$username." and password ia".           $newpassword." please visit website login";

										$sendmail = mail($to, $subject, $message, $headers);


										if ($sendmail) {
											echo "<span style='color:red;font-size:18px;'>please check u r email!!</span>";

										}else{
											echo "<span style='color:red;font-size:18px;'>email no found !!</span>";

										}

					}else{
						echo "<span style='color:red;font-size:18px;'>Email not exist..!!</span>";

					}
				}
			}
	


			 ?>

	<section id="content">
		<form action="" method="POST"><br>
			<h1>password recovary</h1>
			<div>
				<input type="text" placeholder="enter valid email" required="" name="email"/>
			</div>
			
			<div>
				<input type="submit" value="send" />
			</div>
		</form><!-- form -->

		<div class="button">
			<a href="login.php">login</a>
		</div>
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>