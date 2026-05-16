<?php
include "config.php";
session_start();

$UID= $_SESSION['UID'];
  $sql1 = "SELECT * from tbl_user WHERE UserID = '$UID'";
  $result1=mysqli_query($conn,$sql1);
  $num1= mysqli_num_rows($result1);
  $user_data= mysqli_fetch_assoc($result1);
  
  
  $UID = $user_data['UserID'];
  $lastname = $user_data['Lastname'];
  $firstname = $user_data['Firstname'];
  $email = $user_data['Email'];

  $sql_cashier="Select * from tbl_cart where UserID='$UID'; "; 
  $result_cash = $conn -> query($sql_cashier);
  $totalamount=0;
  $totalprofit=0;
  $shipping=50;
  $totalamountformatted=0;
  
  $i=0;



  while($row_cashier = $result_cash->fetch_assoc()){
  $sqlproductget="select Quantity from tbl_product where productID=".$row_cashier['ProductID'].""; 
  $sqlproductgetresult = $conn -> query($sqlproductget);
  while($row_product = $sqlproductgetresult->fetch_assoc()){
     $sqlproductID="update tbl_product set Quantity=". $row_product['Quantity'] - $row_cashier['Quantity']." where ProductID=".$row_cashier['ProductID'].";";
     $conn -> query($sqlproductID);
  }

  $amount= $row_cashier['Price'] * $row_cashier['Quantity'];

  $amountFormat= number_format($amount, 2);
  
  $totalamount += $amount;
  $subtotal= number_format($totalamount, 2);
  $shipping= number_format($shipping, 2);
  $totalamountformatted = number_format($totalamount+$shipping,2);
  }
  if(isset($_POST['checkout'])){
    $address= $_POST['address'];
    $contact= $_POST['contact'];
    $method= $_POST['method'];
    $total= $_POST['total'];
    
    date_default_timezone_set('Asia/Manila');
    $date=date("F j Y");
    $time=date("h:i:s A");
    if(!empty($address) && !empty($contact)){
    $sqlcart="Select * from tbl_cart where UserID='$UID'; "; 
    $result_cart = $conn -> query($sqlcart);
    $details = "";
    while($row_cart = $result_cart->fetch_assoc()){
      $details .= "".$row_cart['ProductName']."(".$row_cart['Quantity'].") | ";
      $sql_order_items="insert into `tbl_order_items` (`userID`,`ProductID`,`ProductName`,`Quantity`,`DateTime`) Values ('$UID','".$row_cart['ProductID']."','".$row_cart['ProductName']."','".$row_cart['Quantity']."',NOW());";  
      $conn -> query($sql_order_items);
    }

    
    
    if($method=='COD'){ 
    $sqladdorder= "INSERT INTO `tbl_order`(`userID`, `CustomerName`, `Email`, `order`, `Total`, `Method`, `Contact`, `address`, `Status`, `DateTime`) VALUES ('$UID','$firstname $lastname','$email','".$details."','$total','$method','$contact','$address','Pending','$date $time')";   
    }else{
      $sqladdorder= "INSERT INTO `tbl_order`(`userID`, `CustomerName`, `Email`, `order`, `Total`, `Method`, `Contact`, `address`, `Status`, `DateTime`) VALUES ('$UID','$firstname $lastname','$email','".$details."','$total','$method','$contact','$address','Pending','$date $time')";  
    }



    $addorder=mysqli_query($conn,$sqladdorder);
    
      if($addorder==TRUE){
        


        $delete= "delete from tbl_cart where userID='$UID'";   
        $deletekhurt=mysqli_query($conn,$delete);

        header("refresh:0;url=account/orders.php");
      }

   }elseif($address=="" || empty($contact)){
    ?>
    <script>
    alert("Field must not be empty");
    </script>  
    <?php
    header("refresh:0;url=checkout.php");


    
   }

  }

?>