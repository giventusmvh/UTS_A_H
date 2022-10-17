<?php
include '../component/adminSidebar.php';
include '../db.php';
$id=$_GET['id']; 
$result = mysqli_query($con, "SELECT * from buku where id='$id'") or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);

?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
<div class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
          <div style="height: 450px">
          <img src="../img/bcover/<?php echo $row['cover']; ?>" style="height: 450px;width:320px;border-radius:5px;margin:auto">
        </div>
          
          </div>
          
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
          <div style="height: 20px"></div>
            <h3 class="mb-0">Edit Buku</h3>
          </div>
          <div class="card-body pt-0">
          <form action="../process/editBukuProcess.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">ID</label>
            <input name="id" type="text" class="form-control" value="<?php echo $row['id']?>" readonly >
        </div>
        <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Judul Buku</label>
              <input name="judul" type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $row['judul']?>"  >
        </div>
        <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Jumlah</label>
              <input name="jumlah"  type="number" class="form-control" id="formGroupExampleInput" value="<?php echo $row['jumlah']?>"  >
        </div>
        <div class="mb-3">
              <label for="inputPic" class="form-label">Cover Buku</label><br>
              <input type="file" id="inputPic" class="form-control" name="cover" value="<?php echo $row['cover']?>" require>
        </div>
        <div class="float-end">
          <button type="submit" class="btn btn-success" name="editBuku">Edit Buku</button>
          <a href="../page/listBukuAdmin.php" class="btn btn-danger">Cancel</a>
        </div>
        
    </form>
          </div>
        </div>
          
        
      </div>
    </div>
  </div>
    </div>
</div>