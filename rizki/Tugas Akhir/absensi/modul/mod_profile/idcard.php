<?php
    require('../../config/fpdf/fpdf.php');
    require('../../config/koneksi.php');

    $fpdf = new FPDF();

    $rows = mysqli_query($koneksi, "SELECT * FROM users WHERE id='".$_GET['id']."'");
    $user = mysqli_fetch_object($rows);

    $titik_awal_x = 19;
    $titik_awal_y = 5;

    $x = 1;
    $image_x = $titik_awal_x;
    $image_y = $titik_awal_y;

    $fpdf->AddPage("mm", [93,93]);
    $fpdf->Image('../../assets/id_card_asset/blkng.jpg', 0, 2, 300);

    $fpdf->Image('../../assets/foto/' . $user->foto, ($image_x + 3.3), ($image_y + 19.8), 26.6);

    $fpdf->Image('../../assets/id_card_asset/depan ckm nametag.png', $image_x, $image_y, 55);

    $fpdf->SetFont('Arial', '', 8);
    $fpdf->SetY(($image_y + 49));
    $fpdf->SetX(($image_x + 3.3));
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->MultiCell(44, 5, $user->nama, 0, 'L', FALSE);

    $fpdf->SetY(($image_y + 53));
    $fpdf->SetX(($image_x + 3.3));
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->MultiCell(44, 5, $user->kode, 0, 'L', FALSE);

    $fpdf->Image('../../assets/qrcode/' . $user->kode . '.png', ($image_x + 33), ($image_y + 63), 16.5);

    $fpdf->AddPage("mm", [95, 95]);
    $fpdf->Image('../../assets/id_card_asset/blkng.jpg', 0, 2, 300);
    $fpdf->SetAutoPageBreak(false);

    $fpdf->Image('../../assets/id_card_asset/belakang ckm nametag.jpg', $image_x, $image_y, 55);

    $fpdf->SetFont('Arial', '', 8);
    $fpdf->SetY(($image_y + 19));
    $fpdf->SetX(($image_x + 5.3));
    $fpdf->SetTextColor(0, 0, 0);
    $fpdf->MultiCell(44, 5, "Barang siapa yang menemukan kartu ini harap dikembalikan ke Dinas Ketenagakerjaan Kota Bandung", 0, 'C', FALSE);

    $fpdf->SetX(($image_x + 5.3));
    $fpdf->MultiCell(44, 5, "disnaker.bandung.go.id", 0, 'C', FALSE);


    $fpdf->Output('D','Name Card '.$user->nama.'.pdf');
?>