<?php 
include "../config.php";

session_start();
$UID= $_SESSION['UID'];

$sql1 = "SELECT * from tbl_user WHERE UserID = '$UID'";
$result1=mysqli_query($conn,$sql1);
$num1= mysqli_num_rows($result1);
$user_data= mysqli_fetch_assoc($result1);


$UID = $user_data['UserID'];
$lastname = $user_data['Lastname'];
$firstname = $user_data['Firstname'];




?>

<html>

<title>5k Gadget Shop</title>
<link rel="icon" href="icons/favicon.ico" /> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href='css/admin-customers.css'>
<script src="../js/city.js"></script>	
<script src="https://kit.fontawesome.com/42f0db2e3a.js" crossorigin="anonymous"></script>

<script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var x = new Date()
document.getElementById('ct').innerHTML = x;
display_c();
 }
</script>

<body>



<!-- ADMIN NAVIGATION -->
<div class=body-content>
	<div class=navigation>
		<div class=navigation-content>
			<img src='icons/RECSAILOGO.png'>
			
		</div>
		<ul>
			
			<i class="fas fa-user-circle"></i><a href="admin-users.php" class="active" >USERS </a></li>
			<li><i class="fas fa-project-diagram"></i><a href="admin-archive-users.php" >ARCHIVED USERS </a></li>
			<li><i class="fas fa-scroll"></i><a href="admin-logs.php" >LOGS</a></li>	
			<li><i class="fas fa-cog"></i><a href="siteSettings.php">SITE SETTINGS</a></li>		
			<li><i class="fas fa-sign-out-alt"></i></i><a href="logout.php" >LOGOUT</a></li>
		</ul>
		
		
		

	</div>
	
	
	<div class=	>
	
	</div>
	
		<div class=panel-content>
		
				<div class=panel-nav>	
					<div class=panel-nav-holder>
						<body onload=display_ct();>
						<strong id='ct'></strong>
						<span class=fontadmi><?php echo "$firstname $lastname"; ?></span>
						<span class=fontwel>Welcome:</span> 
						<div class=search-container>
							
							</form>
						</div>	
						
					</div>
				</div>
		<br />
		
			<div class=edit-holder>
				<h1 class=text-head>ADD USER</h1>
				<div class=edit-content>
					<table>
					<tr>
				<tr>
				    <form action=admin-add-user.php method=POST>
					<td>Lastname:</td>
					<td><input type=text name=lastname placeholder="Lastname"  style="text-transform:uppercase"> </td>
					<td>Firstname:</td>
					<td><input type=text name=firstname placeholder="firstname"  style="text-transform:uppercase"> </td>
				</tr>
				
				<tr>
					<td>E-mail:</td>
					<td><input type=text name=email placeholder="Email Address" ></td>
					<td>Type:</td>
					<td><select name=type> 
							<option value="Admin"> Admin </option>
							<option value="Manager"> Manager </option>
							<option value="Employee"> Employee </option>
							<option value="Customer"> Customer </option>
					</select>
				</tr>
				<tr>
					<th colspan=6>LOGIN INFORMATION</th>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type=text name=password1   placeholder=Password> </td>
				</tr>
				<tr>
					<td>Confirm Password:</td>
					<td><input type=text name=password2   placeholder=Password></td>
				</tr>
					<tr>
					<td colspan=6> <CENTER><input type=submit name=sub value=ADD></CENTER></td>
					</form>
						
					</tr>
					
					</table>
					<?php 

							if(isset($_POST['sub'])){

							$fname= $_POST['firstname'];
							
							$lname= $_POST['lastname'];
			
							$email= $_POST['email'];
							$password1= $_POST['password1'];
							$password2= $_POST['password2'];
					
							$type= $_POST['type'];
							
							date_default_timezone_set('Asia/Manila');
							$date=date('F d Y ');
							
							$s="select * from tbl_user where email='$email'";
							$result= mysqli_query($conn,$s);
							$num=mysqli_num_rows($result);
							
							
									if (empty($fname)||empty($lname)||empty($email)||empty($password1)||empty($password2)) {
									
										echo "<span class='error'> Please Fill Up the Textfield above </span><br>";
										
										
									}elseif($num == 1){
										
										echo "<span class='error'>Email is already taken! </span><br>";
										
										
									}elseif($fname !="" || $lname !=""|| $email !=""|| $password1 !=""|| $password2 !="" ){

										
									if($num != 1 && $password1===$password2){
										$sql= "Insert into tbl_user (Firstname,Lastname,Email,Password,vkey,verified,Type,Status,Created)
										values ('$fname','$lname','$email','$password1',' ','1','$type','Active','$date')";
									
										$insert = $conn->query($sql);
									if($insert == TRUE){
							?>
							<script>
								alert("Successfully Added")
							</script>
							<?php
							
							header('refresh:0;url=admin-users.php');
							
							}else{
								echo $conn->error;
							}
							$conn->close();

									}else{ echo "<span class='error'> Password Does not match </span><br>";}
									}



							}
							?>					
					
				</div>
		</div>		
	</div>
	
</div>	
</body>

</html>
