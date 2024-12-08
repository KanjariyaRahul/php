<?php 
 include 'connection.php';

 if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "delete from users where id=$id";
    $result = mysqli_query($conn, $query);
    
    if($result)
    {
        echo "<script>alert('record deleter successfully!');</script>";
        echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    }
    else{
        echo "Error deleting record: " . mysqli_error($conn);
    }
 }else{
    echo "invalid request!";
 }
?>