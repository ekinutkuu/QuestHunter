<?php

include "db_connection.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)){

        $sql_query = "SELECT * FROM users WHERE username='$username'";

        if (mysqli_num_rows(mysqli_query($connection, $sql_query)) > 0){
            echo "Username has already taken";
        }
        else{
            $sql_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            mysqli_query($connection, $sql_query);
            header("Location: ../pages/SignIn/login.html");
            die;
        }
    }
    else{
        echo "ERROR: " . connection->error;
    }
}

?>
