<?php
    
    include '../includes/connection.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "insert into php_login (name ,phone, email, username, password) values('$name', '$phone', '$email', '$username', '$password')";

        $execut = mysqli_query($conn, $query);

        if($execut)
        {
            echo "<script>alert('registion successfully..!');</script>";
            echo "<meta http-equiv='refresh' content='0;url=login.php'>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>registation</h1>
    <form action="register.php" method="post" onsubmit="return validateform()">
        <div>
            <label for="name">name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="phone">phone:</label>
            <input type="number" id="phone" name="phone" required>
        </div>

        <div>
            <label for="email">email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="">UserName : </label>
            <input type="text" id="username" name="username" required>
        </div>
        
        <div>
            <label for="">password : </label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit" name="">Register</button>
        </div>
    </form>
</body>
</html>