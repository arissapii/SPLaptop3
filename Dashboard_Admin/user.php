<?php
require '../process.php';

// Fungsi READ
$query = "SELECT * FROM user"; 
$result = $conn->query($query);
$data_user = array();
while ($row = $result->fetch_assoc()) {
    $data_user[] = $row;
}

// Fungsi UPDATE
if (isset($_POST["updateuser"])) {
  $username = $_POST['username'];
  $hash_password = hash('md5', $password);
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $level = $_POST['level'];

  $sql = "UPDATE user SET password ='$hash_password', nama ='$nama', email ='$email', level ='$level' WHERE username='$username'";

  //var_dump($sql);
  //die();

  if ($conn->query($sql)) {
      echo "
      <script>
          alert('Perubahan Berhasil');
          window.location='user.php';
      </script>
      ";
  } else {
      echo "
      <script>
          alert('Gagal melakukan perubahan');
          window.location='user.php';
      </script>
      ";
  }
}

// Fungsi DELETE
if (isset($_GET["username"])) {
  $username = $_GET["username"];
  $sqldelete = "DELETE FROM user WHERE username = '$username'";

  if ($conn->query($sqldelete)) {
      echo "
      <script>
          alert('Data User berhasil dihapus!');
          window.location='user.php';
      </script>
      ";
  } else {
      echo "
      <script>
          alert('Gagal menghapus data user!');
          window.location='user.php';
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
    <title>Dashboard - Admin</title>
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
            <li><a class="dropdown-item" href="#!">Logout</a></li>
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
            <h1 class="mt-4">Halaman Data User</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="dashboard.php">Pages</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data User
              </div>

              <!-- modal UPDATE User -->
              <div class="modal fade" id="ubahUser" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form action="user.php" method="post">
                                  <input type="hidden" name="id" id="ubah-id" />
                                  <div class="form-group">
                                      <label for="username">Username</label>
                                      <input type="text" id="ubah-username" class="form-control" name="username" readonly></input>
                                  </div>
                                  <div class="form-group">
                                      <label for="password">Password</label>
                                      <input type="password" id="ubah-password" class="form-control" name="password" required></input>
                                  </div>
                                  <div class="mb-3 form-check">
                                      <input type="checkbox" class="form-check-input" id="showPassword" onchange="togglePasswordVisibility()">
                                      <label class="form-check-label" for="showPassword">Tampilkan Password</label>
                                  </div>
                                  <div class="form-group">
                                      <label for="nama">Nama</label>
                                      <input type="text" id="ubah-nama" class="form-control" name="nama" required></input>
                                  </div>
                                  <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="text" id="ubah-email" class="form-control" name="email" required></input>
                                  </div>
                                  <div class="form-group">
                                      <label for="level">Pilih Level</label>
                                      <select name="level" id="ubah-level" class="form-control">
                                          <option value="user">User</option>
                                          <option value="admin">Admin</option>
                                      </select>
                                  </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" name="updateuser" class="btn btn-primary">Simpan Perubahan</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- penutup modal UPDATE User -->

              <script>
                 function togglePasswordVisibility() {
                      var passwordInput = document.getElementById("ubah-password");
                      var showPasswordCheckbox = document.getElementById("showPassword");

                      // Ubah tipe input password menjadi text atau sebaliknya
                      passwordInput.type = showPasswordCheckbox.checked ? "text" : "password";
                  }
              </script>

              <!-- tabel data -->
              <div class="card-body">
                <table id="myTable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 3px; text-align: center">No</th>
                      <th style="text-align: center">Username</th>
                      <th style="text-align: center">Password</th>
                      <th style="text-align: center">Nama</th>
                      <th style="text-align: center">Email</th>
                      <th style="text-align: center">Level</th>
                      <th style="text-align: center">Kelola</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                            $no = 1;
                            foreach($data_user as $user){
                      ?>
                    <tr>
                      <td style="text-align: center"><?php echo $user['iduser']; ?></td>
                      <td><?php echo $user['username']; ?></td>
                      <td><?php echo $user['password']; ?></td>
                      <td><?php echo $user['nama']; ?></td>
                      <td><?php echo $user['email'];?></td>
                      <td><?php echo $user['level']; ?></td>
                      <td style="text-align: center">
                          <a href="#" class="btn btn-danger btn-sm" onclick="" data-username="<?php echo $user['username']; ?>">Hapus</a>
                          <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ubahUser" 
                              data-username="<?php echo $user['username']; ?>" 
                              data-password="<?php echo $user['password']; ?>" 
                              data-nama="<?php echo $user['nama']; ?>"
                              data-email="<?php echo $user['email']; ?>"
                              data-level="<?php echo $user['level']; ?>">Ubah</a>
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

  //function hapususer(username) {
  //                      if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
  //                        window.location = 'user.php?username=' + username;
  //                      }
  //                    }

  $(document).ready(function () {
                      $('a.btn-danger').click(function () {
                          var username = $(this).data('username');
                          if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                              window.location.href = 'user.php?username=' + encodeURIComponent(username);
                          }
                      });

                      $('#ubahUser').on('show.bs.modal', function (event) {
                          var button = $(event.relatedTarget);        // Tombol yang memicu modal
                          var id = button.data('id');                 // ambil nilai id
                          var username = button.data('username');     // Ambil nilai atribut data-username
                          var password = button.data('password');     // Ambil nilai atribut data-password
                          var nama = button.data('nama');             // Ambil nilai atribut data-nama
                          var email = button.data('email');           // Ambil nilai atribut data-email
                          var level = button.data('level');           // Ambil nilai atribut data-level

                          var modal = $(this);
                          modal.find('#ubah-id').val(id);
                          modal.find('#ubah-username').val(username);
                          modal.find('#ubah-password').val(password);
                          modal.find('#ubah-nama').val(nama);
                          modal.find('#ubah-email').val(email);
                          modal.find('#ubah-level').val(level);
                      });
                  });

</script>
