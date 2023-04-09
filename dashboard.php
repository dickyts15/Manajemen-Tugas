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
    <div class="container">
        <div class="text-white py-3">
            <h2>Dashboard</h2>
            <h3>Hello, Username</h3>

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
                            <h1 class="card-text"><b>5</b></h1>
                        </center>
                    </div>
                </div>
                <div class="card me-5 rounded-3">
                    <div class="card-body py-5">
                        <center>
                            <img src="resources/icon/icon_pencil.png" width="30px" alt="">
                            <h3 class="card-text py-2">Doing</h3>
                            <h1 class="card-text"><b>5</b></h1>
                        </center>
                    </div>
                </div>
                <div class="card rounded-3">
                    <div class="card-body py-5">
                        <center>
                            <img src="resources/icon/icon_check.png" width="30px" alt="">
                            <h3 class="card-text py-2">Done</h3>
                            <h1 class="card-text"><b>5</b></h1>
                        </center>
                    </div>
                </div>
            </div>
            <div class="container my-5">
                <div class="card">
                    <h5 class="card-title px-5 py-3"><b>To-do List: </b></h5>
                    <div class="container d-flex px-3 mx-5">
                        <ol class="card-text me-5">
                            <li>Tugas 1</li>
                            <li>Tugas 1</li>
                            <li>Tugas 1</li>
                            <li>Tugas 1</li>
                            <li>Tugas 1</li>
                            <li>Tugas 1</li>
                        </ol>
                        <ol class="card-text ps-5 ms-5">
                            <li>26 Maret 2023</li>
                            <li>26 Maret 2023</li>
                            <li>26 Maret 2023</li>
                            <li>26 Maret 2023</li>
                            <li>26 Maret 2023</li>
                            <li>26 Maret 2023</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid col-md-4 ms-4">
            <div class="card">
                <center>
                    <h1 class="card-title py-3">
                        <b>Profile</b>
                    </h1>
                    <img src="resources/icon/profile.png" width="125px" class="opacity-50 py-4" alt="">
                    <hr style="border-top: solid #159895; width: 60%;">
                    <h1 class="py-2"><b>Name</b></h1>
                    <h4 class="py-2"><b>Username</b></h4>
                    <p class="py-2">Email@email.com</p>
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