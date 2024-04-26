<?php
require 'koneksi.php';
if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $hobby = $_POST['hobby'];

    $query_sql = "INSERT INTO latihan 
            VALUES('$nim', '$nama', '$hobby')";

    if (mysqli_query($conn, $query_sql)) {
        echo "<script>window.alert('Data berhasil disimpan')window.location='input.php'</script>";
    } else {
        echo "<script>window.alert('Data gagal disimpan')window.location='input.php'</script>";
    }
}