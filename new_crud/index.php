<?php
include './includes/connection.php';
include './includes/header.php';

// $query = "select id , name, phone , gender, file, image from users ";
$search = isset($_GET['search']) ? $_GET['search'] : '';

$page = isset($_GET['page']) ? (int)$_GET['page']: 1;
$limit = 10;
$offset = ($page-1) * $limit;

$query = "SELECT * FROM users WHERE name LIKE '%$search%' LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn , $query);

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
    
    <div class="bg-light container mt-3">

        <h1 class="text-center"> All Record</h1>
        <form class="d-flex" role="search">
        <input class="form-control me-2" name="search" id= search" type="search" placeholder="Search" value="<?php echo htmlspecialchars($search); ?>">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
        <table class="table table-hover p-5">
            <thead class="thead-dark">
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>file</th>
                <th>Image</th>
                <th class="col-2 text-center">Action</th>
                
            </thead>

            <tbody>
                
                <?php
                 while($row=mysqli_fetch_assoc($result))
                 {
                    echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['gender']}</td>
                    <td> <a href='./uploads/{$row['file']}' download>{$row['file']}</a></td>
                    <td><img src='./uploads/{$row['image']}' alt='image' width='100' height='100'></td>
                    <td><a href='./action/update.php?id={$row['id']}' class='btn btn-warning'>Update</a>
                <a href='./action/delete.php?id={$row['id']}' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
            </td>
                </tr>";
                 }
                 ?>
            </tbody>
        </table>
        <div>
            <a href="?page=<?php echo  $page-1;?>">previous</a>
            <a href="?page=<?php echo  $page+1;?>">Next</a>
        </div>
    </div>

</body>
</html>