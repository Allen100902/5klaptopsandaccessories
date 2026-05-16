<?php
include "../config.php";

?>
<html>
<title>5k Gadget Shop</title>
<link rel="icon" href="../icons/favicon.ico" /> 
<link rel="stylesheet" href='../css/register.css'>
<script src="js/city.js"></script>	
<script src="https://kit.fontawesome.com/42f0db2e3a.js" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<header>
	
		
	
	<div class=head>
		<a href="../index.php"> <img src="../icons/RECSAILOGO.png" class=logo height="auto-adjust" width="200px" > </a> 
	</div>
</header>
<body>




	<div id=navbar>
		<div class=navbar-container>
			<div class=categories>
				<a href="../index.php" >Home</a>
				<a href="../products.php" >Products</a>
				<a href="../Ourshop.php" >Our Shop</a>	
			</div>	
		
			<div class=cart-container>
				<a href="login.php"><i class="fas fa-shopping-cart"></i></a>
			</div>
			
			<div class=login-container>
				<div class=login>
						<a href="login.php"> <img src="../icons/login.png" class=logo> </a>							
				</div>
				<a href="login.php"> Login </a> 
			</div>		
		</div>
		
	</div>
		
			
		
	
	
	
<form method=POST action=register.php>	
<div class=body>

	<div class=body-container>
					<h1 class='cacc'> Create an Account </h1>
		<div class=div-login1>
			<table>
				<tr>
					<th colspan=6>CUSTOMER INFORMATION</th>
				</tr>
				<tr>
					<td>Lastname:</td>
					<td><input type=text name=lastname placeholder="Lastname" style="text-transform:uppercase"> </td>
					<td>Firstname:</td>
					<td><input type=text name=firstname placeholder="firstname"  style="text-transform:uppercase"> </td>
				</tr>

				<tr>
					<td>E-mail:</td>
					<td colspan=5><input type=email name=email placeholder="E-mail Address" ></td>
				</tr>
				<tr>

				</tr>
				<tr>
					<td>Password:</td>
					<td><input type=password name=password1 placeholder=Password> </td>
				</tr>
				<tr>
					<td>Confirm Password:</td>
					<td><input type=password name=password2 placeholder=Password></td>
				</tr>
				<tr><td colspan=6>
						<center>
						<?php 

							if(isset($_POST['sub'])){

							$fname= $_POST['firstname'];
							
							$lname= $_POST['lastname'];

							$email= $_POST['email'];
							$password1= $_POST['password1'];
							$password2= $_POST['password2'];
							$vkey = md5(time().$email);
									
							date_default_timezone_set('Asia/Manila');
							$date=date('F d Y ');
								
							$s="select * from tbl_user where email='$email'";
							$result = $conn->query($s);
							$num=mysqli_num_rows($result);



									if (empty($fname)||empty($lname)||empty($email)||empty($password1)||empty($password2)) {
									
										echo "<span class='error'> Please Fill Up the Textfield above </span><br>";
										
										
									}elseif($num == 1){
										
										echo "<span class='error'>Email is already taken! </span><br>";
										
										
									}elseif($fname !="" || $lname !=""|| $email !=""|| $password1 !=""|| $password2 !="" ){

										
												if($num == 0 && $password1===$password2){
													
												$sql= "Insert into tbl_user (Firstname,Lastname,Email,Password,vkey,Type,Status,Created)
												values ('$fname','$lname','$email','$password1','$vkey','Customer','Active','$date')";												
												$insert = $conn->query($sql);
												
												
												//mailer
												$mail_sent=1;	
												if($mail_sent==true) {
												
													?>
												<script>
													alert("Registered");
												</script>
												<?php
												header('refresh:0;url=login.php');
												}
												else{
													echo $conn->error;
												}
													

													}else{ echo "<span class='error'> Password Does not match </span><br>";}
												}



							}
							$conn->close();
							?>											
							<input type=submit class=button1 name=sub value="REGISTER">	
							
						</center>					
							
						</div>
					</td>
				</tr>
				</form>
			</table>
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
          <span class="far fa-copyright"></span><span> 2023 All rights reserved.</span>
        </center>
      </div>
    </footer>


</body>

</html>
