<?php
session_start();
require "config.php";

// Redirect to index.php if user is already logged in
if(isset($_SESSION['status']) && $_SESSION['status'] === "y") {
    header("Location: index.php");
    exit();
}

// Process login
if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = md5($_POST["pass"]);

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$password'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $row["username"];
        $_SESSION['role'] = $row["role"];
        $_SESSION['status'] = "y";
        header("Location: index.php");
        exit();
    } else {
        header("Location: index.php?msg=n");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if(isset($_GET['msg']) && $_GET['msg'] == "n"): ?>
                <div class="alert alert-danger">Login Gagal</div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="pass" id="password" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Login">
                    </form>
                </div>
            </div>
            <p class="mt-3 text-center">Belum memiliki akun? <a href="daftar.php">Daftar</a></p>
        </div>
    </div>
</div>

<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>