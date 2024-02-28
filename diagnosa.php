<?php
require 'process.php';

// Fungsi READ
$query = "SELECT * FROM tbl_gejala";
$result = $conn->query($query);

$data_gejala = array();
while ($row = $result->fetch_assoc()) {
    $data_gejala[] = $row;
}

if (isset($_POST['bsimpan'])) {
    // Mendapatkan gejala yang dipilih dari formulir
    $gejala = isset($_POST['idgejala']) ? $_POST['idgejala'] : array();

    // Inisialisasi certainty factor
    $cf = array(
        "K01" => 0.2, // Contoh nilai certainty factor untuk setiap penyakit
        "K02" => 0.4,
        // Tambahkan penyakit lainnya
    );

    // Hitung certainty factor berdasarkan gejala yang dipilih
    foreach ($gejala as $g) {
        // Misal, jika gejala G01 dipilih, maka tingkat keyakinan untuk K01 ditambah
        if ($g == "G01") {
            $cf["K01"] += 0.2;
        }
        // Tambahkan kondisi lainnya
    }

    // Tentukan penyakit dengan certainty factor tertinggi
    $max_cf = max($cf);
    $penyakit = array_search($max_cf, $cf);

    // Simpan data ke database
    $nama = "Nama Pengguna"; // Gantilah dengan sesuai data pengguna yang sesuai
    $tanggal = date("Y-m-d H:i:s"); // Tanggal sekarang

    $sql = "INSERT INTO tbl_hasil (hasil_probabilitas, nama_kerusakan, nama, solusi, tanggal) VALUES ('$max_cf', '$penyakit', '$nama', '$solusi_penyakit', '$tanggal')";
    // Eksekusi query ke database (gunakan metode sesuai dengan koneksi database yang Anda gunakan)
    // $result = mysqli_query($koneksi, $sql);

    if ($result) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan saat menyimpan data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Pakar Kerusakan Laptop</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/stylediagnosa.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
  </head>
  <body>
  <img src="assets/img/img2.jpg" width="100%">  
    <div class="container">
      <form class="form-container2 mt-5" method="post" action="">
        <h1 class="textJudul text-center text-light mt-5">Diagnosa</h1>

        <!-- Tabel jenis diagnosa -->
        <div class="section section-features">
          <div class="container">
            <h4 class="header-text text-light text-start">Pilih Gejala</h4>
            <div class="row">
              <form action="hasildiagnosa.php" method="POST">
                <div class="boxes text-light">
                    <?php // Periksa apakah $data_gejala diinisialisasi
                        if (isset($data_gejala)) {
                        foreach ($data_gejala as $gejala) : ?>
                        <label ><?= $gejala['kode_gejala']; ?> | Apakah <?= $gejala['nama_gejala']; ?> ?</label>
                          <div class="col-md-3">
                          <select class="form-select col-md-3 " id="validationCustom04" required>
                            <option selected>Pilih Kondisi</option>
                            <option value="1">Tidak tahu</option>
                            <option value="2">Mungkin</option>
                            <option value="3">Kemungkinan Besar</option>
                            <option value="4">Hampir Pasti</option>
                            <option value="5">Pasti</option>
                          </select>
                        </div>
                    <?php   endforeach;
                        } else {
                            echo "Data gejala tidak ditemukan atau terjadi kesalahan.";
                        } ?>
                </div>
                <div class="mt-5">
                  <div class="row">
                    <div class="col-md-6 d-grid">
                      <button name="bsimpan" type="submit" class="btn btn-outline-primary"><a href="hasildiagnosa.php"></a> Simpan</button>
                    </div>
                    <div class="col-md-6 d-grid">
                      <button name="breset" type="button" class="btn btn-outline-danger" onclick="clearCheckboxes()">Kosongkan Data</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </form>
    </div>

        <script>
          // Fungsi untuk membersihkan semua checkbox
          function clearCheckboxes() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
              checkbox.checked = false;
            });
          }
        </script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  </body>
</html>
