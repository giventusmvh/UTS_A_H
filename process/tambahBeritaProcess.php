<?php
// untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
// $_POST itu method di formnya
if (isset($_POST['addBerita'])) {
    // untuk mengoneksikan dengan database dengan memanggil file db.php
    include('../db.php');
    // tampung nilai yang ada di from ke variabel
    // sesuaikan variabel name yang ada di registerPage.php disetiap input
    $judul = $_POST['judul'];
    $isi = trim($_POST['isi']);
    $filename = $_FILES["gambar"]["name"];
        $tempname = $_FILES["gambar"]["tmp_name"];
        $folder = "../img/news/" . $filename;
        
 
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
    

    if(empty($judul) OR empty($isi) OR empty($filename)){
        echo
            '<script>
        alert("Add Berita Failed --> EMPTY INPUT");
        window.location = "../page/tambahBeritaPage.php";
        </script>';
    }else{
        $query = mysqli_query(
            $con,
            "INSERT INTO Berita(judul,isi,gambar)
        VALUES
        ('$judul', '$isi', '$filename')"
        )
            or die(mysqli_error($con));
        // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        if ($query) {
            echo
            '<script>
        alert("Add Berita Success");
        window.location = "../page/adminDashboard.php"
        </script>';
        } else {
            echo
            '<script>
        alert("Add Berita Failed");
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