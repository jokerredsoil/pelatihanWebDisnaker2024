<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            width: 100%;
            margin: 0;
        }
        .gambargallery  {
            display: flex;
        }
        .gambargallery img{
            width: 18%;
            margin: 10px 10px 10px 5px;
        }
        footer{
            background-color: grey;
            width: 100%;
        }
        footer h3{
    
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        .active{
            background-color:#00F;
            color:#FFF;
        }      
    </style>
    <title>Tugas HTML 1</title>
</head>
<body>
    <header>
        <h1>Selamat Datang Di Halaman Utama</h1>
        <nav>
            <a href="gallery.php" <?php if($halaman ==  "galery"){ echo 'class="active"';}?> >| Gallery |</a>
            <a href="dataPenjualan.php" <?php if($halaman ==  "data_penjualan"){ echo 'class="active"';}?> > Data Penjualan |</a>
            <a href="formPendaftaran.php" <?php if($halaman ==  "form_pendaftaran"){ echo 'class="active"';}?> >|Form Pendaftaran |</a>
            <a href="daftarhalaman.php" <?php if($halaman ==  "daftar_menu"){ echo 'class="active"';}?> > Daftar Menu |</a>
        </nav>
    </header>
    <br>