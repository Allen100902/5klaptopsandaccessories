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

$carID=$_GET['edit'];

$sqleditcar = "SELECT * from tbl_carousel WHERE carouselID=$carID";
$resultcar=mysqli_query($conn,$sqleditcar);
$user_datacar= mysqli_fetch_assoc($resultcar);

$link = $user_datacar['link'];

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
	
	
	<div class=>
	
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
		
                <div class=holder>
				<a href='siteSettings.php'><button class=add-button-holder> Back </Button> </a>
				</div>
 
		
            
			<table class=carousel>
			<form method=POST action=manageCarousel.php>
                <tr>
                    <td> Carousel Img:</td>
                    <td><input type=file name=carouselimg></td>
                </tr>
                <tr>
                    <td>Link:</td>
                    <td><input type=text name=carousellink value=<?php echo "$link"; ?> ></td>
					<input type=hidden name=carID value=<?php echo "$carID"; ?> >
                </tr>
                <tr>
					
                    <td colspan=2><input type=submit name=edit value=SAVE></td>				
                </tr>
				
			</form>
			</table>
			
	</div>
	
</div>	
</body>

</html>