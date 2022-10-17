<?php
include '../component/adminSidebar.php'

?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
<div class="body d-flex justify-content-between">
        <h4>Tambah Berita</h4>
    </div>
    <hr>
    <form action="../process/tambahBeritaProcess.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Judul Berita</label>
              <input name="judul" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukan Judul Berita"  >
          </div>
          <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Isi</label>
              <textarea class="form-control" placeholder="Masukan isi berita" id="floatingTextarea" name="isi"></textarea>
          </div>
          <div class="mb-3">
              <label for="inputPic" class="form-label">Cover Berita</label><br>
              <input type="file" id="inputPic" class="form-control" name="gambar" require>
          </div>
          <button type="submit" class="btn btn-success" name="addBerita">Tambah Berita</button>
          </form>
</div>