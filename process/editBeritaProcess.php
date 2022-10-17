<?php
// untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
// $_POST itu method di formnya
session_start();
if (isset($_POST['editBerita'])) {
    // untuk mengoneksikan dengan database dengan memanggil file db.php

    include('../db.php');
    // tampung nilai yang ada di from ke variabel
    // sesuaikan variabel name yang ada di registerPage.php disetiap input
    $id=$_REQUEST['id'];
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
        alert("Edit Berita Failed --> EMPTY INPUT");
        window.location = "../page/adminDashboard.php"
        </script>';
    }else{ 
        
        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query(
            $con,
            "UPDATE Berita SET judul = '".$judul."', isi = '".$isi."', gambar = '".$filename."' WHERE id  = ".$id.""
        )
            or die(mysqli_error($con));
        // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        if ($query) {

            echo
            '<script>
    alert("Edit Berita Success");
    window.location = "../page/adminDashboard.php"
    </script>';
        } else {
            echo
            '<script>
    alert("Edit Berita Failed");
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