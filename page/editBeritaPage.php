<?php
include '../component/adminSidebar.php';
include '../db.php';
$id=$_GET['id']; 
$result = mysqli_query($con, "SELECT * from berita where id='$id'") or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
<div class="body d-flex justify-content-between">
        <h4>Edit Berita</h4>
    </div>
    <hr>
    <div style="display:flex;justify-content:center">
          <img class="profile_img" src="../img/news/<?php echo $row['gambar']; ?>" style="height: 220px;width:220px;border-radius:10px">
        </div>
    <form action="../process/editBeritaProcess.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">ID Berita</label>
              <input name="id" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $row['id']?>"  readonly>
          </div>
          <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Judul Berita</label>
              <input name="judul" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $row['judul']?>"  >
          </div>
          <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Isi</label>
              <textarea class="form-control" id="floatingTextarea" name="isi"><?php echo $row['isi']?></textarea>
          </div>
          <div class="mb-3">
              <label for="inputPic" class="form-label">Cover Berita</label><br>
              <input type="file" id="inputPic" class="form-control" name="gambar" require>
          </div>
          <button type="submit" class="btn btn-success" name="editBerita">Tambah Berita</button>
          </form>
</div>