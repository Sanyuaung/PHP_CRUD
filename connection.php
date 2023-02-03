<?php
$server='localhost';
$username='root';
$password='';
$dbname='php_crud';
    $db=mysqli_connect($server,$username,$password,$dbname);
    if(!$db){
        echo ('Something Wrong' . mysqli_connect_error());
    }
?>