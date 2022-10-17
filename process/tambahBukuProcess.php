<?php
// untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
// $_POST itu method di formnya
if (isset($_POST['addBuku'])) {
    // untuk mengoneksikan dengan database dengan memanggil file db.php
    include('../db.php');
    // tampung nilai yang ada di from ke variabel
    // sesuaikan variabel name yang ada di registerPage.php disetiap input
    $judul = $_POST['judul'];
    $jumlah = $_POST['jumlah'];
    $filename = $_FILES["cover"]["name"];
        $tempname = $_FILES["cover"]["tmp_name"];
        $folder = "../img/bcover/" . $filename;
        
 
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
    

    if(empty($judul) OR empty($jumlah) OR empty($filename)){
        echo
            '<script>
        alert("Add Buku Failed --> EMPTY INPUT");
        window.location = "../page/tambahBukuPage.php";
        </script>';
    }else{
        $query = mysqli_query(
            $con,
            "INSERT INTO buku(judul,jumlah,cover)
        VALUES
        ('$judul', '$jumlah', '$filename')"
        )
            or die(mysqli_error($con));
        // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        if ($query) {
            echo
            '<script>
        alert("Add Buku Success");
        window.location = "../page/listBukuAdmin.php"
        </script>';
        } else {
            echo
            '<script>
        alert("Add Buku Failed");
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