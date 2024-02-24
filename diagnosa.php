<?php
require 'process.php';

// Fungsi READ
$query = "SELECT * FROM tbl_gejala";
$result = $conn->query($query);

$data_gejala = array();
while ($row = $result->fetch_assoc()) {
    $data_gejala[] = $row;
}

// Proses form ketika disubmit
if (isset($_POST['bsimpan'])) {
    // Parameter input dari pengguna
    $gejala_input = isset($_POST['gejala']) ? $_POST['gejala'] : array();
    $nama_pengguna = isset($_POST['nama']) ? $_POST['nama'] : '';
    $tanggal_diagnosa = date('Y-m-d');

    // Proses forward chaining
    function forwardChaining($gejala_input, $aturan) {
        $hasil_diagnosa = array();

        foreach ($aturan as $rule) {
            $rule_gejala = array_slice($rule, 0, count($rule) - 4);
            $diagnosa = $rule[count($rule) - 4];
            $keterangan = $rule[count($rule) - 3];

            // Check apakah gejala pada aturan terpenuhi
            if (checkRule($gejala_input, $rule_gejala)) {
                $hasil_diagnosa[] = array('diagnosa' => $diagnosa, 'keterangan' => $keterangan);
            }
        }

        return $hasil_diagnosa;
    }

    function checkRule($gejala_input, $rule_gejala) {
        $result = true;
        $gejala_input_lowercase = array_map('strtolower', $gejala_input);

        foreach ($rule_gejala as $gejala) {
            if (strpos($gejala, 'NOT') !== false) {
                $gejala = str_replace('NOT', '', $gejala);
                $result = $result && !in_array(strtolower($gejala), $gejala_input_lowercase);
            } else {
                $result = $result && in_array(strtolower($gejala), $gejala_input_lowercase);
            }
        }

        return $result;
    }

// Aturan dan parameter
$aturan = array(
  array('G01', 'AND', 'G02', 'AND NOT', 'G03', 'THEN', 'K01', 'Battery laptop Kehabisan Daya atau Rusak'),
  array('G02', 'AND', 'G03', 'THEN', 'K02', 'RAM Tidak Terpasang Dengan Baik atau Kotor'),
  array('G01', 'AND', 'G02', 'AND NOT', 'G03', 'THEN', 'K03', 'LCD Rusak'),
  array('G02', 'AND NOT', 'G04', 'THEN', 'K04', 'Motherboard Laptop Mati'),
  array('G04', 'AND', 'G09', 'THEN', 'K05', 'Keyboard Laptop Rusak'),
  array('G06', 'AND', 'G09', 'AND NOT', 'G10', 'THEN', 'K06', 'Chipset Enable Keyboard Rusak'),
  array('G06', 'AND', 'G08', 'AND', 'G09', 'THEN', 'K07', 'Harddisk Kehilangan Sistem Operasi'),
  array('G09', 'AND NOT', 'G10', 'THEN', 'K08', 'Charger Laptop Rusak'),
  array('G06', 'AND', 'G09', 'AND', 'G10', 'THEN', 'K09', 'Touchpad Rusak'),
  array('G11', 'AND', 'G12', 'THEN', 'K10', 'Tombol Keyboard ada yang error'),
  array('G06', 'AND NOT', 'G07', 'THEN', 'K11', 'Driver Wifi Hilang'),
  array('G13', 'THEN', 'K12', 'Terdengar suara beep berkali-kali di speaker'),
  array('G14', 'THEN', 'K13', 'Bila tombol Esc atau Ctrl+Alt+Del pada keyboard ditekan suara beep hilang'),
  array('G15', 'THEN', 'K14', 'Bila tombol keyboard laptop ditekan-tekan suara beep tidak hilang'),
  array('G16', 'THEN', 'K15', 'Muncul Pesan "Windows System Error" atau NTLDR is Missing'),
  array('G17', 'THEN', 'K16', 'Laptop dihidupkan normal'),
  array('G18', 'THEN', 'K17', 'Baterry Laptop tidak mau terisi saat dihubungkan dengan charger'),
  array('G19', 'THEN', 'K18', 'Lampu indikator (LED) battery tidak menyala saat dihubungkan ke charger'),
  array('G20', 'THEN', 'K19', 'Kursor tidak bergerak'),
  array('G21', 'THEN', 'K20', 'Tombol Start pada keyboard berfungsi'),
  array('G22', 'THEN', 'K21', 'Tampilan bergerak-gerak sendiri'),
  array('G23', 'THEN', 'K22', 'Bila tombol keyboard Esc atau Alt+F4 ditekan tampilan kembali normal'),
  array('G24', 'AND NOT', 'G25', 'THEN', 'K23', 'Laptop tidak dapat mengakses internet'),
  array('G25', 'THEN', 'K24', 'Hardware wifi tidak terbaca di windows'),
);


    // Jalankan forward chaining
    $hasil_diagnosa = forwardChaining($gejala_input, $aturan);

    // Simpan hasil diagnosa ke dalam database
    foreach ($hasil_diagnosa as $hasil) {
        $sql = "INSERT INTO tbl_hasil (hasil_probabilitas, nama_kerusakan, nama, solusi, tanggal) 
                VALUES ('', '" . $hasil['diagnosa'] . "', '$nama_pengguna', '" . $hasil['keterangan'] . "', '$tanggal_diagnosa')";
        $conn->query($sql);
    }

    // Tampilkan hasil diagnosa
    echo 'Hasil Diagnosa:';
    foreach ($hasil_diagnosa as $hasil) {
        echo '<br>- ' . $hasil['diagnosa'] . ': ' . $hasil['keterangan'];
        echo "<script> window.location='hasildiagnosa.php';</script>";
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
                  <table>
                    <?php // Periksa apakah $data_gejala diinisialisasi
                        if (isset($data_gejala)) {
                        foreach ($data_gejala as $gejala) : ?>
                      <tr class="text-light">
                        <td>
                          <input type="checkbox" id="<?= $gejala['idgejala']; ?>" name="idgejala[]" value="<?= $gejala['idgejala']; ?>">
                        </td>
                        <td colspan="2">
                          <?= $gejala['kode_gejala']; ?> | Apakah <?= $gejala['nama_gejala']; ?> ?
                        </td>
                      </tr>
                    <?php   endforeach;
                        } else {
                            echo "Data gejala tidak ditemukan atau terjadi kesalahan.";
                        } ?>
                  </table>
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
