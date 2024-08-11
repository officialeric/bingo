<?php

include '../database/connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM applications WHERE id='$id'";
$result = mysqli_query($conn,$sql);

if($result){
    header('location: ../admin/applications.php');
}