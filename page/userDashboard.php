<?php
include '../component/userSidebar.php'
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
        <div style="display: flex; justify-content:space-between">
            <h4>BERITA SINGKAT</h4>
        </div>
    
    <hr>
    <div class="body d-flex flex-md-wrap">


    <?php
        $query = mysqli_query($con, "SELECT * FROM berita") or
        die(mysqli_error($con));
    if (mysqli_num_rows($query) == 0) {
        echo '<tr> <td colspan="7"> Tidak ada berita </td> </tr>';
    }else{
        while ($data = mysqli_fetch_assoc($query)) {
        echo '
        
        <div class="card ms-3 mb-5" style="width: 18rem; display:flex">
        <img class="card-img-top" src=../img/news/' . $data['gambar'] . ' style="width=30px; height:240px" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title fw-bold">' . $data['judul'] . '</h5>
                <p class="cardtext">' . $data['isi'] . '</p>
            </div>
        </div>
        
        ';
        }
    }
    ?>
    </div>
    
</div>
</aside>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>