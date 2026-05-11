<!DOCTYPE html>
<html>
<head>

    <title>Create Employee</title>

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
                        Add Employee
                    </h3>

                    <form
                        action="<?= site_url('employees'); ?>"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        <div class="mb-3">

                            <label class="form-label">
                                Employee Name
                            </label>

                            <input
                                type="text"
                                name="employee_name"
                                class="form-control"
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
                            ></textarea>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Photo
                            </label>

                            <input
                                type="file"
                                name="photo"
                                class="form-control"
                                required
                            >

                            <small class="text-muted">
                                JPG/JPEG max 300KB
                            </small>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-success"
                        >

                            Save

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