<?php

include '../config/database.php';

$id = $_POST['id'];
$username = $_POST['username'];
$fullname = $_POST['fullname'];

mysqli_query(
    $conn,
    "UPDATE users SET
        username='$username',
        fullname='$fullname'
    WHERE id='$id'"
);

header('Location: index.php');