<?php
include "confiq.php";
if (isset($_GET['id'])){
    $user_id=$_GET['id'];
    $sql = "DELETE FROM `details` WHERE `id`='$user_id'";
    $result=$con->query($sql);
    if($result==TRUE){
        echo  '<script> location.replace("view.php")</script>' ;
    }else{
        echo "Error." .$sql."<br>" .$con->error;
    }
}
?>