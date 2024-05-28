<?php

session_start();
unset($_SESSION["ID"]);
header("location: ../pages/SignIn/login.html");

?>