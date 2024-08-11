<?php

include '../database/connection.php';


if(isset($_POST['save'])){

    $id = $_POST['id'];
    $heading = $_POST['heading'];
    $description = $_POST['desc'];

    $sql = "UPDATE setting SET heading='$heading' , description='$description' WHERE id='$id'" ;
    $result = mysqli_query($conn,$sql);

    if($result){
        header('location: ../admin/setting.php');
    }
}