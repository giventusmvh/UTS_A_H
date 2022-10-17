<?php
include '../component/adminSidebar.php'

?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
    <div class="body d-flex justify-content-between">
        <h4>LIST PEMINJAM BUKU</h4>
    </div>
    <hr>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Gambar</th>
                <th scope="col">Email List Peminjam</th>
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
                    $id=$data['id'];
                    $queryUser=mysqli_query($con,"SELECT peminjam, status from peminjaman where idBuku=$id AND status='Dipinjam'");
                    echo '
<tr>
<th scope="row" style="vertical-align:middle;">' . $no . '</th>
<td style="vertical-align:middle;">' . $data['judul'] . '</td>
<td style="vertical-align:middle;"><img src=../img/bcover/' . $data['cover'] . ' style="height: 220px;width:150px;border-radius:5px"></td>
<td style="vertical-align:middle;">';
if (mysqli_num_rows($queryUser) == 0) {
    echo '<p> Tidak ada data peminjam </p>';
} else {
    $queryUser2=mysqli_query($con,"SELECT peminjam, status from peminjaman where idBuku=$id AND status='Dipinjam'");
        while ($list=mysqli_fetch_assoc($queryUser)) {
            if ($list['status']!= "Dipinjam") {
                echo "<p>SELESAI</p>";
            }else{
                while ($list2=mysqli_fetch_assoc($queryUser2)) {
                echo'
                <div style="text-align: center;">
                    <ul style="
                    display: inline-block;
                    padding-left: 0;
                    text-align: left;">
                        <li>' . $list2['peminjam'] . '</li>
                    </ul>
                </div>
                    
                    '; 
                }
            }
            
        }
    echo '</td>
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