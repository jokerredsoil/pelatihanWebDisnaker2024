

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
      
    </style>
    <title>Tugas HTML 1</title>


    
</head>
<body>
    <header>
        <h1>Selamat Datang Di Halaman Utama</h1>
        <nav>

            <a href="gallery.php">| Gallery |</a>
            <a href="dataPenjualan.php"> Data Penjualan |</a>
            <a href="formPendaftaran.php">|Form Pendaftaran |</a>
            <a href="daftarMenu.php"> Daftar Menu |</a>
            
        </nav>
    </header>
    <br>

    <main>
        <div class="gallery"  >
            <div style="display: flex;">
            <img src="https://cdn0-production-images-kly.akamaized.net/ws2o2R07jgDt86q6a1RmYVvqsgc=/640x360/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/910022/original/088040000_1435218389-gorila_1.jpg" alt="" width="100px">
            <h2 style="margin-left: 10px;">Gallery Profesi</h2>
            </div>
            <br>
            <div class="gambargallery" >
                <img src="https://st2.depositphotos.com/1017986/10936/i/380/depositphotos_109368346-stock-photo-man-in-headset-hacking-computer.jpg" alt="" >

                <img src="https://img.freepik.com/free-photo/portrait-female-teacher-with-notepad-green_140725-150683.jpg?size=626&ext=jpg" alt="">

                <img src="https://media.istockphoto.com/id/136916670/id/foto/ke-dalam-api.jpg?s=612x612&w=0&k=20&c=F1wFkHkBVgpg0Tb-DLBJcHhDS1vRj81tnJOrbeyHZ6E=" alt="">

                <img src="https://d2thvodm3xyo6j.cloudfront.net/media/2021/09/be0d205676be4700-600x338.jpg" alt="">

                <img src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/871/2024/05/31/InShot_20240531_141427377-296137909.jpg" alt="">



            </div>
        </div>
    </main>
    <footer >
        <h3> made by &copy Septian Nugraha</h3>
    </footer>

        
</body>
</html>