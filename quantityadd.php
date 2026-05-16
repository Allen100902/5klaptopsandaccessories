<?php
include "config.php";

$cartID=$_GET['id'];
/*TBL CART */
$sqlgetcartquantity="select * from tbl_cart where cartID=$cartID";
$sqlgetcartquantityresult = $conn->query($sqlgetcartquantity);
$sqlgetcartquantityresultRow = $sqlgetcartquantityresult->fetch_assoc();
$cartID = $sqlgetcartquantityresultRow['cartID'];
$ProductID = $sqlgetcartquantityresultRow['ProductID'];
$cartQuantity = $sqlgetcartquantityresultRow['Quantity'];





/* TBL PRODUCT */
$sqlgetproductquantity="select Quantity from tbl_product where ProductID='$ProductID'";
$sqlgetproductquantityresult = $conn->query($sqlgetproductquantity);
$sqlgetproductquantityresultRow = $sqlgetproductquantityresult->fetch_assoc();

$currentProductQuantity = $sqlgetproductquantityresultRow['Quantity'];

if($cartQuantity<$currentProductQuantity){
    $newQuantity=$cartQuantity+1;
    $sqlupdate="Update tbl_cart set Quantity='$newQuantity' where cartID='$cartID'";
    $succ=$conn->query($sqlupdate);
    if($succ=TRUE){
    header("refresh:0;url=cart.php");
    }
}elseif($cartQuantity==0){
    header("refresh:0;url=delete-cart.php?id='$cartID'");
}else{
    ?>
    <script>
        alert("Not enough Stock");
    </script>
    <?php
    header("refresh:0;url=cart.php");
}

?>