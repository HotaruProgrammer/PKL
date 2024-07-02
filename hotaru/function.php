<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "pkl";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"])) ;
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
            alert('Username sudah ada');
            </script>";
        return false;
    }

    if(strlen($password) < 8){
        echo "<script>
            alert('Password harus terdiri minimal 8 karakter');
            </script>";
        return false;
    }

    if($password !== $password2){
        echo "<script>
            alert('Konfirmasi gagal');
            </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username','$password')");

    return mysqli_affected_rows($conn);
}

?>
