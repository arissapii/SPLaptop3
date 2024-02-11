-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 06:38 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `splaptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aturan`
--

CREATE TABLE `tbl_aturan` (
  `idaturan` int(11) NOT NULL,
  `idgejala` float NOT NULL,
  `idkerusakan` float NOT NULL,
  `probabilitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `idgejala` int(11) NOT NULL,
  `nama_gejala` varchar(45) NOT NULL,
  `kode_gejala` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`idgejala`, `nama_gejala`, `kode_gejala`) VALUES
(1, 'Tidak berfungsi tombol keyboard', 'G01'),
(2, 'Kabel touchpad dalam kondisi ON', 'G02'),
(3, 'Power LED dan Harddisk LED hidup', 'G03'),
(4, 'Muncul bluescreen', 'G04'),
(5, 'Hang pada proses POST', 'G05'),
(6, 'Kipas tidak berputar', 'G06'),
(7, 'Driver sudah diinstall', 'G07'),
(8, 'No Play', 'G08'),
(9, 'Tidak mau terkoneksi', 'G09'),
(10, 'DVD non respon', 'G10'),
(11, 'Warna tampilan tidak semua', 'G11'),
(12, 'LCD mati mendadak', 'G12'),
(13, 'Laptop mati', 'G13'),
(14, 'Tidak dapat di charge laptopnya', 'G14'),
(15, 'Baterai silang', 'G15'),
(16, 'Terdengar suara bip panjang', 'G16'),
(17, 'Tidak dapat di klik tombol Touchpad', 'G17'),
(18, 'Muncul tulisan Boot MGR is Missing', 'G18'),
(19, 'Tidak dapat masuk sistem operasi', 'G19'),
(20, 'Komponen sudah dipasang dengan benar', 'G20'),
(21, 'No display', 'G21'),
(22, 'Tanggal tidak tersimpan', 'G22'),
(23, 'Baterai BIOS baru', 'G23'),
(24, 'Shutdown sendiri', 'G24'),
(25, 'Muncul pesan Disk Boot Failure', 'G25'),
(26, 'Resolusi layar tidak maksimal', 'G26'),
(27, 'Icon hardware tampil di panel dekstop', 'G27'),
(28, 'Icon hardware tampil silang di panel dekstop', 'G28'),
(29, 'Tidak dapat membaca CD / DVD', 'G29'),
(30, 'Kabel projector sudah dicolokkan', 'G30'),
(31, 'Muncul garis putih di layar LCD', 'G31'),
(32, 'Bau terbakar pada LCD', 'G32'),
(33, 'Charge LED mati', 'G33'),
(34, 'Tidak menyala lampu LED di keyboard', 'G34'),
(35, 'Harddisk terdeteksi BIOS', 'G35'),
(36, 'Kursor mouse bergerak sendiri', 'G36'),
(37, 'Panas berlebihan dibagian bawah LCD', 'G37'),
(38, 'Harddisk tidak terdeteksi BIOS', 'G38'),
(39, 'Kapasitas memori yang muncul tidak sesuai', 'G39'),
(40, 'Terdenger bunyi Bip panjang 1x', 'G40'),
(41, 'Kondisi RAM masih baru', 'G41'),
(42, 'Soket prosessor sudah sesuai', 'G42'),
(43, 'Harddisk LED mati', 'G43'),
(44, 'Jumper dipasang dengan benar', 'G44'),
(45, 'Hardware laptop tidak terdeteksi', 'G45'),
(46, 'Bagian bawah laptop sangat panas', 'G46'),
(47, 'Interface card tidak terdeteksi', 'G47'),
(48, 'Tidak tampil jenis motherboard', 'G48'),
(49, 'Tidak terdeteksi di file explorer', 'G49'),
(50, 'IP sudah di setting', 'G50'),
(51, 'Tidak hidup webcam', 'G51'),
(52, 'Soundcard terdeteksi di sistem operasi', 'G52'),
(53, 'CD/DVD yang dimasukkan tergores', 'G53'),
(54, 'Tidak dapat menampilkan di projector', 'G54'),
(55, 'Black Screen', 'G55'),
(56, 'Muncul garis vertikal di layar', 'G56'),
(57, 'Icon charge tidak muncul', 'G57'),
(58, 'Port kadang masuk kadang tidak', 'G58'),
(59, 'Power adaptor hidup', 'G59'),
(60, 'Tidak muncul icon di device manager', 'G60'),
(61, 'Kursor mouse bergerak sendiri', 'G61'),
(62, 'Sering restart sendiri', 'G62'),
(63, 'suara aneh di harddisk', 'G63'),
(64, 'Tampak black screen di layar', 'G64'),
(65, 'Tidak dapat transfer file', 'G65'),
(66, 'Terdengar bunyi bip 3x', 'G66'),
(67, 'RAM tidak muncul di BIOS', 'G67'),
(68, 'Processor tidak panas', 'G68'),
(69, 'Tidak ada bunyi bip yang muncul', 'G69'),
(70, 'Muncul tekan tombol DEL saat POST', 'G70'),
(71, 'Tidak dapat masuk di BIOS setting', 'G71'),
(72, 'Suhu processor tinggi', 'G72'),
(73, 'Tidak tampil jenis BIOS', 'G73'),
(74, 'Tidak tampil jenis CPU di BIOS', 'G74'),
(75, 'MMC yang dimasukkan tidak terdeteksi', 'G75'),
(76, 'Muncul pesan di USB Device Recognized', 'G76'),
(77, 'Kabel sudah dicolokkan ke port ethernet', 'G77'),
(78, 'Tidak ada jaringan terdeteksi', 'G78'),
(79, 'Tidak menyala lampu webcam', 'G79'),
(80, 'Tidak ada bunyi sound', 'G80'),
(81, 'CD/DVD LED tidak mati', 'G81'),
(82, 'Gambar yang ditampilkan setengah', 'G82'),
(83, 'Tampilan sering hilang', 'G83'),
(84, 'Tidak muncul tampilan di layar', 'G84'),
(85, 'Bau terbakar pada adaptor', 'G85'),
(86, 'Tidak ada arus listrik', 'G86'),
(87, 'Baterai tidak mau mengisi', 'G87'),
(88, 'Driver tidak bisa diinstall', 'G88'),
(89, 'Tampilan gambar dilayar bergoyang', 'G89'),
(90, 'LED baterai mati', 'G90'),
(91, 'Tidak muncul nama VGA di sistem operasi', 'G91');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_diagnosa`
--

CREATE TABLE `tbl_hasil_diagnosa` (
  `idhasil` int(11) NOT NULL,
  `hasil_probabilitas` float NOT NULL,
  `nama_kerusakan` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `solusi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kerusakan`
--

CREATE TABLE `tbl_kerusakan` (
  `idkerusakan` int(11) NOT NULL,
  `nama_kerusakan` varchar(100) NOT NULL,
  `kode_kerusakan` char(5) NOT NULL,
  `solusi` text NOT NULL,
  `probabilitas` float NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kerusakan`
--

INSERT INTO `tbl_kerusakan` (`idkerusakan`, `nama_kerusakan`, `kode_kerusakan`, `solusi`, `probabilitas`, `gambar`) VALUES
(1, 'Nilou', 'K01', 'Colek bagian punggung nilou sampai mendesah, lalu grepe, dan terakhir GENJOT AMPE HAMILL, HAYO HAMIL..', 0.1, 'nilou.png'),
(2, 'Hutao', 'K02', 'Jurus pompa hamilll.....', 0.2, 'huhutao4.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pertanyaan`
--

CREATE TABLE `tbl_pertanyaan` (
  `idpertanyaan` int(11) NOT NULL,
  `pertanyaan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `nama`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', 'admin'),
(5, 'aris', '202cb962ac59075b964b07152d234b70', 'aris', 'aris@gmail.com', 'user'),
(6, 'budi', '202cb962ac59075b964b07152d234b70', 'budi', 'budi@gmail.com', 'user'),
(7, 'bubud', '81dc9bdb52d04dc20036dbd8313ed055', 'bubud', 'bubud@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  ADD PRIMARY KEY (`idaturan`);

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indexes for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  ADD PRIMARY KEY (`idhasil`);

--
-- Indexes for table `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  ADD PRIMARY KEY (`idkerusakan`);

--
-- Indexes for table `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  ADD PRIMARY KEY (`idpertanyaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  MODIFY `idaturan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  MODIFY `idgejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  MODIFY `idhasil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  MODIFY `idkerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  MODIFY `idpertanyaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
