<?php
 include 'connection.php';

 $query = "select * from users";
 $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <header class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button">   
            </button>
            <div class="collapse navbar-collapse" >
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="add.php">Add Record <span class="sr-only"> </a>
        </nav>
    </header>

    <div class="bg-light container mt-5">
    <h1 class="text-center">All Record</h1>
    <table class="table  table-hover container mt-3">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th class="col-2 text-center">Action</th>      
        </thead>

        <tbody>
        <?php 
        while($row= mysqli_fetch_assoc($result))
         {        
            echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['age']}</td>
            <td> <a href='update.php?id={$row['id']}' class='btn btn-warning'>Update</a>
            <a href='delete.php?id={$row['id']}' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
            </td>
    
            </tr>";
         } ?>
        </tbody>

    </table>
</div>
</body>
</html>