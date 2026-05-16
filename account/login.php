<?php
include "../config.php";
?>
<html>
<title>5k Gadget Shop</title>
<link rel="icon" href="../icons/favicon.ico" /> 
<link rel="stylesheet" href='../css/account.css'>
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
				<a href="../index.php">Home</a>
				<a href="../products.php" >Products</a>
				<a href="../Ourshop.php" >Our Shop</a>	
			</div>	
			
			
			
			<div class=cart-container>
				<a href="../account/login.php"><i class="fas fa-shopping-cart"></i></a>
			</div>
			
			<div class=login-container>
				<div class=login>
						<a href="account/login.php"> <img src="../icons/login.png" class=logo> </a>							
				</div>
				<a href="login.php"> Login </a> 
			</div>		
		</div>
		
	</div>
		
			
		
		
<div class=body>

<div class=body-container>
<center>
                <h1 class='cacc'> Login or Register </h1>
                </center>
<!--	<div class=div-login1>
        <h2> NEW CUSTOMERS</h2> 	
        <span class='font2'> By creating an account with our store, you will be able to move through the checkout 
        process faster, store shipping addresses, view and track your 
        orders in your account and more.<span>
            <div class='button1'>		
                
            </div>
    </div>-->

    <div class=div-login1>
    <form method=POST action=login.php>
        <h2> REGISTERED CUSTOMERS</h2>
        <span class='font2'> If you have an account with us, please log in.<span><br><br>
        <span class='fontE'> Email Address</span><br>
        <input type='text'  class='textbox1' name=email><br>
        <span class='fontE'> Password</span><br> 
        <input type='password' class='textbox1' name=pw>  &nbsp <br>
            
<?php
                        if(isset($_POST['sub'])){

                        $email= $_POST['email'];
                        $password= $_POST['pw'];

                        $sql="Select * from tbl_user where email='$email' && password='$password' limit 1";
                        
                        $result=mysqli_query($conn,$sql);
                        $num= mysqli_num_rows($result);
                       
                        while ($user_data= mysqli_fetch_assoc($result)) {
                        $UID = $user_data['UserID'];
                        $Fname = $user_data['Firstname'];
                        $Lname = $user_data['Lastname'];
                        $Email = $user_data['Email'];
                        $Pw = $user_data['Password'];
                        $type = $user_data['Type'];
                        session_start();
                        $_SESSION['UID'] = $user_data['UserID'];
                       }
                        

                        if($num==1 && $type=='Admin'){
                          
                          
                         header('refresh:0;url=../admin/admin-users.php?id='.$UID);  

                            ?>
                            <script>
                            alert("Welcome Admin!")
                            </script>
                            
                            <?php
                            
                                             
                        }	
                        
                        if($num==1 && $type=='Customer'){

                      
                          
                          header('refresh:0;url=../index.php');

                            ?>
                            <script>
                            alert("Successfully Logged in")
                            </script>	
                            <?php
      
                        }

                        if($num==1 && $type=='Manager'){
                          
                       
                          
                          header('refresh:0;url=../manager/manager-products.php?id='.$UID);
                          

                            ?>
                            <script>
                            alert("Successfully Logged in")
                            </script>	
                            <?php                     
                        }

                        

                        
                        if($num==1 && $type=='Employee'){
                        
                          
                          header('refresh:0;url=../Employee/Orders.php?id='.$UID);

                            ?>
                            <script>
                            alert("Successfully Logged in")
                            </script>	
                            <?php         
                        }
                        if($email===""||$password===""){
                            echo "<span class='error'> Enter your email & password </span><br>";
                            
                        }
                        if($num==0){
                            echo "<span class='error'> Wrong Email or Password! </span><br>";
                        }
                        }
                        $conn->close();
                        ?>
                        
            <div class='button2'>		
                <input type=submit name=sub value=Login> or
                <button type='button' title="Create Account" class="button1" onclick="window.location.href='register.php';">
                    <span class='fontS'>Create Account </span>
            </button>
            </div>
            
            </form>
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