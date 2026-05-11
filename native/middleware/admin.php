<?php

session_start();

if (!isset($_SESSION['login'])) {

    header('Location: ../auth/login.php');
    exit;
}

if ($_SESSION['role'] != 'admin') {

    echo "
        <script>
            alert('Akses ditolak');
            window.location='../index.php';
        </script>
    ";

    exit;
}