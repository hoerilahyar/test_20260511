<?php

include '../middleware/employee.php';
include '../config/database.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM employees ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    >
</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2>Employee Management</h2>

            <small class="text-muted">
                List of employees
            </small>
        </div>

        <div>

            <a href="../index.php"
               class="btn btn-secondary">

                Dashboard

            </a>

            <a href="create.php"
               class="btn btn-success">

                Add Employee

            </a>

        </div>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr class="text-center">

                            <th>No</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th width="180">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php
                    $no = 1;

                    while ($row = mysqli_fetch_assoc($data)) :
                    ?>

                        <tr>

                            <td class="text-center">
                                <?= $no++; ?>
                            </td>

                            <td class="text-center">

                                <img
                                    src="../assets/uploads/<?= $row['photo']; ?>"
                                    width="70"
                                    height="70"
                                    style="object-fit: cover; border-radius: 10px;"
                                >

                            </td>

                            <td>
                                <?= $row['employee_name']; ?>
                            </td>

                            <td>
                                <?= $row['email']; ?>
                            </td>

                            <td>
                                <?= $row['phone']; ?>
                            </td>

                            <td class="text-center">

                                <a href="edit.php?id=<?= $row['id']; ?>"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <a href="delete.php?id=<?= $row['id']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus data?')">

                                    Delete

                                </a>

                            </td>

                        </tr>

                    <?php endwhile; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>