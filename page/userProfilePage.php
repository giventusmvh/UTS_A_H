<?php
include '../component/userSidebar.php'
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
<div class="body d-flex justify-content-between">
        <h4>Profile Page</h4>
    </div>
    <hr>
<div class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
          <div style="height: 368px">
          <img class="profile_img" src="../img/profilepic/<?php echo $_SESSION['user']['gambar']; ?>" style="height: 368px;width:350px;border-radius:10px">
        </div>
            <br>
            <h3><?php echo $_SESSION['user']['nama']?></h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Nama:</strong><?php echo $_SESSION['user']['nama']; ?></p>
            <p class="mb-0"><strong class="pr-1">Username:</strong><?php echo $_SESSION['user']['username']; ?></p>
            <p class="mb-0"><strong class="pr-1">Email:</strong><?php echo $_SESSION['user']['email']; ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
          <div style="height: 20px"></div>
            <h3 class="mb-0">Edit Profile</h3>
          </div>
          <div class="card-body pt-0">
          <form action="../process/editProfileProcess.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
              <label for="ids" class="form-label">ID</label>
              <input name="id" type="text" class="form-control" id="ids" value="<?php echo $_SESSION['user']['id']?>" readonly >
          </div>
          <div class="mb-3">
              <label for="nama" class="form-label">Name</label>
              <input name="nama" type="text" class="form-control" id="nama" value="<?php echo $_SESSION['user']['nama']?>"  >
          </div>
          <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input name="email"  type="text" class="form-control" id="email" value="<?php echo $_SESSION['user']['email']?>"  >
          </div>
          <div class="mb-3">
              <label for="pass" class="form-label">Password</label>
              <input name="password" type="password" class="form-control" id="pass" value="" placeholder="Masukan password"  >
          </div>
          <div class="mb-3">
              <label for="inputPic" class="form-label">Profile Picture</label><br>
              <input type="file" id="inputPic" class="form-control" name="pp" require>
          </div>
          <button type="submit" class="btn btn-success float-end" name="editprofile">Edit Profile</button>
          </form>
          </div>
        </div>
          
        
      </div>
    </div>
  </div>
</div>


</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
