<?php
include '../component/adminSidebar.php';
include '../db.php';
$id=$_GET['id'];
$query = "SELECT * from rak where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);

?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
    <div class="body d-flex justify-content-between">
        <h4>Edit Rak</h4>
    </div>
    <hr>

    <form action="../process/editRakProcess.php" method="post">

<div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">ID</label>
    <input name="id" type="text" class="form-control" value="<?php echo $row['id']?>" readonly >
</div>
<div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Nomor Rak</label>
    <input name="nomorRak" type="number" class="form-control" id="formGroupExampleInput" placeholder="<?php echo $row['nomor']?>" >
</div>
<div class="mb-3">
    <label for="genre" class="form-label">Genre</label>
    <div class="mb-3">
    <select id="genre" name="genre[]" class="form-control" multiple="multiple">
        <option value="" selected><?php echo $row['genre']?></option>
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
<div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Total Buku</label>
    <input name="totalBuku" type="number" class="form-control" id="formGroupExampleInput" placeholder="<?php echo $row['totalBuku']?>" >
</div>
<button type="submit" class="btn btn-success" name="editrak">Edit Rak</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <script>

            $(document).ready(function () {

                $("#genre").select2({

                    placeholder: "<?php echo $row['genre']?>"

                });

            });

        </script>