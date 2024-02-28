Btw folder views , bahandashboard itu cmn bahan doang bang :v

<?php
require 'process.php';

// Fungsi READ
$query = "SELECT * FROM tbl_gejala";
$result = $conn->query($query);

// $data_gejala = array();
// while ($row = $result->fetch_assoc()) {
//     $data_gejala[] = $row;
// } 

// Periksa apakah ada hasil dari query
if ($result) {
  while ($row = $result->fetch_assoc()) {
      $data_gejala[] = $row;
  }
} else {
  // Tambahkan pesan atau penanganan error sesuai kebutuhan
  echo "Error: " . $query . "<br>" . $conn->error;
}

// Fungsi untuk menghitung nilai CF berdasarkan kategori
function hitungCF($kategori)
{
    switch ($kategori) {
        case ' ':
            return 0.4;
        case 'mungkin':
            return 0.5; // Ubah sesuai kebutuhan
        case 'kemungkinan besar':
            return 0.7; // Ubah sesuai kebutuhan
        case 'hampir pasti':
            return 0.9; // Ubah sesuai kebutuhan
        case 'pasti':
            return 1;
        default:
            return 0; // Kategori tidak valid
    }
}

// Fungsi untuk melakukan forward chaining
function forwardChaining($selected_gejala)
{
    // Aturan-aturan sistem pakar
    $aturan = [
        'G01' => ['K01'],
        'G02' => ['K01'],
        'G03' => ['K01'],
        'G04' => ['K04'],
        'G05' => ['K02'],
        'G06' => ['K03'],
        'G07' => ['K05'],
        'G08' => ['K05'],
        'G09' => ['K01'],
        'G10' => ['K08'],
        'G11' => ['K08'],
        'G12' => ['K04'],
        'G13' => ['K04'],
        'G14' => ['K04'],
        'G15' => ['K05'],
        'G16' => ['K07'],
        'G17' => ['K04'],
        'G18' => ['K01'],
        'G19' => ['K08'],
        'G20' => ['K09'],
        'G21' => ['K05'],
        'G22' => ['K03'],
        'G23' => ['K05'],
        'G24' => ['K07'],
        'G25' => ['K11']
    ];

    // Inisialisasi nilai CF
    $nilai_cf = [];

    // Hitung nilai CF untuk setiap gejala terpilih
    foreach ($selected_gejala as $gejala_id) {
        $gejala_kode = $data_gejala[$gejala_id - 1]['kode_gejala'];
        if (isset($aturan[$gejala_kode])) {
            foreach ($aturan[$gejala_kode] as $kerusakan_kode) {
                if (!isset($nilai_cf[$kerusakan_kode])) {
                    $nilai_cf[$kerusakan_kode] = hitungCF('mungkin'); // Misalnya, berdasarkan aturan default
                } else {
                    // Gunakan metode kombinasi CF (And)
                    $nilai_cf[$kerusakan_kode] *= hitungCF('mungkin');
                }
            }
        }
    }

    return $nilai_cf;
}

// Proses formulir jika disubmit
if (isset($_POST['bsimpan'])) {
    // Ambil nilai dari formulir
    $selected_gejala = isset($_POST['idgejala']) ? $_POST['idgejala'] : [];

    // Lakukan forward chaining
    $nilai_cf = forwardChaining($selected_gejala);

    // Simpan hasil diagnosa ke database
    foreach ($nilai_cf as $kerusakan_kode => $cf) {
        $query = "INSERT INTO tbl_hasil (hasil_probabilitas, nama_kerusakan, nama, solusi, tanggal)
            VALUES ('$cf', '$kerusakan_kode', 'Nama Anda', 'Solusi', NOW())";
        $result = $conn->query($query);

        // Periksa apakah penyimpanan berhasil
        if ($result) {
            echo "Diagnosa berhasil disimpan ke database.";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }
}
?>
