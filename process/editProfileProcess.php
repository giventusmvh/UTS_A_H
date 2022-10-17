<?php
// untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
// $_POST itu method di formnya
session_start();
if (isset($_POST['editprofile'])) {
    // untuk mengoneksikan dengan database dengan memanggil file db.php

    include('../db.php');
    // tampung nilai yang ada di from ke variabel
    // sesuaikan variabel name yang ada di registerPage.php disetiap input
    $id = $_SESSION['user']['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $filename = $_FILES["pp"]["name"];
        $tempname = $_FILES["pp"]["tmp_name"];
        $folder = "../img/profilepic/" . $filename;
        
 
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
    if(empty($nama) OR empty($email) OR empty($password) OR empty($filename)){
        echo
            '<script>
        alert("Edit Profile Failed --> EMPTY INPUT");
        window.location = "../page/userProfilePage.php"
        </script>';
    }else{ 
        
        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query(
            $con,
            "UPDATE user SET nama = '".$nama."', email = '".$email."', username = '".$email."', password = '".$password."', gambar = '".$filename."' WHERE id  = ".$id.""
        )
            or die(mysqli_error($con));
        // perintah mysql yang gagal dijalankan ditangani oleh perintah “or die”
        if ($query) {
            $queryS = mysqli_query($con,
                    "SELECT * FROM user WHERE id='$id'")
                        or die(mysqli_error($con)); 

                    $user = mysqli_fetch_assoc($queryS);

                    $_SESSION['user'] = $user;

            echo
            '<script>
    alert("Edit Profile Success");
    window.location = "../page/userProfilePage.php"
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