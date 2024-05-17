<?php

session_start();
include "db_connection.php";


if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)){

        $sql_query = "SELECT * FROM users WHERE username='$username'";

        //input alanına girilen username veri tabanında var mı?
        if (mysqli_num_rows(mysqli_query($connection, $sql_query)) > 0){
            $userdata = mysqli_fetch_assoc(mysqli_query($connection, $sql_query));

            //kullanıcının girdiği şifre veri tabanındaki şifre ile aynı mı?
            if ($userdata['password'] === $password){
                //echo "Logged In!";
                $_SESSION["ID"] = $userdata['user_id'];
                //echo $_SESSION["ID"];
                header("Location: ../index.html");
            }
            else{
                echo "Invalid password!";
            }
        }
        else{
            echo "Invalid username!";
        }
    }
}

?>
