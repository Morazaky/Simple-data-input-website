<?php
session_start();
    include("koneksi.php");
    if (isset($_POST['simpan'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $hobby = $_POST['hobby'];
    
        $query_sql = "INSERT INTO latihan 
                VALUES('$nim', '$nama', '$hobby')";
    
        if (mysqli_query($koneksi, $query_sql)) {
            echo "<script>alert('Data berhasil disimpan'); window.location='input.php';</script>";
        } else {
            echo "<script>alert('Data gagal disimpan'); window.location='input.php';</script>";
        }
    }
    if(!isset($_SESSION['tbl_users'])) {
        echo "<script>alert('Anda harus login terlebih dahulu'); window.location='home.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="input.css">
    <title>Tugas Input Data | Input</title>
</head>
<header>
        <img class="logo" src="logo.png" alt="logo">
        <nav>
            <ul class="nav__links">
                <li><a href="input.php">Input</a></li>
                <li><a href="preview.php">Preview</a></li>
            </ul>
        </nav>
        <a class="cta" href="logout.php"><button>Logout</button></a>
</header>
<body>

<div class="container" id="container">
    <div class="form-container input-akun">
        <form id="inpuut" action="" method="POST">
            <h1>Form Input Data</h1>
            <span>Mohon input data dengan baik dan benar</span>
            <input type="text" name="nim" placeholder="NIM" required>
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="hobby" placeholder="Hobby" required>
            <button name="simpan">Simpan Data</button>
            <button name="preview"><a href="preview.php">Preview</a></button>
        </form>
    </div>
</div>

</body>
</html>