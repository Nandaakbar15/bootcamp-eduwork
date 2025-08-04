<?php 

session_start();

if($_SESSION['status']!="login"){
    header("location:Login.php");
}

include("../../connection.php");

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = '$id'";

$query = mysqli_query($connect, $sql);

$result = mysqli_fetch_assoc($query);

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
                        <h1 class="mt-4">Form Ubah Produk</h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                <form action="./logic/update.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $result["id"]; ?>">
                                    <input type="hidden" name="gambarLama" value="<?= $result["Gambar"]; ?>">
                                    <div class="mb-3">
                                        <label for="nama_produk" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $result['nama_produk'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga Produk</label>
                                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $result['harga'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $result['deskripsi'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="stok" class="form-label">Stok</label>
                                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $result['stok'];?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <select class="form-select" id="kategori" name="kategori" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            <option value="Elektronik" <?= $result['kategori'] == 'Elektronik' ? 'selected' : '' ?>>Elektronik</option>
                                            <option value="Pakaian" <?= $result['kategori'] == 'Pakaian' ? 'selected' : '' ?>>Pakaian</option>
                                            <option value="Makanan" <?= $result['kategori'] == 'Makanan' ? 'selected' : '' ?>>Makanan</option>
                                            <option value="Aksesoris" <?= $result['kategori'] == 'Aksesoris' ? 'selected' : '' ?>>Aksesoris</option>
                                            <option value="Komik" <?= $result['kategori'] == 'Komik' ? 'selected' : '' ?>>Komik</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Gambar" class="form-label">Gambar</label>
                                        <img src="../../images/<?= $result["Gambar"]; ?>" width="50">
                                        <input type="file" class="form-control" id="Gambar" name="Gambar">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </form>
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