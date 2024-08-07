<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'bingo';

//create connection
$conn = mysqli_connect($server,$user,$password,$db);

//checking if is connect
if(!$conn){
    echo 'connection failed';
}