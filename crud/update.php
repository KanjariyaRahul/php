<?php
    include 'connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "select * from users where id=$id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
    
        $updatequery = "Update users set name='$name' , email='$email', age='$age' where id=$id";
        
        if (mysqli_query($conn, $updatequery)) {
            echo "<script>alert('updated successful!');  
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('age').value = ''; </script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            // header("Location: index.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>Add Record</title>
    <script src="./assets/vlidation.js"></script>
</head>
<body>

<h1 class="bg-dark text-white text-center">Add New Record</h1>

<div class="container text-end">
    <button class="btn btn-success m-3" onclick="window.location.href='index.php'">View Record</button>

</div>
<form method="POST" action="update.php?id=<?=$id ?>" onsubmit="return validateForm()" class="container border border-1 p-5 ">

    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name"  class="form-control" value="<?= $row['name']?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="text" id="email" name="email" class="form-control" value="<?= $row['email']?>" required>
    </div>

    <div class="mb-3">
        <label for="age" class="form-label">Age:</label>
        <input type="number" id="age" name="age" class="form-control" value="<?= $row['age']?>" required>
    </div>
    <br>
    <div class="d-grid gap-2">

        <button type="submit" class="btn btn-primary mb-3">update Record</button>
    </div>
</form>

</body>
</html>
