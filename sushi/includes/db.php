<?php
session_start();
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'test'
);
#if (isset($conn)){
    #echo 'DB is connected';
#}
?>