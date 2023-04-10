<?php
include('server/connection.php');

$hapus = mysqli_query($conn, "DELETE FROM tugas WHERE idTugas = '$_GET[idTugas]'");
if($hapus){
    echo "<script>
    alert('Berhasil Menghapus Tugas!');
    document.location='list_tugas.php';
    </script>";
} else {
    echo "<script>
    alert('Gagal Menghapus Tugas!');
    document.location='list_tugas.php';
    </script>";
}
?>