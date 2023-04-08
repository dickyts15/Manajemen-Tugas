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
                        <form>
                            <label for="nameForm"><b>
                                    <h4>Nama</h4>
                                </b></label>
                            <input type="text" class="form-control form-control-lg mb-3 shadow-form rounded-0" style="border-left: 6px solid #159895" id="nameForm" placeholder="Nama">
                            <label for="usernameForm"><b>
                                    <h4>Password</h4>
                                </b></label>
                            <input type="password" class="form-control form-control-lg mb-3 shadow-form rounded-0" style="border-left: 6px solid #159895" id="usernameForm" placeholder="Username">

                            <label for="emailForm"><b>
                                    <h4>Email</h4>
                                </b></label>
                            <input type="email" class="form-control form-control-lg mb-3 shadow-form rounded-0" style="border-left: 6px solid #159895" id="emailForm" placeholder="Email">
                            <label for="passwordForm"><b>
                                    <h4>Password</h4>
                                </b></label>
                            <input type="password" class="form-control form-control-lg mb-3 shadow-form rounded-0" style="border-left: 6px solid #159895" id="passwordForm" placeholder="Password">
                            <center><input class="btn btn-outline-light shadow my-4 px-5 py-2" style="background-color:#159895;" type="submit" value="Register"></center>
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