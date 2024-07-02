    <?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location:login.php");
    exit;
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "pkl";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak bisa terkoneksi dengan database");
}

$username = $_SESSION["login"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat</title>
    <style>
        h2 {
            text-align: center;
            margin-top: 20px;
       
        }

        

        /* img {
            max-width: 80%;
            margin-left: 500px;
            height: 200px;
  
            margin-top: 20px;
    
        } */
        body{
            background-image: url('img/rut.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    

            <h2>Selamat Datang <?php echo $username; ?> 👋</h2>
            <!-- <div class="mx-auto">
        <img src="img\stmab.jpeg" alt="halo"> -->

</body>

</html>