<?php
// session_start();
require 'connection.php';
session_start();

if (isset($_SESSION['is_login'])) {
    if (isset($_SESSION['admin'])) {
        header("Location: dashboard.php");
    } else {
        header("Location: homepage.php");
    }
    exit;
}


// cek login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = hash('md5', $password);
    // mencocokkan dengan database 
    $cekdatabase = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$hash_password'");
    // hitung jumlah data
    $hitung =  mysqli_num_rows($cekdatabase);

    if($hitung == 1){
        $data = $cekdatabase->fetch_assoc();
        $_SESSION["username"] = $data["username"];
        $_SESSION["is_login"] = true; 
        
        if($data['level'] == 'admin'){
            $_SESSION['admin'] = $data;
            echo "<script>
            alert('Login Berhasil');
            window.location='Dashboard_Admin/dashboard.php';
            </script>";
        }elseif($data['level'] == 'user'){
            $_SESSION['user'] = $data;
            echo "<script>
            alert('Login Berhasil');
            window.location='homepage.php';
            </script>";
        }
    }else{
        echo "<script>
        alert('Login Gagal');
        window.location='index.php';
        </script>";
    }
}
?>