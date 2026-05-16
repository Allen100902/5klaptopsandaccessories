<?php
include "../config.php";
session_start();
$UID=$_SESSION['UID'];
$sql = "SELECT * from tbl_user WHERE UserID = $UID";
$result=mysqli_query($conn,$sql);
$num= mysqli_num_rows($result);
$user_data= mysqli_fetch_assoc($result);


$UID = $user_data['UserID'];
$lname = $user_data['Lastname'];
$fname = $user_data['Firstname'];


?>

<html>

<title>5k Gadget Shop</title>
<link rel="icon" href="icons/favicon.ico" /> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href='css/admin-customers.css'>
<script src="https://kit.fontawesome.com/42f0db2e3a.js" crossorigin="anonymous"></script>
<body>

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
<!-- ADMIN NAVIGATION -->
<div class=body-content>
	<div class=navigation>
		<div class=navigation-content>
			<img src='icons/RECSAILOGO.png'>
			
		</div>
		<ul>
			
			<li><i class="fas fa-user-circle"></i><a href="admin-users.php" class="active">USERS </a></li>
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
						<strong id='ct' ></strong>
						<span class=fontadmi><?php echo "$fname $lname"; ?></span>
						<span class=fontwel>Welcome:</span> 
						<div class=search-container>
							<form action=admin-users.php method=POST>
								<input type="text" name=search placeholder="Search in Users..">	
								
							<input type=submit name=find value=search>
							</form>
						</div>	
						
					</div>
				</div>
		
				<div class=holder>
				<a href='admin-add-user.php'><button class=add-button-holder> Add a User </Button> </a>
				</div>
		
		
			<div class=tableholder>
			<table border=0>
			
				<?php
				
				
				if(isset($_POST['find'])){
					$search = $_POST['search'];
					
					if($search != NULL){
					   
					   $sqlfind = "Select * from tbl_user where UserID LIKE '%$search%' AND status='Active' or Email LIKE 
					   '%$search%' AND status='Active' or Type LIKE '%$search%' AND status='Active' ";
					   
				   }else{
					   $sqlfind = "Select * from tbl_user where status='Active' AND Type='Customer'";	
				   }
				   $resultfind = $conn -> query($sqlfind);
				   if($resultfind -> num_rows >0){
					   echo '<tr>';	
					   echo '<th>UserID</th>';
					   echo '<th>Lastname</th>';
					   echo '<th>Firstname</th>';		
					   echo '<th>Email/username</th>';
					   echo '<th>Password</th>';
					  
					   echo '<th>Type</th>';
					   echo '<th>Created</th>';
					   echo '<th>Delete</th>';
					   echo '<th>Edit</th>';
					   echo '</tr>';
				   while($rowfind = $resultfind->fetch_assoc()){
   
					 echo "<tr>";
					 
					 echo "<td>" . $rowfind['UserID'] . "</td>";
					 echo "<td>" . $rowfind['Lastname'] . "</td>";
					 echo "<td>" . $rowfind['Firstname'] . "</td>";
					 echo "<td>" . $rowfind['Email'] . "</td>";
					 echo "<td>" . $rowfind['Password'] . "</td>";
					
					 echo "<td>" . $rowfind['Type'] . "</td>";
					 echo "<td>" . $rowfind['Created'] . "</td>";
					 echo "<td><a href=archive-user.php?id=".$rowfind['UserID']."> Archive </a></td>";
					 echo "<td><a href=admin-users-edit.php?id=".$rowfind['UserID']."> Edit </a></td>";
					 echo "</tr>";
					 
					 
					 }
				   }else{
					   echo "Empty";
					   }
				   
				   
				   $conn -> close();

				}else{
				$sql = "Select * from tbl_user where status='Active' AND Type='Customer' ";	
				
				$result = $conn -> query($sql);
				if($result -> num_rows >0){
					echo '<tr>';	
					echo '<th>UserID</th>';
					echo '<th>Lastname</th>';
					echo '<th>Firstname</th>';		
					echo '<th>Email/username</th>';
					echo '<th>Password</th>';
					
					echo '<th>Type</th>';
					echo '<th>Created</th>';
					echo '<th>Delete</th>';
					echo '<th>Edit</th>';
					echo '</tr>';
				while($row = $result->fetch_assoc()){

				  echo "<tr>";
				  
				  echo "<td>" . $row['UserID'] . "</td>";
				  echo "<td>" . $row['Lastname'] . "</td>";
				  echo "<td>" . $row['Firstname'] . "</td>";
				  echo "<td>" . $row['Email'] . "</td>";
				  echo "<td>" . $row['Password'] . "</td>";
				 
				  echo "<td>" . $row['Type'] . "</td>";
				  echo "<td>" . $row['Created'] . "</td>";
				  echo "<td><a href=archive-user.php?id=".$row['UserID']."> Archive </a></td>";
				  echo "<td><a href=admin-users-edit.php?id=".$row['UserID']."> Edit </a></td>";
				  echo "</tr>";
				  
				  
				  }
				}else{
					echo "Empty";
					}
				
				
				$conn -> close();
				}
				?>
			</table>
		</div>		
	</div>
	
</div>	
</body>

</html>