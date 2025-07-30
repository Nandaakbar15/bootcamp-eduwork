<?php 
include('connection.php');

$sql = "SELECT * FROM products";

$kategori = $_GET['kategori'] ?? '';

if (!empty($kategori)) {
    $stmt = $connect->prepare("SELECT * FROM products WHERE kategori = ?");
    $stmt->bind_param("s", $kategori);
    $stmt->execute();
    $query = $stmt->get_result();
    $result = $query->fetch_all(MYSQLI_ASSOC);
} else {
    $query = mysqli_query($connect, $sql);
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <h1>Product Management App</h1>
            <h2><a href="tambahproduk.php" class="btn btn-primary">Tambah Produk</a></h2>
            <div class="card">
                <form method="GET" class="mb-4">
                    <div class="row g-2 align-items-end">
                        <div class="col-md-4">
                        <label for="filter_kategori" class="form-label">Filter Kategori</label>
                        <select name="kategori" id="filter_kategori" class="form-select">
                            <option value="">-- Semua Kategori --</option>
                            <option value="Elektronik" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Elektronik') ? 'selected' : '' ?>>Elektronik</option>
                            <option value="Pakaian" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Pakaian') ? 'selected' : '' ?>>Pakaian</option>
                            <option value="Makanan" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Makanan') ? 'selected' : '' ?>>Makanan</option>
                            <option value="Aksesoris" <?= (isset($_GET['kategori']) && $_GET['kategori'] == 'Aksesoris') ? 'selected' : '' ?>>Aksesoris</option>
                        </select>
                        </div>
                        <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>

                <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $data): ?>
                            <tr>
                                <td><?= $data['nama_produk'];?></td>
                                <td><?= $data['harga'];?></td>
                                <td><?= $data['deskripsi'];?></td>
                                <td><?= $data['stok'];?></td>
                                <td><?= $data['kategori'];?></td>
                                <td>
                                    <a href="ubahproduk.php?id=<?= $data['id'];?>" class="btn btn-info">Edit</a>
                                </td>
                                <td>
                                    <a href="delete.php?id=<?= $data['id'];?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>