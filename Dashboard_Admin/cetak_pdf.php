<?php
require_once('fpdf/fpdf.php');
require '../process.php';

if(isset($_SESSION['username'])) {
    // Jika session username sudah diset, ambil nilainya
    $username = $_SESSION['username'];
}

// Fungsi READ
$query = "SELECT * FROM tbl_hasil"; 
$result = $conn->query($query);
$data_laporan = array();
while ($row = $result->fetch_assoc()) {
    $data_laporan[] = $row;
}

class PDF extends FPDF {
    public function Header() {
        // Tambahkan header PDF di sini jika diperlukan
        // set default header data
        // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        // $pdf->setFooterData(array(0,64,0), array(0,64,128));
    }

    public function Footer() {
        // Tambahkan footer PDF di sini jika diperlukan
        // set header and footer fonts
        // $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    }
}

$pdf = new PDF();
$pdf->AddPage();

// Tambahkan informasi pengguna pada header
$pdf->SetFont('Arial', '', 20);
$pdf->Cell(0, 10, 'Laporan oleh: ' . $username, 0, 1, 'L'); // Tambahkan informasi pengguna di kanan header
$pdf->Ln(10); // Spasi setelah header

// Buat header tabel
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(15, 10, 'No', 1);
$pdf->Cell(60, 10, 'Tanggal', 1);
$pdf->Cell(30, 10, 'ID User', 1);
$pdf->Cell(30, 10, 'ID Kerusakan', 1);
$pdf->Cell(30, 10, 'Nilai Hasil', 1);
$pdf->Ln(); // Pindah ke baris berikutnya

// Isi data tabel
$i = 1;
foreach ($data_laporan as $laporan) {
    $pdf->Cell(15, 10, $i, 1);
    $pdf->Cell(60, 10, $laporan['tanggal'], 1);
    $pdf->Cell(30, 10, $laporan['iduser'], 1);
    $pdf->Cell(30, 10, $laporan['idkerusakan'], 1);
    $pdf->Cell(30, 10, $laporan['nilai_hasil'], 1);
    $pdf->Ln(); // Pindah ke baris berikutnya
    $i++;
}

// Simpan atau tampilkan PDF
$pdf->Output('laporan.pdf', 'I');
?>