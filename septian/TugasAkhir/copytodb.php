<?php
// Inisialisasi cURL
$curl = curl_init();

// Atur opsi
curl_setopt($curl, CURLOPT_URL, "https://api.jikan.moe/v4/top/anime"); // URL yang ingin diakses
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Kembalikan respons sebagai string

// Eksekusi permintaan
$response = curl_exec($curl);

// Periksa kesalahan
if (curl_errno($curl)) {
    echo 'cURL Error: ' . curl_error($curl);
} else {
    // Tampilkan respons
    $res = json_decode($response);
    echo "<pre>";
    print_r($res->data);
}

// Tutup cURL
curl_close($curl);




?>