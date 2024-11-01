<?php    
  if(empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
    echo "<link href='style.css' rel='stylesheet' type='text/css'>
    <center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
  }
  else{
    $modul="user";
    $aksi="modul/mod_user/aksi_user.php";
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
                        <th>Kode</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Role</th>
                        <th style="text-align:center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $data = mysqli_query($koneksi, "SELECT u.*, r.role_name FROM users as u LEFT JOIN roles as r ON u.roles_id = r.id;");
                        $no=1;
                        while ($row=mysqli_fetch_array($data)){
                          echo "<tr>";
                          echo "<td>$no</td>";
                          echo '<td>'.$row['kode'].'</td>';
                          echo '<td>'.$row['username'].'</td>';
                          echo '<td>'.$row['nama'].'</td>';
                          echo '<td>'.$row['role_name'].'</td>';
                          echo '<td style="text-align:center">';
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
                  <h5>Tambah Data User</h5>
                </div>
                <form class="form theme-form" method="post" action="<?=$aksi?>?module=<?=$modul?>&act=input" enctype='multipart/form-data'>
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input class="form-control <?php if(ISSET($_SESSION['error_username']) && $_SESSION['error_username'] != NULL){ echo 'is-invalid'; } ?>" type="text" name="username" placeholder="Username" required >
                            <?php
                              if(ISSET($_SESSION['error_username']) && $_SESSION['error_username'] != NULL){
                                ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?=$_SESSION['error_username']?></strong>
                                  </span>
                                <?php
                                unset($_SESSION['error_username']);
                              }
                            ?>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="password" name="password" placeholder="Password" required >
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Nama</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required >
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Tentang Kamu</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="about" rows="5" cols="5" placeholder="Ceritakan Tentang Kamu"></textarea>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Kota Lahir</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" name="kota_lahir" placeholder="Kota" required >
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="date" name="tanggal_lahir" placeholder="DD/MM/YYYY" required >
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Alamat</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="alamat" rows="5" cols="5" placeholder="Alamat Lengkap"></textarea>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Foto</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="file" name="file_foto" >
                            <span class="text-primary">Upload Foto Bila Ingin Dirubah</span>
                          </div>
                        </div>
                        <div class="row">
                          <label class="col-sm-3 col-form-label">Role</label>
                          <div class="col-sm-9">
                            <select class="js-example-basic-single" name="roles_id">
                              <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM roles;");
                                while ($row=mysqli_fetch_array($data)) {
                                  echo '<option value="'.$row['id'].'">'.$row['role_name'].'</option>';
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
        if(ISSET($_GET['id'])){
          $sql = "SELECT * FROM users WHERE id='".$_GET['id']."'";
          $action = $aksi.'?module='.$modul.'&act=update&id='.$_GET['id'];
        }
        else{
          $sql = "SELECT * FROM users WHERE id='".$_SESSION['user_id']."'";
          $action = $aksi.'?module='.$modul.'&act=update';
        }
        
        $rows = mysqli_query($koneksi, $sql);
        $row = mysqli_fetch_object($rows);
        ?>
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h5>Update Data User</h5>
                </div>
                <form class="form theme-form" method="post" action="<?=$action?>" enctype='multipart/form-data'>
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Username</label>
                          <div class="col-sm-9">
                            <input class="form-control <?php if(ISSET($_SESSION['error_username']) && $_SESSION['error_username'] != NULL){ echo 'is-invalid'; } ?>" type="text" name="username" value="<?=$row->username?>" placeholder="Username" required >
                            <?php
                              if(ISSET($_SESSION['error_username']) && $_SESSION['error_username'] != NULL){
                                ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?=$_SESSION['error_username']?></strong>
                                  </span>
                                <?php
                                unset($_SESSION['error_username']);
                              }
                            ?>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Password</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="password" name="password" placeholder="Kosongkan bila tidak mau dirubah" >
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Nama</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" name="nama" value="<?=$row->nama?>" placeholder="Nama Lengkap" required >
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Tentang Kamu</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="about" rows="5" cols="5" placeholder="Ceritakan Tentang Kamu"><?=$row->about?></textarea>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Kota Lahir</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="text" name="kota_lahir" value="<?=$row->kota_lahir?>" placeholder="Kota" required >
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="date" name="tanggal_lahir" value="<?=$row->tanggal_lahir?>" placeholder="DD/MM/YYYY" required >
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Alamat</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" name="alamat" rows="5" cols="5" placeholder="Alamat Lengkap"><?=$row->alamat?></textarea>
                          </div>
                        </div>
                        <div class="mb-3 row">
                          <label class="col-sm-3 col-form-label">Foto</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="file" name="file_foto" >
                            <span class="text-primary">Upload Foto Bila Ingin Dirubah</span>
                          </div>
                        </div>
                        <?php
                          if($_SESSION['roles_id'] == 1){
                            ?>
                              <div class="row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                  <select class="js-example-basic-single" name="roles_id">
                                    <?php
                                      $data = mysqli_query($koneksi, "SELECT * FROM roles;");
                                      while ($list_role=mysqli_fetch_array($data)) {
                                        if($row->roles_id == $list_role['id']){
                                          echo '<option value="'.$list_role['id'].'" selected>'.$list_role['role_name'].'</option>';
                                        }
                                        else{
                                          echo '<option value="'.$list_role['id'].'">'.$list_role['role_name'].'</option>';
                                        }
                                      }
                                    ?>
                                  </select>
                                </div>
                              </div>
                            <?php
                          }
                        ?>                          
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
