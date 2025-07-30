<?php 

include("connection.php");

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = '$id'";

$query = mysqli_query($connect, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Management App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <h1>Form Ubah Produk</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="update.php">
                        <input type="hidden" name="id" value="<?php echo $result[0]['id'];?>">

                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $result[0]['nama_produk'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" value="<?= $result[0]['harga'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $result[0]['deskripsi'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" value="<?= $result[0]['stok'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Elektronik" <?= $result[0]['kategori'] == 'Elektronik' ? 'selected' : '' ?>>Elektronik</option>
                                <option value="Pakaian" <?= $result[0]['kategori'] == 'Pakaian' ? 'selected' : '' ?>>Pakaian</option>
                                <option value="Makanan" <?= $result[0]['kategori'] == 'Makanan' ? 'selected' : '' ?>>Makanan</option>
                                <option value="Aksesoris" <?= $result[0]['kategori'] == 'Aksesoris' ? 'selected' : '' ?>>Aksesoris</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </form>
                </div>
            </div>
            <h2><a href="index.php" class="btn btn-secondary">Kembali</a></h2>
        </div>
    </div>
</body>
</html>