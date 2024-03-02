-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 02 Mar 2024 pada 13.13
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Struktur dari tabel `tbl_aturan`
--

CREATE TABLE `tbl_aturan` (
  `idaturan` int(11) NOT NULL,
  `idgejala` int(11) NOT NULL,
  `idkerusakan` int(11) NOT NULL,
  `probabilitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_aturan`
--

INSERT INTO `tbl_aturan` (`idaturan`, `idgejala`, `idkerusakan`, `probabilitas`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 1, 2, 1),
(5, 4, 2, 1),
(6, 5, 2, 1),
(7, 6, 2, 1),
(8, 7, 2, 1),
(9, 1, 3, 1),
(10, 4, 3, 1),
(11, 5, 3, 1),
(12, 6, 3, 1),
(13, 8, 3, 1),
(14, 1, 4, 1),
(15, 9, 4, 1),
(16, 10, 4, 1),
(17, 11, 4, 1),
(18, 12, 5, 1),
(19, 13, 5, 1),
(20, 14, 5, 1),
(21, 12, 6, 1),
(22, 13, 6, 1),
(23, 15, 6, 1),
(24, 12, 7, 1),
(25, 16, 7, 1),
(26, 17, 8, 1),
(27, 18, 8, 1),
(28, 19, 8, 1),
(29, 17, 9, 1),
(30, 20, 9, 1),
(31, 21, 9, 1),
(32, 17, 10, 1),
(33, 22, 10, 1),
(34, 23, 10, 1),
(35, 17, 11, 1),
(36, 24, 11, 1),
(37, 25, 11, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `idgejala` int(11) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `kode_gejala` char(5) NOT NULL,
  `MB` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`idgejala`, `nama_gejala`, `kode_gejala`, `MB`) VALUES
(1, 'Laptop dihidupkan, tetapi tidak mau menyala dengan normal?', 'G01', 0.5),
(2, 'Lampu (LED) Indikator battry bererkedip-kedip?', 'G02', 0.6),
(3, 'Laptop menyala normal setelah dihubungkan ke charger?', 'G03', 1),
(4, 'Lampu Indikator (LED) Laptop menyala Normal?', 'G04', 1),
(5, 'Kipas prossesor berputar?', 'G05', 1),
(6, 'Tidak Ada Tampilan Pada Monitor? ', 'G06', 1),
(7, 'Tidak Terdengar suara pada speaker? ', 'G07', 0.4),
(8, 'Terdengar suara pembuka windows pana speaker?', 'G08', 1),
(9, 'Tidak ada lampu indikator (LED) yang menyala?', 'G09', 0.8),
(10, 'Laptop tidak mau menyala setelah dihubungkan dengan charger?', 'G10', 1),
(11, 'Laptop tidak mau menyala setelah dihubungkan dengan charger lain yang sesuai?', 'G11', 1),
(12, 'Laptop dihidupkan tetapi gagal booting?', 'G12', 0.7),
(13, 'Terdengar suara beep berkali-kali di speaker? ', 'G13', 0.8),
(14, 'Bila tombol Esc atau Ctrl+Alt+Del pada keyboard ditekan suara beep hilang?', 'G14', 0.8),
(15, 'Bila tombol Esc atau Ctrl+Alt+Del pada keyboar ditekan suara beep tidak hilang? ', 'G15', 0.4),
(16, 'Muncul Pesan \"Windows System Error\" atau NTLDR is Missing?', 'G16', 1),
(17, 'Laptop dihidupkan normal?', 'G17', 0.4),
(18, 'Baterry Laptop tidak mau terisi saat dihubungkan dengan charger?', 'G18', 1),
(19, 'Lampu indikator (LED) battery tidak berubah warna saat dihubungkan ke charger?', 'G19', 1),
(20, 'Kursor tidak bergerak?', 'G20', 1),
(21, 'Tombol Start pada keyboard berfungsi?', 'G21', 0.4),
(22, 'Tampilan bergerak-gerak sendiri?', 'G22', 0.7),
(23, 'Bila tombol keyboard Esc atau Alt+F4 ditekan tampilan kembali normal? ', 'G23', 0.8),
(24, 'Laptop tidak dapat mengakses internet?', 'G24', 1),
(25, 'Hardware wifi tidak terbaca di windows ', 'G25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `idhasil` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idkerusakan` int(11) NOT NULL,
  `nilai_hasil` float NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hasil`
--

INSERT INTO `tbl_hasil` (`idhasil`, `iduser`, `idkerusakan`, `nilai_hasil`, `tanggal`) VALUES
(1, 10, 2, 95, '2024-03-02 12:08:54'),
(2, 10, 3, 90.78, '2024-03-02 12:12:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kerusakan`
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
-- Dumping data untuk tabel `tbl_kerusakan`
--

INSERT INTO `tbl_kerusakan` (`idkerusakan`, `nama_kerusakan`, `kode_kerusakan`, `solusi`, `probabilitas`, `gambar`) VALUES
(1, 'Baterai Laptop Kehabisan Daya Atau Rusak', 'K01', 'Jika baterai laptop benar-benar habis, maka solusinya adalah charger dan diamkan beberapa menit supaya baterai terisi dengan baik. Jika baterai laptop Anda rusak, pertama-tama pastikan untuk tidak menggunakan baterai tersebut untuk menghindari risiko keamanan. Pilihan terbaik adalah mengganti baterai dengan yang baru dan sesuai dengan model laptop Anda. Baterai laptop yang rusak dapat menyebabkan penurunan performa dan bahkan dapat menjadi risiko kebakaran. Sebagian besar laptop memiliki baterai yang dapat diganti oleh pengguna dengan mematuhi panduan penggantian baterai yang diberikan oleh produsen laptop. Jika Anda tidak yakin atau tidak nyaman mengganti baterai sendiri, sebaiknya minta bantuan dari teknisi atau pusat layanan resmi produsen laptop.', 1, 'baterai laptop.jpg'),
(2, 'RAM Tidak Terpasang Dengan Baik Atau Kotor', 'K02', 'Jika RAM tidak terpasang dengan baik pada slotnya di motherboard, caranya yaitu Matikan komputer, periksa pemasangan RAM, pastikan terkunci dengan baik, dan nyalakan kembali. Apabila RAM kotor, matikan komputer, lepaskan RAM, bersihkan pin dari debu dengan kompresor udara atau sikat lembut, pastikan kering, dan pasang kembali. Jika masih bermasalah, pertimbangkan penggunaan modul RAM yang bersih atau konsultasi dengan ahli perbaikan.', 1, 'kerusakan ram.png'),
(3, 'LCD Rusak', 'K03', 'Jika LCD laptop rusak, mungkin akan terjadi masalah tampilan seperti gambar yang pecah, tidak jelas, atau layar yang mati. Jika masalah ini terjadi, pertama pastikan tidak ada masalah dengan kabel penghubung atau driver grafis. Jika itu tidak membantu, mungkin LCD perlu diganti. Anda bisa membawa laptop ke pusat layanan resmi atau mempercayakannya pada teknisi ahli. Pastikan untuk membackup data sebelumnya jika perlu membuka laptop. Jangan mencoba memperbaiki sendiri jika tidak memiliki pengalaman, karena dapat merusak lebih lanjut atau menyebabkan cedera.', 1, 'lcd laptop.png'),
(4, 'Motherboard Laptop Mati', 'K04', 'Jika motherboard laptop mati, itu bisa menjadi masalah serius karena motherboard mengontrol banyak fungsi kunci dalam laptop. Jika Anda yakin bahwa masalah tersebut disebabkan oleh motherboard yang mati, opsi terbaik adalah membawa laptop ke pusat layanan resmi atau mempercayakannya pada teknisi ahli. Mereka dapat melakukan diagnosis lebih lanjut dan memberikan solusi, yang mungkin termasuk penggantian motherboard. Perbaikan motherboard biasanya memerlukan keahlian teknis yang tinggi dan sebaiknya dilakukan oleh profesional. Pastikan untuk membackup data penting sebelum melakukan perbaikan yang mungkin melibatkan penggantian motherboard.', 1, 'motherboard laptop.jpg'),
(5, 'Keyboard Laptop Rusak', 'K05', 'Jika keyboard laptop rusak, Anda dapat mencoba membersihkan atau mengganti tombol yang bermasalah. Jika kerusakannya lebih parah, pertimbangkan menggunakan keyboard eksternal melalui USB atau bawa laptop ke pusat layanan resmi untuk perbaikan atau penggantian keyboard. Jika Anda memiliki keterampilan teknis, penggantian keyboard secara mandiri juga mungkin, tetapi berhati-hatilah agar tidak merusak komponen lain atau membatalkan garansi.', 1, 'kerusakan keyboard.jpg'),
(6, 'Chipshet Enable Keyboard Rusak', 'K06', 'Jika chipset yang mengendalikan fungsi keyboard pada laptop rusak, solusinya dapat melibatkan penggantian atau perbaikan komponen chipset tersebut. Namun, penggantian atau perbaikan chipset umumnya memerlukan keterampilan teknis tinggi dan biasanya lebih baik dilakukan oleh teknisi ahli atau di pusat layanan resmi. Sebelum mengambil langkah tersebut, pastikan untuk mencoba solusi sederhana seperti menginstal ulang driver keyboard atau melakukan pembaruan sistem untuk memastikan bahwa masalah tersebut tidak terkait dengan perangkat lunak. Jika perbaikan sendiri tidak memungkinkan, sebaiknya konsultasikan masalah tersebut kepada profesional atau pusat layanan terkait untuk solusi yang tepat.', 1, 'kerusakan keyboard.jpg'),
(7, 'Harddisk Kehilangan Sistem Operasi', 'K07', 'Jika hard disk kehilangan sistem operasi, ini mungkin disebabkan oleh beberapa faktor seperti kerusakan pada sektor boot, korupsi sistem file, atau kegagalan drive secara keseluruhan. Solusi pertama yang dapat dicoba adalah menggunakan media instalasi sistem operasi (seperti USB atau DVD) untuk melakukan boot dan memulai proses perbaikan sistem atau instalasi ulang sistem operasi. Dalam beberapa kasus, perangkat lunak pemulihan data juga dapat membantu mendapatkan kembali file yang mungkin masih ada di hard disk. Jika upaya tersebut tidak berhasil, ada kemungkinan bahwa ada masalah keras pada hard disk, dan penggantian atau perbaikan mungkin diperlukan. Penting untuk mencadangkan data secara teratur untuk menghindari kehilangan data yang signifikan dalam situasi seperti ini.', 1, 'kerusakan harddisk.jpg'),
(8, 'Charger Laptop Rusak', 'K08', 'Jika charger laptop rusak, solusinya adalah menggantinya dengan charger yang baru. Pertama, pastikan bahwa masalah bukan terletak pada port pengisian laptop. Jika port tersebut baik-baik saja, belilah charger pengganti yang sesuai dengan merek dan model laptop Anda. Sebaiknya gunakan charger resmi atau yang kompatibel yang memiliki daya keluaran yang sesuai. Jangan mencoba memperbaiki charger sendiri, terutama jika Anda tidak memiliki pengetahuan teknis yang cukup. Jika laptop masih berada dalam masa garansi, hubungi produsen atau penyedia layanan untuk mendapatkan bantuan lebih lanjut atau penggantian charger.', 1, 'power adaptor.jpg'),
(9, 'Touchpad Rusak', 'K09', 'Jika touchpad laptop rusak, Anda dapat mencoba beberapa langkah perbaikan awal. Pertama, pastikan bahwa tidak ada debu atau kotoran yang menghalangi fungsi touchpad. Bersihkan touchpad dengan lembut menggunakan kain bersih dan kering. Selanjutnya, pastikan driver touchpad terinstal dan diperbarui dengan versi terbaru. Jika itu tidak memperbaiki masalah, periksa pengaturan touchpad di pengaturan sistem operasi Anda untuk memastikan tidak ada konfigurasi yang salah. Jika semua langkah ini tidak membantu, bisa jadi ada kerusakan fisik pada touchpad, dan Anda mungkin perlu menghubungi pusat layanan resmi produsen atau teknisi ahli untuk perbaikan atau penggantian touchpad. Jangan mencoba membongkar atau memperbaiki secara mandiri jika Anda tidak memiliki keterampilan teknis yang memadai.', 1, 'kerusakan touchpad.jpg'),
(10, 'Tombol Keyboard ada yang error', 'K10', 'Jika ada tombol keyboard laptop yang bermasalah atau error, pertama-tama periksa apakah ada kotoran atau debu di bawah tombol tersebut. Coba bersihkan dengan hati-hati menggunakan kompresor udara atau sikat lembut. Jika itu tidak memperbaiki masalah, kemungkinan ada masalah perangkat keras atau koneksi yang lebih serius. Pertimbangkan untuk menggunakan keyboard eksternal sementara sebagai solusi sementara. Jika laptop masih dalam masa garansi, sebaiknya hubungi produsen atau penyedia layanan untuk mendapatkan bantuan lebih lanjut atau penggantian keyboard. Jika tidak, Anda dapat membawa laptop ke pusat layanan resmi atau mempercayakannya pada teknisi ahli untuk perbaikan atau penggantian tombol keyboard yang bermasalah. Jangan mencoba membongkar sendiri jika Anda tidak memiliki keterampilan teknis yang memadai.', 1, 'kerusakan keyboard.jpg'),
(11, 'Driver Wifi Hilang', 'K11', 'Jika driver WiFi hilang pada laptop, cobalah memperbarui driver melalui \"Device Manager\" atau unduh ulang driver terbaru dari situs web produsen. Lakukan restart komputer atau pertimbangkan pemulihan sistem jika diperlukan. Jika masalah tetap, ada kemungkinan perangkat keras atau konfigurasi yang lebih serius, dan sebaiknya konsultasikan dengan produsen atau teknisi komputer untuk bantuan lebih lanjut.', 1, 'driver wifi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `nama`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin@gmail.com', 'admin'),
(5, 'aris', '202cb962ac59075b964b07152d234b70', 'aris', 'aris@gmail.com', 'user'),
(9, 'budi', '202cb962ac59075b964b07152d234b70', 'budi', 'budi@gmail.com', 'user'),
(10, 'fillah21', '553310171eac8e4cec3e8ccb4f8edb5c', 'Fillah Zaki Alhaqi', 'fillah.alhaqi11@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  ADD PRIMARY KEY (`idaturan`),
  ADD KEY `idgejala` (`idgejala`),
  ADD KEY `idkerusakan` (`idkerusakan`);

--
-- Indeks untuk tabel `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indeks untuk tabel `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD PRIMARY KEY (`idhasil`),
  ADD KEY `idkerusakan` (`idkerusakan`),
  ADD KEY `iduser` (`iduser`);

--
-- Indeks untuk tabel `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  ADD PRIMARY KEY (`idkerusakan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  MODIFY `idaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  MODIFY `idgejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  MODIFY `idhasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  MODIFY `idkerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_aturan`
--
ALTER TABLE `tbl_aturan`
  ADD CONSTRAINT `tbl_aturan_ibfk_1` FOREIGN KEY (`idgejala`) REFERENCES `tbl_gejala` (`idgejala`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_aturan_ibfk_2` FOREIGN KEY (`idkerusakan`) REFERENCES `tbl_kerusakan` (`idkerusakan`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD CONSTRAINT `tbl_hasil_ibfk_1` FOREIGN KEY (`idkerusakan`) REFERENCES `tbl_kerusakan` (`idkerusakan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hasil_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
