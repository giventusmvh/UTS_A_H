<?php

include "../db.php";

$id = $_GET['id'];
$idBuku = $_GET['idBuku'];

$query = "UPDATE peminjaman SET status = 'Sudah Dikembalikan' WHERE idp = '$id'";

$result1 = mysqli_query($con, $query);



if ($result1) {
    $stokUpdate = "UPDATE buku SET jumlah = jumlah + 1 WHERE id='$idBuku' ";
    $result2 = mysqli_query($con, $stokUpdate);
    echo
        '<script>alert("Pengembalian Success"); window.location = "../page/listPeminjamanUser.php"
        </script>';
}

?>