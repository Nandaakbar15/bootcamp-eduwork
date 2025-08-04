<?php 

include(__DIR__ . '/../../connection.php');

$sql = "SELECT * FROM products";

$query = mysqli_query($connect, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<?php foreach($result as $data):?>
<div class="card" style="width: 18rem;">
  <img src="../../images/<?= $data['Gambar']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $data['nama_produk'];?></h5>
    <p class="card-text">Rp. <?= $data['harga'];?></p>
    <p class="card-text">Stok: <?= $data['stok'];?></p>
    <a href="add_to_cart.php?id=<?= $data['id']; ?>" class="btn btn-primary">Add To Cart</a>
  </div>
</div>
<?php endforeach;?>