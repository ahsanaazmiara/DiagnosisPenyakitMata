<?php
session_start();
require "config.php";

// If the form is submitted
if(isset($_POST['daftar'])){
    // Capture user input
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Encrypting password for security
    $role = "Pasien"; // Set role to Pasien

    // Check if the username is already taken
    $check_username_query = "SELECT * FROM users WHERE username='$username'";
    $check_username_result = $conn->query($check_username_query);

    if($check_username_result->num_rows > 0) {
        // Username already exists
        $message = "Username already exists. Please choose a different one.";
    } else {
        // Insert user data into the database
        $insert_query = "INSERT INTO users (username, pass, role) VALUES ('$username', '$password', '$role')";
        if ($conn->query($insert_query) === TRUE) {
            // Registration successful, redirect to login page
            header("Location: login.php");
            exit();
        } else {
            // Registration failed
            $message = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Registration</h4>
                </div>
                <div class="card-body">
                    <?php if(isset($message)): ?>
                        <div class="alert alert-danger"><?php echo $message; ?></div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <button type="submit" name="daftar" class="btn btn-primary">Register</button>
                        <a href="login.php" class="btn btn-link">Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>