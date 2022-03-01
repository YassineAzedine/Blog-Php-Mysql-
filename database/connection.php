<?php
require('constants.php');
session_start();
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);
// if($con){
//     echo 'connected';
// }else{
//     echo 'non connected';
// }
