<?php
session_start();
include('server/connection.php');

if (!isset($_SESSION['logged_in'])) {
    echo "<script>
            alert('Anda Belum Login!');
            document.location='login.php';
            </script>";
    exit;
}

$judulEdit = "";
$deskripsiEdit = "";
$deadlineEdit = "";
$statusEdit = "";

$tugas = mysqli_query($conn, "SELECT * FROM tugas WHERE idTugas = '$_GET[idTugas]'");
$data = mysqli_fetch_array($tugas);
if ($data) {
    $judulEdit = $data['judul'];
    $deskripsiEdit = $data['deskripsi'];
    $deadlineEdit = $data['deadline'];
    $statusEdit = $data['status'];
}

if (isset($_POST['editTugas_btn'])) {
    $idUser = $_SESSION['idUser'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    $edit_tugas = "UPDATE tugas SET judul = ?, deskripsi = ?, deadline = ?, status = ? WHERE idTugas = '$_GET[idTugas]'";

    $stmt_edit_tugas = $conn->prepare($edit_tugas);
    $stmt_edit_tugas->bind_param('ssss', $judul, $deskripsi, $deadline, $status);

    if ($stmt_edit_tugas->execute()) {

        $_SESSION['idUser'] = $idUser;
        $_SESSION['judul'] = $judul;
        $_SESSION['deskripsi'] = $deskripsi;
        $_SESSION['deadline'] = $deadline;
        $_SESSION['status'] = $status;
        
        echo "<script>
            alert('Berhasil Mengupdate Tugas!');
            document.location='list_tugas.php';
            </script>";
    } else {
        echo "<script>
            alert('Tugas Gagal Diupdate :(');
            document.location='edit_tugas.php';
            </script>";
    }
}

include('layouts/headerSigned.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tugas</title>
</head>

<body style="background-color: #EA5455">
    <div class="text-white mx-5 px-5 py-3">
        <h2>Edit Tugas</h2>
    </div>
    <div class="container d-flex">
        <div class="col-md-7 pe-5 me-5 text-white">
            <form method="POST" action="#">
                <label for="judulForm"><b>
                        <h4>Judul</h4>
                    </b></label>
                <input type="text" class="form-control form-control-lg mb-3 shadow rounded-4" id="judulForm" name="judul" value="<?php echo $judulEdit ?>">
                <label for="deskripsiForm"><b>
                        <h4>Deskripsi</h4>
                    </b></label>
                <textarea type="text" class="form-control form-control-lg text-wrap text-break mb-3 py-4 shadow rounded-4" id="deskripsiForm" rows="3" name="deskripsi" value=""><?php echo $deskripsiEdit ?></textarea>
                <label for="deskripsiForm"><b>
                        <h4>Due Date</h4>
                    </b></label>
                <input type="date" class="form-control form-control-lg text-wrap text-break mb-3 py-4 shadow rounded-4" id="deskripsiForm" name="deadline" value="<?php echo $deadlineEdit ?>">
                <h4 class="py-2">Status</h4>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="To Do" <?php if ($statusEdit == "To Do") echo 'checked' ?>>
                    <label class="form-check-label bg-white rounded-4 px-4 text-black" for="status1">To Do</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="Doing" <?php if ($statusEdit == "Doing") echo 'checked' ?>>
                    <label class="form-check-label bg-white rounded-4 px-4 text-black" for="status2">Doing</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status3" value="Done" <?php if ($statusEdit == "Done") echo 'checked' ?>>
                    <label class="form-check-label bg-white rounded-4 px-4 text-black" for="status3">Done</label>
                </div>
                <center><input class="btn btn-outline-light border-0 shadow px-5 py-2 my-4" style="background-color:#159895;" type="submit" id="edit-btn" name="editTugas_btn" value="Simpan Perubahan"></center>
            </form>
        </div>
        <div class="col-md-4">
            <img src="image/Add-TambahTugas.png" width="400px" alt="">
        </div>
    </div>
</body>

</html>

<?php
include('layouts/footer.php');
?>