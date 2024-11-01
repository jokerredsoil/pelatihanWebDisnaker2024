<?php    
  if(empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
    <center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
  }
  else{
    $modul="absensi";
    $aksi="modul/mod_absensi/aksi_absensi.php";
    if(!ISSET($_GET['act'])){
      $_GET['act'] = "";
    }
    switch($_GET['act']){
      // Tampil Berita
      default:
        ?>
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-12">
                    <h5>Data Kelas</h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table">
                  <table class="display" id="basic-2">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Pengajar</th>
                        <th style="text-align:center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if($_SESSION['roles_id'] == 1){
                          $sql = "SELECT k.*, u.nama FROM kelas as k LEFT JOIN users as u ON k.user_id = u.id";
                        }
                        elseif($_SESSION['roles_id'] == 2){
                          $sql = "SELECT k.*, u.nama FROM kelas as k LEFT JOIN users as u ON k.user_id = u.id WHERE k.user_id = ".$_SESSION['user_id'];
                        }
                        else{
                          $sql = "SELECT k.*, u.nama FROM kelas as k LEFT JOIN user_kelas as uk ON uk.kelas_id = k.id LEFT JOIN users as u ON k.user_id = u.id WHERE uk.user_id = ".$_SESSION['user_id'];
                        }
                        
                        $data = mysqli_query($koneksi, $sql);
                        $no=1;
                        while ($row=mysqli_fetch_array($data)){
                          echo "<tr>";
                          echo "<td>$no</td>";
                          echo '<td>'.$row['nama_kelas'].'</td>';
                          echo '<td>'.$row['nama'].'</td>';
                          echo '<td style="text-align:center">';
                              echo '<a href="?module=absensi&act=view&id='.$row['id'].'" class="btn-info" title="Check Absensi" style="padding: 5px; border-radius: 5px; margin: 0 3px;"><span class="fa fa-check"></span></a>';
                          echo '</td>';
                          echo '</tr>';
                          $no++;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        <?php
        break;
      
        case "view":
          $rows = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id='".$_GET['id']."'");
          $row = mysqli_fetch_object($rows);
          ?>
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-sm-6">
                      <h5>Data Absensi (<?=$row->nama_kelas?>)</h5>
                    </div>
                    <div class="col-sm-6 text-end">
                      <a class="btn btn-pill btn-danger btn-air-danger" href="?module=absensi" type="button" title="btn btn-pill btn-danger btn-air-danger">Kembali</a>
                      <?php
                        if($_SESSION['roles_id'] != 3){
                          ?>
                            <a class="btn btn-pill btn-success btn-air-success" href="?module=<?=$modul?>&act=tambah&id=<?=$_GET['id']?>" type="button" title="btn btn-pill btn-success btn-air-success">Tambah Data</a>
                          <?php
                        }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table">
                    <table class="display" id="basic-2">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Peserta</th>
                          <?php
                            $data_pembelajaran = mysqli_query($koneksi, 'SELECT * FROM pembelajaran WHERE kelas_id = '.$_GET['id'].' ORDER BY tanggal_masuk;');
                            $array_pembelajaran=Array();
                            $array_waktu_masuk=Array();
                            while ($pembelajaran=mysqli_fetch_array($data_pembelajaran)){
                              echo '<th style="text-align:center">';
                                echo '<div>'.$pembelajaran['nama'].'</div><div class="mt-2">'.$pembelajaran['tanggal_masuk'].'</div>';
                                echo '<div class="mt-3">';
                                if($_SESSION['roles_id'] != 3){
                                  echo '<a href="?module='.$modul.'&act=absen_qrcode&id='.$pembelajaran['id'].'" class="btn-info" title="Absen QR Code" style="padding: 5px; border-radius: 5px; margin: 0 3px;"><span class="fa fa-check"></span></a>';
                                  echo '<a href="?module='.$modul.'&act=edit&id='.$pembelajaran['id'].'" class="btn-primary" title="Ubah" style="padding: 5px; border-radius: 5px; margin: 0 3px;"><span class="fa fa-pencil"></span></a>';
                                    echo '<a href="javascript:void(0)" class="btn-danger" title="Hapus" style="padding: 5px; border-radius: 5px; margin: 0 3px;"'; ?> onClick="Swal.fire({title: 'Apakah Kamu Yakin?', text: 'Data yang sudah dihapus tidak akan bisa dikembalikan!', icon: 'warning', showCancelButton: true, cancelButtonColor: '#a927f9', confirmButtonColor: '#dc3545', confirmButtonText: 'Ya, Hapus Data!' }).then((result) => { if (result.isConfirmed) { window.location = '<?=$aksi?>?module=<?=$modul?>&act=hapus&id=<?=$pembelajaran['id']?>'; }});" ><span class="fa fa-trash-o"></span></a>
                                  <?php
                                }
                                echo '</div>';
                              echo '</th>';
                              array_push($array_pembelajaran, $pembelajaran['id']);
                              array_push($array_waktu_masuk, $pembelajaran['tanggal_masuk']);
                            }
                          ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql = 'SELECT u.* FROM user_kelas as uk JOIN users as u ON uk.user_id = u.id WHERE uk.kelas_id = '.$_GET['id'].';';
                          $result = mysqli_query($koneksi,$sql);
                          $no=1;
                          while ($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo '<td>'.$row['nama'].'</td>';
                            for($x=0; $x<count($array_pembelajaran); $x++){
                              echo '<td style="text-align:center">';
                              
                                $sql = "SELECT * FROM absensi WHERE pembelajaran_id=$array_pembelajaran[$x] AND siswa_id=".$row['id'];
                                $result = $koneksi->query($sql);

                                if ($result->num_rows > 0) {
                                  // output data of each row
                                  while($data = $result->fetch_assoc()) {
                                    if($data['status'] == "Hadir"){
                                      $label = "success";
                                    }
                                    else{
                                      $label = "primary";
                                    }
                                    echo '<span class="badge badge-'.$label.'" data-bs-toggle="modal" data-bs-target=".data-'.$array_pembelajaran[$x].'-'.$row['id'].'" style="cursor:pointer">'.$data['status'].'</span>';
                                    ?>
                                      <div class="modal fade data-<?=$array_pembelajaran[$x]?>-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="myLargeModalLabel">Detail Absen <?=$row['nama']?></h4>
                                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="row">
                                                <label class="col-sm-3 col-form-label text-start">Status</label>
                                                <label class="col-sm-9 col-form-label text-start">: <span class="badge badge-<?=$label?>"><?=$data['status']?></span></label>
                                              </div>
                                              <?php
                                                if($data['status'] == 'Hadir'){
                                                  $pembelajaran_masuk = new DateTime($array_waktu_masuk[$x]);
                                                  $absen_masuk = new DateTime($data['tanggal_masuk']);
                                                  $terlambat = '';
                                                  if( $pembelajaran_masuk < $absen_masuk){
                                                    $terlambat = $pembelajaran_masuk->diff($absen_masuk);
                                                    $min = $terlambat->days * 24 * 60;
                                                    $min += $terlambat->h * 60;
                                                    $min += $terlambat->i;
                                                    $terlambat = '<span class="badge badge-danger">Terlambat ('.$min.' Menit)</span>';
                                                  }
                                                  ?>
                                                    <div class="row">
                                                      <label class="col-sm-3 col-form-label text-start">Waktu Kedatangan</label>
                                                      <label class="col-sm-9 col-form-label text-start">: <?=$data['tanggal_masuk']?> <?=$terlambat?></label>
                                                    </div>
                                                  <?php
                                                }
                                                elseif($data['status'] == 'Izin'){
                                                  ?>
                                                    <div class="row">
                                                      <label class="col-sm-3 col-form-label text-start">Alasan</label>
                                                      <label class="col-sm-9 col-form-label text-start">: <?=$data['keterangan']?></label>
                                                    </div>
                                                  <?php
                                                }
                                                elseif($data['status'] == 'Sakit'){
                                                  ?>
                                                    <div class="row">
                                                      <label class="col-sm-3 col-form-label text-start">Surat Sakit</label>
                                                      <label class="col-sm-9 col-form-label text-start">: <a href="assets/surat_sakit/<?=$data['file_surat']?>" target="_blank">Surat Sakit</a></label>
                                                    </div>
                                                  <?php
                                                }
                                              ?>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    <?php
                                  }
                                } else {
                                  echo '<span class="badge badge-danger">Tidak Hadir</span>';
                                }
                                if($_SESSION['roles_id'] != 3){
                                  echo '<div class="mt-2"><a href="?module='.$modul.'&act=absen&id='.$array_pembelajaran[$x].'&siswa_id='.$row['id'].'" class="btn-info" title="Absen" style="padding: 5px; border-radius: 5px; margin: 0 3px;"><span class="fa fa-check"></span></a></div>';
                                }
                            
                              echo '</td>';
                            }
                            echo '</tr>';
                            $no++;
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          <?php
          break;
      
      case "tambah":
        ?>
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5>Tambah Pembelajaran</h5>
                </div>
                <form class="form theme-form" method="post" action="<?=$aksi?>?module=<?=$modul?>&act=input&id=<?=$_GET['id']?>">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Nama Pembelajaran</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" name="nama" placeholder="Nama Pembelajaran" required >
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-3 col-form-label">Tanggal Pembelajaran</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="datetime-local" name="tanggal_masuk" id="example-datetime-local-input" required >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-end">
                    <div class="col-sm-9 offset-sm-3">
                      <input class="btn btn-danger" type="reset" onclick="self.history.back()" value="Cancel">
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php
        break;

      case "edit":
        $rows = mysqli_query($koneksi, "SELECT * FROM pembelajaran WHERE id='".$_GET['id']."'");
        $row = mysqli_fetch_object($rows);
        ?>
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5>Update Pembelajaran</h5>
                </div>
                <form class="form theme-form" method="post" action="<?=$aksi?>?module=<?=$modul?>&act=update&id=<?=$_GET['id']?>">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Nama Pembelajaran</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" name="nama" value="<?=$row->nama?>" placeholder="Nama Pembelajaran" required >
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-3 col-form-label">Tanggal Pembelajaran</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="datetime-local" name="tanggal_masuk" value="<?=$row->tanggal_masuk?>" id="example-datetime-local-input" required >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-end">
                    <div class="col-sm-9 offset-sm-3">
                      <input class="btn btn-danger" type="reset" onclick="self.history.back()" value="Cancel">
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php
        break;
      
        case "absen":
          $rows = mysqli_query($koneksi, "SELECT * FROM users WHERE id='".$_GET['siswa_id']."'");
          $row = mysqli_fetch_object($rows);
          ?>
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Absen Siswa</h5>
                  </div>
                  <form class="form theme-form" method="post" action="<?=$aksi?>?module=<?=$modul?>&act=absen&id=<?=$_GET['id']?>&siswa_id=<?=$_GET['siswa_id']?>" enctype='multipart/form-data'>
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Kode</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="text" value="<?=$row->kode?>" disabled >
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Peserta</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="text" value="<?=$row->nama?>" disabled >
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                              <label class="d-block" for="edo-ani">
                                <input class="radio_animated status_absen" id="edo-ani" type="radio" value="Hadir" name="status" checked="">Hadir
                              </label>
                              <label class="d-block" for="edo-ani1">
                                <input class="radio_animated status_absen" id="edo-ani1" type="radio" value="Izin" name="status">Izin
                              </label>
                              <label class="d-block" for="edo-ani2">
                                <input class="radio_animated status_absen" id="edo-ani2" type="radio" value="Sakit" name="status">Sakit
                              </label>
                              <label class="d-block" for="edo-ani3">
                                <input class="radio_animated status_absen" id="edo-ani3" type="radio" value="Tidak Hadir" name="status">Tidak Hadir
                              </label>
                            </div>
                          </div>
                          <div class="row status_absen_input" id="Hadir">
                            <label class="col-sm-3 col-form-label">Tanggal & Jam Masuk</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="datetime-local" name="tanggal_masuk" value="<?=$row->tanggal_lahir?>" placeholder="DD/MM/YYYY" >
                            </div>
                          </div>
                          <div class="row status_absen_input" id="Izin" style="display:none;">
                            <label class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" name="keterangan" rows="5" cols="5" placeholder="Alasan Izin"></textarea>
                            </div>
                          </div>
                          <div class="row status_absen_input" id="Sakit" style="display:none;">
                            <label class="col-sm-3 col-form-label">Surat Sakit</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="file" name="file_surat" >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <div class="col-sm-9 offset-sm-3">
                        <input class="btn btn-danger" type="reset" onclick="self.history.back()" value="Cancel">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php
          break;
        
        case "absen_qrcode":
          $rows = mysqli_query($koneksi, "SELECT * FROM pembelajaran WHERE id='".$_GET['id']."'");
          $row = mysqli_fetch_object($rows);
          ?>
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Absen Siswa (QR Code)</h5>
                  </div>
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-12 mt-3">
                        <center>
                          <video id="preview"></video>
                        </center>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 mt-3">
                        <div class="mb-3">
                          <center>
                            <select class="form-select" id="pilih_kamera" style="width:auto;">
                            </select>
                          </center>
                        </div>
                      </div>
                    </div>
                  </div>
                  <form class="form theme-form" id="absenqrcode" method="post" action="absen.php">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Kode</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="text" id="kode" name="kode" >
                              <input class="form-control" type="hidden" name="pembelajaran_id" value="<?=$_GET['id']?>" >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <div class="col-sm-9 offset-sm-3">
                        <input class="btn btn-danger" type="reset" onclick="location.href='media.php?module=absensi&act=view&id=<?=$row->kelas_id?>';" value="Cancel">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php
          if(ISSET($_SESSION['error'])){
            ?>
              <script>
                Swal.fire({
                  title: "Absensi Gagal",
                  text: "<?=$_SESSION['error']?>",
                  icon: "error"
                });
              </script>
            <?php
            unset($_SESSION['error']);
          }
          break;
    }
  }
?>
