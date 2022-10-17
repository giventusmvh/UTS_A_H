<?php
include '../component/adminSidebar.php'

?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
<div class="body d-flex justify-content-between">
        <h4>Add Book Page</h4>
    </div>
    <hr>
    <form action="../process/tambahBukuProcess.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Judul Buku</label>
              <input name="judul" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Judul Buku"  >
          </div>
          <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Jumlah</label>
              <input name="jumlah"  type="number" class="form-control" id="formGroupExampleInput" placeholder="Masukan Jumlah Buku"  >
          </div>
          <div class="mb-3">
              <label for="inputPic" class="form-label">Cover Buku</label><br>
              <input type="file" id="inputPic" class="form-control" name="cover" require>
          </div>
          <button type="submit" class="btn btn-success" name="addBuku">Tambah Buku</button>
          </form>
</div>