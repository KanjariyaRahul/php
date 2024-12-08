<?php


include './includes/connection.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
$query = "delete *from users  where id=$id";
$result = mysqli_query($conn , $query);

    if($result)
    {
        echo "<script>alert('record deleted successfully!');</script>";
        echo  "<meta http-equiv='refresh' content='0;url= ../index.php'>";
    }
    else{
        echo "<script>alert('record not deleted!');</script>";
    }
}
else{
    echo "invalid request..";
}

 ?>
