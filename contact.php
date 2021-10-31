<?php include 'inc/header.php';?>
<?php include 'inc/top.php';?>

			<?php 
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$fname  = $formate->validation($_POST['fname']);
					$lname  = $formate->validation($_POST['lname']);
					$email  = $formate->validation($_POST['email']);
					$body   = $formate->validation($_POST['body']);
					
					$fname = mysqli_real_escape_string($db->link,$fname);
					$lname = mysqli_real_escape_string($db->link,$lname);
					$email = mysqli_real_escape_string($db->link,$email);
					$body = mysqli_real_escape_string($db->link,$body);

					$error = "";
					if (empty($fname)) {
						$error = "First name must not be empty...!";
					}elseif (empty($lname)) {
						$error = "Last name must not be empty...!";
					}elseif (empty($email)) {
						$error = "email must not be empty...!";
					}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$error = "invalide email address...!";
					}elseif(empty($body)){
					
						$error = "message not be empty...!";

					}else{
						$query = "INSERT INTO  contact(fname,lname,email,body) VALUES('$fname','$lname','$email','$body')"; 
                              
                            $inserted_rows = $db->insert($query);

			                if ($inserted_rows) {
			                    
			                    $mag ="Message send Successfully..!";
			                                    

			                }else {
			                      $error ="Message not send Successfully..!";
			                }
			            }
					} 
				
			?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php 
						if (isset($error)) {
							echo "<span style='color:red'>$error</span>";
						}
						if(isset($mag)){
							echo "<span style='color:green'>$mag</span>";

						}


				?>

			<form action="" method="POST">
				<table>
				<tr>
					<td> First Name:</td>
					<td>
					<input type="text" name="fname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td> Last Name:</td>
					<td>
					<input type="text" name="lname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td> Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>

				<tr>
					<td> Status:</td>
                    <td><select id="select" name="status">
                    	<option value=""> Select status </option>
                    	<option value="0">active </option>
                    	<!-- <option value="1"> Select Category </option> -->
                    </select></td>
                 
				</tr>
				
				<tr>
					<td> Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>

				 
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

</div>

				<?php include 'inc/side.php';?>
				<?php include 'inc/hoder.php';?>