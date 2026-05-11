<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    >

</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Dashboard
            </h2>

            <p class="text-muted mb-0">

                Welcome,
                <?= session()->get('fullname'); ?>

                (<?= session()->get('role'); ?>)

            </p>

        </div>

        <a href="<?= site_url('logout'); ?>"
           class="btn btn-danger">

            <i class="bi bi-box-arrow-right"></i>
            Logout

        </a>

    </div>

    <div class="row">

        <!-- USER MANAGEMENT -->
        <?php if (session()->get('role') == 'admin') : ?>

        <div class="col-md-6 mb-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body">

                    <div class="mb-3">

                        <div
                            class="bg-primary text-white rounded d-inline-flex
                            align-items-center justify-content-center"
                            style="width:60px; height:60px;"
                        >

                            <i class="bi bi-people-fill fs-3"></i>

                        </div>

                    </div>

                    <h4 class="fw-bold">
                        User Management
                    </h4>

                    <p class="text-muted">

                        Manage system users and roles.

                    </p>

                    <a href="<?= site_url('users'); ?>"
                       class="btn btn-primary">

                        Open

                    </a>

                </div>

            </div>

        </div>

        <?php endif; ?>

        <!-- EMPLOYEE MANAGEMENT -->
        <?php if (
            session()->get('role') == 'admin' ||
            session()->get('role') == 'hrd'
        ) : ?>

        <div class="col-md-6 mb-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body">

                    <div class="mb-3">

                        <div
                            class="bg-success text-white rounded d-inline-flex
                            align-items-center justify-content-center"
                            style="width:60px; height:60px;"
                        >

                            <i class="bi bi-person-badge-fill fs-3"></i>

                        </div>

                    </div>

                    <h4 class="fw-bold">
                        Employee Management
                    </h4>

                    <p class="text-muted">

                        Manage employee information and data.

                    </p>

                    <a href="<?= site_url('employees'); ?>"
                       class="btn btn-success">

                        Open

                    </a>

                </div>

            </div>

        </div>

        <?php endif; ?>

    </div>

</div>

</body>
</html>