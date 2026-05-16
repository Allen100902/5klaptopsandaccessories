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

if($cartQuantity!=0){
    $newQuantity=$cartQuantity-1;
    $sqlupdate="Update tbl_cart set Quantity='$newQuantity' where cartID='$cartID'";
    $succ=$conn->query($sqlupdate);
    if($succ=TRUE){
    header("refresh:0;url=cart.php");
    }
}
if($cartQuantity<=1){
    header("refresh:0;url=delete-cart.php?id=$cartID");
}

?>