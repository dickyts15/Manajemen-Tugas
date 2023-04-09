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

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        echo "<script>
            alert('Anda Telah Berhasil Logout!');
            document.location='login.php';
            </script>";
        exit;
    }
}
$jumlahTodo = 0;
$jumlahDoing = 0;
$jumlahDone = 0;
$Todo = mysqli_query($conn, "SELECT COUNT(*) FROM tugas WHERE idUser = " . $_SESSION['idUser'] . " AND status = 'To Do'");
$jumlahTodo = $Todo->fetch_row()[0];
$Doing = mysqli_query($conn, "SELECT COUNT(*) FROM tugas WHERE idUser = " . $_SESSION['idUser'] . " AND status = 'Doing'");
$jumlahDoing = $Doing->fetch_row()[0];
$Done = mysqli_query($conn, "SELECT COUNT(*) FROM tugas WHERE idUser = " . $_SESSION['idUser'] . " AND status = 'Done'");
$jumlahDone = $Done->fetch_row()[0];



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
    <div class="container">
        <div class="text-white py-3">
            <h2>Dashboard</h2>
            <h3>Hello, <?php echo $_SESSION['nama']; ?></h3>

            <h5>Here are your important tasks.</h5>
        </div>
    </div>
    <div class="container d-flex">
        <div class="container my-3 col-md-9">
            <div class="card-group">
                <div class="card me-5 rounded-3">
                    <div class="card-body py-5">
                        <center>
                            <img src="resources/icon/dashboard.webp" width="30px" alt="">
                            <h3 class="card-text py-2">To do</h3>
                            <h1 class="card-text"><b><?php echo $jumlahTodo ?></b></h1>
                        </center>
                    </div>
                </div>
                <div class="card me-5 rounded-3">
                    <div class="card-body py-5">
                        <center>
                            <img src="resources/icon/icon_pencil.png" width="30px" alt="">
                            <h3 class="card-text py-2">Doing</h3>
                            <h1 class="card-text"><b><?php echo $jumlahDoing ?></b></h1>
                        </center>
                    </div>
                </div>
                <div class="card rounded-3">
                    <div class="card-body py-5">
                        <center>
                            <img src="resources/icon/icon_check.png" width="30px" alt="">
                            <h3 class="card-text py-2">Done</h3>
                            <h1 class="card-text"><b><?php echo $jumlahDone ?></b></h1>
                        </center>
                    </div>
                </div>
            </div>
            <div class="container my-5">
                <div class="card my-3">
                    <h5 class="card-title px-5 py-3"><b>To-do List: </b></h5>
                    <div class="container d-flex px-3 mx-5">
                        <ol class="col card-text">
                            <?php
                            $tugasTodo = mysqli_query($conn, "SELECT * FROM tugas WHERE idUser = " . $_SESSION['idUser'] . " AND status = 'To Do' ORDER by deadline");
                            while ($tugas = mysqli_fetch_array($tugasTodo)) : ?>
                                <li><?php echo $tugas['judul']; ?></li>
                            <?php endwhile; ?>
                        </ol>
                        <ul class="col list card-text ms-5">
                            <?php
                            $tugasTodo = mysqli_query($conn, "SELECT * FROM tugas WHERE idUser = " . $_SESSION['idUser'] . " AND status = 'To Do' ORDER by deadline");
                            while ($tugas = mysqli_fetch_array($tugasTodo)) : ?>
                                <li><?php echo $tugas['deadline']; ?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>

                <div class="card my-3">
                    <h5 class="card-title px-5 py-3"><b>Doing List: </b></h5>
                    <div class="container d-flex px-3 mx-5">
                        <ol class="col card-text">
                            <?php
                            $tugasDoing = mysqli_query($conn, "SELECT * FROM tugas WHERE idUser = " . $_SESSION['idUser'] . " AND status = 'Doing' ORDER by deadline");
                            while ($tugas = mysqli_fetch_array($tugasDoing)) : ?>
                                <li><?php echo $tugas['judul']; ?></li>
                            <?php endwhile; ?>
                        </ol>
                        <ul class="col list card-text ms-5">
                            <?php
                            $tugasDoing = mysqli_query($conn, "SELECT * FROM tugas WHERE idUser = " . $_SESSION['idUser'] . " AND status = 'Doing'  ORDER by deadline");
                            while ($tugas = mysqli_fetch_array($tugasDoing)) : ?>
                                <li><?php echo $tugas['deadline']; ?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>

                <div class="card my-3">
                    <h5 class="card-title px-5 py-3"><b>Done List: </b></h5>
                    <div class="container d-flex px-3 mx-5">
                        <ol class="col card-text">
                            <?php
                            $tugasDone = mysqli_query($conn, "SELECT * FROM tugas WHERE idUser = " . $_SESSION['idUser'] . " AND status = 'Done'  ORDER by deadline");
                            while ($tugas = mysqli_fetch_array($tugasDone)) : ?>
                                <li><?php echo $tugas['judul']; ?></li>
                            <?php endwhile; ?>
                        </ol>
                        <ul class="col list card-text ms-5">
                            <?php
                            $tugasDone = mysqli_query($conn, "SELECT * FROM tugas WHERE idUser = " . $_SESSION['idUser'] . " AND status = 'Done'  ORDER by deadline");
                            while ($tugas = mysqli_fetch_array($tugasDone)) : ?>
                                <li><?php echo $tugas['deadline']; ?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid col-md-4 ms-4">
            <div class="card my-2">
                <center>
                    <h1 class="card-title py-3">
                        <b>Profile</b>
                    </h1>
                    <img src="resources/icon/profile.png" width="125px" class="opacity-50 py-4" alt="">
                    <hr style="border-top: solid #159895; width: 60%;">
                    <h1 class="py-2"><b><?php echo $_SESSION['nama']; ?></b></h1>
                    <h4 class="py-2"><b><?php echo $_SESSION['username']; ?></b></h4>
                    <p class="py-2"><?php echo $_SESSION['email']; ?></p>
                    <hr class="py-2 mb-5" style="border-top: solid #159895; width: 60%;">
                </center>
            </div>
        </div>
    </div>

</body>

</html>
<?php
include('layouts/footer.php');
?>