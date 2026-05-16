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


if(isset($_POST['save'])){
  $UID = $_GET['edit'];
  $fname= $_POST['fname'];
  $lname= $_POST['lname'];
  $pw= $_POST['password'];

 $sqlinfo="Select * from tbl_user where UserID='$UID'";
 $result= $conn->query($sqlinfo);
 $user_data= mysqli_fetch_assoc($result);
 $pwget = $user_data['Password'];

 $sqlupdate="update tbl_user set Firstname='$fname',Lastname='$lname' where UserID='$UID'";
 if($pw!==$pwget || $pw==null){
    ?>
    <script>
        alert("wrong password!");
    </script>
    <?php
    header("refresh:0;url=edit.php");
    
 }elseif($fname=null && $lname=null){
    ?>
    <script>
        alert("Field cant be empty!");
    </script>
    <?php
    header("refresh:0;url=edit.php");
 }else{    
    $resultupdate= $conn->query($sqlupdate);
    if($resultupdate=TRUE){
        
        ?>
        <script>
        alert("Updated");
        </script>
        <?php
        header("refresh:0;url=customer.php");
    }else{
        $conn->error;
    }
 }

}



if(isset($_GET['editpw'])){
    $UID = $_GET['editpw'];
    $password1= $_POST['password1'];
    $password2= $_POST['password2'];
    $pw= $_POST['password'];


    $sqlinfo="Select * from tbl_user where UserID='$UID'";
    $result= $conn->query($sqlinfo);
    $user_data= mysqli_fetch_assoc($result);
    $pwget = $user_data['Password'];


    $sqlupdate="update tbl_user set Password='$password1' where UserID='$UID'";

    if($password1!=$password2){

        ?>
        <script>
            alert("Password does not match!");
        </script>
        <?php
        header("refresh:0;url=edit-password.php");
        
    }elseif($pw!=$pwget){
        ?>
        <script>
            alert("wrong password!");
        </script>
        <?php
        header("refresh:0;url=edit-password.php");
        
    }elseif($password1=="" && $password2=="" && $password==""){

        ?>
        <script>
            alert("Field cant be blank");
        </script>
        <?php
        header("refresh:0;url=edit-password.php");

    }else{
        $resultupdate= $conn->query($sqlupdate);
        if($resultupdate=TRUE){
            ?>
            <script>
            alert("Updated");
            </script>
            <?php
            header("refresh:0;url=customer.php");
        }else{
            $conn->error;
        }
    }


}



if(isset($_GET['decline'])){
    
    $orderID=$_GET['decline'];

    $sqlorder="select * from tbl_order where orderID='$orderID'";
    $resultsqlorder = $conn -> query($sqlorder);
    $user_data= mysqli_fetch_assoc($resultsqlorder);
    $UID = $user_data['userID'];

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
            alert("Order is Cancel!")
        </script>
        <?php
    header("refresh:0;url=orders.php");
    }

}







?>