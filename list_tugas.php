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

<body style="background-color:#EA5455">
    <div class="text-white mx-5 px-5 py-3">
        <h2>List Tugas</h2>
    </div>
    <div class="container d-flex">
        <div class="col-md-3">
            <h3 class="text-center py-1 px-2 mb-5 bg-white rounded-4">To Do</h3>
            <div class="card rounded-4 mb-4">
                <h4 class="card-title px-3 py-2"><img src="resources/icon/icon_book.webp" width="20px" alt=""> Judul</h4>
                <p class="px-3 py-3">Deskripsi</p>
                <p class="px-3">Date: 03 April 2023</p>
                <span class="text-mt fw-bolder px-3 mb-3"><a class="text-decoration-none" href="edit_tugas.php">Edit</a> | <a class="text-decoration-none" href="hapus.php">Hapus</a></span>
            </div>
            <div class="card rounded-4 mb-4">
                <h4 class="card-title px-3 py-2"><img src="resources/icon/icon_book.webp" width="20px" alt=""> Judul</h4>
                <p class="px-3 py-3">Deskripsi</p>
                <p class="px-3">Date: 03 April 2023</p>
                <span class="text-mt fw-bolder px-3 mb-3"><a class="text-decoration-none" href="edit_tugas.php">Edit</a> | <a class="text-decoration-none" href="hapus.php">Hapus</a></span>
            </div>
            <div class="card rounded-4 mb-4">
                <h4 class="card-title px-3 py-2"><img src="resources/icon/icon_book.webp" width="20px" alt=""> Judul</h4>
                <p class="px-3 py-3">Deskripsi</p>
                <p class="px-3">Date: 03 April 2023</p>
                <span class="text-mt fw-bolder px-3 mb-3"><a class="text-decoration-none" href="edit_tugas.php">Edit</a> | <a class="text-decoration-none" href="hapus.php">Hapus</a></span>
            </div>
        </div>
        <div class="col-md-1 ms-4" align="center"></div>
        <div class="col-md-3">
            <h3 class="text-center py-1 px-2 mb-5 bg-white rounded-4">Doing</h3>
            <div class="card rounded-4 mb-4">
                <h4 class="card-title px-3 py-2"><img src="resources/icon/icon_book.webp" width="20px" alt=""> Judul</h4>
                <p class="px-3 py-3">Deskripsi</p>
                <p class="px-3">Date: 03 April 2023</p>
                <span class="text-mt fw-bolder px-3 mb-3"><a class="text-decoration-none" href="edit_tugas.php">Edit</a> | <a class="text-decoration-none" href="hapus.php">Hapus</a></span>
            </div>
            <div class="card rounded-4 mb-4">
                <h4 class="card-title px-3 py-2"><img src="resources/icon/icon_book.webp" width="20px" alt=""> Judul</h4>
                <p class="px-3 py-3">Deskripsi</p>
                <p class="px-3">Date: 03 April 2023</p>
                <span class="text-mt fw-bolder px-3 mb-3"><a class="text-decoration-none" href="edit_tugas.php">Edit</a> | <a class="text-decoration-none" href="hapus.php">Hapus</a></span>
            </div>
            <div class="card rounded-4 mb-4">
                <h4 class="card-title px-3 py-2"><img src="resources/icon/icon_book.webp" width="20px" alt=""> Judul</h4>
                <p class="px-3 py-3">Deskripsi</p>
                <p class="px-3">Date: 03 April 2023</p>
                <span class="text-mt fw-bolder px-3 mb-3"><a class="text-decoration-none" href="edit_tugas.php">Edit</a> | <a class="text-decoration-none" href="hapus.php">Hapus</a></span>
            </div>
        </div>
        <div class="col-md-1 ms-4" align="center"></div>
        <div class="col-md-3">
            <h3 class="text-center py-1 px-2 mb-5 bg-white rounded-4">Done</h3>
            <div class="card rounded-4 mb-4">
                <h4 class="card-title px-3 py-2"><img src="resources/icon/icon_book.webp" width="20px" alt=""> Judul</h4>
                <p class="px-3 py-3">Deskripsi</p>
                <p class="px-3">Date: 03 April 2023</p>
                <span class="text-mt fw-bolder px-3 mb-3"><a class="text-decoration-none" href="edit_tugas.php">Edit</a> | <a class="text-decoration-none" href="hapus.php">Hapus</a></span>
            </div>
            <div class="card rounded-4 mb-4">
                <h4 class="card-title px-3 py-2"><img src="resources/icon/icon_book.webp" width="20px" alt=""> Judul</h4>
                <p class="px-3 py-3">Deskripsi</p>
                <p class="px-3">Date: 03 April 2023</p>
                <span class="text-mt fw-bolder px-3 mb-3"><a class="text-decoration-none" href="edit_tugas.php">Edit</a> | <a class="text-decoration-none" href="hapus.php">Hapus</a></span>
            </div>
            <div class="card rounded-4 mb-4">
                <h4 class="card-title px-3 py-2"><img src="resources/icon/icon_book.webp" width="20px" alt=""> Judul</h4>
                <p class="px-3 py-3">Deskripsi</p>
                <p class="px-3">Date: 03 April 2023</p>
                <span class="text-mt fw-bolder px-3 mb-3"><a class="text-decoration-none" href="edit_tugas.php">Edit</a> | <a class="text-decoration-none" href="hapus.php">Hapus</a></span>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include('layouts/footer.php');
?>