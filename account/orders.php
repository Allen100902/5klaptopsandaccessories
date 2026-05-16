<?php
include "../config.php";
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
<link rel="icon" href="../icons/favicon.ico" /> 
<link rel="stylesheet" href='../css/style.css'>
<script src="https://kit.fontawesome.com/42f0db2e3a.js" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<header>
	
		
	
	<div class=head>
		<a href="index.php"> <img src="../icons/RECSAILOGO.png" class=logo height="auto-adjust" width="200px" > </a> 
	</div>
</header>
<body>



<form method=POST>
	<div id=navbar>
		<div class=navbar-container>
			<div class=categories>
				<a href="../index.php">Home</a>
				<a href="../products.php" >Products</a>
				<a href="../ourshop.php" >Our Shop</a>	
			</div>	
			
			<div class=search-container>		
				<input type="text" name=search placeholder="Search..">	
				<input type=submit name=find formaction=../search.php value=Search>	
			</div>	
			
			<div class=cart-container>
				<a href="../cart.php"><i class="fas fa-shopping-cart"></i></a>
			</div>
			
			<div class=login-container>
				<div class=login>
						<a href="customer.php"> <img src="../icons/login.png" class=logo> </a>							
				</div>
				<a href="customer.php"><?php echo"$firstname $lastname ";     ?> </a> 
			</div>		
		</div>
		
	</div>
		
			
		
	
	
	
	
<div class=body>

	<div class=account-container>
    <div class='account-link-holder'>
    <center> <img src='../icons/login.png'>
    <h2 class=name><?php echo"$firstname $lastname";?></h2>
    </center>
    <div class=ul>
      <a href='customer.php' >PROFILE</a>
      <a href='orders.php' class=active>ORDERS</a>
      <a href='history.php'>HISTORY</a>
      <a href='../logout.php'>LOGOUT</a>
    </div>
    
    </div>

    <div class=account-content>
        <h1 class=account-head> Orders</h1>
        <table class=order-table>

        <tr>
            <th>OrderID</th>
            <th>Order</th>
            <th>Total</th>
            <th>Method</th>
            <th>Address</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "Select * from tbl_order where userID='$UID' && Status='Pending' OR Status='Delivering'";
        $result = $conn -> query($sql);
        while($row = $result->fetch_assoc()){
            echo "<tr>";
                    echo "<td>" . $row['orderID'] . "</td>";
                    echo "<td>" . $row['order'] . "</td>";
                    echo "<td>" . $row['Total'] . "</td>";
					if($row['Method']=='COD'){
					echo "<td>" . $row['Method'] . "</td>";		
					}else{
					echo "<td>" . $row['Method'] . "<br>
				
					<img src='../gcash/Gcash.jpg'></td>";	
					}
                    
          echo "<td>" . $row['address'] . "</td>";
          echo "<td>" . $row['Status'] . "</td>";
          if($row['Status']=='Pending'){
          echo "<td><button class=actionbutton><a href=functionCustomer.php?decline=".$row['orderID']."> Cancel </a> </button> </td>";
          }else{
            echo "<td><td>";
          }
          echo "</tr>";

        }
        
        ?>
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
<?php
}
?>