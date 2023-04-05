<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tugas</title>

    <!-- CSS Styles -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/elegant-icons.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand p-1 ms-3 mt-1" href="index.php">
                <img src="/resources/Logo Manajemen Tugas.png" width="75" height="75" alt="Logo">
            </a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">
                            <h4 style="font-weight: bold">Home</h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">
                            <h4 style="font-weight: bold">Dashboard</h4>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle-end" href="#" role="button" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <h4 style="font-weight: bold">Menu</h4>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="list_tugas.php">
                                    <h6 align="center">List Tugas</h6>
                                </a></li>
                            <hr class="dropdown-divider">
                            <li><a class="dropdown-item" href="tambah_tugas.php">
                                    <h6 align="center">Tambah Tugas</h6>
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="dropdown me-5">
                <a class="nav-link dropdown-toggle" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="icon_profile me-2" style="font-size: 20px"></i><b>Username</b>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="logout.php" selected><img class="me-3" src="/resources/icon/logout-8.png" width="20px"></img>LOGOUT</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>