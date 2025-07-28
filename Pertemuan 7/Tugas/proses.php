<?php
// Validasi input sederhana
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $harga = $_POST['harga'] ?? '';
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $kategori = $_POST['kategori'] ?? '';

    $errors = [];

    // Validasi Nama
    if (empty($nama)) {
        $errors[] = "Nama produk wajib diisi.";
    }

    // Validasi Harga
    if (!is_numeric($harga) || $harga < 0) {
        $errors[] = "Harga harus berupa angka positif.";
    }

    // Validasi Deskripsi
    if (empty($deskripsi)) {
        $errors[] = "Deskripsi tidak boleh kosong.";
    }

    // Validasi Kategori
    $kategoriValid = ['Elektronik', 'Pakaian', 'Makanan', 'Aksesoris'];
    if (!in_array($kategori, $kategoriValid)) {
        $errors[] = "Kategori tidak valid.";
    }

    // Jika tidak ada error
    if (empty($errors)) {
        echo "<h3>Data Produk Berhasil Disimpan:</h3>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Harga: Rp " . number_format($harga, 0, ',', '.') . "<br>";
        echo "Deskripsi: " . nl2br(htmlspecialchars($deskripsi)) . "<br>";
        echo "Kategori: " . htmlspecialchars($kategori) . "<br>";
    } else {
        echo "<h4>Terjadi kesalahan:</h4><ul>";
        foreach ($errors as $err) {
            echo "<li>" . htmlspecialchars($err) . "</li>";
        }
        echo "</ul>";
        echo "<a href='javascript:history.back()'>Kembali</a>";
    }
} else {
    echo "Akses tidak valid.";
}
?>
