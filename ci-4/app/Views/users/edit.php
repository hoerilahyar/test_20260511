<!DOCTYPE html>
<html>
<head>

    <title>Edit User</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>
<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h3 class="mb-4">
                        Edit User
                    </h3>

                    <form
                        action="<?= site_url('users/' . $user['id']); ?>"
                        method="POST"
                    >

                        <input
                            type="hidden"
                            name="_method"
                            value="PUT"
                        >

                        <div class="mb-3">

                            <label class="form-label">
                                Username
                            </label>

                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                value="<?= $user['username']; ?>"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                            >

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti password
                            </small>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Fullname
                            </label>

                            <input
                                type="text"
                                name="fullname"
                                class="form-control"
                                value="<?= $user['fullname']; ?>"
                                required
                            >

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Role
                            </label>

                            <select
                                name="role"
                                class="form-select"
                                required
                            >

                                <option
                                    value="admin"
                                    <?= $user['role'] == 'admin' ? 'selected' : ''; ?>
                                >
                                    Admin
                                </option>

                                <option
                                    value="hrd"
                                    <?= $user['role'] == 'hrd' ? 'selected' : ''; ?>
                                >
                                    HRD
                                </option>

                                <option
                                    value="pegawai"
                                    <?= $user['role'] == 'pegawai' ? 'selected' : ''; ?>
                                >
                                    Pegawai
                                </option>

                            </select>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-warning"
                        >

                            Update

                        </button>

                        <a
                            href="<?= site_url('users'); ?>"
                            class="btn btn-secondary"
                        >

                            Back

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>