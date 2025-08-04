<?php 

include('connection.php');

if(isset($_POST["register"])){
    $username = strtolower(stripcslashes($_POST["username"]));
    $email = strtolower(stripcslashes($_POST["email"]));
    $password = mysqli_escape_string($connect, $_POST["password"]);
    // $role = stripslashes($_POST['role']);
    // $role = mysqli_real_escape_string($connect, $role);

    $sqlFindUsername = "SELECT * FROM users WHERE username = '$username'";
    
    // mengecek jika usernamenya sudah ada atau belum
    $result1 = mysqli_query($connect, $sqlFindUsername);
    if(mysqli_fetch_assoc($result1)){
        echo "<script>alert('username yang dimasukan sudah ada!')</script>";
        exit;
    }

    $password = md5($password);

    // Jika lolos pengecekan maka 
    $query = "INSERT INTO users (id, username, email, password) VALUES ('','$username','$email','$password')";

    $result2 = mysqli_query($connect, $query);

    if($result2){
        echo "<script>
                alert('Sukses membuat akun!');
                document.location.href = 'Login.php';
              </script>";
    } else {
        echo "<script>
               alert('Gagal membuat akun!');
               document.location.href = 'Register.php'; 
              </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <h1>Register</h1>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="register">Register</button>
                    </form>
                    <a href="Login.php">Sudah punya akun? Login aja.</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>