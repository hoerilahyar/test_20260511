<?php

include '../middleware/employee.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h3>Add Employee</h3>

            <form
                action="save.php"
                method="POST"
                enctype="multipart/form-data"
            >

                <div class="mb-3">

                    <label>Name</label>

                    <input
                        type="text"
                        name="employee_name"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Phone</label>

                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Address</label>

                    <textarea
                        name="address"
                        class="form-control"
                        rows="4"
                    ></textarea>

                </div>

                <div class="mb-3">

                    <label>Photo</label>

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

                <a href="index.php"
                   class="btn btn-secondary">
                   Back
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>