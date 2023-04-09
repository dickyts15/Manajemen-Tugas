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
            <?php
            $tugasTodo = mysqli_query($conn, "SELECT * FROM tugas WHERE idUser = " . $_SESSION['idUser'] . " AND status = 'To Do'");
            while ($row = mysqli_fetch_array($tugasTodo)) :
            ?>
                <div class="card rounded-4 mb-4">
                    <h4 class="card-title px-3 py-2"><img src="resources/icon/icon_book.webp" width="20px" alt=""> <?php echo $row['judul']; ?></h4>
                    <p class="px-3 py-3"><?php echo $row['deskripsi']; ?></p>
                    <p class="px-3">Date: <?php echo $row['deadline']; ?></p>
                    <span class="text-mt fw-bolder px-3 mb-3"><a class="text-decoration-none" href="edit_tugas.php?idTugas=<?php echo $row['idTugas']; ?>">Edit</a> | <a class="text-decoration-none" href="hapus.php">Hapus</a></span>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="col-md-1 ms-4" align="center"></div>
        <div class="col-md-3">
            <h3 class="text-center py-1 px-2 mb-5 bg-white rounded-4">Doing</h3>
            <?php
            $tugasDoing = mysqli_query($conn, "SELECT * FROM tugas WHERE idUser = " . $_SESSION['idUser'] . " AND status = 'Doing'");
            while ($row = mysqli_fetch_array($tugasDoing)) :
            ?>
                <div class="card rounded-4 mb-4">
                    <h4 class="card-title px-3 py-2"><img src="resources/icon/icon_book.webp" width="20px" alt=""> <?php echo $row['judul']; ?></h4>
                    <p class="px-3 py-3"><?php echo $row['deskripsi']; ?></p>
                    <p class="px-3">Date: <?php echo $row['deadline']; ?></p>
                    <span class="text-mt fw-bolder px-3 mb-3"><a class="text-decoration-none" href="edit_tugas.php?idTugas=<?php echo $row['idTugas']; ?>">Edit</a> | <a class="text-decoration-none" href="hapus.php">Hapus</a></span>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="col-md-1 ms-4" align="center"></div>
        <div class="col-md-3">
            <h3 class="text-center py-1 px-2 mb-5 bg-white rounded-4">Done</h3>
            <?php
            $tugasDone = mysqli_query($conn, "SELECT * FROM tugas WHERE idUser = " . $_SESSION['idUser'] . " AND status = 'Done'");
            while ($row = mysqli_fetch_array($tugasDone)) :
            ?>
                <div class="card rounded-4 mb-4">
                    <h4 class="card-title px-3 py-2"><img src="resources/icon/icon_book.webp" width="20px" alt=""> <?php echo $row['judul']; ?></h4>
                    <p class="px-3 py-3"><?php echo $row['deskripsi']; ?></p>
                    <p class="px-3">Date: <?php echo $row['deadline']; ?></p>
                    <span class="text-mt fw-bolder px-3 mb-3"><a class="text-decoration-none" href="edit_tugas.php?idTugas=<?php echo $row['idTugas']; ?>">Edit</a> | <a class="text-decoration-none" href="hapus.php">Hapus</a></span>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>

<?php
include('layouts/footer.php');
?>