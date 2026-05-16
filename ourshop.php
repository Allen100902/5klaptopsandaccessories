<?php
include "config.php";
session_start();


if(array_key_exists('UID',$_SESSION) && !empty($_SESSION['UID'])){
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
<link rel="stylesheet" href='css/style.css'>
<script src="https://kit.fontawesome.com/42f0db2e3a.js" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<header>
	
		
	
	<div class=head>
		<a href="index.php"> <img src="icons/RECSAILOGO.png" class=logo height="auto-adjust" width="200px" > </a> 
	</div>
</header>
<body>
<?php echo "<form  method=POST>" ?>
	<div id=navbar>
		<div class=navbar-container>
			<div class=categories>
				<a href="index.php" >Home</a>
				<a href="products.php">Products</a>
				<a href="ourshop.php"  class="active">Our Shop</a>	
			</div>	
			
			<div class=search-container>
			
					<input type="text" name=search placeholder="Search..">
          <input type=submit name=find formaction=search.php value=Search>									
			</div>	
			
			<div class=cart-container>
				<a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
			</div>
			
			<div class=login-container>
				<div class=login>
						<a href="account/customer.php"> <img src="icons/login.png" class=logo> </a>							
				</div>
				<a href="account/customer.php"><?php echo"$firstname $lastname ";     ?> </a> 
			</div>		
		</div>
		
	</div>
		
			
		
<?php
$sqlmission="Select * from tbl_ourshop where ourshop='MISSION'";
$resultmission=mysqli_query($conn,$sqlmission);
$data_mission= mysqli_fetch_assoc($resultmission);
  
$mission = $data_mission['text'];

$sqlvision="Select * from tbl_ourshop where ourshop='VISION'";
$resultvision=mysqli_query($conn,$sqlvision);
$data_vision= mysqli_fetch_assoc($resultvision);
  
$vision = $data_vision['text'];

?>
	
	
	
<div class=body>

	<div class=body-ourshop>

    <div class=holder>
      <h1>MISSION</h1>
      <div class=ourshoptext>
        <span><?php echo $mission;?></span>
      </div>
   </div>

   <div class=holder>
   <h1>VISION</h1>
      <div class=ourshoptext>
      <span><?php echo $vision;?></span>
      </div>
   </div>

	</div>

</div>





<footer>
      <div class="main-content">
        <div class="left box">
          <h2>About us</h2>
          <div class="content">
            <p>5K Laptops and Accessories, where cutting-edge technology meets unparalleled style. At 5K Laptops and Accessories, we pride ourselves on being your one-stop destination for all things tech.       <div class="social">
              <a href="https://www.facebook.com/5kOnlineshop.laptop?mibextid=ViGcVu"><span class="fab fa-facebook-f"></span></a>
              <a href="#"><span class="fab fa-twitter"></span></a>
              
            </div>
          </div>
        </div>
        <div class="center box">
          <h2>Address</h2>
          <div class="content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Cogeo Gate 2 Antipolo</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text"> +63 9561374109</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">5kgadget@gmail.com</span>
            </div>
          </div>
        </div>
     
      </div>
      <div class="bottom">
        <center>
          <span class="credit">Created By <a href="https://www.facebook.com/PermaFr0st/">ALPHA DEL PAKOPYA</a> | </span>
          <span class="far fa-copyright"></span><span> 2021 All rights reserved.</span>
        </center>
      </div>
    </footer>


</body>

</html>
<?php
}


else{
?>
<html>
<title>5k Gadget Shop</title>
<link rel="icon" href="icons/favicon.ico" /> 
<link rel="stylesheet" href='css/style.css'>
<script src="https://kit.fontawesome.com/42f0db2e3a.js" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<header>
	
		
	
	<div class=head>
		<a href="index.php"> <img src="icons/RECSAILOGO.png" class=logo height="auto-adjust" width="200px" > </a> 
	</div>
</header>
<body>


<?php echo "<form method=POST>" ?>

	<div id=navbar>
		<div class=navbar-container>
			<div class=categories>
				<a href="index.php">Home</a>
				<a href="products.php" >Products</a>
				<a href="ourshop.php"  class="active">Our Shop</a>	
			</div>	
			
			<div class=search-container>
				
					<input type="text" name=search placeholder="Search..">	
					</form>
				<input type=submit name=find formaction=search.php value=Search>	
			</div>	
			
			<div class=cart-container>
				<a href="account/login.php"><i class="fas fa-shopping-cart"></i></a>
			</div>
			
			<div class=login-container>
				<div class=login>
						<a href="account/login.php"> <img src="icons/login.png" class=logo> </a>							
				</div>
				<a href="account/login.php"> Login </a> 
			</div>		
		</div>
		
	</div>
		
			
		
	
	
	
		
  <?php
$sqlmission="Select * from tbl_ourshop where ourshop='MISSION'";
$resultmission=mysqli_query($conn,$sqlmission);
$data_mission= mysqli_fetch_assoc($resultmission);
  
$mission = $data_mission['text'];

$sqlvision="Select * from tbl_ourshop where ourshop='VISION'";
$resultvision=mysqli_query($conn,$sqlvision);
$data_vision= mysqli_fetch_assoc($resultvision);
  
$vision = $data_vision['text'];

?>
	
	
	
<div class=body>

	<div class=body-ourshop>

    <div class=holder>
      <h1>MISSION</h1>
      <div class=ourshoptext>
        <span><?php echo $mission;?></span>
      </div>
   </div>

   <div class=holder>
   <h1>VISION</h1>
      <div class=ourshoptext>
      <span><?php echo $vision;?></span>
      </div>
   </div>

	</div>

</div>




<footer>
      <div class="main-content">
        <div class="left box">
          <h2>About us</h2>
          <div class="content">
            <p>5K Laptops and Accessories, where cutting-edge technology meets unparalleled style. At 5K Laptops and Accessories, we pride ourselves on being your one-stop destination for all things tech.       <div class="social">
              <a href="https://www.facebook.com/5kOnlineshop.laptop?mibextid=ViGcVu"><span class="fab fa-facebook-f"></span></a>
              <a href="#"><span class="fab fa-twitter"></span></a>
              
            </div>
          </div>
        </div>
        <div class="center box">
          <h2>Address</h2>
          <div class="content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Cogeo Gate 2 Antipolo</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text"> +63 9561374109</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">5kgadget@gmail.com</span>
            </div>
          </div>
        </div>
     
      </div>
      <div class="bottom">
        <center>
          <span class="credit">Created By <a href="https://www.facebook.com/PermaFr0st/">ALPHA DEL PAKOPYA</a> | </span>
          <span class="far fa-copyright"></span><span> 2021 All rights reserved.</span>
        </center>
      </div>
    </footer>


</body>

</html>
<?php
}
?>
