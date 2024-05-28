<?php
    session_start();
    include "../../database/db_connection.php";
    include "../../database/quests_data.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quests</title>
    <link rel="stylesheet" href="quests.css" type="text/css">
    <link rel="stylesheet" href="../scrollbar.css" type="text/css">
    <!-- FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter">
    <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="navbar">
        <a href="../../index.html">Home</a>
        <a href="#">Quests</a>
        <a href="#">Discuss</a>
        <a href="#">Rankings</a>
        <a href="../Profile/profile.php">Profile</a>
    </div>

    <div class="wrapper">
        <div class="top-row">
            <p>Status</p>
            <p>Titles</p>
            <p>Difficulty</p>
            <p>Rewards</p>
        </div>
        <div class="problems">
            <div class="problem" id="problem-1" onclick="redirectToQuest('../../quests/twoSum/twoSum.html')">
                <p> <?php echo getQuestStatus($connection, 1); ?> </p>
                <p> <?php echo getQuestName($connection, 1); ?> </p>
                <p> <?php echo getQuestDifficulty($connection, 1); ?> </p>
                <p> <?php echo getQuestPoint($connection, 1); ?> Gold </p>
            </div>
            <div class="problem" id="problem-2" onclick="redirectToQuest('../../quests/factorial/factorial.html')">
                <p> <?php echo getQuestStatus($connection, 2); ?> </p>
                <p> <?php echo getQuestName($connection, 2); ?> </p>
                <p> <?php echo getQuestDifficulty($connection, 2); ?> </p>
                <p> <?php echo getQuestPoint($connection, 2); ?> Gold </p>
            </div>
            <div class="problem" id="problem-1" onclick="redirectToQuest('../../quests/digit/digit.html')">
                <p> <?php echo getQuestStatus($connection, 3); ?> </p>
                <p> <?php echo getQuestName($connection, 3); ?> </p>
                <p> <?php echo getQuestDifficulty($connection, 3); ?> </p>
                <p> <?php echo getQuestPoint($connection, 3); ?> Gold </p>
            </div>
        </div>
    </div>

    <script src="../../redirecting.js"></script>

</body>
</html>

<!-- status, titles, difficulty, rewards -->