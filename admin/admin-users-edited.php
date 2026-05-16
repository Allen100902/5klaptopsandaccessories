<?php
include "../config.php";


if(!$conn->connect_error){
	echo "Connected";
}

if(isset($_POST['sub'])){
	$first = $_POST['firstname'];
	$last = $_POST['lastname'];
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$Type = $_POST['type'];
	$id = $_POST['userid'];
	if($password1===$password2){
		


		$sql= "update tbl_user SET Firstname='$first',Lastname='$last',Email='$email',Password='$password1',Type='$Type' WHERE UserID='$id';";
					
		$update = $conn->query($sql);

		if($update==TRUE){
			
		?>
		<script>
			alert("Successfully Updated")
		</script>
		<?php

		header("refresh:0;url=admin-users.php");
		}else{
			echo $conn->error;
		}
			

	}elseif($password1!==$password2){
		header("refresh:0;url=admin-users-edit.php?id='$id'");
	}
	
	
	

$conn->close();
}	
?>