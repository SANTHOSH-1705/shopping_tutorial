<?php
session_start();
If(empty($_SESSION['id']));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
</head>
<body>
   <div style="float:right">
   <button class="logout" name="logout"><a href="logout.php">Logout</a></button>
</div> 
   <h1>welcome to HomePage..</h1>
   
</body>
</html>