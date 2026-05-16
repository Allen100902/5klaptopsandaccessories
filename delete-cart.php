<?php
include "config.php";

$cartID=$_GET['id'];

$sqldeletekhurt="Delete from tbl_cart where cartID='$cartID'";

$delete=$conn->query($sqldeletekhurt);
if($delete=TRUE){
    header("refresh:0;url=cart.php");
}


?>