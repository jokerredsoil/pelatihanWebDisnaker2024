<?php
require_once "../../koneksi_login.php";

session_destroy();

header("Location: ../../login.php?pesan=Berhasil-Logout");