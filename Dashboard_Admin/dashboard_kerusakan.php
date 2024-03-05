<?php
require '../process.php';

    //Fungsi CREATE
    if(isset($_POST["tambahkerusakan"])){
        $kodekerusakan     = $_POST['takodekerusakan'];
        $namakerusakan     = $_POST['tanamakerusakan'];
        $gambar            = $_FILES['tagambar']['name'];
        $solusi            = $_POST['tasolusi'];

        $directory = "asset/gambar/"; //untuk memindahkan file ke folder tujuan
        $tmpfile = $_FILES['tagambar']['tmp_name']; 

        move_uploaded_file($tmpfile, $directory.$gambar);

        // Ganti variabel pada VALUES
        $sql = "INSERT INTO tbl_kerusakan (kode_kerusakan, nama_kerusakan, gambar, solusi)
        VALUES ('$kodekerusakan','$namakerusakan','$gambar','$solusi')";
        
        if ($conn->query($sql)) {
          echo "
          <script>
              alert('Tambah Kerusakan Berhasil!');
              window.location='dashboard_kerusakan.php';
          </script>
          ";
        } else {
          echo "
          <script>
              alert('Tambah Kerusakan Gagal!');
              window.location='dashboard_kerusakan.php';
          </script>
          ";
        }
    }

    // Fungsi READ
    $query = "SELECT * FROM tbl_kerusakan";
    $result = $conn->query($query);

    $data_kerusakan = array();
    while ($row = $result->fetch_assoc()) {
        $data_kerusakan[] = $row;
    }

    //FUNGSI UPDATE
    if (isset($_POST['updatekerusakan'])) {
      // Tangani pengiriman formulir dan perbarui database
       //$id = $_POST['id'];
      $kode = $_POST['kode'];
      $nama = $_POST['nama'];
      // Ganti variabel pada VALUES
      $gambar_lama = isset($_POST['gambar_lama']) ? $_POST['gambar_lama'] : '';
      $solusi = $_POST['solusi'];
  
      // Tangani unggah file jika diperlukan
      if ($_FILES['gambar']['name']) {
          $gambar = $_FILES['gambar']['name'];
          move_uploaded_file($_FILES['gambar']['tmp_name'], 'asset/gambar/' . $gambar);
      } else {
          // Jika tidak ada file baru yang dipilih, gunakan file yang sudah ada
          $gambar = $_POST['gambar_lama'];
      }
      // Hapus file lama jika ada perubahan gambar
      if ($_FILES['gambar']['name'] && file_exists('asset/gambar/' . $gambar_lama)) {
        unlink('asset/gambar/' . $gambar_lama);
            if (unlink('asset/gambar/' . $gambar_lama)) {
              echo "File berhasil dihapus.";
          } else {
              echo "Gagal menghapus file. Error: " . error_get_last()['message'];
          }
      }
      // Perbarui database
      $sql = "UPDATE tbl_kerusakan SET nama_kerusakan='$nama', gambar='$gambar', solusi='$solusi' WHERE kode_kerusakan='$kode'";
      // Jalankan query, Anda mungkin perlu menggunakan objek koneksi database Anda di sini
  
      // Redirect atau tampilkan pesan sukses
      if ($conn->query($sql)) {
        echo "
        <script>
            alert('Perubahan Berhasil');
            window.location='dashboard_kerusakan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Gagal melakukan perubahan');
            window.location='dashboard_kerusakan.php';
        </script>
        ";
    }
    }



    // Fungsi DELETE
    if (isset($_GET["hapuskerusakan"])) {
      $namakerusakan = $_GET["hapuskerusakan"];

      $queryShow = "SELECT * FROM tbl_kerusakan WHERE nama_kerusakan = '$namakerusakan'";
      $sqlShow = mysqli_query($conn, $queryShow);

      // Pastikan query dijalankan tanpa kesalahan
      if ($sqlShow) {
          $row = mysqli_fetch_assoc($sqlShow);

          // Hapus file gambar
          unlink("asset/gambar/" . $row['gambar']);
      }

      $sqldelete = "DELETE FROM tbl_kerusakan WHERE nama_kerusakan = '$namakerusakan'";

      if ($conn->query($sqldelete)) {
          echo "
          <script>
              alert('Data Kerusakan berhasil dihapus!');
              window.location='dashboard_kerusakan.php';
          </script>
          ";
      } else {
          echo "
          <script>
              alert('Gagal menghapus data Kerusakan!');
              window.location='dashboard_kerusakan.php';
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
            <h1 class="mt-4">Kerusakan</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="dashboard.php">Pages</a></li>
              <li class="breadcrumb-item active">Kerusakan</li>
            </ol>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Kerusakan
              </div>
              <!-- Button CREATE kerusakan -->
              <div class="mt-3 ms-3">
                <a class="btn btn-xl btn-outline-dark text-uppercase" data-bs-toggle="modal" data-bs-target="#tambahkerusakan"> Tambah Data Kerusakan </a>
              </div>
              <!-- penutup button CREATE kerusakan -->

              <!-- Modal CREATE kerusakan -->
              <div class="modal fade" id="tambahkerusakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Kerusakan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="modal-body">
                        <form action="dashboard_kerusakan.php" method="post" enctype="multipart/form-data" >
                          <div class="form-group">
                            <label for="nama">Kode Kerusakan</label>
                            <input type="text" class="form-control" id="kode" name="takodekerusakan" placeholder="Kode kerusakan" required>
                          </div>
                  
                          <div class="form-group">
                            <label for="nama">Nama Kerusakan</label>
                            <input type="text" class="form-control" id="nama" name="tanamakerusakan" placeholder="Nama Kerusakan" required>
                          </div>
                  
                          <div class="form-group">
                              <label for="gambar">Masukkan Gambar Hardware</label>
                              <input type="file" class="form-control" id="gambar" name="tagambar" placeholder="Gambar Hardware" required>
                          </div>
                  
                          <div class="form-group">
                            <label for="solusi">Solusi</label>
                            <textarea id="solusi" class="form-control" name="tasolusi" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="255" data-parsley-minlength-solusi="Masukkan Solusi.." data-parsley-validation-threshold="10" required>
                            </textarea>
                          </div>
                        
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button name="tambahkerusakan" type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- penutup modal CREATE kerusakan -->

              <!-- skrip JavaScript untuk menangani klik tombol Hapus dan membuka modal Ubah -->
              <script>
                  $(document).ready(function() {
                    $('a.btn-danger').click(function () {
                          var nama = $(this).data('nama');
                          if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                              window.location.href = 'dashboard_kerusakan.php?hapuskerusakan=' + encodeURIComponent(nama);
                          }
                      });
                      
                      // Setel nilai-nilai modal saat tombol "Ubah" diklik
                    $('#ubahKerusakan').on('show.bs.modal', function (event) {
                      var button = $(event.relatedTarget);
                      var id = button.data('id');
                      var kode = button.data('kode');
                      var nama = button.data('nama');
                      var gambar = button.data('gambar');
                      var solusi = button.data('solusi');

                      // Atur nilai-nilai dalam modal
                      $('#ubah-id').val(id);
                      $('#ubah-kode').val(kode);
                      $('#ubah-nama').val(nama);
                      $('#gambarPreview').attr('src', 'asset/gambar/' + gambar);
                      $('#ubah-solusi').val(solusi);
                    });
                  });
              </script>

              <!-- modal UPDATE kerusakan -->
              <div class="modal fade" id="ubahKerusakan" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update Data Kerusakan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="dashboard_kerusakan.php" method="post" enctype="multipart/form-data">  <!-- Menambahkan atribut action -->
                      <input type="hidden" name="id" id="ubah-id" value="">
                      <div class="form-group">
                        <label for="kode">Kode Kerusakan</label>
                        <input type="text" class="form-control" id="ubah-kode" name="kode" value="" readonly>
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama Kerusakan</label>
                        <input type="text" class="form-control" id="ubah-nama" name="nama" value="">
                      </div>
                      <div class="form-group">
                        <label for="gambar">Gambar Hardware</label>
                        <img id="gambarPreview" style="margin-bottom: 10px; width: 100px;" src="">
                        <input type="file" class="form-control" id="ubah-gambar" name="gambar">
                      </div>
                      <div class="form-group">
                        <label for="solusi">Solusi</label>
                        <textarea id="ubah-solusi" class="form-control" name="solusi"></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button name="updatekerusakan" type="submit" class="btn btn-round btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- penutup modal UPDATE kerusakan -->


              <!-- tabel data -->
              <div class="card-body ">
                <table id="myTable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 5% text-align: center">No</th>
                      <th style="width: 5%">Kode Kerusakan</th>
                      <th style="width: 15%">Nama Kerusakan</th>
                      <th style="width: 10%">Gambar</th>
                      <th style="width: 50%">Solusi</th>
                      <th style="width: 20% text-align: center">Kelola</th>
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                        $no = 1;
                        foreach ($data_kerusakan as $kerusakan) {
                  ?>
                    <tr>
                        <td style="text-align: center"><?php echo $kerusakan['idkerusakan']; ?></td>
                        <td><?php echo $kerusakan['kode_kerusakan']; ?></td>
                        <td><?php echo $kerusakan['nama_kerusakan']; ?></td>
                        <td><img src="asset/gambar/<?php echo $kerusakan['gambar']; ?>" width="150" /></td>
                        <td class="table-solusi" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $kerusakan['solusi']; ?>">
                            <?php echo $kerusakan['solusi']; ?>
                        </td>
                        <td style="text-align: center">
                        <a href="#" class="btn btn-danger btn-sm" onclick="" data-nama="<?php echo $kerusakan['nama_kerusakan']; ?>">Hapus</a>
                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubahKerusakan" 
                            data-id="<?php echo $kerusakan['idkerusakan']; ?>" 
                            data-kode="<?php echo $kerusakan['kode_kerusakan']; ?>" 
                            data-nama="<?php echo $kerusakan['nama_kerusakan']; ?>" 
                            data-gambar="<?php echo $kerusakan['gambar']; ?>" 
                            data-solusi="<?php echo $kerusakan['solusi']; ?>">Ubah</a>
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