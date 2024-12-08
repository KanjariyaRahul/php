<?php

$host = "localhost";
$user = "root";
$pass = ""; 
$dbaname = "php_crud";

 $conn = mysqli_connect($host, $user, $pass, $dbaname);

    if(!$conn){
        echo("connection failed".mysqli_connect_error());
    }
 ?>