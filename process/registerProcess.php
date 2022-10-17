<?php
// untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
// $_POST itu method di formnya
if (isset($_POST['register'])) {
    // untuk mengoneksikan dengan database dengan memanggil file db.php
    include('../db.php');
    // tampung nilai yang ada di from ke variabel
    // sesuaikan variabel name yang ada di registerPage.php disetiap input
    $tes = $_POST['email'];
    $result = mysqli_query($con,"SELECT id FROM user WHERE email = '$tes'")or die(mysqli_error($con));
    if($result->num_rows == 0) {
        //bila data tidak ditemukan (row dengan email yang sama tidak ditemukan)
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nama = $_POST['nama'];

        $filename = $_FILES["pp"]["name"];
        $tempname = $_FILES["pp"]["tmp_name"];
        $folder = "../img/profilepic/" . $filename;
        
 
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }

        if(empty($email) OR empty($password) OR empty($filename) OR empty($nama) OR empty($password)){
            echo
            '<script>
            alert("Register Failed --> EMPTY INPUT");
            window.location = "../page/registerPage.php"
            </script>';
        }else{
                   // Melakukan insert ke databse dengan query dibawah ini
        $query = "INSERT INTO user (email, gambar, password, username, nama) 
        VALUES ('$email','$filename','$password','$email', '$nama')";
    // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
    if (mysqli_query($con, $query)) {
        echo
        '<script>
        alert("Register Success");
        window.location = "../page/loginPage.php"
        </script>';
    } else {
        echo
        '<script>
        alert("Register Failed");
        </script>';
    }
        }
         
    }else{
        //bila data ditemukan (row dengan email yang sama ditemukan)
        echo '<script>
        alert("Register Failed (Email tidak unik)");
        window.location = "../page/registerPage.php"
        </script>';

        
    }
    
} else {
    echo
    '<script>
window.history.back()
</script>';
}
?>