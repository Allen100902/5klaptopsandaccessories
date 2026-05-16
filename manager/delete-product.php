<?php 
include "../config.php";

$UID=$_GET['id'];

$sql = "Delete from tbl_product Where ProductID=$UID";

$conn->query($sql);

header("refresh:0;url=manager-archive-product.php");
$conn->close();

?>