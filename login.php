<?php
    session_start();
    include('server/connection.php');

    if (isset($_SESSION['logged_in'])){
        header('location: dashboard.php');
        exit;
    }

    if (isset($_POST['submit'])){
        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $query= "SELECT * FROM user WHERE username= '$username' OR email= '$email'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows(result);


        if($rows !=0){
            $hash = mysqli_fetch_assoc($result)['password'];
            if(password_verify($password, $hash)){
                session_start();
                $_SESSION["username"] = $username;

                header("location: dashboard.php");
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
    <h1>sadsada</h1>
</body>
</html>

<?php
    include('layouts/footer.php');
?>