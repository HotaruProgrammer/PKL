    <?php
    session_start();
    if (isset($_SESSION["login"])){
        header("Location: index.php");
        exit;
    }

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "pkl";

    $koneksi = mysqli_connect($host, $user, $pass, $db);


    function registrasi($data)
    {
        global $koneksi;

        $username = htmlspecialchars($data['username']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function login($data)
    {
        global $koneksi;

        $username = htmlspecialchars($data['username']);
        $password = htmlspecialchars($data['password']);

        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            $user = mysqli_fetch_assoc($result);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION["login"] = true;

                return true;
            }
        }

        return false;
    }


    if (isset($_POST["login"])) {
        if (login($_POST)){
            $_SESSION["login"] = $_POST["username"];
            echo "<script>
                alert('Berhasil login');
                window.location.href='home.php';
                </script>";
        } else {
            echo "<script>
                alert('Gagal login, cek kembali username dan password');
                </script>";
        }
    }


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
            label {
                display: block;
            }

            body {
                padding: 50px;
            }

            form {
                max-width: 400px;
                margin: 0 auto;
            }

            body {
                background-image: url('img/img.jpg');
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
            }

            .card {
                margin-top: 10px;
            }

            .mx-auto {
                width: 600px;
            }
        </style>
    </head>

    <body>
        <div class="mx-auto">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-4">Login</h1>
                    <form action="" method="post">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </li>
                            <li class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </li>
                            <li>
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </li>
                            
                                
                            
                        </ul>
                    </form>
                                <a href="registrasi.php" style="margin-left: 80px;">
                                    <button class="btn btn-primary">
                                        register
                                    </button>
                                </a>
                </div>
            </div>
        </div>
    </body>

    </html>