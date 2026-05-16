<?php
include "../config.php";

if(isset($_GET['vkey'])){
    $vkey = $_GET['vkey'];

    $resultSet=$conn->query("Select verified,vkey FROM tbl_user where verified='0' and vkey='$vkey' Limit 1");

    if($resultSet->num_rows==1){
        $update = $conn->query("Update tbl_user SET verified=1 Where vkey='$vkey' Limit 1");

        if($update){
        ?>
        <script>
            alert("Your Account Has been verified you may now login")
        </script>
        <?php
        header('refresh:0;url=login.php');

        }
    }
}

?>