<?php 
include "../config.php";

$UID=$_GET['id'];

$sql = "Delete from tbl_user Where UserID=$UID";

$conn->query($sql);

header("refresh:0;url=archive-users.php");
$conn->close();

?>