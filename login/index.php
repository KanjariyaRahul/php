<?php

    include './includes/connection.php';

    $query = "select * from php_login";

    $result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border= "1">
        <tr>
            <td>#</td>
            <td>name</td>
            <td>username</td>
            <td>password</td>
        </tr>

        
            <?php
           while($row = mysqli_fetch_assoc($result)){
            echo "<tr> <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['username']}</td>
            <td>{$row['password']}</td>
            </tr>
             ";
           }
            ?>
    </table>
    
</body>
</html>