<?php
session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
    echo "<script>
            alert('Anda Berhasil Login!');
            document.location='dashboard.php';
            </script>";
    exit;
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE  email = ? AND password = ? LIMIT 1";

    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $email, $password);

    if ($stmt_login->execute()) {
        $stmt_login->bind_result($idUser, $nama, $username, $password, $email);
        $stmt_login->store_result();

        if ($stmt_login->num_rows() == 1) {
            $stmt_login->fetch();

            $_SESSION['idUser'] = $idUser;
            $_SESSION['nama'] = $nama;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
            $_SESSION['logged_in'] = true;

            echo "<script>
            alert('Anda Berhasil Login!');
            document.location='dashboard.php';
            </script>";
        } else {
            echo "<script>
            alert('Akun Tidak Ditemukan, Silahkan Cek Email dan Password atau Register!');
            document.location='login.php';
            </script>";
        }
    } else {
        // Error
        echo "<script>
            alert('Something Went Wrong!');
            document.location='login.php';
            </script>";
    }
}
?>

<?php
include('layouts/headerNotSigned.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tugas</title>

</head>

<body>
    <div class="container">
        <div class="card my-5">
            <div class="row no-gutters">
                <div class="col-6 py-6 rounded-start" align="center" style="background-color: #EA5455; color:white">
                    <h1><b>
                            Very good works are
                            <br> Waiting for you
                        </b></h1>
                    <div class="card-img-bottom">
                        <img src="/image/Hello-rafiki.png" width="400px" alt="">
                    </div>
                </div>
                <div class="col-6 py-6 rounded-end" style="background-color:white">
                    <div class="container py-7 px-7">
                        <h1 style="margin-bottom:-2px">Hello Again.</h1>
                        <p class="text-muted">Please enter your email and password.</p>
                        <form id="login-form" method="POST" action="login.php">
                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php if (isset($_GET['error'])) {
                                        echo $_GET['error'];
                                    } ?>
                                </div>
                            <?php } ?>
                            <label for="emailForm"><b>
                                    <h4>Email</h4>
                                </b></label>
                            <input type="email" class="form-control form-control-lg mb-3 shadow-form rounded-0" style="border-left: 6px solid #159895" id="emailForm" name="email" placeholder="Email">
                            <label for="passwordForm"><b>
                                    <h4>Password</h4>
                                </b></label>
                            <input type="password" class="form-control form-control-lg mb-3 shadow-form rounded-0" style="border-left: 6px solid #159895" id="passwordForm" name="password" placeholder="Password">
                            <p class="text-nowrap text-muted">Not Registered? <a class="text-danger text-decoration-none text-opacity-75" href="register.php"><b>Create an account</b></a></p>
                            <center><input class="btn btn-outline-light shadow px-5 py-2" style="background-color:#159895;" type="submit" id="login-btn" name="login_btn" value="LOGIN"></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php
include('layouts/footer.php');
?>