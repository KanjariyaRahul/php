<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "rahul";

    $conn = mysqli_connect($host, $username , $password, $db_name); 

    if(!$conn)
    {
        echo "Error : " .mysqli_connect_error($conn);
    }
   
?>