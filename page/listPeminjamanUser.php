<?php
include '../component/userSidebar.php'

?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
    <div class="body d-flex justify-content-between">
        <h4>LIST BUKU PINJAMAN</h4>
        <h5> USER [<a href="./UserProfilePage.php" style="color: black;padding-left: 0px;font-size: 20px;"><?php echo $_SESSION['user']['nama']?></a>] </h5>
    </div>
    <hr>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Gambar</th>
                <th scope="col">Status</th>
                <th scope="col">Batas Tanggal Kembali</th>
                <th scope="col">Pengembalian Buku</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nama = $_SESSION['user']['nama'];
            $query = mysqli_query($con, "SELECT idp, idUser, idBuku, judul, cover, status, tglKembali FROM Peminjaman 
            JOIN buku ON buku.id = peminjaman.idBuku
            JOIN user ON user.id = peminjaman.idUser
            WHERE user.nama = '$nama'") or
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
<td style="vertical-align:middle;">' . $data['status'] . '</td>
<td style="vertical-align:middle;">' . $data['tglKembali'] . '</td>
<td style="vertical-align:middle;">';
if ($data['status']!= "Dipinjam") {
    echo "<p>SELESAI</p>";
}else{
    echo '<a href="../process/pengembalianProcess.php?id=' . $data ['idp'] ."&idBuku=" . $data['idBuku'] . '" onClick="return confirm ( \'Ingin mengembalikan buku ini?\')" class="btn btn-sm btn-primary">Kembalikan
    </a>
    </td>
    </tr>';
}

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