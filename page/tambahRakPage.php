<?php
include '../component/adminSidebar.php'

?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
    <div class="body d-flex justify-content-between">
        <h4>Tambah Rak</h4>
    </div>
    <hr>
    
    
    <form action="../process/addRakProcess.php" method="post">
  <div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Nomor Rak</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="rak" name="nomorRak" placeholder="Masukan nomor rak">
    </div>
  </div>
  <div class="row mb-3">
    <label for="genre" class="col-sm-2 col-form-label">Genre</label>
    <div class="col-sm-10">
    <select id="genre" name="genre[]" class="form-control" multiple="multiple">
        <option value="Action">Action</option>
        <option value="Adventure">Adventure</option>
        <option value="Anime">Anime</option>
        <option value="Comedy">Comedy</option>
        <option value="Drama">Drama</option>
        <option value="Fantasy">Fantasy</option>
        <option value="Slice of Life">Slice of life</option>
        <option value="Romance">Romance</option>
  </select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="totalBuku" class="col-sm-2 col-form-label">Total Buku</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="totalBuku" name="totalBuku" placeholder="totalBuku">
    </div>
  </div>
  <button type="submit" class="btn btn-success" name="addrak">Add Rak</button>
</form>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <script>

            $(document).ready(function () {

                $("#genre").select2({

                    placeholder: " genre"

                });

            });

        </script>
</body>

</html>