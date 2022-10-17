<?php
//username/email:admin
//password : admin
include '../db.php';

$email = $_POST['email'];
$pass = md5($_POST['password']);

$result = mysqli_query($con, "SELECT * FROM admin WHERE email='$email' AND password='$pass'");

$cek = mysqli_num_rows($result);

if ($cek > 0) {
    $user = mysqli_fetch_assoc($result);
	session_start();
	$_SESSION['isLogin'] = true;
    $_SESSION['user'] = $user;
    echo
    '<script>
        alert("Login Success"); window.location = "../page/listBukuAdmin.php"
    </script>';

} else{
	echo
        '<script>
        alert("Email or Password Invalid"); window.location = "../page/adminLoginPage.php"
        </script>';
}

?>