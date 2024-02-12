<?php
include "confiq.php";  

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    $select = "SELECT * FROM details WHERE username = '$username'";
    $result = mysqli_query($con, $select);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>
            window.location.href="login.php";
            alert("Username already exists. Please try a different one.");
        </script>';
    } else {
        $sql = "INSERT INTO details(`username`, `password`) VALUES ('$username', '$password')";
        $insert_result = mysqli_query($con, $sql);

        if ($insert_result) {  
            echo '<script>
                window.location.href="register.php";
                alert("Registered Successfully");
            </script>';
        } else {
            echo '<script>
                alert("Registration failed. Please try again.");
            </script>';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="reg.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h2>Register</h2>
            <form action="register.php" method="POST">
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <button type="submit" name="submit">Login</button>
                <h6>Already registered <a href="login.php">LOGIN HERE</a></h6>
            </form>
        </div>
    </div>
</body>
</html>