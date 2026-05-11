<?php

include '../middleware/auth.php';
include '../config/database.php';

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM users WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-body">

            <h3>Edit User</h3>

            <form action="update.php" method="POST">

                <input type="hidden" name="id" value="<?= $data['id']; ?>">

                <div class="mb-3">
                    <label>Username</label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        value="<?= $data['username']; ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label>Fullname</label>

                    <input
                        type="text"
                        name="fullname"
                        class="form-control"
                        value="<?= $data['fullname']; ?>"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>