<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "lyrid_prima"
);

if (!$conn) {
    die("Connection Failed");
}