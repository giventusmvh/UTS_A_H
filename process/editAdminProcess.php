<?php
// untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
// $_POST itu method di formnya
session_start();
if (isset($_POST['editadmin'])) {
    // untuk mengoneksikan dengan database dengan memanggil file db.php

    include('../db.php');
    // tampung nilai yang ada di from ke variabel
    // sesuaikan variabel name yang ada di registerPage.php disetiap input
    $id = $_SESSION['user']['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

    if(empty($nama) OR empty($email) OR empty($password)){
        echo
            '<script>
        alert("Edit Admin Failed --> EMPTY INPUT");
        window.location = "../page/adminProfilePage.php"
        </script>';
    }else{ 
        
        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query(
            $con,
            "UPDATE admin SET nama = '".$nama."', email = '".$email."', password = '".$password."' WHERE id  = ".$id.""
        )
            or die(mysqli_error($con));
        // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        if ($query) {
            $queryS = mysqli_query($con,
                    "SELECT * FROM admin WHERE id='$id'")
                        or die(mysqli_error($con)); 

                    $user = mysqli_fetch_assoc($queryS);

                    $_SESSION['user'] = $user;

            echo
            '<script>
    alert("Edit Profile Success");
    window.location = "../page/adminDashboard.php"
    </script>';
        } else {
            echo
            '<script>
    alert("Edit Profile Failed");
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