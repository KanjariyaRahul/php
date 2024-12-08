<?php
include '../includes/connection.php';
include '../includes/header.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender =$_POST['gender'];
        $address = $_POST['address'];

        $fileupload = $_FILES['fileupload']['name'];
        $filetemp = $_FILES['fileupload']['tmp_name'];
        move_uploaded_file($filetemp, '../uploads/'.$fileupload);


        $imageupload = $_FILES['imageupload']['name'];
        $imagetemp = $_FILES['imageupload']['tmp_name'];
        move_uploaded_file($imagetemp, '../uploads/'.$imageupload);


        $query = "INSERT INTO users(`name`, `email`, `phone`, `gender`, `address`, `file`, `image`) 
        VALUES ('$name', '$email', '$phone' , '$gender', '$address' , '$fileupload' , '$imageupload')";

        if(mysqli_query($conn, $query))
        {
            echo "<script>alert('data inserted successfully...');
            document.getElementById('name').value='';
            document.getElementById('email').value='';
            document.getElementById('phone').value='';
            document.getElementById('gender').value='';
            document.getElementById('address').value='';
            document.getElementById('fileupload').value='';
            document.getElementById('imageupload').value='';
            </script>";
            echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
            exit();
        }else{
            echo "Error : ".mysqli_error($conn);
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <script src="../assets/vlidation.js"></script>
    <title>Add Record</title>
</head>
<body>
    
   <div class="container mt-3">
        <h1 class="bg-light  text-center"> Add New Record</h1>

     <form action="add.php" method="post" onsubmit="return validateForm()" class="mt-3 p-3" enctype="multipart/form-data" required>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" required>
        </div>

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="">Select Gender</option>
                <option value="male" id="male">Male</option>
                <option value="female" id="female">FeMale</option>
                <option value="others" id="others">Others</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea  rows="3" class="form-control" id="address" name="address" placeholder="Enter Full Addresas"></textarea>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Files Upload </label>
            <input type="file" class="form-control" id="fileupload" name="fileupload">
            <span class="text-warning">only pdf types are allowed!</span>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image Upload</label>
            <input type="file" class="form-control" id="imageupload" name="imageupload">
            <span class="text-warning">only jpg,jpeg,png types are allowed!</span>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary form-control">Add Record</button>
        </div>
     </form>
   </div>

</body>
</html>