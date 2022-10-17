<?php
include '../component/userSidebar.php';
include '../db.php';
$id=$_GET['id'];
$query = "SELECT * from buku where id='$id'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error($con));
$row = mysqli_fetch_assoc($result);
$tglPinjam = date("Y-m-d");
$tglKembali =  date("Y-m-d", strtotime('+7 days'));


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
          <div style="height: 538px">
          <img src="../img/bcover/<?php echo $row['cover']; ?>" style="height: 538px;width:350px;border-radius:5px;margin:auto">
        </div>
          
          </div>
          
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
          <div style="height: 20px"></div>
            <h3 class="mb-0">Pinjam Buku</h3>
          </div>
          <div class="card-body pt-0">
          <form action="../process/pinjamBukuProcess.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="ids" class="form-label">ID</label>
            <input id="ids" name="id" type="text" class="form-control" value="<?php echo $row['id']?>" readonly >
        </div>
        <div class="mb-3">
              <label for="judul" class="form-label">Judul Buku</label>
              <input name="judul" type="text" class="form-control" id="judul" value="<?php echo $row['judul']?>" readonly >
        </div>
        <div class="mb-3">
              <label for="jumlah" class="form-label">Jumlah</label>
              <input name="jumlah"  type="number" class="form-control" id="jumlah" value="<?php echo $row['jumlah']?>"  readonly>
        </div>
        <div class="mb-3">
              <label for="tglPinjam" class="form-label">Tanggal Peminjaman</label>
              <input name="tglPinjam"  type="date" class="form-control" id="tglPinjam" value="<?php echo $tglPinjam?>" readonly>
        </div>
        <div class="mb-3">
              <label for="tglKembali" class="form-label">Batas Tanggal Kembali</label>
              <input name="tglKembali"  type="date" class="form-control" id="tglKembali" value="<?php echo $tglKembali ?>" readonly>
        </div>
        <div class="float-end">
        <button type="submit" class="btn btn-success" name="editBuku">Pinjam Buku</button>
        <a href="../page/listBukuUser.php" class="btn btn-danger">Cancel</a>
        </div>
        
    </form>
          </div>
        </div>
          
        
      </div>
    </div>
  </div>
    </div>
</div>