<?php 
include "../config.php";

$ID=$_GET['id'];

$sql ="Update tbl_user SET Status='Active' Where UserID=$ID";

$conn->query($sql);



?>
<script>
	alert("Successfully Archived")
</script>
<?php
header("refresh:0;url=archive-user.php");
$conn->close();
?>