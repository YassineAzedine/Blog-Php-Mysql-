<?php
require('./constants.php');
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);
if($con){
    echo 'connected';
}else{
    echo 'non connected';
}
