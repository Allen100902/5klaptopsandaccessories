<?php 
include "../config.php";

session_start();
$UID= $_SESSION['UID'];

$sql1 = "SELECT * from tbl_user WHERE UserID = '$UID'";
$result1=mysqli_query($conn,$sql1);
$num1= mysqli_num_rows($result1);
$user_data= mysqli_fetch_assoc($result1);


$UID = $user_data['UserID'];
$lastname = $user_data['Lastname'];
$firstname = $user_data['Firstname'];
$userType=$user_data['Type'];




?>

<html>

<title>5k Gadget Shop</title>
<link rel="icon" href="icons/favicon.ico" /> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href='css/admin-customers.css'>
<script src="../js/city.js"></script>	
<script src="https://kit.fontawesome.com/42f0db2e3a.js" crossorigin="anonymous"></script>

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

<body>



<!-- ADMIN NAVIGATION -->
<div class=body-content>
	<div class=navigation>
		<div class=navigation-content>
			<img src='icons/RECSAILOGO.png'>
			
		</div>
		<ul>	
            <li><i class="fas fa-box-open"></i><a href="manager-products.php" class="active" >PRODUCTS </a></li>
			<li><i class="fas fa-project-diagram"></i><a href="manager-archive-product.php" >ARCHIVED PRODUCTS</a></li>
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
						<strong id='ct'></strong>
						<span class=fontadmi><?php echo "$firstname $lastname"; ?></span>
						<span class=fontwel>Welcome:</span> 
						<div class=search-container>
							
							</form>
						</div>	
						
					</div>
				</div>
		<br />
		
			<div class=edit-holder>
				<h1 class=text-head>ADD A PRODUCT</h1>
				<div class=edit-content>
					<table>
					<tr>
				<tr>
				    <form action=manager-add-product.php method=POST>
					<td>ProductName:</td>
					<td><input type=text name=prodname placeholder="ProductName"> </td>
					<td>Image:</td>
					<td><input type=file name=image placeholder="firstname"> </td>
				</tr>
				
				<tr>
					<td>Price:</td>
					<td><input type=number name=price placeholder="Product Price" step="0.01" ></td>
					<td>Type:</td>
					<td><select name=category> 
						<option value="Laptops"> Laptops </option>
						<option value="Accessories"> Accessories </option>
					</select>
				</tr>
				<tr>
					<td>Quantity:</td>
					<td><input type=number name=quan> </td>
				</tr>
				<tr>
					<td>Description:</td>
					<td><textarea type=text placeholder="add a description..." name=description> </textarea></td>
				</tr>
					<tr>
					<td colspan=6> <CENTER><input type=submit name=sub value=ADD></CENTER></td>
					</form>
						
					</tr>
					
					</table>
					<?php 

									if(isset($_POST['sub'])){

									$productname= $_POST['prodname'];
									
									$productimage= $_POST['image'];
					
									$category= $_POST['category'];
									$price= $_POST['price'];
									$quantity= $_POST['quan'];
							
									$desc= $_POST['description'];
									
									date_default_timezone_set('Asia/Manila');
									$date=date('F d Y ');
							
											if (empty($productname)||empty($productimage)||empty($price)||empty($quantity)||empty($desc)) {
											
												echo "<span class='error'> Please Fill Up the Textfield above </span><br>";	
												
											}elseif($productname !="" || $productimage !=""|| $price !=""|| $quantity !=""|| $desc !="" ){

											$sqllogs="Insert into tbl_logs (Action,Name,UserType,DateTime) Value ('Added A Product','$firstname $lastname','$userType',NOW());";
    										$conn->query($sqllogs);	
														
                                            $sql= "Insert into tbl_product (ProductImage,Name,Description,Quantity,Price,Category,Created,Status)
                                                            values ('product-images/$productimage','$productname','$desc','$quantity','$price','$category',NOW(),'Active')";
                                            
														$insert = $conn->query($sql);
														if($insert == TRUE){
									?>
									<script>
										alert("Successfully Added")
									</script>
									<?php
									
									header('refresh:0;url=manager-products.php');
									
									}else{
										echo $conn->error;
									}
									$conn->close();

											



									}
                                }
									?>					
					
				</div>
		</div>		
	</div>
	
</div>	
</body>

</html>