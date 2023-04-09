<?php
include('server/connection.php');

if (!isset($_SESSION['logged_in'])) {
    echo "<script>
            alert('Anda Belum Login!');
            document.location='login.php';
            </script>";
    exit;
}

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