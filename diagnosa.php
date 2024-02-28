<?php
require_once 'process.php';

// Fungsi READ diagnosa
$query = "SELECT * FROM tbl_gejala";
$result = $conn->query($query);

$data_gejala = array();
while ($row = $result->fetch_assoc()) {
    $data_gejala[] = $row;
}

// Fungsi forward chaining
function forwardChaining($selectedGejala, $conn) {
    // Inisialisasi array untuk menyimpan fakta-fakta yang telah diketahui
    $knownFacts = array();

    // Melakukan iterasi untuk setiap gejala yang dipilih oleh pengguna
    foreach ($selectedGejala as $gejala) {
        // Memeriksa apakah gejala dipenuhi
        $gejalaCode = $gejala['kode'];
        $gejalaValue = $gejala['value'];

        // Menyimpan gejala yang telah diketahui
        $knownFacts[$gejalaCode] = $gejalaValue;

        // Memeriksa apakah ada aturan yang memenuhi fakta-fakta yang telah diketahui
        $result = checkRules($knownFacts, $conn);

        // Jika ada hasil yang ditemukan, mengembalikan hasil diagnosa
        if ($result) {
            return $result;
        }
    }

    // Jika tidak ada hasil yang ditemukan, mengembalikan null atau pesan lain sesuai kebutuhan
    return null;
}

// Fungsi untuk memeriksa aturan dan menghasilkan hasil diagnosa jika aturan terpenuhi
function checkRules($knownFacts, $conn) {

    if (
        isset($knownFacts['G01']) && isset($knownFacts['G02']) && isset($knownFacts['G03'])
    ) {
        return "K01";
    }

    if (
        isset($knownFacts['G01']) && isset($knownFacts['G04']) && isset($knownFacts['G05']) &&
        isset($knownFacts['G06']) && isset($knownFacts['G07'])
    ) {
        return "K02";
    }

    if (
        isset($knownFacts['G01']) && isset($knownFacts['G04']) && isset($knownFacts['G05']) &&
        isset($knownFacts['G06']) && isset($knownFacts['G08'])
    ) {
        return "K03";
    }

    if (
        isset($knownFacts['G01']) && isset($knownFacts['G09']) && isset($knownFacts['G10']) &&
        isset($knownFacts['G11'])
    ) {
        return "K04";
    }

    if (
        isset($knownFacts['G12']) && isset($knownFacts['G13']) && isset($knownFacts['G14'])
    ) {
        return "K05";
    }

    if (
        isset($knownFacts['G12']) && isset($knownFacts['G13']) && isset($knownFacts['G15'])
    ) {
        return "K06";
    }

    if (
        isset($knownFacts['G12']) && isset($knownFacts['G16'])
    ) {
        return "K07";
    }

    if (
        isset($knownFacts['G17']) && isset($knownFacts['G18']) && isset($knownFacts['G19'])
    ) {
        return "K08";
    }

    if (
        isset($knownFacts['G17']) && isset($knownFacts['G20']) && isset($knownFacts['G21'])
    ) {
        return "K09";
    }

    if (
        isset($knownFacts['G17']) && isset($knownFacts['G22']) && isset($knownFacts['G23'])
    ) {
        return "K10";
    }

    if (
        isset($knownFacts['G17']) && isset($knownFacts['G24']) && isset($knownFacts['G25'])
    ) {
        return "K11";
    }

    // Jika tidak ada aturan yang terpenuhi, kembalikan null
    return null;
}

// Fungsi untuk menghitung Certainty Factor
function calculateCertaintyFactor($gejalaCode, $hasilDiagnosa, $conn) {
  // Mendapatkan nilai certainty factor dari database berdasarkan gejala dan hasil diagnosa
  $query = "SELECT * FROM tbl_cf WHERE kode_gejala = '$gejalaCode' AND kode_kerusakan = '$hasilDiagnosa'";
  $result = $conn->query($query);

  if ($result === FALSE) {
      die("Error: " . $conn->error); // Menampilkan error SQL jika terjadi
  }

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $cfValue = $row['cf_value'];
      
      // Jika nilai CF berasal dari skala kategori, langsung kembalikan nilainya
      if ($cfValue >= 0.2 && $cfValue <= 1.0) {
          return $cfValue;
      }

      // Jika nilai CF berasal dari data probabilitas, sesuaikan dengan skala kategori
      if ($cfValue > 0.5) {
          return ($cfValue - 0.5) * 2; // Menyesuaikan nilai probabilitas > 0.5 ke skala 0.6 - 1.0
      } else {
          return $cfValue * 0.4; // Menyesuaikan nilai probabilitas <= 0.5 ke skala 0.2 - 0.5
      }
  }

  return 0; // Jika tidak ada nilai yang ditemukan, mengembalikan 0
}

