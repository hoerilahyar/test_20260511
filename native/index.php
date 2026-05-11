<?php include 'middleware/auth.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h2>Dashboard</h2>

            <small>
                Welcome,
                <?= $_SESSION['fullname']; ?>
                (<?= $_SESSION['role']; ?>)
            </small>
        </div>

        <a href="auth/logout.php"
           class="btn btn-danger">
           Logout
        </a>

    </div>

    <hr>

    <div class="row">

        <?php if ($_SESSION['role'] == 'admin') : ?>

        <div class="col-md-6 mb-3">

            <div class="card shadow h-100">

                <div class="card-body">

                    <h4>User Management</h4>

                    <p>
                        Manage application users
                    </p>

                    <a href="users/index.php"
                       class="btn btn-primary">
                       Masuk
                    </a>

                </div>

            </div>

        </div>

        <?php endif; ?>

        <!-- ADMIN & HRD -->
        <?php if (
            $_SESSION['role'] == 'admin' ||
            $_SESSION['role'] == 'hrd'
        ) : ?>

        <div class="col-md-6 mb-3">

            <div class="card shadow h-100">

                <div class="card-body">

                    <h4>Employee Management</h4>

                    <p>
                        Manage employee data
                    </p>

                    <a href="employees/index.php"
                       class="btn btn-success">
                       Masuk
                    </a>

                </div>

            </div>

        </div>

        <?php endif; ?>

    </div>

</div>

</body>
</html>