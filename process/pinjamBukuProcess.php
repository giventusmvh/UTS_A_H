<?php
session_start();
include "../db.php";

$idBuku = $_POST['id'];
$idUser = $_SESSION['user']['id'];
$tglPinjam = $_POST['tglPinjam'];
$tglKembali = $_POST['tglKembali'];
$status = "Dipinjam";
$peminjam=$_SESSION['user']['email'];

$query = "INSERT INTO peminjaman(idBuku, idUser, tglPinjam, tglKembali, status,peminjam) 
            VALUES ('$idBuku','$idUser','$tglPinjam','$tglKembali','$status','$peminjam')";

$result1 = mysqli_query($con, $query);

if ($result1) {
    $stokUpdate = "UPDATE buku SET jumlah = jumlah - 1 WHERE id='$idBuku' ";
    $result2 = mysqli_query($con, $stokUpdate);
    echo
        '<script>
            alert("Berhasil Pinjam Buku"); window.location = "../page/listPeminjamanUser.php"
        </script>';
}

?>