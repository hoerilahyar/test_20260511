<?php

include '../middleware/admin.php';
include '../config/database.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM users ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>

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
            <h2>User Management</h2>

            <small class="text-muted">
                List of application users
            </small>
        </div>

        <div>

            <a href="../index.php"
               class="btn btn-secondary">
               <i class="bi bi-arrow-left"></i>
               Dashboard
            </a>

            <a href="create.php"
               class="btn btn-primary">
               <i class="bi bi-plus-circle"></i>
               Add User
            </a>

        </div>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr class="text-center">

                            <th width="80">No</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th width="150">Role</th>
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

                            <td>
                                <?= $row['username']; ?>
                            </td>

                            <td>
                                <?= $row['fullname']; ?>
                            </td>

                            <td class="text-center">

                                <?php if ($row['role'] == 'admin') : ?>

                                    <span class="badge bg-primary">
                                        Admin
                                    </span>

                                <?php elseif ($row['role'] == 'hrd') : ?>

                                    <span class="badge bg-warning text-dark">
                                        HRD
                                    </span>

                                <?php else : ?>

                                    <span class="badge bg-success">
                                        Pegawai
                                    </span>

                                <?php endif; ?>
                            </td>

                            <td class="text-center">

                                <a href="edit.php?id=<?= $row['id']; ?>"
                                   class="btn btn-warning btn-sm">

                                   <i class="bi bi-pencil-square"></i>
                                   Edit

                                </a>

                                <a href="delete.php?id=<?= $row['id']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus data?')">

                                   <i class="bi bi-trash"></i>
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