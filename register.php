<?php
session_start();
include('server/connection.php');

if (isset($_POST['register'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Check apakah sudah terdaftar
    $check_user = "SELECT COUNT(*) FROM users WHERE username = ?";

    $stmt_check_user = $conn->prepare($check_user);
    $stmt_check_user->bind_param('s', $username);
    $stmt_check_user->execute();
    $stmt_check_user->bind_result($num_rows);
    $stmt_check_user->store_result();
    $stmt_check_user->fetch();

    // Ketika ada Username yang sama
    if ($num_rows !== 0) {
        echo "<script>
            alert('Username Telah Terdaftar!');
            document.location='register.php';
            </script>";
    } else {
        $save_user = "INSERT INTO users (nama, username, password, email)
                      VALUES (?, ?, ?, ?)";

        // Membuat User baru
        $stmt_save_user = $conn->prepare($save_user);
        $stmt_save_user->bind_param('ssss', $nama, $username, md5($password), $email);

        // Akun Sudah Berhasil Dibuat
        if ($stmt_save_user->execute()) {
            $user_id = $stmt_save_user->insert_id;

            $_SESSION['idUser'] = $user_id;
            $_SESSION['nama'] = $nama;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;

            echo "<script>
            alert('Anda Telah Berhasil Register, Silahkan Login.');
            document.location='login.php';
            </script>";
        } else {
            echo "<script>
            alert('Akun Tidak Berhasil Dibuat!');
            document.location='register.php';
            </script>";
        }
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

                    <div class="card-img my-4">
                        <img src="/image/Sign up-bro.png" width="400px" alt="">
                    </div>
                    <h1><b>
                            Start for Free and
                            <br> Manage your task Easily
                        </b></h1>
                </div>
                <div class="col-6 py-6 rounded-end" style="background-color:white">
                    <div class="container py-3 px-7">
                        <h1 style="margin-bottom:-2px">Get's Started.</h1>
                        <p class="text-nowrap text-muted">Already have an account? <a class="text-danger text-decoration-none text-opacity-75" href="login.php"><b>Log in</b></a></p>
                        <form method="POST" action="register.php">
                            <?php if (isset($_GET['error'])) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php if (isset($_GET['error'])) {
                                        echo $_GET['error'];
                                    } ?>
                                </div>
                            <?php } ?>
                            <label for="nameForm"><b>
                                    <h4>Nama</h4>
                                </b></label>
                            <input type="text" name="nama" class="form-control form-control-lg mb-3 shadow-form rounded-0" style="border-left: 6px solid #159895" id="nameForm" placeholder="Nama" required>
                            <label for="usernameForm"><b>
                                    <h4>Username</h4>
                                </b></label>
                            <input type="text" name="username" class="form-control form-control-lg mb-3 shadow-form rounded-0" style="border-left: 6px solid #159895" id="usernameForm" placeholder="Username" required>

                            <label for="emailForm"><b>
                                    <h4>Email</h4>
                                </b></label>
                            <input type="email" name="email" class="form-control form-control-lg mb-3 shadow-form rounded-0" style="border-left: 6px solid #159895" id="emailForm" placeholder="Email" required>
                            <label for="passwordForm"><b>
                                    <h4>Password</h4>
                                </b></label>
                            <input type="password" name="password" class="form-control form-control-lg mb-3 shadow-form rounded-0" style="border-left: 6px solid #159895" id="passwordForm" placeholder="Password" required>
                            <center><input class="btn btn-outline-light shadow my-4 px-5 py-2" style="background-color:#159895;" type="submit" id="register-btn" name="register" value="Register" /></center>
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