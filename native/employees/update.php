<?php

include '../middleware/employee.php';
include '../config/database.php';

$id = $_POST['id'];

$name = $_POST['employee_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$oldPhoto = $_POST['old_photo'];

$newPhoto = $oldPhoto;

if ($_FILES['photo']['name'] != '') {

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

    $newPhoto = time() . '-' . $fileName;

    move_uploaded_file(
        $tmpName,
        '../assets/uploads/' . $newPhoto
    );

    if (
        file_exists('../assets/uploads/' . $oldPhoto)
    ) {

        unlink('../assets/uploads/' . $oldPhoto);
    }
}

mysqli_query(
    $conn,
    "UPDATE employees SET

        employee_name='$name',
        email='$email',
        phone='$phone',
        address='$address',
        photo='$newPhoto'

    WHERE id='$id'"
);

header('Location: index.php');
exit;