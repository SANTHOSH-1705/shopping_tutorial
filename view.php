<?php
include "confiq.php";

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    $sql = "INSERT INTO `details` (`username`, `password`) VALUES ('$username', '$password')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "User created successfully";
        header('Location: view.php');
    } else {
        echo "Error creating user: " . mysqli_error($con);
    }
}

if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "UPDATE `details` SET `username`='$username', `password`='$password' WHERE `id`='$user_id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "User updated successfully";
        header('Location: view.php');
    } else {
        echo "Error updating user: " . mysqli_error($con);        
    }
}



$sql = "SELECT * from details";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="view.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    </head>
<body>
<nav class="a">
    <h3>Customer Details</h3>
        <ul>
            <li><a href="view.php"> Home</a></li>
            
        </ul>
        <form action="">
        <button class="signin" name="signin"><a href="login.php">Sign In</a></button>
        <button class="signup" name="signup"><a href="register.php">Sign Up</a></button>
    </form>
        </nav>
        <h2>Add User</h2>
        <form action="view.php" method="POST">
            <fieldset>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
                <button type="submit" name="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-family: Arial, sans-serif; font-weight: bold;">Create User</button>
            </fieldset>
        </form>
    <div class="container">
        <h2>Users</h2>
        <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Operations</th>
            </tr>
        </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td>
                                <a class="btn btn-info" href="view.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>

        <?php
      
        if (isset($_GET['id'])) {
            $user_id = $_GET['id'];
            $sql = "SELECT * FROM `details` WHERE `id`='$user_id'";
            $result = mysqli_query($con, $sql);
            $row = $result->fetch_assoc();
            ?>
            <h2>Edit User</h2>
            <form action="view.php" method="POST">
                <fieldset>
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" required>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" value="<?php echo $row['password']; ?>" required>
                    <button type="submit" name="update" style="background-color: #2196F3; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-family: Arial, sans-serif; font-weight: bold;">Update User</button>
                </fieldset>
            </form>
            <?php
        }
        ?>
    </div>
</body>
</html>
