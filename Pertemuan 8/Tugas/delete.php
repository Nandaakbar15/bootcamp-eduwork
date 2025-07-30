<?php 

include("connection.php");

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = '$id'";

$queryDelete = mysqli_query($connect, $sql);

if($queryDelete) {
    echo "<script>
            alert('Successfully delete the data!');
            document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
            alert('Failed to delete the data!');
         </script>";
}

?>