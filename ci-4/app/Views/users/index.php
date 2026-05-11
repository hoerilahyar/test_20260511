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
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                User Management
            </h2>

            <p class="text-muted mb-0">
                List of application users
            </p>

        </div>

        <div>

            <a href="<?= site_url('dashboard'); ?>"
               class="btn btn-secondary">

                <i class="bi bi-arrow-left"></i>
                Dashboard

            </a>

            <a href="<?= site_url('users/new'); ?>"
               class="btn btn-primary">

                <i class="bi bi-plus-circle"></i>
                Add User

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
                            <th>Username</th>
                            <th>Fullname</th>
                            <th width="150">Role</th>
                            <th width="180">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php if (!empty($users)) : ?>

                        <?php
                        $no = 1;

                        foreach ($users as $user) :
                        ?>

                        <tr>

                            <td class="text-center">

                                <?= $no++; ?>

                            </td>

                            <td>

                                <?= $user['username']; ?>

                            </td>

                            <td>

                                <?= $user['fullname']; ?>

                            </td>

                            <td class="text-center">

                                <?php if ($user['role'] == 'admin') : ?>

                                    <span class="badge bg-primary">
                                        Admin
                                    </span>

                                <?php elseif ($user['role'] == 'hrd') : ?>

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

                                <a
                                    href="<?= site_url('users/' . $user['id'] . '/edit'); ?>"
                                    class="btn btn-warning btn-sm"
                                >

                                    <i class="bi bi-pencil-square"></i>
                                    Edit

                                </a>

                                <form
                                    action="<?= site_url('users/' . $user['id']); ?>"
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
                                        onclick="return confirm('Yakin hapus user?')"
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
                                colspan="5"
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