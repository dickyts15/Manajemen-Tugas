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
    <div class="text-white mx-5 px-5 py-3">
        <h2>Tambah Tugas</h2>
    </div>
    <div class="container d-flex">
        <div class="col-md-7 pe-5 me-5 text-white">
            <form>
                <label for="judulForm"><b>
                        <h4>Judul</h4>
                    </b></label>
                <input type="text" class="form-control form-control-lg mb-3 shadow rounded-4" id="judulForm" placeholder="Judul Tugas">
                <label for="deskripsiForm"><b>
                        <h4>Deskripsi</h4>
                    </b></label>
                <input type="text" class="form-control form-control-lg text-wrap text-break mb-3 py-4 shadow rounded-4" id="deskripsiForm" placeholder="Deskripsi Tugas">
                <label for="deskripsiForm"><b>
                        <h4>Due Date</h4>
                    </b></label>
                <input type="date" class="form-control form-control-lg text-wrap text-break mb-3 py-4 shadow rounded-4" id="deskripsiForm" placeholder="Date">
                <h4 class="py-2">Status</h4>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                    <label class="form-check-label bg-white rounded-4 px-4 text-black" for="inlineRadio1">To Do</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <label class="form-check-label bg-white rounded-4 px-4 text-black" for="inlineRadio2">Doing</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                    <label class="form-check-label bg-white rounded-4 px-4 text-black" for="inlineRadio3">Done</label>
                </div>
                <center><input class="btn btn-outline-light border-0 shadow px-5 py-2 my-4" style="background-color:#159895;" type="submit" value="Tambah"></center>
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