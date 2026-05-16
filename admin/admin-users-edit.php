<?php 
include "../config.php";


session_start();
$UID=$_SESSION['UID'];
$sql = "SELECT * from tbl_user WHERE UserID = $UID";
$result=mysqli_query($conn,$sql);
$num= mysqli_num_rows($result);
$user_data= mysqli_fetch_assoc($result);


$UID = $user_data['UserID'];
$lastname = $user_data['Lastname'];
$firstname = $user_data['Firstname'];



$UserID=$_GET['id'];
$sql1 = "SELECT * from tbl_user WHERE UserID = '$UserID'";

$result1 = $conn->query($sql1);
$row = $result1->fetch_assoc();

$ID = $row['UserID'];
$fname = $row['Firstname'];
$lname = $row['Lastname'];
$email = $row['Email'];
$password = $row['Password'];
$Type = $row['Type'];

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
			<li><i class="fas fa-cog"></i><a href="siteSettings.php" >SITE SETTINGS</a></li>		
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
				<h1 class=text-head>EDIT USER</h1>
				<div class=edit-content>
					<table>
				
				<tr>
						<form action=admin-users-edited.php method=POST>
					<td>Lastname:</td>
					<td><input type=text name=lastname placeholder="Lastname" value="<?php echo $lname; ?>" style="text-transform:uppercase"> </td>
					<td>Firstname:</td>
					<td><input type=text name=firstname placeholder="firstname" value="<?php echo $fname; ?>" style="text-transform:uppercase"> </td>
				</tr>
				
				<tr>
					<td>E-mail:</td>
					<td><input type=email name=email value="<?php echo $email; ?>"  placeholder="E-mail Address" ></td>
					
					<td>Type:</td>
					<td><select name=type> <option value="<?php echo $Type;?>"> Select User Type </option>
													 <option value="Admin"> Admin </option>
													 <option value="Manager"> Manager </option>
													 <option value="Employee"> Employee </option>
													 <option value="Customer"> Customer </option>
					</select>
				</tr>
				
				<tr>
					<td>Password:</td>
					<td><input type=text name=password1 value="<?php echo $password; ?>"  placeholder=Password> </td>
				</tr>
				<tr>
					<td>Confirm Password:</td>
					<td><input type=text name=password2 value="<?php echo $password; ?>"  placeholder=Password></td>
				</tr>
					<tr>
					<input type=hidden value="<?php echo $ID; ?>" name=userid>
					<td colspan=6> <CENTER><input type=submit name=sub value=UPDATE></CENTER></td>
					</form>
						
					</tr>
					
					</table>
				</div>
		</div>		
	</div>
	
</div>	
</body>

</html>
<?php 

$conn->close();
?>