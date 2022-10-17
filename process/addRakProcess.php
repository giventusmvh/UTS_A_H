<?php
// untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
// $_POST itu method di formnya
if (isset($_POST['addrak'])) {
    // untuk mengoneksikan dengan database dengan memanggil file db.php
    include('../db.php');
    // tampung nilai yang ada di from ke variabel
    // sesuaikan variabel name yang ada di registerPage.php disetiap input
    $nomorRak = $_POST['nomorRak'];
    $genre = $_POST['genre'];
    $totalBuku = $_POST['totalBuku'];
    

    if(empty($nomorRak) OR empty($genre) OR empty($totalBuku)){
        echo
            '<script>
        alert("Add Rak Failed --> EMPTY INPUT");
        window.location = "../page/tambahRakPage.php";
        </script>';
    }else{
        $str="";

        foreach ($genre as $stringGenre) {
            $str.= $stringGenre;
            $str.= ", ";
        }
        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query(
            $con,
            "INSERT INTO rak(nomor, genre, totalBuku)
        VALUES
        ('$nomorRak', '$str', '$totalBuku')"
        )
            or die(mysqli_error($con));
        // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        if ($query) {
            echo
            '<script>
        alert("Add Rak Success");
        window.location = "../page/rakAdmin.php"
        </script>';
        } else {
            echo
            '<script>
        alert("Add Rak Failed");
        </script>';
        }
    }
    
} else {
    echo
    '<script>
window.history.back()
</script>';
}
?>