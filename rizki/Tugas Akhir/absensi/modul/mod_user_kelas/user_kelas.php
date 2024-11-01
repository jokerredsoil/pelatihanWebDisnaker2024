<?php    
  if(empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
    <center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
  }
  else{
    $modul="user_kelas";
    $aksi="modul/mod_user_kelas/aksi_user_kelas.php";
    if(!ISSET($_GET['act'])){
      $_GET['act'] = "";
    }
    switch($_GET['act']){
      // Tampil Berita
      default:
        $rows = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id='".$_GET['id']."'");
        $row = mysqli_fetch_object($rows);
        ?>
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-6">
                    <h5>Data Peserta (<?=$row->nama_kelas?>)</h5>
                  </div>
                  <div class="col-sm-6 text-end">
                    <a class="btn btn-pill btn-danger btn-air-danger" href="?module=kelas" type="button" title="btn btn-pill btn-danger btn-air-danger">Kembali</a>
                    <a class="btn btn-pill btn-success btn-air-success" href="?module=<?=$modul?>&act=tambah&id=<?=$_GET['id']?>" type="button" title="btn btn-pill btn-success btn-air-success">Tambah Data</a>
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
                        <th style="text-align:center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $data = mysqli_query($koneksi, 'SELECT u.* FROM user_kelas as uk JOIN users as u ON uk.user_id = u.id WHERE uk.kelas_id = '.$_GET['id'].';');
                        $no=1;
                        while ($row=mysqli_fetch_array($data)){
                          echo "<tr>";
                          echo "<td>$no</td>";
                          echo '<td>'.$row['nama'].'</td>';
                          echo '<td style="text-align:center">';
                              echo '<a href="javascript:void(0)" class="btn-danger" title="Hapus" style="padding: 5px; border-radius: 5px; margin: 0 3px;"'; ?> onClick="Swal.fire({title: 'Apakah Kamu Yakin?', text: 'Data yang sudah dihapus tidak akan bisa dikembalikan!', icon: 'warning', showCancelButton: true, cancelButtonColor: '#a927f9', confirmButtonColor: '#dc3545', confirmButtonText: 'Ya, Hapus Data!' }).then((result) => { if (result.isConfirmed) { window.location = '<?=$aksi?>?module=<?=$modul?>&act=hapus&id=<?=$_GET['id']?>&user_id=<?=$row['id']?>'; }});" ><span class="fa fa-trash-o"></span></a>
                              <?php
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

      
      case "tambah":
        $rows = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id='".$_GET['id']."'");
        $row = mysqli_fetch_object($rows);
        ?>
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5>Tambah Data Peserta (<?=$row->nama_kelas?>)</h5>
                </div>
                <form class="form theme-form" method="post" action="<?=$aksi?>?module=<?=$modul?>&act=input&id=<?=$_GET['id']?>">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <label class="col-sm-3 col-form-label">Tambah Peserta</label>
                          <div class="col-sm-9">
                          <select class="js-example-basic-multiple col-sm-12" name="user_id[]" multiple="multiple">
                            <?php
                              $data = mysqli_query($koneksi, 'SELECT u.*, uk.* FROM users as u LEFT JOIN (SELECT * FROM user_kelas WHERE kelas_id ='.$_GET['id'].' ) as uk ON u.id = uk.user_id WHERE uk.user_id IS NULL AND u.roles_id = 3 ;');
                              while ($row=mysqli_fetch_array($data)){
                                echo '<option value="'.$row['id'].'">'.$row['kode'].' - '.$row['nama'].'</option>';
                              }
                            ?>
                          </select>
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
    }
  }
?>
