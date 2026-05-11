<?php

include '../config/database.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$fullname = $_POST['fullname'];

mysqli_query(
    $conn,
    "INSERT INTO users(
        username,
        password,
        fullname
    ) VALUES(
        '$username',
        '$password',
        '$fullname'
    )"
);

header('Location: index.php');