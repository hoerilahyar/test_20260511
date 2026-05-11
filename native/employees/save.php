<?php

include '../middleware/employee.php';
include '../config/database.php';

$name = $_POST['employee_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$fileName = $_FILES['photo']['name'];
$tmpName = $_FILES['photo']['tmp_name'];
$fileSize = $_FILES['photo']['size'];

$extension = strtolower(
    pathinfo($fileName, PATHINFO_EXTENSION)
);

$allowed = ['jpg', 'jpeg'];

if (!in_array($extension, $allowed)) {

    die('Format file harus JPG/JPEG');
}

if ($fileSize > 300000) {

    die('Ukuran file maksimal 300KB');
}

$newName = time() . '-' . $fileName;

move_uploaded_file(
    $tmpName,
    '../assets/uploads/' . $newName
);

mysqli_query(
    $conn,
    "INSERT INTO employees(
        employee_name,
        email,
        phone,
        address,
        photo
    ) VALUES(
        '$name',
        '$email',
        '$phone',
        '$address',
        '$newName'
    )"
);

header('Location: index.php');
exit;