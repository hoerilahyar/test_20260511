<?php

include '../middleware/employee.php';
include '../config/database.php';

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM employees WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);

if (
    file_exists('../assets/uploads/' . $data['photo'])
) {

    unlink('../assets/uploads/' . $data['photo']);
}

mysqli_query(
    $conn,
    "DELETE FROM employees WHERE id='$id'"
);

header('Location: index.php');
exit;