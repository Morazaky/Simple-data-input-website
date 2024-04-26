<?php
    session_start();
    include "koneksi.php";
    function query($query){
        global $koneksi;

        $result = mysqli_query($koneksi, $query);

        $rows =[];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }
    $data_mhs = query('SELECT * FROM latihan');

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
    <link rel="stylesheet" href="preview.css">
    <title>Tugas Input Data | Preview</title>
    <style>
    </style>
</head>
<header>
        <img class="logo" src="logo.png" alt="logo">
        <nav>
            <ul class="nav__links">
                <li><a href="input.php">Input</a></li>
                <li><a href="preview.php">Preview</a></li>
            </ul>
        </nav>
        <a class="cta" href="logout.php"><button class="btnlogout">Logout</button></a>
</header>
<body>

<div class="center">
    <button class="btncetak"><a target="_blank" href="cetak.php">Cetak</a></button>
</div>
<div class="container" id="container">
    <div class="form-container input-akun">
    <table class="table1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Hobby</th>
        </tr>
        <?php
            foreach($data_mhs as $tampil_mhs) :
        ?>
            <tr>
                <td><?= $tampil_mhs['nim']; ?></td>
                <td><?= $tampil_mhs['nama']; ?></td>
                <td><?= $tampil_mhs['hobby']; ?></td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
    </div>
</div>

</body>
</html>