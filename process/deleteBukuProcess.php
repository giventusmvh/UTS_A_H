<?php
session_start();
if (isset($_GET['id'])) {
    include('../db.php');
    $id = $_GET['id'];
    $query =  mysqli_query($con,"SELECT * FROM peminjaman WHERE idBuku='$id' AND status='Dipinjam'");
    $cek = mysqli_num_rows($query);
    
    if ($cek==0) {
        $queryDelete = mysqli_query($con, "DELETE FROM buku WHERE id='$id'") or
            die(mysqli_error($con));
            if($queryDelete){
                echo
            '<script>
                alert("Delete Success"); window.location = "../page/listBukuAdmin.php"
            </script>';
            }else{
                echo
                'alert("Delete Failed")';
            } 
    } else {
        echo
        '<script>
alert("Delete gagal, masih ada yang meminjam buku"); window.location = "../page/listBukuAdmin.php"
</script>';
    }
} else {
    echo
    '<script>
window.history.back()
</script>';
}
?>