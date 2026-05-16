<?php 
include "../config.php";

$ID=$_GET['id'];

$sql ="Update tbl_product SET Status='Active' Where ProductID=$ID";

$conn->query($sql);


header("refresh:0;url=manager-archive-product.php");
$conn->close();
?>