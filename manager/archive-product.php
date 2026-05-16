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

$ID=$_GET['id'];

$sql ="Update tbl_product SET Status='Archived' Where ProductID=$ID";

$conn->query($sql);
$sqllogs="Insert into tbl_logs (Action,Name,UserType,DateTime) Value ('Archived $ProductName','$firstname $lastname','$userType',NOW());";
$conn->query($sqllogs);


?>
<script>
	alert("Successfully Archived")
</script>
<?php
header("refresh:0;url=manager-products.php");
$conn->close();
?>