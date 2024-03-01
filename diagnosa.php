<?php
    require_once 'process.php';

    // Fungsi READ diagnosa
    $data_gejala = query("SELECT * FROM tbl_gejala");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
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
    <link rel="stylesheet" type="text/css" href="css/stylediagnosa.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
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
                <div class="boxes text-light">
                  <?php
                    if (isset($data_gejala)) {
                      foreach ($data_gejala as $gejala) :
                  ?>
                    <label><?= $gejala['kode_gejala']; ?> | Apakah <?= $gejala['nama_gejala']; ?> ?</label>
                    <div class="col-md-3">
                        <select class="form-select col-md-3 " id="validationCustom04" name="<?= $gejala['kode_gejala']; ?>" required>
                            <option value="0" selected>Tidak tahu</option>
                            <option value="0.2">Mungkin</option>
                            <option value="0.4">Kemungkinan Besar</option>
                            <option value="0.6">Hampir Pasti</option>
                            <option value="0.8">Pasti</option>
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
                      <button name="bsimpan" type="submit" class="btn btn-outline-primary">Simpan</button>
                    </div>
                    <div class="col-md-6 d-grid">
                      <button name="breset" type="button" class="btn btn-outline-danger" onclick="clearCheckboxes()">Kosongkan Data</button>
                    </div>
                  </div>
                </div>
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

<?php 
    if(isset($_POST['bsimpan'])) {
        hitung($_POST);
    }
?>
