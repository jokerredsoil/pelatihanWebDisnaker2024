<?php
    session_start();

    include "config/koneksi.php";

    $data = mysqli_query($koneksi, "SELECT * FROM pembelajaran WHERE id=".$_POST['pembelajaran_id']);
    $pembelajaran = mysqli_fetch_object($data);

    $data_kelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id=".$pembelajaran->kelas_id);
    $kelas = mysqli_fetch_object($data_kelas);

    if($_SESSION['roles_id'] != 1){
        if($kelas->user_id != $_SESSION['user_id'] ){
            $_SESSION['error'] = "Anda bukan pengajar";
    
            header('location:media.php?module=absensi&act=absen_qrcode&id='.$_POST['pembelajaran_id']);
            die();
        }
    }

    $kode = substr($_POST['kode'], -10);
    $rows = mysqli_query($koneksi, "SELECT * FROM users WHERE kode='".$kode."'");
    $user = mysqli_fetch_object($rows);

    $sql = "SELECT * FROM user_kelas WHERE kelas_id=$pembelajaran->kelas_id AND user_id=".$user->id;
    $result = $koneksi->query($sql);

    if ($result->num_rows <= 0) {
        $_SESSION['error'] = "Peserta tidak terdaftar di kelas";
    
        header('location:media.php?module=absensi&act=absen_qrcode&id='.$_POST['pembelajaran_id']);
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Profile <?=$user->nama?></title>
    <link href="/asset_frontend/img/favicon.ico" rel="icon">

    <!--Core CSS -->
    <link rel="stylesheet" href="assets_me/css/app.css" />
    <link rel="stylesheet" href="assets_me/css/main.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />

</head>

<body>
    <div id="huro-app" class="app-wrapper">
        <div class="app-overlay"></div>
        <!--Pageloader-->
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        <!-- Content Wrapper -->
        <div id="user-profile" class="view-wrapper" data-naver-offset="214" data-menu-item="#layouts-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile" style="margin-top: 0 !important;">

            <div class="page-content-wrapper" style="margin:auto;padding:40px;width:100vw;">
                <div class="page-content is-relative">

                    <div class="page-content-inner">

                        <!--User profile-->
                        <div class="profile-wrapper">
                            <div class="profile-header has-text-centered">
                                <div class="h-avatar is-xl">
                                    <img class="avatar" src="assets/foto/<?=$user->foto?>" data-demo-src="assets/foto/<?=$user->foto?>" alt="" data-user-popover="3">
                                    <img class="badge" src="assets/images/logo/logo-icon.png" data-demo-src="assets/images/logo/logo-icon.png" alt="">
                                </div>
                                <h3 class="title is-4 is-narrow is-thin"><?=$user->nama?></h3>
                                <p class="light-text">Hey everyone, Iam a member of NEW BIMMA.</p>
                                <a class="button h-button is-success mt-2" href="modul/mod_absensi/aksi_absensi.php?module=absensi&act=absen_qrcode&id=<?=$_POST['pembelajaran_id']?>&siswa_id=<?=$user->id?>">Lanjutkan Absensi</a>
                            </div>

                            <div class="profile-body">
                                <div class="columns">
                                    <div class="column is-8">
                                        <div class="profile-card">
                                            <div class="profile-card-section">
                                                <div class="section-title">
                                                    <i class="lnil lnil-user-alt" style="margin-right: 10px;"></i>
                                                    <h4>Tentang Saya</h4>
                                                </div>
                                                <div class="section-content">
                                                    <p class="description"><?=$user->about?></p>
                                                </div>
                                            </div>
                                            <div class="profile-card-section">
                                                <div class="section-title">
                                                    <i class="lnil lnil-user-alt" style="margin-right: 10px;"></i>
                                                    <h4>Alamat</h4>
                                                </div>
                                                <div class="section-content">
                                                    <p class="description"><?=$user->alamat?></p>
                                                </div>
                                            </div>
                                            <div class="profile-card-section">
                                                <div class="section-title">
                                                    <i class="lnil lnil-user-alt" style="margin-right: 10px;"></i>
                                                    <h4>Tempat, Tanggal Lahir</h4>
                                                </div>
                                                <div class="section-content">
                                                    <p class="description"><?=$user->kota_lahir?>, <?=$user->tanggal_lahir?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-card">
                                            <div class="profile-card-section no-padding">
                                                <div class="section-title">
                                                    <h4>Document CV</h4>
                                                </div>
                                                <div class="section-content">
                                                    <div class="recommendations-wrapper" style="justify-content: center;">

                                                        <!--Recommendation-->
                                                        <div class="recommendations-item" style="width: 100%">
                                                            <div class="h-avatar is-large">
                                                                <i class="lnil lnil-file-download" style="margin-right: 10px;font-size:50px;"></i>
                                                            </div>
                                                            <h3 class="dark-inverted">Document CV <?=$user->nama?></h3>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-4">

                                        <!--Recent Views-->
                                        <div class="profile-card">
                                            <div class="profile-card-section no-padding">
                                                <div class="section-title">
                                                    <h4>Personal Data</h4>
                                                </div>
                                                <div class="section-content">

                                                    <div class="people-wrapper">

                                                        <!--People-->
                                                        <div class="people-item">
                                                            <div class="h-avatar">
                                                                
                                                            </div>
                                                            <div class="meta">
                                                                <span class="dark-inverted">NIK</span>
                                                                <span> </span>
                                                            </div>
                                                        </div>

                                                        <!--People-->
                                                        <div class="people-item">
                                                            <div class="h-avatar">
                                                                
                                                            </div>
                                                            <div class="meta">
                                                                <span class="dark-inverted">Jenis Kelamin</span>
                                                                <span> </span>
                                                            </div>
                                                        </div>

                                                        <!--People-->
                                                        <div class="people-item">
                                                            <div class="h-avatar">
                                                                
                                                            </div>
                                                            <div class="meta">
                                                                <span class="dark-inverted">Agama</span>
                                                                <span> </span>
                                                            </div>
                                                        </div>

                                                        <!--People-->
                                                        <div class="people-item">
                                                            <div class="h-avatar">
                                                                
                                                            </div>
                                                            <div class="meta">
                                                                <span class="dark-inverted">Pekerjaan</span>
                                                                <span></span>
                                                            </div>
                                                        </div>

                                                        <!--People-->
                                                        <div class="people-item">
                                                            <div class="h-avatar">
                                                                
                                                            </div>
                                                            <div class="meta">
                                                                <span class="dark-inverted">Email</span>
                                                                <span></span>
                                                            </div>
                                                        </div>

                                                        <!--People-->
                                                        <div class="people-item">
                                                            <div class="h-avatar">
                                                                
                                                            </div>
                                                            <div class="meta">
                                                                <span class="dark-inverted">Phone Number</span>
                                                                <span></span>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <!--Huro Scripts-->
        <!--Load Mapbox-->

        <!-- Concatenated plugins -->
        <script src="assets_me/js/app.js"></script>

        <!-- Huro js -->
        <script src="assets_me/js/functions.js"></script>
        <script src="assets_me/js/main.js" async></script>
        <script src="assets_me/js/components.js" async></script>
        <script src="assets_me/js/popover.js" async></script>
        <script src="assets_me/js/widgets.js" async></script>


        <!-- Additional Features -->
        <script src="assets_me/js/touch.js" async></script>

        <!-- Landing page js -->

        <!-- Dashboards js -->

















        <!-- Charts js -->



        <!--Forms-->

        <!--Wizard-->

        <!-- Layouts js -->






        <script src="assets_me/js/profile.js" async></script>





        <script src="assets_me/js/syntax.js" async></script>
    </div>
</body>

</html>