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
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Employee Management
            </h2>

            <p class="text-muted mb-0">
                List of employees
            </p>

        </div>

        <div>

            <a href="<?= site_url('dashboard'); ?>"
               class="btn btn-secondary">

                <i class="bi bi-arrow-left"></i>
                Dashboard

            </a>

            <a href="<?= site_url('employees/new'); ?>"
               class="btn btn-success">

                <i class="bi bi-plus-circle"></i>
                Add Employee

            </a>

        </div>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table
                    class="table table-bordered table-hover align-middle"
                >

                    <thead class="table-dark">

                        <tr class="text-center">

                            <th width="70">No</th>
                            <th width="120">Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th width="180">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php if (!empty($employees)) : ?>

                        <?php
                        $no = 1;

                        foreach ($employees as $employee) :
                        ?>

                        <tr>

                            <td class="text-center">

                                <?= $no++; ?>

                            </td>

                            <td class="text-center">

                                <?php if ($employee['photo']) : ?>

                                    <img
                                        src="<?= base_url('uploads/' . $employee['photo']); ?>"
                                        width="70"
                                        height="70"
                                        class="rounded border"
                                        style="object-fit: cover;"
                                    >

                                <?php else : ?>

                                    <span class="text-muted">
                                        No Photo
                                    </span>

                                <?php endif; ?>

                            </td>

                            <td>

                                <?= $employee['employee_name']; ?>

                            </td>

                            <td>

                                <?= $employee['email']; ?>

                            </td>

                            <td>

                                <?= $employee['phone']; ?>

                            </td>

                            <td class="text-center">

                                <a
                                    href="<?= site_url('employees/' . $employee['id'] . '/edit'); ?>"
                                    class="btn btn-warning btn-sm"
                                >

                                    <i class="bi bi-pencil-square"></i>
                                    Edit

                                </a>

                                <form
                                    action="<?= site_url('employees/' . $employee['id']); ?>"
                                    method="POST"
                                    class="d-inline"
                                >

                                    <input
                                        type="hidden"
                                        name="_method"
                                        value="DELETE"
                                    >

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data?')"
                                    >

                                        <i class="bi bi-trash"></i>
                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <tr>

                            <td
                                colspan="6"
                                class="text-center text-muted"
                            >

                                No data available

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>