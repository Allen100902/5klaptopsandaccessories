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
				<a href="products.php">Products</a>
				<a href="ourshop.php">Our Shop</a>	
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
		
			
		
	
	
	
	
<div class=body>

	<div class=body-container>
    <table class=table-content>
        <?php
        
        if(isset($_POST['find'])){
            $search = $_POST['search'];
            
            if($search != NULL){
                              
            $sqlfind = "Select * from tbl_product where  Name LIKE '%$search%' AND Status='Active' or Category LIKE '%$search%' AND Status='Active' ";
       
           }else{
            $sqlfind = "Select * from tbl_product where Status='Active'";
           }
           $result2 = $conn->query($sqlfind);
           if($result2 ->num_rows>0){
            echo "<tr>";
            $split=0;
                while($row = $result2 ->fetch_assoc()){
                    
                        echo '<td align="center">';
                        echo"<center>";
                            echo '<div class=item1>';
                            echo "<a href=item.php?id=".$row['ProductID']."> <img src=manager/".$row['ProductImage']." class=item-img>";
                            echo '<div class=itemtext>';
                            echo "<h3>Price: ₱".$row['Price']."</h3>";
                            echo '<p>click to view</p>';
                            echo '</div></a>';
                            echo '</div>';
                            if($row['Quantity']<1){
                            echo "<i class=critical> Sold Out  </a>  </i>";
                            }else{
                            echo "<i class=Instock> In Stock </a>  </i>";
                            }
                            echo "<br>";
                            echo "<span>".$row['Name']." </a>  </span>";
                            echo "<br>";						
                        echo "</center>";				
                    echo '</td>';
                         $split++;
            
                            if ($split%4==0){
                               echo '</tr><tr>';
                                }
                
    
                }
                
                echo "</tr>";
            }else{
                echo "<center> Empty </center>";
            }

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
          <span class="far fa-copyright"></span><span> 2023 All rights reserved.</span>
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


<form action=search.php  method=POST>

	<div id=navbar>
		<div class=navbar-container>
			<div class=categories>
				<a href="index.php">Home</a>
				<a href="products.php" >Products</a>
				<a href="ourshop.php">Our Shop</a>	
			</div>	
			
			<div class=search-container>        
			    <input type=text name=search placeholder="Search..">                  		
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
</form>	
			
		
	
	
	
	
<div class=body>

	<div class=body-container>
  <table class=table-content>
        <?php
        
        if(isset($_POST['find'])){
            $search = $_POST['search'];
            
            if($search != NULL){
                              
            $sqlfind = "Select * from tbl_product where  Name LIKE '%$search%' AND Status='Active' or Category LIKE '%$search%' AND Status='Active' ";
       
           }else{
            $sqlfind = "Select * from tbl_product where Status='Active'";
           }
           $result2 = $conn->query($sqlfind);
           if($result2 ->num_rows>0){
            echo "<tr>";
            $split=0;
                while($row = $result2 ->fetch_assoc()){
                    
                        echo '<td align="center">';
                        echo"<center>";
                            echo '<div class=item1>';
                            echo "<a href=item.php?id=".$row['ProductID']."> <img src=manager/".$row['ProductImage']." class=item-img>";
                            echo '<div class=itemtext>';
                            echo "<h3>Price: ₱".$row['Price']."</h3>";
                            echo '<p>click to view</p>';
                            echo '</div></a>';
                            echo '</div>';
                            if($row['Quantity']<1){
                            echo "<i class=critical> Sold Out  </a>  </i>";
                            }else{
                            echo "<i class=Instock> In Stock </a>  </i>";
                            }
                            echo "<br>";
                            echo "<span>".$row['Name']." </a>  </span>";
                            echo "<br>";						
                        echo "</center>";				
                    echo '</td>';
                         $split++;
            
                            if ($split%4==0){
                               echo '</tr><tr>';
                                }
                
    
                }
                
                echo "</tr>";
            }else{
                echo "<center> Empty </center>";
            }

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
          <span class="far fa-copyright"></span><span> 2023 All rights reserved.</span>
        </center>
      </div>
    </footer>


</body>

</html>
<?php
}
?>
