<?php
$host = 'localhost'; //localhost ; 127.0.0.1
$user = 'root';
$passw = '';
$db = 'db_warga';

$conn = mysqli_connect($host,$user,$passw,$db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "<script type='text/javascript'>alert('DB succesfully connected');</script>";
}


// mysqli_fetch_row()
// $datas = mysqli_fetch_row($result);

// mysqli_fetch_assoc()
// $datas = mysqli_fetch_assoc($result);

function myquery($query){
    global $conn;

    $result = mysqli_query($conn,$query);

    $list = [];

    while ($datas = mysqli_fetch_assoc($result)) {
       $list[] = $datas;

     }
    return $list;
}




// mysqli_fetch_array()
// mysqli_fetch_object()
?>