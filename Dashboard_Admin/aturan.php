<?php
require '../process.php';

    // Fungsi CREATE
    if (isset($_POST["tambahaturan"])) {
      // Ambil data dari formulir
      $kerusakan = $_POST["takerusakan"];
      $gejala = $_POST["tagejala"];
  
      // Query SQL untuk INSERT data ke dalam tabel
      $sql = "INSERT INTO tbl_aturan (idkerusakan, idgejala) VALUES ('$kerusakan', '$gejala')";
  
      // Eksekusi query
      if ($conn->query($sql)) {
          echo "<script>
          alert('Tambah Aturan Berhasil!');
          window.location='aturan.php';
          </script>";
      } else {
          echo "<script>
          alert('Tambah Aturan Gagal!');
          window.location='aturan.php';
          </script>";
      }
    }

    // Fungsi READ
    $query = "SELECT * FROM tbl_aturan"; 
    $result = $conn->query($query);
    $data_aturan = array();
    while ($row = $result->fetch_assoc()) {
        $data_aturan[] = $row;
    }

    // Fungsi UPDATE
    if (isset($_POST["ubahaturan"])) {
      $idaturan = $_POST["id"];
      $kerusakan = $_POST["kerusakan"];
      $gejala = $_POST["gejala"];

      // Query SQL untuk UPDATE data di dalam tabel
      $sql = "UPDATE tbl_aturan SET idkerusakan='$kerusakan', idgejala='$gejala' WHERE idaturan='$idaturan'";

      //die();
      // Eksekusi query
      if ($conn->query($sql)) {
          echo "<script>ayo
              alert('Update Aturan Berhasil!');
              window.location='aturan.php';
              </script>";
      } else {
          echo "<script>
              alert('Update Aturan Gagal!');
              window.location='aturan.php';
              </script>";
      }
    }


    // Fungsi DELETE
    if (isset($_GET["idaturan"])) {
      $idaturan = $_GET["idaturan"];

      // Query SQL untuk DELETE data di dalam tabel
      $sql_delete = "DELETE FROM tbl_aturan WHERE idaturan='$idaturan'";

      // Eksekusi query
      if ($conn->query($sql_delete)) {
          echo "<script>
            alert('Hapus Aturan Berhasil!');
            window.location='aturan.php';
            </script>";
      } else {
          echo "<script>
            alert('Hapus Aturan Gagal!');
            window.location='aturan.php';
            </script>";
      }
    }
  ?>

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link href="../css/styledashboard.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
  </head>

  <!-- Pembuka Navbar -->
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="dashboard.php">SP PAKAR LAPTOP</a>
      <!-- Sidebar Toggle-->
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
      <!-- Navbar Search-->
      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
          <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
            <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading">Core</div>
              <a class="nav-link" href="dashboard.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
              </a>
              <!-- nav bagian interface -->
              <div class="sb-sidenav-menu-heading">Interface</div>
              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Pages
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                    Authentication
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="../index.php">Login</a>
                      <a class="nav-link" href="../register.php">Register</a>
                    </nav>
                  </div>
                  <a class="nav-link" href="dashboard_gejala.php">Gejala</a>
                  <a class="nav-link" href="dashboard_kerusakan.php">Kerusakan</a>
                  <a class="nav-link" href="aturan.php">Aturan</a>
                  <a class="nav-link" href="laporan.php">Laporan</a>
                  <a class="nav-link" href="user.php">User</a>
                </nav>
              </div>
              <div class="sb-sidenav-menu-heading">Addons</div>
              <a class="nav-link" href="../logout.php">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>
                Logout
              </a>
              <a class="nav-link" href="../homepage.php">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-house-user"></i></div>
                Homepage
              </a>
            </div>
          </div>
          <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Admin
          </div>
        </nav>
      </div>
      <!-- Penutup Navbar -->

      <!-- Pembuka Konten -->
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <h1 class="mt-4">Aturan</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="dashboard.php">Pages</a></li>
              <li class="breadcrumb-item active">Aturan</li>
            </ol>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Aturan
              </div>
              <!-- Button Tambah -->
              <div class="mt-3 ms-3">
                <a class="btn btn-xl btn-outline-dark text-uppercase" data-bs-toggle="modal" data-bs-target="#tambahAturan"> Tambah Data Aturan </a>
              </div>
              <!-- Tutup Tambah Aturan -->

              <!-- modal CREATE aturan -->
              <div class="modal fade" id="tambahAturan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Aturan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form action="aturan.php" method="post">
                                  <input type="hidden" name="id" id="id" />
                                  <div class="form-group">
                                      <label for="kerusakan">Pilih Kerusakan</label>
                                      <select name="takerusakan" id="kerusakan" class="form-control">
                                          <option value="">Pilih Kerusakan</option>
                                          <?php
                                              // Ambil data kerusakan dari database
                                              $query_kerusakan = "SELECT idkerusakan, nama_kerusakan FROM tbl_kerusakan";
                                              $result_kerusakan = mysqli_query($conn, $query_kerusakan);
                                              while ($row_kerusakan = mysqli_fetch_assoc($result_kerusakan)) {
                                                  echo "<option value='" . $row_kerusakan['idkerusakan'] . "'>" . $row_kerusakan['nama_kerusakan'] . "</option>";
                                              }
                                          ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="gejala">Pilih Gejala</label>
                                      <select name="tagejala" id="gejala" class="form-control">
                                          <option value="">Pilih Gejala</option>
                                          <?php
                                              // Ambil data gejala dari database
                                              $query_gejala = "SELECT idgejala, nama_gejala FROM tbl_gejala";
                                              $result_gejala = mysqli_query($conn, $query_gejala);
                                              while ($row_gejala = mysqli_fetch_assoc($result_gejala)) {
                                                  echo "<option value='" . $row_gejala['idgejala'] . "'>" . $row_gejala['nama_gejala'] . "</option>";
                                              }
                                          ?>
                                      </select>
                                  </div>
                                  <!-- <div class="form-group">
                                      <label for="probabilitas">Nilai Probabilitas</label>
                                      <input name="taprobabilitas" type="text" class="form-control" id="probabilitas"/>
                                  </div> -->
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <button name="tambahaturan" type="submit" class="btn btn-primary">Simpan</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- penutup modal CREATE aturan -->

              <!-- modal UPDATE aturan -->
              <div class="modal fade" id="ubahAturan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ubah Data Aturan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form action="aturan.php" method="post">
                                  <input type="hidden" name="id" id="ubah-id" />
                                  <div class="form-group">
                                      <label for="kerusakan">Pilih Kerusakan</label>
                                      <select name="kerusakan" id="ubah-kerusakan" class="form-control">
                                          <option value="">Pilih Kerusakan</option>
                                          <?php
                                              // Ambil data kerusakan dari database
                                              $query_kerusakan = "SELECT idkerusakan, nama_kerusakan FROM tbl_kerusakan";
                                              $result_kerusakan = mysqli_query($conn, $query_kerusakan);
                                              while ($row_kerusakan = mysqli_fetch_assoc($result_kerusakan)) {
                                                  echo "<option value='" . $row_kerusakan['idkerusakan'] . "'>" . $row_kerusakan['nama_kerusakan'] . "</option>";
                                              }
                                          ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="gejala">Pilih Gejala</label>
                                      <select name="gejala" id="ubah-gejala" class="form-control">
                                          <option value="">Pilih Gejala</option>
                                          <?php
                                              // Ambil data gejala dari database
                                              $query_gejala = "SELECT idgejala, nama_gejala FROM tbl_gejala";
                                              $result_gejala = mysqli_query($conn, $query_gejala);
                                              while ($row_gejala = mysqli_fetch_assoc($result_gejala)) {
                                                  echo "<option value='" . $row_gejala['idgejala'] . "'>" . $row_gejala['nama_gejala'] . "</option>";
                                              }
                                          ?>
                                      </select>
                                  </div>
                                  <!-- <div class="form-group">
                                      <label for="probabilitas">Nilai Probabilitas</label>
                                      <input name="probabilitas" type="text" class="form-control" id="ubah-probabilitas" />
                                  </div> -->
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <button name="ubahaturan" type="submit" class="btn btn-primary">Simpan</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- penutup modal UPDATE aturan -->
              
              <!-- tabel data -->
              <div class="card-body">
                <table id="myTable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 3px; text-align: center">No</th>
                      <th style="text-align: center">Nama Kerusakan</th>
                      <th style="text-align: center">Nama Gejala</th>
                      <th style="width: 150px; text-align: center">Kelola</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                        $no = 1;
                        foreach ($data_aturan as $aturan) {
                         // Mengambil data kerusakan berdasarkan idkerusakan dari tbl_kerusakan
                          $query_kerusakan = "SELECT * FROM tbl_kerusakan WHERE idkerusakan = {$aturan['idkerusakan']}";
                          $result_kerusakan = mysqli_query($conn, $query_kerusakan);
                          $kerusakan = mysqli_fetch_assoc($result_kerusakan);

                         // Mengambil data gejala berdasarkan idgejala dari tbl_gejala
                          $query_gejala = "SELECT * FROM tbl_gejala WHERE idgejala = {$aturan['idgejala']}";
                          $result_gejala = mysqli_query($conn, $query_gejala);
                          $gejala = mysqli_fetch_assoc($result_gejala);
                  ?>
                    <tr>
                        <td style="text-align: center"><?php echo $aturan['idaturan']; ?></td>
                        <td><?= $kerusakan['kode_kerusakan']; ?> - <?= $kerusakan['nama_kerusakan']; ?></td>
                        <td><?= $gejala['kode_gejala']; ?> - <?= $gejala['nama_gejala']; ?></td>
                        <td style="text-align: center">
                        <a href="#" class="btn btn-danger btn-sm" onclick="hapusAturan(<?php echo $aturan['idaturan']; ?>)">Hapus</a>
                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubahAturan" 
                                    data-id="<?= $aturan['idaturan']; ?>" 
                                    data-kerusakan="<?= $aturan['idkerusakan']; ?>" 
                                    data-gejala="<?= $aturan['idgejala']; ?>">Ubah</a>
                        </td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
        <!-- Footer-->
        <footer class="footer text-center">
          <div class="container">
            <div class="row"></div>
          </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-black">
          <div class="container"><small>Copyright &copy; Aris Sapii 2023</small></div>
        </div>
      </div>
      <!-- Penutup Konten -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>

  </body>
</html>

<script>
  function hapusAturan(idaturan) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
      window.location = 'aturan.php?idaturan=' + idaturan;
    }
  }
  // Tambahkan script JavaScript untuk mengatur data di modal UPDATE
  $(document).ready(function () {
                      $('#ubahAturan').on('show.bs.modal', function (event) {
                          var button = $(event.relatedTarget);
                          var idaturan = button.data('id');
                          var kerusakan = button.data('kerusakan');
                          var gejala = button.data('gejala');

                          var modal = $(this);
                          modal.find('.modal-body #ubah-id').val(idaturan);
                          modal.find('.modal-body #ubah-kerusakan').val(kerusakan);
                          modal.find('.modal-body #ubah-gejala').val(gejala);
                      });
                  });

    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>
