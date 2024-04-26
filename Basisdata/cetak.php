<?php
    include("koneksi.php");
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="cetak.css">
    <title>Tugas Input Data | Cetak</title>
    <style>
    </style>
</head>
<body>

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

<script type="text/javascript">
    window.print();
</script>
</body>
</html>