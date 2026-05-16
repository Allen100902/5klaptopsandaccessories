<?php
include "../config.php";
session_start();
$UID=$_SESSION['UID'];
$sql = "SELECT * from tbl_user WHERE UserID = $UID";
$result=mysqli_query($conn,$sql);
$num= mysqli_num_rows($result);
$user_data= mysqli_fetch_assoc($result);


$UID = $user_data['UserID'];
$lastname = $user_data['Lastname'];
$firstname = $user_data['Firstname'];
$userType = $user_data['Type'];




if(isset($_GET['decline'])){
    $orderID=$_GET['decline'];

    $sqlorder="select * from tbl_order where orderID='$orderID'";
    $resultsqlorder = $conn -> query($sqlorder);
    $user_data= mysqli_fetch_assoc($resultsqlorder);
    $UID = $user_data['userID'];

    $sqllogs="Insert into tbl_logs (Action,Name,UserType,DateTime) Value ('Declined orderID=$orderID','$firstname $lastname','$userType',NOW());";
    $conn->query($sqllogs);
    $sqlfetchorderitem="select * from tbl_order_items where userID='$UID'";
    $result_cash = $conn -> query($sqlfetchorderitem);
    while($row_cashier = $result_cash->fetch_assoc()){
    $productquan="select Quantity from tbl_product where ProductID='".$row_cashier['ProductID']."'";
    $resultquan=$conn -> query($productquan);
    while($row_quantity = $resultquan->fetch_assoc()){
        
        $sqlproductup="update tbl_product set Quantity='".$row_quantity['Quantity']+$row_cashier['Quantity']."' where ProductID='".$row_cashier['ProductID']."';";

        $conn -> query($sqlproductup);
        }
        
    }
    $deleteord="DELETE FROM tbl_order WHERE orderID='$orderID'";
    $conn -> query($deleteord);

    $sqldeleteordereditems="DELETE FROM tbl_order_items WHERE userID='$UID'";
    $final=$conn -> query($sqldeleteordereditems);

    if($final=true){
        ?>
        <script>
            alert("Order declined")
        </script>
        <?php
    header("refresh:0;url=Orders.php");
    }

}



if(isset($_GET['accept'])){
$orderID=$_GET['accept'];
 
$sqllogs="Insert into tbl_logs (Action,Name,UserType,DateTime) Value ('Accepted orderID=$orderID','$firstname $lastname','$userType',NOW());";
$conn->query($sqllogs);

$sql="update tbl_order SET Status='Delivering' where orderID=$orderID";
$result=$conn -> query($sql);
if($result=true){
    ?>
    <script>
        alert("Order Accepted!")
    </script>
    <?php
  header("refresh:0;url=Orders.php");
}
}

if(isset($_GET['delivered'])){
    $orderID=$_GET['delivered'];
    $sqllogs="Insert into tbl_logs (Action,Name,UserType,DateTime) Value ('Delivered orderID=$orderID','$firstname $lastname','$userType',NOW());";
    $conn->query($sqllogs);       
    $sql="update tbl_order SET Status='Delivered' where orderID=$orderID";
    $result=$conn -> query($sql);
    if($result=true){
    $sqlgetorderID="Select * from tbl_order where orderID=$orderID";
    $resultgetorder=$conn -> query($sqlgetorderID);
    $user_data= mysqli_fetch_assoc($resultgetorder);
    $UID = $user_data['userID'];
    $cname = $user_data['CustomerName'];
    $email = $user_data['Email'];
    $order = $user_data['order'];
    $total = $user_data['Total'];
    date_default_timezone_set('Asia/Manila');
    $date=date("Y-m-d");
    $sqlinsertsales="Insert into tbl_sales (orderID,userID,CustomerName,Email,orders,total,status,Date) Values ('$orderID','$UID','$cname','$email','$order','$total','Delivered','$date')";
    $resultaddsales=$conn -> query($sqlinsertsales);
     if($resultaddsales=true){
        ?>
        <script>
            alert("Order Delivered!")
        </script>
        <?php
      header("refresh:0;url=Orders.php");
     }
    }

    }

?>