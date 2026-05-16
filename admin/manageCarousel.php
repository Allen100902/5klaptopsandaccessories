<?php
include "../config.php";

if(isset($_POST['edit'])){

    $carID = $_POST['carID'];
    $img = $_POST['carouselimg'];
    $link = $_POST['carousellink'];


    if(empty($img)){

    $sqladdcarousel= "UPDATE tbl_carousel SET link='$link' where carouselID=$carID";

    }elseif(empty($link)){

    $sqladdcarousel= "UPDATE tbl_carousel SET image='$img' where carouselID=$carID";   

    }elseif(empty($link) && empty($img)){
        ?>
        <script>
            alert("Field cant be empty!");
        </script>
        <?php
        header("refresh:0;url=siteSettings.php");

    }else{
    $sqladdcarousel= "UPDATE tbl_carousel SET image='$img' , link='$link' where carouselID=$carID";   
    }
    echo "$sqladdcarousel";
    echo "$img";
    echo "$link";

    $result= $conn->query($sqladdcarousel);

    if($result=true){
        ?>
        <script>
            alert("Successfully Updated");
        </script>
        <?php
        header("refresh:0;url=siteSettings.php");

    }else{
        $conn->error;
    }
}

if(isset($_POST['ourshop'])){
    $text= $_POST['text'];
    $carID= $_POST['carID'];

    $sqlupdate="Update tbl_ourshop SET text='$text' where data=$carID";
    $resultupdate= $conn->query($sqlupdate);
    if($result=true){
        ?>
        <script>
            alert("Successfully Updated");
        </script>
        <?php
        header("refresh:0;url=siteSettings.php");

    }else{
        $conn->error;
    }



}




















?>