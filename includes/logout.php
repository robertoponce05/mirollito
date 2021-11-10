<?php 
include('db.php');
error_reporting(0);

session_destroy();
session_unset();
die();
header("location:../");