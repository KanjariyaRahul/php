<?php
session_start();
include '../includes/connection.php'; // Ensure this file contains the correct database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Ensure you use the correct variable for your connection
    $query = "SELECT * FROM php_login WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        if ($password ==$row["password"]) {
            $_SESSION["user_id"] = $row["id"]; // Store user ID in session
            header("Location: ../index.php"); // Redirect to profile page
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Welcome back</h1>

    <form action="login.php" method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div>   
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <input type="submit" value="Login">
        </div>
    </form>
</body>
</html>
