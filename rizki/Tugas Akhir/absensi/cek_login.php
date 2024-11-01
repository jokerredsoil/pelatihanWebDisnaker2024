<?php
  session_start();

  if(ISSET($_SESSION['login']) && $_SESSION['login']){
    header('location:media.php');
  }
  include "config/koneksi.php";

  $username = $_POST['username'];
  $pass = md5($_POST['password']);

  $login=mysqli_query($koneksi, "SELECT u.*, r.role_name FROM users as u INNER JOIN roles as r ON u.roles_id=r.id WHERE u.username='$username' AND u.password='$pass'");
  $ketemu=mysqli_num_rows($login);
  $r=mysqli_fetch_array($login);

  // Apabila username dan password ditemukan
  if ($ketemu > 0){

    $_SESSION['user_id']      = $r['id'];
    $_SESSION['kode']         = $r['kode'];
    $_SESSION['username']     = $r['username'];
    $_SESSION['namalengkap']  = $r['nama'];
    $_SESSION['roles_id']     = $r['roles_id'];
    $_SESSION['role']         = $r['role_name'];
    $_SESSION['foto']         = $r['foto'];
    
    // session timeout
    $_SESSION['login'] = true;

    // $sid_lama = session_id();
    
    // session_regenerate_id();

    // $sid_baru = session_id();

    // mysql_query("UPDATE users SET id_session='$sid_baru' WHERE username='$username'");
    header('location:media.php');
  }
  else{
    $_SESSION['error']     = 'Username / Password Salah';
    header('location:index.php');
  }
?>
