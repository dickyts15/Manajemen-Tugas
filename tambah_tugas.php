<?php
session_start();
include('server/connection.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php?error=You are not logged in');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        header('location:index.php');
        exit;
    }
}

if (isset($_POST['tambahTugas'])) {
    $idUser = $_SESSION['idUser'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    $tugas_check = "SELECT COUNT(*) FROM tugas WHERE judul =?";

    $stmt_tugas_check = $conn->prepare($tugas_check);
    $stmt_tugas_check->bind_param('s', $judul);
    $stmt_tugas_check->execute();
    $stmt_tugas_check->bind_result($num_rows);
    $stmt_tugas_check->store_result();
    $stmt_tugas_check->fetch();

    if ($num_rows !== 0) {
        header('location: tambah_tugas.php?error=Tugas dengan Judul tersebut sudah ada');
    } else {
        $save_tugas = "INSERT INTO tugas (idUser,judul,deskripsi,deadline,status)
                   VALUES (?, ?, ?, ?, ?)";

        $stmt_save_tugas = $conn->prepare($save_tugas);
        $stmt_save_tugas->bind_param('issss', $idUser, $judul, $deskripsi, $deadline, $status);

        if ($stmt_save_tugas->execute()) {
            $idTugas = $stmt_save_tugas->insert_id;

            $_SESSION['idTugas'] = $idTugas;
            $_SESSION['idUser'] = $idUser;
            $_SESSION['judul'] = $judul;
            $_SESSION['deskripsi'] = $deskripsi;
            $_SESSION['deadline'] = $deadline;
            $_SESSION['status'] = $status;

            header('location:tambah_tugas.php?success=Berhasil Menambahkan Tugas');
        } else {
            header('location:tambah_tugas.php?error=Tugas Gagal Ditambahkan');
        }
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
        <h2>Tambah Tugas</h2>
    </div>
    <div class="container d-flex">
        <div class="col-md-7 pe-5 me-5 text-white">
            <form method="POST" action="tambah_tugas.php">
                <label for="judulForm"><b>
                        <h4>Judul</h4>
                    </b></label>
                <input type="text" class="form-control form-control-lg mb-3 shadow rounded-4" id="judulForm" name="judul" placeholder="Judul Tugas">
                <label for="deskripsiForm"><b>
                        <h4>Deskripsi</h4>
                    </b></label>
                <input type="text" class="form-control form-control-lg text-wrap text-break mb-3 py-4 shadow rounded-4" id="deskripsiForm" name="deskripsi" placeholder="Deskripsi Tugas">
                <label for="deskripsiForm"><b>
                        <h4>Due Date</h4>
                    </b></label>
                <input type="date" class="form-control form-control-lg text-wrap text-break mb-3 py-4 shadow rounded-4" id="deskripsiForm" name="deadline" placeholder="Date">
                <h4 class="py-2">Status</h4>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="To Do">
                    <label class="form-check-label bg-white rounded-4 px-4 text-black" for="status1">To Do</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="Doing">
                    <label class="form-check-label bg-white rounded-4 px-4 text-black" for="status2">Doing</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="status3" value="Done">
                    <label class="form-check-label bg-white rounded-4 px-4 text-black" for="status3">Done</label>
                </div>
                <center><input class="btn btn-outline-light border-0 shadow px-5 py-2 my-4" style="background-color:#159895;" type="submit" id="tambah-btn" name="tambahTugas" value="Tambah"></center>
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