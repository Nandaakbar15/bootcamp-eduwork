<?php 

include(__DIR__ . '/../../connection.php');

$sql = "SELECT * FROM employee";

$query = mysqli_query($connect, $sql);

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<?php foreach($result as $data) : ?>
<div class="card" style="width: 18rem;">
  <img src="../../images/profile.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $data['nama']?></h5>
    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $data['noTelp'];?></h6>
    <p class="card-text"><?= $data['jabatan'];?></p>
  </div>
</div>
<?php endforeach;?>