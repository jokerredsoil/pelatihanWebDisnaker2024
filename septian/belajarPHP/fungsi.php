<?php

function salam($nama = "user" ) {
    return "selamat datang $nama ";
}

function hitung($nominal, $jumlah) {
    $num =$nominal * $jumlah;
    $str_return = "Rp. " . number_format($num,2,",",".");
    return $str_return;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fungsi</title>
</head>
<body>
    <h1><?= salam()?></h1>

    <h2>uang saya <?= hitung(20000,2)?> </h2>
    
</body>
</html>