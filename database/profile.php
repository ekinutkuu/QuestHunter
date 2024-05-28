<?php
    session_start();
    include "db_connection.php";

    if (isset($_SESSION["ID"])){
        $userID = $_SESSION["ID"];
        $sql_query = "SELECT * FROM users WHERE user_id='$userID'";
        $userdata = mysqli_fetch_assoc(mysqli_query($connection, $sql_query));
        $userName = $userdata['username'];
        $userPoint = $userdata['point'];
        $isLogin = true;
    } else {
        $isLogin = false;
    }
?>