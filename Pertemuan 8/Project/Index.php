<?php 
    $waifu = array("Asuka Langley Soryu", "Rei Ayanami", "Ran Mouri");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
</head>
<body>
    <h1>Selamat Datang</h1>
    <?php foreach($waifu as $data) : ?>
        <p><?= $data . "<br>";?></p>
    <?php endforeach;?>
</body>
</html>