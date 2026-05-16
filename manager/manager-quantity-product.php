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
$userType = $user_data['Type'];

$ID= $_GET['id'];

$sql = "SELECT * from tbl_product WHERE ProductID = '$ID'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$ProductID = $row['ProductID'];
$ProductImage = $row['ProductImage'];
$ProductName = $row['Name'];
$ProductDesc = $row['Description'];
$ProductQuantity = $row['Quantity'];
$ProductCat = $row['Category'];
$ProductPrice = $row['Price'];

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
				<h1 class=text-head>ADD QUANTITY</h1>
				<div class=edit-content>
					<table>
					<tr>
				<tr>
				    <form action="manager-quantity-product.php?id=<?php echo "$ID" ?> " method=POST>
					<td>Quantity:</td>
					<td><input type=number name=newquantity min=1><input type=hidden value="<?php echo "$ProductQuantity";?>" name=quantity placeholder="Quantity"> </td>					
                </tr>
                <tr>
					<td colspan=6> <CENTER><input type=submit name=update value=SAVE></CENTER></td>
					</form>						
				</tr>
					
					</table>
					<?php
                    if(isset($_POST['update'])){
						
                       	$sqllogs="Insert into tbl_logs (Action,Name,UserType,DateTime) Value ('Restock a $ProductName','$firstname $lastname','$userType',NOW());";
                        $conn->query($sqllogs);

                        $newquantity = $_POST['newquantity'];
                        $oldquan = $_POST['quantity'];                      
                        

                        $totalquan=$oldquan+$newquantity;
                        $date=date('F d Y');

                        $sql="Update tbl_product SET Quantity='$totalquan' where ProductID=$ProductID";
                                
                        
                        $update = $conn->query($sql);
                        
                        if($update==TRUE){
                            
                       
                        header("refresh:0;url=manager-products.php");
                    
                        }else{
                            echo $conn->error;
                        }	
    
                        }
                    ?>
				</div>
		</div>		
	</div>
	
</div>	
</body>

</html>