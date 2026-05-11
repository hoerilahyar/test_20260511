<!DOCTYPE html>
<html>
<head>

    <title>Edit Employee</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>
<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h3 class="mb-4">
                        Edit Employee
                    </h3>

                    <form
                        action="<?= site_url('employees/' . $employee['id']); ?>"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        <input
                            type="hidden"
                            name="_method"
                            value="PUT"
                        >

                        <div class="mb-3">

                            <label class="form-label">
                                Employee Name
                            </label>

                            <input
                                type="text"
                                name="employee_name"
                                class="form-control"
                                value="<?= $employee['employee_name']; ?>"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="<?= $employee['email']; ?>"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Phone
                            </label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="<?= $employee['phone']; ?>"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Address
                            </label>

                            <textarea
                                name="address"
                                class="form-control"
                                rows="4"
                            ><?= $employee['address']; ?></textarea>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Current Photo
                            </label>

                            <br>

                            <img
                                src="<?= base_url('uploads/' . $employee['photo']); ?>"
                                width="120"
                                class="rounded border"
                            >

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                New Photo
                            </label>

                            <input
                                type="file"
                                name="photo"
                                class="form-control"
                            >

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti foto
                            </small>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-warning"
                        >

                            Update

                        </button>

                        <a
                            href="<?= site_url('employees'); ?>"
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