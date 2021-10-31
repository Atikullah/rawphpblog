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
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
			<?php 
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$username     = $formate->validation($_POST['username']);
					$password  = $formate->validation(md5($_POST['password']));

					$username = mysqli_real_escape_string($db->link,$username);
					$password = mysqli_real_escape_string($db->link,$password);

					$query = "SELECT * FROM  tbl_user WHERE username='$username' AND password='$password'";
					$result = $db->select($query);

					if ($result != false) {

						$value = mysqli_fetch_array($result);
						$row   = mysqli_num_rows($result);
   
						if ($row > 0) {
							Session::set("login",true);
							Session::set("username",$value['username']);
							Session::set("userid",$value['id']);
							Session::set("userstatus",$value['status']);
							Session::set("email",$value['email']);
							header("Location:index.php"); 
							
						}else{
							echo "<span style='color:red;font-size:18px;'>No result found.!!</span>";
						}


					}else{
						echo "<span style='color:red;font-size:18px;'>Email & password not matched..!!</span>";

					}
				}


			 ?>

	<section id="content">
		<form action="login.php" method="POST">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->

		<div class="button">
			<a href="forget.php">Recovary password</a>
		</div>
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>