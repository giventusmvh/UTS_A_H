<?php
 session_start();
if (!$_SESSION['isLogin']) {
header("location: ../page/adminLoginPage.php");
}else {
include('../db.php');
}
echo '

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://kit.fontawesome.com/4f4c0ea79d.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-
EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/4.7.0/css/font-awesome.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet" />
    <title>Admin Dashboard</title>
    <style>
      * {
        font-family: "Poppins";
      }
      .side-bar {
        width: 260px;
        background-color: black;
        min-height: 100vh;
      }
      a {
        padding-left: 10px;
        font-size: 13px;
        text-decoration: none;
        color: white;
      }
      .menu i {
        padding-left: 20px;
      }
      .menu .content-menu {
        padding: 9px 7px;
      }
      .isActive {
        background-color: #071853 !important;
        border-right: 8px solid #010e2f;
      }
      td,th{
        text-align:center;
      }
      i {
        color: white;
      }
    </style>
  </head>
  <body>
    <aside>
      <div class="d-flex">
        <div class="side-bar">
        <br>
          <h2 class="text-light text-center pt-2">Admin</h2>
          <hr style="color:white"/>
          <div class="menu">
          <div class="content-menu">
          <i class="fa-regular fa-newspaper"></i>
              <a href="./adminDashboard.php" style="font-weight: 600">&nbspNews</a>
            </div>
            <div class="content-menu">
              <i class="fa-solid fa-user"></i>
              <a href="./adminProfilePage.php" style="font-weight: 600">&nbspProfile</a>
            </div>
            <div class="content-menu">
            <i class="fa-solid fa-book"></i>
              <a href="./listBukuAdmin.php" style="font-weight: 600">&nbspList Buku</a>
            </div>
            <div class="content-menu">
            <i class="fa-solid fa-users"></i>
              <a href="./listPeminjamPage.php" style="font-weight: 600">Peminjam</a>
            </div>
            <div class="content-menu">
              <i class="fa-solid fa-plus"></i>
              <a href="./tambahBukuPage.php" style="font-weight: 600">&nbspTambah Buku</a>
            </div>
            <div class="content-menu">
            <i class="fa-solid fa-book"></i>
              <a href="./rakAdmin.php" style="font-weight: 600">&nbspRak Buku</a>
            </div>
            <div class="content-menu">
              <i class="fa fa-sign-out"></i>
              <a href="../process/logoutProcess.php" style="font-weight: 600">&nbspLogout</a>
            </div>
            <hr />
          </div>
        </div>'

        ?>
      
