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

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/styleperawatan.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
  </head>
  <body>
    <div class="container d-flex justify-content-center max-height-xxl">
      <form class="form-container" method="post" action="">
        <h1 class="textJudul text-center mt-2">Perawatan</h1>

        <!-- Tebel Perawatan -->
        <p>
          <strong>Note*</strong> Ingatlah bahwa tiap laptop mungkin memiliki kebutuhan perawatan yang berbeda tergantung pada merek, model, dan spesifikasinya. Pastikan untuk merujuk pada panduan pengguna yang disediakan oleh produsen
          laptop Anda.
        </p>
        <div class="d-flex align-items-start">
          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-pills-1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-1" type="button" role="tab" aria-controls="v-pills-1" aria-selected="true">Pembersihan Fisik</button>
            <button class="nav-link" id="v-pills-2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-2" type="button" role="tab" aria-controls="v-pills-2" aria-selected="false">Pendinginan</button>
            <button class="nav-link" id="v-pills-3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-3" type="button" role="tab" aria-controls="v-pills-3" aria-selected="false">Perangkat Lunak</button>
            <button class="nav-link" id="v-pills-4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-4" type="button" role="tab" aria-controls="v-pills-4" aria-selected="false">Keamanan</button>
            <button class="nav-link" id="v-pills-5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-5" type="button" role="tab" aria-controls="v-pills-5" aria-selected="false">Baterai</button>
            <button class="nav-link" id="v-pills-6-tab" data-bs-toggle="pill" data-bs-target="#v-pills-6" type="button" role="tab" aria-controls="v-pills-6" aria-selected="false">Penanganan yang Benar</button>
            <button class="nav-link" id="v-pills-7-tab" data-bs-toggle="pill" data-bs-target="#v-pills-7" type="button" role="tab" aria-controls="v-pills-7" aria-selected="false">Backup Data</button>
            <button class="nav-link" id="v-pills-8-tab" data-bs-toggle="pill" data-bs-target="#v-pills-8" type="button" role="tab" aria-controls="v-pills-8" aria-selected="false">Monitoring Kesehatan Sistem</button>
            <button class="nav-link" id="v-pills-9-tab" data-bs-toggle="pill" data-bs-target="#v-pills-9" type="button" role="tab" aria-controls="v-pills-9" aria-selected="false">Optimalisasi Sistem</button>
            <button class="nav-link" id="v-pills-10-tab" data-bs-toggle="pill" data-bs-target="#v-pills-10" type="button" role="tab" aria-controls="v-pills-10" aria-selected="false">Upgrade Hardware</button>
          </div>
          <!-- Isi Tabel Perawatan -->
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
              - <strong>Keyboard dan Touchpad:</strong> Bersihkan keyboard dan touchpad secara teratur dari debu dan kotoran. <br />
              - <strong>Layar:</strong> Gunakan lap mikrofiber untuk membersihkan layar laptop agar tetap bersih dan bebas dari sidik jari atau debu.
            </div>

            <!-- Isi Tabel Perawatan -->
            <div class="tab-pane fade show" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
              - Pastikan ventilasi laptop tidak tertutup oleh benda-benda yang dapat menghambat aliran udara. <br />
              - Bersihkan kipas pendingin secara berkala untuk mencegah penumpukan debu yang dapat menyebabkan overheat.
            </div>

            <!-- Isi Tabel Perawatan -->
            <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
              - <strong>Pembaruan Sistem Operasi:</strong> Selalu perbarui sistem operasi ke versi terbaru untuk mendapatkan keamanan dan <br />
              peningkatan kinerja. <br />
              - <strong>Pembaruan Driver:</strong> Pastikan semua driver perangkat keras diupdate ke versi terbaru. <br />
              - <strong>Pembersihan File Sementara:</strong> Hapus file sementara, cache, dan file yang tidak diperlukan untuk mengosongkan <br />
              ruang penyimpanan dan meningkatkan kinerja.
            </div>

            <!-- Isi Tabel Perawatan -->
            <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
              - Instal dan perbarui perangkat lunak antivirus untuk melindungi laptop dari virus dan malware. <br />
              - Gunakan kata sandi yang kuat untuk melindungi akses ke laptop Anda.
            </div>

            <!-- Isi Tabel Perawatan -->
            <div class="tab-pane fade" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-5-tab">
              - Hindari mengisi baterai hingga penuh jika tidak perlu. Lebih baik untuk menjaga baterai di kisaran 20-80%. <br />
              - Sesekali, biarkan baterai hingga benar-benar habis dan isi ulang untuk menjaga kesehatan baterai.
            </div>

            <!-- Isi tabel Perawatan -->
            <div class="tab-pane fade" id="v-pills-6" role="tabpanel" aria-labelledby="v-pills-6-tab">
              - Tutup laptop dengan lembut dan hindari menahan atau menekan layar laptop. <br />
              - Jangan membuka penutup laptop kecuali Anda memiliki pengetahuan yang cukup atau diperlukan.
            </div>

            <!-- Isi Tabel Perawatan -->
            <div class="tab-pane fade" id="v-pills-7" role="tabpanel" aria-labelledby="v-pills-7-tab">
              - Lakukan backup data secara teratur ke penyimpanan eksternal atau cloud untuk menghindari kehilangan <br />
              data yang tidak terduga.
            </div>

            <!-- Isi Tabel Perawatan -->
            <div class="tab-pane fade" id="v-pills-8" role="tabpanel" aria-labelledby="v-pills-8-tab">- Gunakan aplikasi atau utilitas untuk memonitor suhu, penggunaan CPU, dan kesehatan sistem secara umum.</div>

            <!-- Isi Tabel Perawatan -->
            <div class="tab-pane fade" id="v-pills-9" role="tabpanel" aria-labelledby="v-pills-9-tab">- Konfigurasikan aplikasi untuk tidak memulai secara otomatis saat laptop dinyalakan, kecuali jika diperlukan.</div>

            <!-- Isi Tabel Perawatan -->
            <div class="tab-pane fade" id="v-pills-10" role="tabpanel" aria-labelledby="v-pills-10-tab">- Jika memungkinkan, pertimbangkan untuk meng-upgrade RAM atau penyimpanan untuk meningkatkan kinerja laptop.</div>
          </div>
        </div>
      </form>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  </body>
</html>
