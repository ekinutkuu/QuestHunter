<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profile - Quest Hunter</title>
</head>
<body>
    <p style="color: black; font-size: 20px;"><?php echo $_SESSION["ID"]; ?></p>
    <a href="exit.php">Log out</a>
</body>
</html>