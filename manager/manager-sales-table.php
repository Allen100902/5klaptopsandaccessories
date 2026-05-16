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
		<li><i class="fas fa-box-open"></i><a href="manager-products.php" >PRODUCTS </a></li>
			<li><i class="fas fa-project-diagram"></i><a href="manager-archive-product.php" >ARCHIVED PRODUCTS</a></li>
			<li><i class="fas fa-desktop"></i><a href="Orders.php"  >WEB-ORDER</a></li>	
			    		
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
							<form action=manager-sales-table.php method=POST>
								<input type="text" name=search placeholder="Search in Sales..">	
							<input type=submit name=find value=search>
							</form>
						</div>	
						
					</div>
				</div>
		
				<div class=holder>
				<a href='manager-sales.php'><button class=add-button-holder>BACK</Button> </a>
				</div>
				<div class=tableholder>
			<table border=0>			
				<?php
				if(isset($_POST['find'])){
					$search = $_POST['search'];
					
					if($search != NULL){
					   
					   $sqlfind = "Select * from tbl_sales where orderID LIKE '%$search%' or userID LIKE '%$search%' or Email LIKE '%$search%' or CustomerName LIKE '%$search%'or status LIKE '%$search%'";
					   
				   }else{
					   $sqlfind = "Select * from tbl_sales ORDER BY Date Desc";	
				   }

				$resultfind = $conn -> query($sqlfind);
				if($resultfind -> num_rows >0){
					echo '<tr>';	
					echo '<th>orderID</th>';
					echo '<th>userID</th>';
					echo '<th>Customer Name</th>';		
					echo '<th>Email</th>';
					echo '<th>Order</th>';
					echo '<th>Total</th>';
					echo '<th>Status</th>';
					echo '<th>Date</th>';
                    echo '<th>Action</th>';
					echo '</tr>';
				while($rowfind = $resultfind->fetch_assoc()){
                    if($rowfind['status']=="Delivered"){
                    echo "<tr>";
                    echo "<td>" . $rowfind['orderID'] . "</td>";
                    echo "<td>". $rowfind['userID'] ."</td>";
                    echo "<td>" . $rowfind['CustomerName'] . "</td>";
                    echo "<td>" . $rowfind['Email'] . "</td>";
                    echo "<td>" . $rowfind['orders'] . "</td>";
                    echo "<td>" . $rowfind['total'] . "</td>";
					echo "<td><span class=sales-status1>" . $rowfind['status'] . "</span></td>";
					echo "<td>" . $rowfind['Date'] . "</td>";
					echo "<td><a href=manageSales.php?refund=".$rowfind['salesID']."><button class=actionbutton>Refund</button></a></td>";
					echo "</tr>";	
                   
                    }else{
						echo "<tr>";
						echo "<td>" . $rowfind['orderID'] . "</td>";
						echo "<td>". $rowfind['userID'] ."</td>";
						echo "<td>" . $rowfind['CustomerName'] . "</td>";
						echo "<td>" . $rowfind['Email'] . "</td>";
						echo "<td>" . $rowfind['orders'] . "</td>";
						echo "<td>" . $rowfind['total'] . "</td>";
						echo "<td><span class=sales-status2>" . $rowfind['status'] . "</span></td>";
						echo "<td>" . $rowfind['Date'] . "</td>";
						echo "<td><a href=manageSales.php?revert=".$rowfind['salesID']."><button class=actionbutton>Revert</button></a></td>";
					}
				  
				  }




				}else{
					echo "Empty";
					}
				
				
				$conn -> close();

				}else{							
				$sql = "Select * from tbl_sales ORDER BY Date Desc";	
				
				$result = $conn -> query($sql);
				if($result -> num_rows >0){
					echo '<tr>';	
					echo '<th>orderID</th>';
					echo '<th>userID</th>';
					echo '<th>Customer Name</th>';		
					echo '<th>Email</th>';
					echo '<th>Order</th>';
					echo '<th>Total</th>';
					echo '<th>Status</th>';
					echo '<th>Date</th>';
                    echo '<th>Action</th>';
					echo '</tr>';
				while($row = $result->fetch_assoc()){
                    if($row['status']=="Delivered"){
                    echo "<tr>";
                    echo "<td>" . $row['orderID'] . "</td>";
                    echo "<td>". $row['userID'] ."</td>";
                    echo "<td>" . $row['CustomerName'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['orders'] . "</td>";
                    echo "<td>" . $row['total'] . "</td>";
					echo "<td><span class=sales-status1>" . $row['status'] . "</span></td>";
					echo "<td>" . $row['Date'] . "</td>";
					echo "<td><a href=manageSales.php?refund=".$row['salesID']."><button class=actionbutton>Refund</button></a></td>";
					echo "</tr>";	
                   
                    }else{
						echo "<tr>";
						echo "<td>" . $row['orderID'] . "</td>";
						echo "<td>". $row['userID'] ."</td>";
						echo "<td>" . $row['CustomerName'] . "</td>";
						echo "<td>" . $row['Email'] . "</td>";
						echo "<td>" . $row['orders'] . "</td>";
						echo "<td>" . $row['total'] . "</td>";
						echo "<td><span class=sales-status2>" . $row['status'] . "</span></td>";
						echo "<td>" . $row['Date'] . "</td>";
						echo "<td><a href=manageSales.php?revert=".$row['salesID']."><button class=actionbutton>Revert</button></a></td>";
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