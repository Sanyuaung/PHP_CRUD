<?php
$server='localhost';
$username='root';
$password='';
$dbname='php_crud';
    $db=mysqli_connect($server,$username,$password,$dbname);
    if(!$db){
        die('Connection Failed'. mysqli_connect_error());
    }