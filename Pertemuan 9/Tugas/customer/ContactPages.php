<?php 
session_start();

if($_SESSION['status']!="login"){
    header("location:Login.php");
}

include("../connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce | Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <?php include("./components/nav.php")?>
        <div class="row">
            <h1>Kontak Kami</h1>
            <?php include("./components/cardscontact.php")?>
        </div>
    </div>
</body>
</html>