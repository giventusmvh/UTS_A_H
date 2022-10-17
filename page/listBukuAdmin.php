<?php
include '../component/adminSidebar.php'

?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
    <div class="body d-flex justify-content-between">
        <h4>LIST BUKU</h4>
        <h5>[<a href="./adminProfilePage.php" style="color: black;padding-left: 0px;font-size: 20px;">ADMIN</a>] </h5>
    </div>
    <hr>
    
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Gambar</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($con, "SELECT * FROM buku") or
                die(mysqli_error($con));
            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
            } else {
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                    echo '
<tr>
<th scope="row" style="vertical-align:middle;">' . $no . '</th>
<td style="vertical-align:middle;">' . $data['judul'] . '</td>
<td style="vertical-align:middle;"><img src=../img/bcover/' . $data['cover'] . ' style="height: 220px;width:150px;border-radius:5px"></td>
<td style="vertical-align:middle;">' . $data['jumlah'] . '</td>
<td style="vertical-align:middle;">
<a href="../page/editBukuPage.php?id=' . $data ['id'] . '" onClick="return confirm ( \'Are you sure want to update this data?\')"class="btn btn-sm btn-success">EDIT
</a>
<a href="../process/deleteBukuProcess.php?id=' . $data ['id'] . '" onClick="return confirm ( \'Are you sure want to delete this data?\')"class="btn btn-sm btn-danger">DELETE
</a>
</td>
</tr>';
                    $no++;
                }
            }
            ?>
        </tbody>
    </table>
    
</div>
</aside>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>