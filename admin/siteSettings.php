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
			
        <li>
            <i class="fas fa-user-circle"></i><a href="admin-users.php" >USERS </a></li>
			<li><i class="fas fa-project-diagram"></i><a href="admin-archive-users.php" >ARCHIVED USERS </a></li>	
			<li><i class="fas fa-scroll"></i><a href="admin-logs.php" >LOGS</a></li>
			<li><i class="fas fa-cog"></i><a href="siteSettings.php" class="active">SITE SETTINGS</a></li>		
			<li><i class="fas fa-sign-out-alt"></i></i><a href="logout.php" >LOGOUT</a></li>
		</ul>
	</div>

	
	

	
	
	
		<div class=panel-content>
		
				<div class=panel-nav>	
					<div class=panel-nav-holder>
						<body onload=display_ct();>
						<strong id='ct' ></strong>
						<span class=fontadmi><?php echo "$fname $lname"; ?></span>
						<span class=fontwel>Welcome:</span> 
					</div>
				</div>
		
            
		
			<div class=tableholder>
				
			<table class=carouseltbl>
				<?php 
					
					$sqlourshop="select * from tbl_ourshop";
					$resultourshop=$conn->query($sqlourshop);
					
					
					while($rowourshop = $resultourshop -> fetch_assoc()){
						echo "<tr>";
						echo "<td>".$rowourshop['ourshop']."</td>";
						echo "<td>" .$rowourshop['text']. "</td>";
						echo "<td><a href='admin-edit-ourshop.php?edit=".$rowourshop['data']."'>Edit</a></td>";
						echo "</tr>";
					}      
					?>
				</table>
				<table class=carouseltbl>
					<tr>						
						<th colspan=3>CAROUSEL</th>
					</tr>
					<tr>						
						<th>Image</th>
						<th>Link</th>
						<th>action</th>
					</tr>

					<?php 
					
					$sqlcarousel="select * from tbl_carousel";
					$result=$conn->query($sqlcarousel);
					
					
					while($row = $result -> fetch_assoc()){
						echo "<tr>";
						echo "<td> <img src='carouselimage/". $row['image']."' class=carouselimg></td>";
						echo "<td>" . $row['link'] . "</td>";
						echo "<td><a href='admin-edit-carousel.php?edit=".$row['carouselID']."'>Edit</a></td>";

					}      
					?>				
				</table>				
			</div>
			
			
		</div>		
	
	
</body>

</html>