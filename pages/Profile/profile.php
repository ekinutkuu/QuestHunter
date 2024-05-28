<?php
    include "../../database/profile.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profile - Quest Hunter</title>
    <link rel="stylesheet" href="profile.css">
    <!-- FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="navbar">
            <a href="../../index.html">Home</a>
            <a href="../ListQuests/quests.php">Quests</a>
            <a href="#">Discuss</a>
            <a href="#">Rankings</a>
            <a href="#">Profile</a>
        </div>
        <div class="content">
            <div class="profile-container">
                <h1>Hello,
                    <?php
                    if($isLogin == true){
                        echo $userName."!";
                    } else {
                        echo "guest user!";
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    if($isLogin == true){
                        echo "Your Points: ".$userPoint;
                    } else echo "You must login to see your point!";
                    ?>
                </p>
                <?php
                    if($isLogin == true){
                        echo '<div class="profile-buttons">';
                            echo '<a href="../ListQuests/quests.php">View Quests</a>';
                            echo '<a href="../../database/exit.php">Log out</a>';
                        echo '</div>';
                    } else {
                        echo '<a href="../SignIn/login.html">Sign In</a>';
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>