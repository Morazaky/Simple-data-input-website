<?php
    session_start();
    include "koneksi.php";

    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_prepare($koneksi, "SELECT * FROM tbl_users WHERE username=? AND password=?");
        mysqli_stmt_bind_param($query, 'ss', $username, $password);
        mysqli_stmt_execute($query);
        
        $result = mysqli_stmt_get_result($query);

        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_array($result);
            $_SESSION['tbl_users'] = $data;
            echo '<script>alert("Selamat datang, '.$data['username'].'");
                window.location.href="input.php";</script>';
        } else {
            echo '<script>alert("Username/Password yang anda masukkan SALAH.");</script>';
        }
    }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Tugas Input Data | Login</title>

    <style>
        .logo{
        max-width: 70px;
        max-height: 70px;
        cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container" id="container">
        
        <div class="form-container buat-akun">
        
            <form action="buatakun.php" method="POST">
                <h1>Buat Akun</h1>
                <span>Buat akun dengan username dan password</span>
                <input type="text" name="rusername" placeholder="Username" required>
                <input type="password" name="rpassword" placeholder="Password" required>
                <button id="buat-akun">Buat Akun</button>
            </form>
        </div>
        <div class="form-container masuk">
            <form method="post">
                <h1>Masuk</h1>
                <span>Masukkan username dan password</span>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password"placeholder="Password" required>
                <button id="masuk">Masuk</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                <img class="logo" src="logo.png" alt="logo">
                    <h1>Sudah Memiliki Akun?</h1>
                    <button class="hidden" id="login">Masuk</button>
                </div>
                <div class="toggle-panel toggle-right">
                <img class="logo" src="logo.png" alt="logo">
                    <h1>Belum Memiliki Akun?</h1>
                    <button class="hidden" id="register">Buat Akun</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="script.js"></script>
</body>
</html>