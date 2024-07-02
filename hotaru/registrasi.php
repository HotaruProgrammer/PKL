<?php

require 'function.php';

if(isset($_POST["register"])){
    if(registrasi($_POST) > 0){
        echo "<script>
            alert('Berhasil menambahkan');
            window.location.href='login.php';
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

        


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>

        label {
            display: block;
            margin-top: 10px;
        }
        button{
            margin-top: 10px;
        }
        body{
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
    <div class="container mt-5">
        <h1 class="mb-4">Registration</h1>
        

        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="password2">Confirm Password:</label>
                <input type="password" class="form-control" name="password2" id="password2">
            </div>
            <!--  -->
            <button type="submit" class="btn btn-primary" name="register">Register</button>
            <!--  -->
        </form>
        <a href="login.php">
            <button class="btn btn-primary">
                login
            </button>
        </a>
        
    </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
