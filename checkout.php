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
  $email = $user_data['Email'];
?>
<html>
<title>Recsai Vapeground</title>
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
			
			<div class=login-container>
				<div class=login>
						<a href="account/customer.php"> <img src="icons/login.png" class=logo> </a>							
				</div>
				<a href="account/customer.php"><?php echo"$firstname $lastname ";     ?> </a> 
			</div>		
		</div>
		
	</div>
		



<div class=body>

<form method=POST>
  <div class=container-body>
		<div class=shippingdetails>
			<table class=table1>
				<tr>
					<th colspan=2>Customer Information</th>
				</tr>
				<tr>
					<td>Customer Name:</td>
					<td><?php echo "$firstname $lastname";?> </td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?php echo "$email";?></td>
				</tr>
				<tr>
					<th colspan=2>Shipping</th>
				</tr>
        <tr>
					<td>Payment Method:</td>
          <td>
              <select name=method>
                <option value='COD'>Cash on Delivery</option>
                <option value='Gcash'>Gcash</option>
              </select >
          </td>
        </tr>
				<tr>
					<td>Address:</td>
					<td><input type=text name=address placeholder="No/Street/Baranggay"></td>
				</tr>
				<tr>
					<td>Contact No:</td>
					<td><input type=text name=contact maxlength=13 placeholder="+63"></td>
				</tr>
				<tr>
					<th colspan=2><input type=submit value='Checkout' formaction=processing.php name=checkout class=add-button-holder></th>
				</tr>
			</table>
        </div>



        <div class=aside>
            <table class=table2 >
                <?php 
                        $sql_cashier="Select * from tbl_cart where UserID='$UID'; "; 
                        $result_cash = $conn -> query($sql_cashier);
                        $totalamount=0;
                        $totalprofit=0;
                        $shipping=50;
                        $totalamountformatted=0;
                        
                        $i=0;
                        while($row_cashier = $result_cash->fetch_assoc()){

                        echo "<tr>";
                        echo "<td><center><img src=manager/" . $row_cashier['ProductImage'] . "></center></td>";
                        echo "<th>" . $row_cashier['ProductName'] . "</th>";
                        
                        echo "<th>" . $row_cashier['Quantity'] . "</th>";
                        $amount= $row_cashier['Price'] * $row_cashier['Quantity'];
                        $amountFormat= number_format($amount, 2);
                        echo "<th>₱$amountFormat</th>";
                        
                        
                        echo "</tr>";
                        
                        $totalamount += $amount;
                        $subtotal= number_format($totalamount, 2);
                        $shipping= number_format($shipping, 2);
                        $totalamountformatted = number_format($totalamount+$shipping,2);
                        
                        
                        
                        $i++;
                        
                        }
                        if($i>=1){
                            echo "<tr>";
                            echo "<th colspan=3 align=right>Sub Total:</th> <th> ₱$totalamount</th>";						
                            echo "</tr>";
                            echo "<th colspan=3 align=right>Shipping:</th> <th> ₱$shipping</th>";	
                            echo "<tr>";	
                            echo "<th colspan=3 align=right>Total</th> <th> ₱$totalamountformatted</th>";	
                            echo "<input type=hidden value='$totalamount' name='total'>";					
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
            <p>Recsai Vape shop has been providing our customers with high-quality products and services for several years. We have everything you need to meet your vaping needs, from the most recent electronic cigarette innovations and hottest vape kits to the most recent e-liquid range.

We are Recsai Vape shop, and we are vaping fanatics who aim to provide the greatest vaping products to the local market.</p>
            <div class="social">
              <a href="https://www.facebook.com/Recsai-Vape-Ground-103730425308902"><span class="fab fa-facebook-f"></span></a>
              <a href="#"><span class="fab fa-twitter"></span></a>
              
            </div>
          </div>
        </div>
        <div class="center box">
          <h2>Address</h2>
          <div class="content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">We are located at Purok Sepina Lower Antipolo Beside Tricycle welding and assembly.</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text"> +63 09-664-7415</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">thomasisaiahofficial@gmail.com</span>
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