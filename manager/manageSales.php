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

if(isset($_GET['refund'])){
    $salesid=$_GET['refund'];
    $sql="Update tbl_sales set status='Refunded' where salesID='$salesid'";
    $result=$conn -> query($sql);
    $sqllogs="Insert into tbl_logs (Action,Name,UserType,DateTime) Value ('Refunded salesID=$salesid','$firstname $lastname','$userType',NOW());";
    $conn->query($sqllogs);
    if($result=true){
        ?>
        <script>
            alert("Refunded!")
        </script>
        <?php
      header("refresh:0;url=manager-sales-table.php");
     }

}

if(isset($_GET['revert'])){
    $salesid=$_GET['revert'];
    $sql="Update tbl_sales set status='Delivered' where salesID='$salesid'";
    $result=$conn -> query($sql);
    $sqllogs="Insert into tbl_logs (Action,Name,UserType,DateTime) Value ('Reverted salesID=$salesid','$firstname $lastname','$userType',NOW());";
    $conn->query($sqllogs);
    if($result=true){
        ?>
        <script>
            alert("Reverted!")
        </script>
        <?php
      header("refresh:0;url=manager-sales-table.php");
     }

}





















?>