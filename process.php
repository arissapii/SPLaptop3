<?php
session_start();
require 'connection.php';
// session_start();

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

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
        $_SESSION["id"] = $data["iduser"];
        $_SESSION["username"] = $data["username"];
        // $_SESSION[ "is_login" ]= true;
        
        if($data['level'] == 'admin'){
            echo "<script>
            alert('Login Berhasil');
            window.location='Dashboard_Admin/dashboard.php';
            </script>";
        }elseif($data['level'] == 'user'){
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

function validasi() {
    global $conn;
    if(!isset($_SESSION['id']) ) {
        echo "<script>
        window.location='logout.php';
            </script>";
    }
}

function validasi_admin() {
    global $conn;
    if(!isset($_SESSION['id']) ) {
        echo "<script>
        window.location='logout.php';
            </script>";
    } else {
        $id = $_SESSION['id'];

        $query = mysqli_query($conn, "SELECT * FROM user WHERE iduser = $id");
        $data = mysqli_fetch_array($query);

        if($data['level'] != "admin") {
                echo "<script>
                window.location='../logout.php';
                </script>";
        }
    }
}

function hitung($data) {
    global $conn;

    $data_kerusakan = query("SELECT * FROM tbl_kerusakan");

    foreach($data_kerusakan as $kerusakan) {
        $idkerusakan = $kerusakan['idkerusakan'];

        $data_aturan = query("SELECT * FROM tbl_aturan WHERE idkerusakan = $idkerusakan");

        foreach($data_aturan as $aturan) {
            $idgejala = $aturan['idgejala'];

            $data_gejala = query("SELECT * FROM tbl_gejala WHERE idgejala = $idgejala")[0];
            $kode_gejala = $data_gejala['kode_gejala'];

            ${'cf_user_' . $kode_gejala} = $data[$kode_gejala];

            ${'cf_he_' . $kode_gejala} = ${'cf_user_' . $kode_gejala} * $data_gejala['MB'];

            echo "Nilai CF HE dari " . ${'cf_user_' . $kode_gejala} . " * " . $data_gejala['MB'] . " = " . ${'cf_he_' . $kode_gejala} . "<br><br>";

            ${'cf_he_' . $kerusakan['kode_kerusakan']}[] = ${'cf_he_' . $kode_gejala};
        }

        ${'cf_old_' . $kerusakan['kode_kerusakan'] . 0} = ${'cf_he_' . $kerusakan['kode_kerusakan']}[0];
        
        for($i = 0; $i < count(${'cf_he_' . $kerusakan['kode_kerusakan']}) - 1; $i++) {
            ${'cf_old_' . $kerusakan['kode_kerusakan'] . $i + 1} = ${'cf_old_' . $kerusakan['kode_kerusakan'] . $i} + ${'cf_he_' . $kerusakan['kode_kerusakan']}[$i + 1] * (1 - ${'cf_old_' . $kerusakan['kode_kerusakan'] . $i});
            
            echo "Hasil CF OLD " . $i + 1 . " dari " . ${'cf_old_' . $kerusakan['kode_kerusakan'] . $i} . " + " . ${'cf_he_' . $kerusakan['kode_kerusakan']}[$i + 1] . " * (1 - " . ${'cf_old_' . $kerusakan['kode_kerusakan'] . $i} . ") = " . ${'cf_old_' . $kerusakan['kode_kerusakan'] . $i + 1} . "<br><br>";
            ${'cf_combine_' . $kerusakan['kode_kerusakan']}[] = ${'cf_old_' . $kerusakan['kode_kerusakan'] . $i + 1};
        }

        ${'terbesar_' . $kerusakan['kode_kerusakan']} = (max(${'cf_combine_' . $kerusakan['kode_kerusakan']}));

        $nilai_hasil[] =  ${'terbesar_' . $kerusakan['kode_kerusakan']};
        $array_idkerusakan[] = $idkerusakan;
    }

    $hasil_terbesar = max($nilai_hasil);
    $index_hasil = array_search($hasil_terbesar, $nilai_hasil);
    $index_idkerusakan = $array_idkerusakan[$index_hasil];

    $hasil = number_format($hasil_terbesar * 100, 2);

    // var_dump($nilai_hasil);
    // die;

    $iduser = $_SESSION['id'];

    mysqli_query($conn, "INSERT INTO tbl_hasil VALUES (NULL, '$iduser', '$index_idkerusakan', '$hasil', CURRENT_TIMESTAMP())");

    return mysqli_affected_rows($conn);
}
?>