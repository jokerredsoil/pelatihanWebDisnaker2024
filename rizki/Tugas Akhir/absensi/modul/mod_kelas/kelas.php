<?php    
  if(empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
    <center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
  }
  else{
    $modul="kelas";
    $aksi="modul/mod_kelas/aksi_kelas.php";
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
                  <div class="col-sm-6">
                    <h5>Data Kelas</h5>
                  </div>
                  <div class="col-sm-6 text-end">
                    <a class="btn btn-pill btn-success btn-air-success" href="?module=<?=$modul?>&act=tambah" type="button" title="btn btn-pill btn-success btn-air-success">Tambah Data</a>
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
                        $data = mysqli_query($koneksi, "SELECT k.*, u.nama FROM kelas as k LEFT JOIN users as u ON k.user_id = u.id");
                        $no=1;
                        while ($row=mysqli_fetch_array($data)){
                          echo "<tr>";
                          echo "<td>$no</td>";
                          echo '<td>'.$row['nama_kelas'].'</td>';
                          echo '<td>'.$row['nama'].'</td>';
                          echo '<td style="text-align:center">';
                              echo '<a href="?module=user_kelas&id='.$row['id'].'" class="btn-info" title="List Peserta" style="padding: 5px; border-radius: 5px; margin: 0 3px;"><span class="fa fa-users"></span></a>';
                              echo '<a href="?module='.$modul.'&act=edit&id='.$row['id'].'" class="btn-primary" title="Ubah" style="padding: 5px; border-radius: 5px; margin: 0 3px;"><span class="fa fa-pencil"></span></a>';
                              echo '<a href="javascript:void(0)" class="btn-danger" title="Hapus" style="padding: 5px; border-radius: 5px; margin: 0 3px;"'; ?> onClick="Swal.fire({title: 'Apakah Kamu Yakin?', text: 'Data yang sudah dihapus tidak akan bisa dikembalikan!', icon: 'warning', showCancelButton: true, cancelButtonColor: '#a927f9', confirmButtonColor: '#dc3545', confirmButtonText: 'Ya, Hapus Data!' }).then((result) => { if (result.isConfirmed) { window.location = '<?=$aksi?>?module=<?=$modul?>&act=hapus&id=<?=$row['id']?>'; }});" ><span class="fa fa-trash-o"></span></a>
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
        ?>
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5>Tambah Data Kelas</h5>
                </div>
                <form class="form theme-form" method="post" action="<?=$aksi?>?module=<?=$modul?>&act=input">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Nama Kelas</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" name="nama_kelas" placeholder="Nama Kelas" required >
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-3 col-form-label">Pengajar</label>
                          <div class="col-sm-9">
                            <select class="js-example-basic-single" name="user_id">
                              <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM users WHERE roles_id=2;");
                                while ($row=mysqli_fetch_array($data)) {
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

      case "edit":
        $rows = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id='".$_GET['id']."'");
        $row = mysqli_fetch_object($rows);
        ?>
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5>Update Data Kelas</h5>
                </div>
                <form class="form theme-form" method="post" action="<?=$aksi?>?module=<?=$modul?>&act=update&id=<?=$_GET['id']?>">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Nama Kelas</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" name="nama_kelas" value="<?=$row->nama_kelas?>" placeholder="Nama Kelas" required >
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-3 col-form-label">Pengajar</label>
                          <div class="col-sm-9">
                            <select class="js-example-basic-single" name="user_id">
                              <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM users WHERE roles_id=2;");
                                while ($list_user=mysqli_fetch_array($data)) {
                                  if($row->user_id == $list_user['id']){
                                    echo '<option value="'.$list_user['id'].'" selected>'.$list_user['kode'].' - '.$list_user['nama'].'</option>';
                                  }
                                  else{
                                    echo '<option value="'.$list_user['id'].'">'.$list_user['kode'].' - '.$list_user['nama'].'</option>';
                                  }
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
