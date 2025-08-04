<?php 

session_start();

if($_SESSION['status']!="login"){
    header("location:Login.php");
}

include("../../connection.php");

$sql = "SELECT * FROM employee";

$query = mysqli_query($connect, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>E-Commerce | Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include("../components/navbar.php");?>
        <div id="layoutSidenav">
            <?php include("../components/sidebar.php");?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Karyawan</h1>
                        <h2><a href="./TambahKaryawan.php" class="btn btn-primary">Tanbah Karyawan</a></h2>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nama Karyawan</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Umur</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Karyawan</th>
                                            <th>Alamat</th>
                                            <th>Nomor Telepon</th>
                                            <th>Umur</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($result as $data) : ?>
                                            <tr>
                                                <td><?= $data['nama'];?></td>
                                                <td><?= $data['alamat'];?></td>
                                                <td><?= $data['noTelp'];?></td>
                                                <td><?= $data['umur'];?></td>
                                                <td><?= $data['jabatan'];?></td>
                                                <td>
                                                    <a href="./UbahKaryawan.php?id=<?= $data['id'];?>" class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <a href="./logic/delete.php?id=<?= $data['id'];?>" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include("../components/footer.php")?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../assets/demo/chart-area-demo.js"></script>
        <script src="../../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="../../js/datatables-simple-demo.js"></script>
    </body>
</html>