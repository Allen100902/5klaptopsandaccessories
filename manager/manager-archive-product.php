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
		<li><i class="fas fa-box-open"></i><a href="manager-products.php"  >PRODUCTS </a></li>
			<li><i class="fas fa-project-diagram"></i><a href="manager-archive-product.php" class="active">ARCHIVED PRODUCTS</a></li>
			<li><i class="fas fa-desktop"></i><a href="Orders.php" >WEB-ORDER</a></li>	
 		
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
							<form action=manager-archive-product.php method=POST>
								<input type="text" name=search placeholder="Search in Archived..">	
								
							<input type=submit name=find value=search>
							</form>
						</div>	
						
					</div>
				</div>
		
				<div class=tableholder>
			<table border=0>
			
				<?php
				
				if(isset($_POST['find'])){
					$search = $_POST['search'];
					
					if($search != NULL){
					  
					$sqlfind = "Select * from tbl_product where ProductID LIKE '%$search%' AND Status='Archived' or Name LIKE '%$search%' AND Status='Archived' or Category LIKE '%$search%' AND Status='Archived' ";
					   
				   }else{
					   $sqlfind = "Select * from tbl_product where Status='Archived'";	
					   
				   }
				   $resultfind = $conn -> query($sqlfind);
				if($resultfind -> num_rows >0){
					echo '<tr>';	
					echo '<th>ProductID</th>';
					echo '<th>Image</th>';
					echo '<th>Name</th>';		
					echo '<th>Description</th>';
					echo '<th>Quantity</th>';
					echo '<th>Price</th>';
					echo '<th>Category</th>';
					echo '<th>Created</th>';
					echo '<th>Action</th>';
					
					echo '</tr>';
				while($rowfind = $resultfind->fetch_assoc()){

				if($rowfind['Quantity']<=5){
				  echo "<tr>";
				  echo "<td><span class=critical>" . $rowfind['ProductID'] . "</span></td>";
				  echo "<td><img src=".$row['ProductImage'] . "></span></td>";
				  echo "<td><span class=critical>" . $rowfind['Name'] . "</span></td>";
				  echo "<td><span class=critical>" . $rowfind['Description'] . "</span></td>";
				  echo "<td><span class=critical>" . $rowfind['Quantity'] . "</span></td>";
				  echo "<td><span class=critical>" . $rowfind['Price'] . "</span></td>";
				  echo "<td><span class=critical>" . $rowfind['Category'] . "</span></td>";
				  echo "<td><span class=critical>" . $rowfind['Created'] . "</span></td>";
				  echo "<td><a href=restore-product.php?id=".$rowfind['ProductID']."> Restore </a> | <a href=manager-edit-product.php?id=".$rowfind['ProductID']."> Edit </a></td>";
				  echo "</tr>";
					}else{
						echo "<tr>";
						echo "<td>" . $rowfind['ProductID'] . "</td>";
						echo "<td><img src=".$rowfind['ProductImage'] . "></td>";
						echo "<td>" . $rowfind['Name'] . "</td>";
						echo "<td>" . $rowfind['Description'] . "</td>";
						echo "<td>" . $rowfind['Quantity'] . "</td>";
						echo "<td>" . $rowfind['Price'] . "</td>";
						echo "<td>" . $rowfind['Category'] . "</td>";
						echo "<td>" . $rowfind['Created'] . "</td>";
						echo "<td><a href=restore-product.php?id=".$rowfind['ProductID']."> Restore </a> | <a href=manager-edit-product.php?id=".$rowfind['ProductID']."> Edit </a></td>";
						
						echo "</tr>";	
					}
				  
				  }




				}else{
					echo "Empty";
					}
				   

				}else{
					
				$sql = "Select * from tbl_product where Status='Archived'";	
				
				$result = $conn -> query($sql);
				if($result -> num_rows >0){
					echo '<tr>';	
					echo '<th>ProductID</th>';
					echo '<th>Image</th>';
					echo '<th>Name</th>';		
					echo '<th>Description</th>';
					echo '<th>Quantity</th>';
					echo '<th>Price</th>';
					echo '<th>Category</th>';
					echo '<th>Created</th>';
					echo '<th>Action</th>';
					
					echo '</tr>';
				while($row = $result->fetch_assoc()){

				if($row['Quantity']<=5){
				  echo "<tr>";
				  echo "<td><span class=critical>" . $row['ProductID'] . "</span></td>";
				  echo "<td><img src=".$row['ProductImage'] . "></span></td>";
				  echo "<td><span class=critical>" . $row['Name'] . "</span></td>";
				  echo "<td><span class=critical>" . $row['Description'] . "</span></td>";
				  echo "<td><span class=critical>" . $row['Quantity'] . "</span></td>";
				  echo "<td><span class=critical>" . $row['Price'] . "</span></td>";
				  echo "<td><span class=critical>" . $row['Category'] . "</span></td>";
				  echo "<td><span class=critical>" . $row['Created'] . "</span></td>";
				  echo "<td><a href=restore-product.php?id=".$row['ProductID']."> Restore </a> | <a href=manager-edit-product.php?id=".$row['ProductID']."> Edit </a></td>";
				  echo "</tr>";
					}else{
						echo "<tr>";
						echo "<td>" . $row['ProductID'] . "</td>";
						echo "<td><img src=".$row['ProductImage'] . "></td>";
						echo "<td>" . $row['Name'] . "</td>";
						echo "<td>" . $row['Description'] . "</td>";
						echo "<td>" . $row['Quantity'] . "</td>";
						echo "<td>" . $row['Price'] . "</td>";
						echo "<td>" . $row['Category'] . "</td>";
						echo "<td>" . $row['Created'] . "</td>";
						echo "<td><a href=restore-product.php?id=".$row['ProductID']."> Restore </a> | <a href=manager-edit-product.php?id=".$row['ProductID']."> Edit </a></td>";
						
						echo "</tr>";	
					}
				  
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
</div>
	
</div>	
</body>

</html>