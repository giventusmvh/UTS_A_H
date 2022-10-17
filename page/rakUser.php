<?php
include '../component/userSidebar.php'

?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px
solid black; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,
0.19);">
    <div style="display: flex; justify-content:space-between">
            <h4>RAK BUKU</h4>

        </div>
    <hr>
    
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Rak</th>
                <th scope="col">Genre</th>
                <th scope="col">Total Buku</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($con, "SELECT * FROM rak") or
                die(mysqli_error($con));
            if (mysqli_num_rows($query) == 0) {
                echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
            } else {
                $no = 1;
                while ($data = mysqli_fetch_assoc($query)) {
                    echo '
<tr>
<th scope="row" style="vertical-align:middle;">' . $no . '</th>
<td style="vertical-align:middle;">' . $data['nomor'] . '</td>
<td style="vertical-align:middle;">' . $data['genre'] . '</td>
<td style="vertical-align:middle;">' . $data['totalBuku'] . '</td>
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