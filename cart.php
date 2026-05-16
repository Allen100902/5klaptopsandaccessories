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



<form method=POST>
	<div id=navbar>
		<div class=navbar-container>
			<div class=categories>
				<a href="index.php" >Home</a>
				<a href="products.php" >Products</a>
				<a href="ourshop.php" >Our Shop</a>	
			</div>	
			
			<div class=search-container>
			
					<input type="text" name=search placeholder="Search..">	
        
				 <input type=submit name=find value=Search formaction=search.php >

			</div>	
			
			<div class=cart-container>
				<a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
			</div>
</form>
			<div class=login-container>
				<div class=login>
						<a href="account/customer.php"> <img src="icons/login.png" class=logo> </a>							
				</div>
				<a href="account/customer.php"><?php echo"$firstname $lastname ";     ?> </a> 
			</div>		
		</div>
		
	</div>
		



<div class=hold>

	<div class=cart-holder>
    <h2> SHOPPING CART </h2>
		<center>
		<table class=cart-table >
			<?php 
					$sql_cashier="Select * from tbl_cart where UserID='$UID'; "; 
					$result_cash = $conn -> query($sql_cashier);
					$totalamount=0;
					$totalprofit=0;
					$totalamountformatted=0;
					$totalprofitformatted=0;
					$i=0;
					  while($row_cashier = $result_cash->fetch_assoc()){

					  echo "<tr>";
					  echo "<td><center><img class='cartimage' src=manager/". $row_cashier['ProductImage'] . "></center></td>";
					  echo "<td>" . $row_cashier['ProductName'] . "</td>";
					  
					  
					  echo "<td><center><div class='quantitywrapper'><a href=quantityminus.php?id=".$row_cashier['cartID']." class='minus'>-</a> 
					  <a class='numquantity'>" . $row_cashier['Quantity'] . "</a>
					  <a href=quantityadd.php?id=".$row_cashier['cartID']." class='plus'>+</a>
					  </div></center></td>";
					  
					  $amount= $row_cashier['Price'] * $row_cashier['Quantity'];
					  $amountFormat= number_format($amount, 2);
					  echo "<td>₱$amountFormat</td>";		  
					  echo "<td align=right><a class=remove href=delete-cart.php?id=".$row_cashier['cartID']."> REMOVE </a></td>";
					  
					  echo "</tr>";
					  
					  $totalamount += $amount;
					  $totalamountformatted = number_format($totalamount,2);
					  
					 
					  
					  $i++;
					  
					  }
					if($i>=1){
						echo "<tr>";
						echo "<td colspan=5 align=right>TOTAL: ₱$totalamountformatted</td> ";
						echo "</tr>";
						echo "<tr>";
						
						echo "<td colspan=5 align=right><a href=checkout.php><button class=add-button-holder>PROCEED TO CHECKOUT</button> </a></td>";
						echo "</tr>";
					}else{
						echo "<BR>";
						echo "<h2> YOUR CART IS EMPTY </h2>";
					}
					
					
					
					?>
			
			
		</table>
       
       
				
			
       
        


        
        
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




	<div id=navbar>
		<div class=navbar-container>
			<div class=categories>
				<a href="index.php">Home</a>
				<a href="products.php" class="active">Products</a>
				<a href="ourshop.php" >Our Shop</a>	
			</div>	
			
			<div class=search-container>
				<?php echo "<form action=search.php method=POST>" ?>
					<input type="text" name=search placeholder="Search..">	
					</form>
				<input type=submit name=find value=Search>	
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
		
			
		
	
	
	
	
<div class=body>

	<div class=body-display>
        <?php
        $ProductID = $_GET['id'];

        $sql2= "Select * from tbl_product Where ProductID='$ProductID' and Status='Active' ";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();

        $ProductID= $row2['ProductID'];
        $Image= $row2['ProductImage'];
        $ProductName= $row2['Name'];
        $Desc= $row2['Description'];
        $Quantity= $row2['Quantity'];
        $Price= $row2['Price'];
        $Category= $row2['Category'];
        ?>
        <div class=product-container>
			<img src="<?php echo "manager/$Image";?>">
			
			<div class=div-split>
				<center>
					<h1> <?php echo "$ProductName";  ?> </h1>
				</center>
				<h2>Description</h2> 
				<span> <?php echo "$Desc";  ?> </span>
				<h2>In stocks:</h2> <span> <?php echo "$Quantity";  ?> </span> 
			
				<h2>Price: <?php echo "₱ $Price";  ?>  </h2>
				<h2>Quantity: <input type=number name=quantity value=1  min='1' max='<?php echo "$Quantity";  ?>'></h2>
				<center>
				
	
				
				
				<?php 
				if($Quantity<=1){
					echo "<button class=add-button-holder disabled> OUT OF STOCK </button>";
				}else{
				echo "<button name=add class=add-button-holder> <a href=account/login.php> ADD TO CART </a> </button> ";
				}
				?>
				</center>
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
