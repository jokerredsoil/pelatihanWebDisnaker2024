<?php
require_once "../koneksi.php";

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "Email already taken.";
    } else {
        echo "Email available.";
    }
}
?>
