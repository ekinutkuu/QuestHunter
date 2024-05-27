<?php

session_start();
include "../../database/db_connection.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ( isset($_SESSION["ID"]) ) {
        $userID = $_SESSION["ID"];
        $questID = 3;
        $sql_query = "SELECT * FROM users WHERE user_id = $userID";
        
        //if there is a user associated with the session id (which is user_id)
        if (mysqli_num_rows(mysqli_query($connection, $sql_query)) > 0) {
            //$userdata = mysqli_fetch_assoc(mysqli_query($connection, $sql_query));
    
            //if the user has solved this question before
            $sql_query = "SELECT * FROM users_quests WHERE user_id = $userID AND quest_id = $questID";
            $quest_status = mysqli_fetch_assoc(mysqli_query($connection, $sql_query)); 
            if ($quest_status['status'] == 1) {
                echo "already_solved";           
            }
    
            //if the user has not solved this question before
            else{
                $sql_query = "SELECT * FROM quests WHERE quest_id = $questID";
                $quest_data = mysqli_fetch_assoc(mysqli_query($connection, $sql_query));
                $quest_point = $quest_data['quest_point'];
                
                $sql_query = "UPDATE users SET point = point + $quest_point WHERE user_id = $userID";
                mysqli_query($connection, $sql_query);
        
                $sql_query = "UPDATE users_quests SET status = 1 WHERE user_id = $userID AND quest_id = $questID";
                mysqli_query($connection, $sql_query);
                
                echo "successfully_solved";
            }
        } else {
            echo "user_not_found";
        }
    }
    // if the user is not logged in
    else {
        echo "not_logged_in";
    }

}
?>
