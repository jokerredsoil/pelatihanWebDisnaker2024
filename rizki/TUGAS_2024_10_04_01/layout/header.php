<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$halaman?></title>
        <style>
            #activate {
                position:fixed;
                bottom:0;
                right:0;
                color:rgba(0,0,0,0.4);
                padding: 0 70px 40px 0;
                font-family: arial;
            }

            nav > a {
                color:#000 !important;
                text-decoration: none;
                padding: 10px 20px;
                margin: 0 5px;
                border: 1px solid #000;
            }

            .active {
                background-color:rgba(0,0,0,0.7);
                color:#FFF !important;
            }
        </style>
    </head>
    <body>        
        <header>
            <h1 align="center">Selamat Datang di Halaman <?=$halaman?></h1>
            <nav align="center">
                <a href="index.php" <?php if($halaman == "Gallery"){ echo 'class="active"';} ?>>Gallery</a>
                <a href="penjualan.php" <?php if($halaman == "Data Penjualan"){ echo 'class="active"';} ?>>Data Penjualan</a>
                <a href="formulir.php" <?php if($halaman == "Formulir Pendaftaran"){ echo 'class="active"';} ?>>Formulir Pendaftaran</a>
                <a href="daftarmenu.php" <?php if($halaman == "Daftar Menu"){ echo 'class="active"';} ?>>Daftar Menu</a>
            </nav>
        </header>