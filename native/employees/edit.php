<?php

include '../middleware/employee.php';
include '../config/database.php';

$id = $_GET['id'];

$query = mysqli_query(
    $conn,
    "SELECT * FROM employees WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h3>Edit Employee</h3>

            <form
                action="update.php"
                method="POST"
                enctype="multipart/form-data"
            >

                <input
                    type="hidden"
                    name="id"
                    value="<?= $data['id']; ?>"
                >

                <input
                    type="hidden"
                    name="old_photo"
                    value="<?= $data['photo']; ?>"
                >

                <div class="mb-3">

                    <label>Name</label>

                    <input
                        type="text"
                        name="employee_name"
                        class="form-control"
                        value="<?= $data['employee_name']; ?>"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?= $data['email']; ?>"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Phone</label>

                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        value="<?= $data['phone']; ?>"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Address</label>

                    <textarea
                        name="address"
                        class="form-control"
                        rows="4"
                    ><?= $data['address']; ?></textarea>

                </div>

                <div class="mb-3">

                    <label>Current Photo</label>

                    <br>

                    <img
                        src="../assets/uploads/<?= $data['photo']; ?>"
                        width="120"
                        class="rounded"
                    >

                </div>

                <div class="mb-3">

                    <label>New Photo</label>

                    <input
                        type="file"
                        name="photo"
                        class="form-control"
                    >

                    <small class="text-muted">
                        JPG/JPEG max 300KB
                    </small>

                </div>

                <button
                    type="submit"
                    class="btn btn-warning"
                >
                    Update
                </button>

                <a href="index.php"
                   class="btn btn-secondary">
                   Back
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>