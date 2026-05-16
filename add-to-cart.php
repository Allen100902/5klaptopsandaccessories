<?php  
include "config.php";

session_start();
$UID= $_SESSION['UID'];
$sql1 = "SELECT * from tbl_user WHERE UserID = '$UID'";
$result1=mysqli_query($conn,$sql1);
$num= mysqli_num_rows($result1);
$user_data= mysqli_fetch_assoc($result1);


$UID = $user_data['UserID'];
$lname = $user_data['Lastname'];
$fname = $user_data['Firstname'];

if(isset($_POST['add'])){
    $ProductID= $_GET['id'];
    $PosQuan= $_POST['quantity'];
    $sql2 = "SELECT * from tbl_product WHERE ProductID = '$ProductID'";
    
    $result2=mysqli_query($conn,$sql2);
    $user_data2= mysqli_fetch_assoc($result2);
    
    date_default_timezone_set('Asia/Manila');
    $date=date("F j Y");
    $time=date("h:i:s A");
    $PID = $user_data2['ProductID'];
    $ProductName = $user_data2['Name'];
    $Image = $user_data2['ProductImage'];
    $Cat = $user_data2['Category'];
    $quantity = $user_data2['Quantity'];
    $price = $user_data2['Price'];
    
    
    
    
    
    if($PosQuan>$quantity){
        ?>
        <script>
            alert("Not enough stock")
        </script>
        <?php
    }else{
      /* $newQuan=$Quantity-$PosQuan;
        $sql_product_update="Update tbl_products SET Quantity='$newQuan' Where ProductID='$PID';";
        $conn->query($sql_product_update); */
        
        $sql_cashier="Select * from tbl_cart where UserID='$UID';"; 
        $result_cashier=mysqli_query($conn,$sql_cashier);       
        $user_cashier=mysqli_fetch_assoc($result_cashier);
        
        if($user_cashier>0){        
        $ProductcartID = $user_cashier['ProductID'];
        $ProductcartName = $user_cashier['ProductName'];
        $ProductcartQuantity = $user_cashier['Quantity'];
        }
        if(isset($ProductcartID)){
        if($PID==$ProductcartID){
            $addQuan= ($PosQuan+$ProductcartQuantity);
            $sqlupdate="Update tbl_cart set Quantity='$addQuan' where UserID='$UID' and ProductID='$PID'";
            $insert = $conn->query($sqlupdate);
            if($insert==TRUE){

                ?>
                <script>
                    alert("Successfully Added")
                </script>
                <?php
                header("refresh:0;url=cart.php");
            
                }else{
                    echo $conn->error;
                }	
            }else{
                $sqladd= "Insert into `tbl_cart`(`UserID`, `ProductID`, `ProductImage`, `ProductName`, `Quantity`, `Price`, `Date`, `Time`) values ('$UID','$PID','$Image','$ProductName','$PosQuan','$price','$date','$time');";	
        
                $insert = $conn->query($sqladd);
                if($insert==TRUE){
    
            ?>
                <script>
                    alert("Successfully Added")
                </script>
                <?php
                header("refresh:0;url=cart.php");
            
                }else{
                    echo $conn->error;
                }	
            }
        }else{
            $sqladd= "Insert into `tbl_cart`(`UserID`, `ProductID`, `ProductImage`, `ProductName`, `Quantity`, `Price`, `Date`, `Time`) values ('$UID','$PID','$Image','$ProductName','$PosQuan','$price','$date','$time');";	
    
            $insert = $conn->query($sqladd);
            if($insert==TRUE){

        ?>
            <script>
                alert("Successfully Added")
            </script>
            <?php
            header("refresh:0;url=cart.php");
        
            }else{
                echo $conn->error;
            }	
        }
    }
    
}
?>