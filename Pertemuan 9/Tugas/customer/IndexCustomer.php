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
    <title>E-Commerce | Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <?php include("./components/nav.php")?>
        <div class="row">
            <?php if (isset($_SESSION['success_message'])): ?>
                <script>alert("<?= $_SESSION['success_message']; ?>");</script>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>
            <h1>Welcome, <?= $_SESSION['username'];?></h1>
            <p>Here's our product that you can see.</p>
            <?php include('./components/cards.php');?>
        </div>
    </div>
</body>
</html>