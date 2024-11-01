<?php
require_once "../koneksi.php";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Username already taken.";
    } else {
        echo "Username available.";
    }
}
?>
