<?php

if (isset($_SESSION["ID"])) {
    function getQuestStatus($connection, $quest_id) {
        $sql_query = "SELECT * FROM users_quests WHERE user_id = ? AND quest_id = ?";
        $stmt = mysqli_prepare($connection, $sql_query);
        mysqli_stmt_bind_param($stmt, 'ii', $_SESSION["ID"], $quest_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $quest_data = mysqli_fetch_assoc($result);
            if ($quest_data['status'] == 1 && isset($quest_data['status'])) {
                return "done";
            } else if ($quest_data['status'] == 0 && isset($quest_data['status'])) {
                return "not done";
            } else {
                return "unknown";
            }
        } else {
            return "Error: Quest is not accessible!";
        }
    }
    
} else {
    function getQuestStatus($connection, $quest_id) { return "Please login"; }
}

function getQuestName($connection, $quest_id) {
    $sql_query = "SELECT * FROM quests WHERE quest_id = ?";
    $stmt = mysqli_prepare($connection, $sql_query);
    mysqli_stmt_bind_param($stmt, 'i', $quest_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $quest_data = mysqli_fetch_assoc($result);
        return $quest_data['quest_name'];
    } else {
        return "Error: Quest is not accessible!";
    }
}

function getQuestDifficulty($connection, $quest_id) {
    $sql_query = "SELECT * FROM quests WHERE quest_id = ?";
    $stmt = mysqli_prepare($connection, $sql_query);
    mysqli_stmt_bind_param($stmt, 'i', $quest_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $quest_data = mysqli_fetch_assoc($result);
        return $quest_data['quest_difficulty'];
    } else {
        return "Error: Quest is not accessible!";
    }
}

function getQuestPoint($connection, $quest_id) {
    $sql_query = "SELECT * FROM quests WHERE quest_id = ?";
    $stmt = mysqli_prepare($connection, $sql_query);
    mysqli_stmt_bind_param($stmt, 'i', $quest_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $quest_data = mysqli_fetch_assoc($result);
        return $quest_data['quest_point'];
    } else {
        return "Error: Quest is not accessible!";
    }
}

?>