// Jika tombol di submit
if (isset($_POST['bsimpan'])) {
  $selectedGejala = array();

  // Mendapatkan gejala yang dipilih dari formulir
  foreach ($data_gejala as $gejala) {
      $gejalaCode = $gejala['kode_gejala'];
      $selectedValue = $_POST["gejala_$gejalaCode"];

      // Jika gejala dipilih, tambahkan ke array
      if ($selectedValue != "Pilih Kondisi") {
          $selectedGejala[] = array(
              'kode' => $gejalaCode,
              'value' => $selectedValue
          );
      }
  }

  // Melakukan forward chaining untuk mendapatkan hasil diagnosa
  $hasilDiagnosa = forwardChaining($selectedGejala, $conn);

  // Menampilkan hasil diagnosa dan certainty factor
  if ($hasilDiagnosa) {
      echo "Hasil Diagnosa: $hasilDiagnosa <br>";

      // Simpan hasil diagnosa ke dalam tabel tbl_hasil
      $tanggalDiagnosa = date("Y-m-d H:i:s");
      $username = $_SESSION['username'];

      // Query untuk menyimpan hasil diagnosa
      $queryInsertHasil = "INSERT INTO tbl_hasil (hasil_probabilitas, nama_kerusakan, nama, solusi, tanggal) VALUES ('$hasilDiagnosa', '$hasilDiagnosa', '$username', 'Solusi Kerusakan', '$tanggalDiagnosa')";
      $resultInsertHasil = $conn->query($queryInsertHasil);

      if ($resultInsertHasil === FALSE) {
          die("Error: " . $conn->error); // Menampilkan error SQL jika terjadi
      }

      $lastInsertedId = $conn->insert_id;

      foreach ($selectedGejala as $gejala) {
          $gejalaCode = $gejala['kode'];
          $certaintyFactor = calculateCertaintyFactor($gejalaCode, $hasilDiagnosa, $conn);

          // Query untuk menyimpan gejala dan certainty factor ke dalam tabel tbl_hasil
          $queryInsertHasilGejala = "INSERT INTO tbl_hasil (id_hasil, kode_gejala, cf_value) VALUES ('$lastInsertedId', '$gejalaCode', '$certaintyFactor')";
          $resultInsertHasilGejala = $conn->query($queryInsertHasilGejala);

          if ($resultInsertHasilGejala === FALSE) {
              die("Error: " . $conn->error); // Menampilkan error SQL jika terjadi
          }

          echo "Gejala $gejalaCode memiliki Certainty Factor: $certaintyFactor <br>";
      }
  } else {
      echo "Tidak ada hasil diagnosa yang sesuai aturan.";
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
                <?php
                        if (isset($data_gejala)) {
                            foreach ($data_gejala as $gejala) :
                                ?>
                                <label><?= $gejala['kode_gejala']; ?> | Apakah <?= $gejala['nama_gejala']; ?> ?</label>
                                <div class="col-md-3">
                                    <select class="form-select col-md-3 " id="validationCustom04" name="gejala_<?= $gejala['kode_gejala']; ?>" required>
                                        <option selected>Pilih Kondisi</option>
                                        <option value="1">Tidak tahu</option>
                                        <option value="2">Mungkin</option>
                                        <option value="3">Kemungkinan Besar</option>
                                        <option value="4">Hampir Pasti</option>
                                        <option value="5">Pasti</option>
                                    </select>
                                </div>
                        <?php
                            endforeach;
                        } else {
                            echo "Data gejala tidak ditemukan atau terjadi kesalahan.";
                        }
                        ?>
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
