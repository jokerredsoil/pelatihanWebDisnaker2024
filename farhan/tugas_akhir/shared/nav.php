<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">Monitoring Warehouse</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $active == 'barang' ? 'active' : '' ?>" aria-current="page" href="./">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $active == 'suplier' ? 'active' : '' ?>" href="./suplier.php">Suplier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $active == 'barang_masuk' ? 'active' : '' ?>" href="./barang_masuk.php">Barang Masuk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $active == 'barang_keluar' ? 'active' : '' ?>" href="./barang_keluar.php">Barang Keluar</a>
        </li>
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') {?>
          <li class="nav-item">
            <a class="nav-link <?= $active == 'user' ? 'active' : '' ?>" href="./user.php">User Management</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>