<?php
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
    <section>
        <div class="left-content">
            <form>
                <div class="main">
                    <h1 style="font-weight: bold; color: #ffffff; margin-left: 45px;
            margin-top: 30px">Tambah Tugas</h1>
                    <div class="form-group">
                        <div>
                            <label for="inputJudul">Judul</label>
                            <input type="text" class="form-control">
                        </div>
                        <div>
                            <label for="inputDeskripsi">Deskripsi</label>
                            <input type="text" class="form-control">
                        </div>
                        <div>
                            <label for="inputDate">Date</label>
                            <input type="Date" class="form-control">
                        </div>
                    </div>
                    <div class="form-check-container">
                        <div class="form-check">
                            <input class="form-check-input" type="radio">
                            <label class="form-check-label" for="inlineRadio1">To Do</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio">
                            <label class="form-check-label" for="inlineRadio2">Doing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio">
                            <label class="form-check-label" for="inlineRadio3">Done</label>
                        </div>
                    </div>
                    <button class="btnTambah" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </section>


</body>

</html>

<?php
include('layouts/footer.php');
?>