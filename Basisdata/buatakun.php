<?php
require 'koneksi.php';
$username = $_POST["rusername"];
$password = $_POST["rpassword"];

$query_sql = "INSERT INTO tbl_users (username, password)
                VALUES ('$username', '$password')";

if (mysqli_query($koneksi, $query_sql)) {
    echo "<script>alert('Registrasi Berhasil'); window.location='index.php';</script>";
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}