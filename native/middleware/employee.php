<?php

session_start();

if (!isset($_SESSION['login'])) {

    header('Location: ../auth/login.php');
    exit;
}

$allowedRoles = ['admin', 'hrd'];

if (!in_array($_SESSION['role'], $allowedRoles)) {

    echo "
        <script>
            alert('Akses ditolak');
            window.location='../index.php';
        </script>
    ";

    exit;
}