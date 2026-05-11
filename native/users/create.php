<?php

include '../middleware/auth.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-body">

            <h3>Tambah User</h3>

            <form action="save.php" method="POST">

                <div class="mb-3">
                    <label>Username</label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label>Fullname</label>

                    <input
                        type="text"
                        name="fullname"
                        class="form-control"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary">
                    Save
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