<?php
require '../process.php';

    // Fungsi CREATE
    if (isset($_POST["tambahgejala"])) {
      $kodegejala = $_POST['takodegejala'];
      $namagejala = $_POST['tanamagejala'];

      $sql = "INSERT INTO tbl_gejala (nama_gejala, kode_gejala) VALUES ('$namagejala','$kodegejala')";

      if ($conn->query($sql)) {
          echo "
          <script>
              alert('Tambah Gejala Berhasil!');
              window.location='dashboard_gejala.php';
          </script>
          ";
      } else {
          echo "
          <script>
              alert('Tambah Gejala Gagal!');
              window.location='dashboard_gejala.php';
          </script>
          ";
      }
    }

    // Fungsi READ
    $query = "SELECT * FROM tbl_gejala";
    $result = $conn->query($query);

    $data_gejala = array();
    while ($row = $result->fetch_assoc()) {
        $data_gejala[] = $row;
    }

    // Fungsi UPDATE
    if (isset($_POST["updategejala"])) {
      $kodegejala = $_POST['kode'];
      $namagejala = $_POST['nama'];

      $sql = "UPDATE tbl_gejala SET nama_gejala='$namagejala' WHERE kode_gejala='$kodegejala'";

      if ($conn->query($sql)) {
          echo "
          <script>
              alert('Perubahan Berhasil');
              window.location='dashboard_gejala.php';
          </script>
          ";
      } else {
          echo "
          <script>
              alert('Gagal melakukan perubahan');
              window.location='dashboard_gejala.php';
          </script>
          ";
      }
    }

    // Fungsi DELETE
    if (isset($_GET["hapusgejala"])) {
      $namaGejala = $_GET["hapusgejala"];
      $sqldelete = "DELETE FROM tbl_gejala WHERE nama_gejala = '$namaGejala'";

      if ($conn->query($sqldelete)) {
          echo "
          <script>
              alert('Data Gejala berhasil dihapus!');
              window.location='dashboard_gejala.php';
          </script>
          ";
      } else {
          echo "
          <script>
              alert('Gagal menghapus data Gejala!');
              window.location='dashboard_gejala.php';
          </script>
          ";
      }
    }



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
    <!-- Font Awesome icons (free version)-->
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
            <h1 class="mt-4">Gejala</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="dashboard.php">Pages</a></li>
              <li class="breadcrumb-item active">Gejala</li>
            </ol>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Gejala
              </div>
              <!-- Button Tambah gejala -->
              <div class="mt-3 ms-3">
                <a class="btn btn-xl btn-outline-dark text-uppercase" data-bs-toggle="modal" data-bs-target="#tambahGejala"> Tambah Data Gejala </a>
              </div>
              <!-- Tutup button Tambah gejala -->

              <!-- modal CREATE gejala -->
              <div class="modal fade" id="tambahGejala" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Gejala</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form action="dashboard_gejala.php" method="post">
                                  <div class="form-group">
                                      <label for="kode">Kode Gejala</label>
                                      <input type="text" class="form-control" id="kode" name="takodegejala" placeholder="Kode Gejala" required />
                                  </div>
                                  <div class="form-group">
                                      <label for="nama">Nama Gejala</label>
                                      <input type="text" class="form-control" id="nama" name="tanamagejala" placeholder="Nama Gejala" required />
                                  </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <button name="tambahgejala" type="submit" class="btn btn-primary">Simpan</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- penutup modal CREATE gejala -->

              <!-- modal UPDATE gejala -->
              <div class="modal fade" id="ubahGejala" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ubah Data Gejala</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form action="dashboard_gejala.php" method="post">
                                  <input type="hidden" name="id" id="ubah-id" />
                                  <div class="form-group">
                                      <label for="kode">Kode Gejala</label>
                                      <input type="text" class="form-control" id="ubah-kode" name="kode" readonly>
                                  </div>
                                  <div class="form-group">
                                      <label for="nama">Nama Gejala</label>
                                      <textarea id="ubah-nama" class="form-control" name="nama" required></textarea>
                                  </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" name="updategejala" class="btn btn-primary">Simpan Perubahan</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- penutup modal UPDATE gejala -->

              <!-- skrip JavaScript untuk menangani klik tombol Hapus dan membuka modal Ubah -->
              <script>
                  $(document).ready(function () {
                      $('a.btn-danger').click(function () {
                          var namagejala = $(this).data('namagejala');
                          if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                              window.location.href = 'dashboard_gejala.php?hapusgejala=' + encodeURIComponent(namagejala);
                          }
                      });

                      $('#ubahGejala').on('show.bs.modal', function (event) {
                          var button = $(event.relatedTarget); // Tombol yang memicu modal
                          var id = button.data('id');          // Ambil nilai atribut data-id
                          var kode = button.data('kode');      // Ambil nilai atribut data-kode
                          var nama = button.data('nama');      // Ambil nilai atribut data-nama

                          var modal = $(this);
                          modal.find('#ubah-id').val(id);
                          modal.find('#ubah-kode').val(kode);
                          modal.find('#ubah-nama').val(nama);
                      });
                  });
              </script>

              <!-- tabel data -->
              <div class="card-body">
                <table id="myTable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 3px; text-align: center">No</th>
                      <th style="width: 40px; text-align: center">Kode Gejala</th>
                      <th style="text-align: center">Nama Gejala</th>
                      <th style="width: 150px; text-align: center">Kelola</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                        $no = 1;
                        foreach ($data_gejala as $gejala) {
                  ?>
                    <tr>
                      <td style="text-align: center"><?php echo $gejala['idgejala']; ?></td>
                      <td style="text-align: center"><?php echo $gejala['kode_gejala']; ?></td>
                      <td><?php echo $gejala['nama_gejala']; ?></td>
                      <td style="text-align: center">
                          <a href="#" class="btn btn-danger btn-sm" onclick="" data-namagejala="<?php echo $gejala['nama_gejala']; ?>">Hapus</a>
                          <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubahGejala" 
                              data-id="<?php echo $gejala['idgejala']; ?>" 
                              data-kode="<?php echo $gejala['kode_gejala']; ?>" 
                              data-nama="<?php echo $gejala['nama_gejala']; ?>">Ubah</a>
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
    $(document).ready( function () {
        $('#myTable').DataTable();
    });
</script>