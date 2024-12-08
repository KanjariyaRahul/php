<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "rahul";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn)
{
    echo ("connection failed ".mysqli_connect_error());
}

?>