<?php
session_start();
$conn = mysqli_connect(
    'localhost',
    'root',
    'skam0510',
    'test'
);
#if (isset($conn)){
    #echo 'DB is connected';
#}
?>