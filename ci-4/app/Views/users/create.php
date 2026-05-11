<!DOCTYPE html>
<html>
<head>

    <title>Create User</title>

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
                        Add User
                    </h3>

                    <form
                        action="<?= site_url('users'); ?>"
                        method="POST"
                    >

                        <div class="mb-3">

                            <label class="form-label">
                                Username
                            </label>

                            <input
                                type="text"
                                name="username"
                                class="form-control"
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
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Fullname
                            </label>

                            <input
                                type="text"
                                name="fullname"
                                class="form-control"
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

                                <option value="">
                                    -- Select Role --
                                </option>

                                <option value="admin">
                                    Admin
                                </option>

                                <option value="hrd">
                                    HRD
                                </option>

                                <option value="pegawai">
                                    Pegawai
                                </option>

                            </select>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >

                            Save

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