-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 08:53 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `splaptop4`
--

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

--
-- Dumping data for table `tbl_hasil_diagnosa`
--

INSERT INTO `tbl_hasil_diagnosa` (`idhasil`, `hasil_probabilitas`, `nama_kerusakan`, `nama`, `solusi`, `tanggal`) VALUES
(1, 1, 'Kerusakan Keyboard', 'alvin', 'Untuk kerusakan keyboard laptop, bersihkan dengan kaleng udara terkompresi atau cotton swab bercairan pembersih elektronik. Pastikan laptop dimatikan sebelum melakukan perbaikan fisik. Jika ragu, minta bantuan teknisi atau layanan resmi.', '2024-02-02');

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
(1, 'Kerusakan Keyboard', 'K01', 'Untuk kerusakan keyboard laptop, bersihkan dengan kaleng udara terkompresi atau cotton swab bercairan pembersih elektronik. Pastikan laptop dimatikan sebelum melakukan perbaikan fisik. Jika ragu, minta bantuan teknisi atau layanan resmi.', 1, 'kerusakan keyboard.jpg'),
(2, 'Kerusakan Touchpad', 'K02', 'Untuk masalah touchpad laptop, coba langkah-langkah berikut:\r\n\r\nPastikan touchpad tidak dinonaktifkan, restart laptop, periksa dan perbarui driver touchpad, hapus dan reinstal driver touchpad, periksa kabel dan konektor fisik, uji di sistem operasi lain, perbarui atau kembalikan sistem operasi, dan jika masalah persisten, bawa ke layanan purna jual.', 1, 'kerusakan touchpad.jpg'),
(3, 'Kerusakan Master Boot Record', 'K03', 'Perbaiki kerusakan MBR pada laptop dengan menjalankan perintah "bootrec /fixmbr" melalui Command Prompt. Pastikan untuk restart laptop setelahnya.', 1, 'kerusakan master boot record.jpg'),
(4, 'Harddisk Bad Sector', 'K04', 'Untuk mengatasi bad sector pada hard disk laptop, langkah-langkah yang dapat diambil meliputi: menjalankan `chkdsk /f` melalui Command Prompt untuk memindai dan memperbaiki bad sector, menggunakan aplikasi perbaikan seperti HDD Regenerator, segera membuat backup data penting, memastikan firmware dan driver hard disk terbaru, menjaga laptop agar terhindar dari guncangan dan mengurangi penggunaan berat, serta mempertimbangkan penggantian hard disk jika masalah tetap persisten.', 1, 'kerusakan harddisk bad sector.jpg'),
(5, 'Kerusakan Harddisk', 'K05', 'Jika laptop mengalami kerusakan hard disk, langkah pertama adalah segera backup data yang penting. Selanjutnya, jalankan utilitas pemeriksaan kesehatan hard disk seperti chkdsk pada Windows atau fsck pada Linux untuk mendeteksi dan memperbaiki sektor yang rusak. Jika hard disk menunjukkan gejala yang serius, pertimbangkan penggantian hard disk dan instalasi ulang sistem operasi, diikuti dengan pemulihan data dari cadangan yang telah dibuat sebelumnya.', 1, 'kerusakan harddisk.jpg'),
(6, 'Kerusakan Kabel Sata Harddisk', 'K06', 'Jika mengalami kerusakan pada kabel SATA hard disk, solusinya adalah mengganti kabel tersebut dengan yang baru dan memastikan pemasangannya sesuai. Pastikan untuk mematikan laptop atau komputer sebelum mengganti kabel, dan periksa apakah koneksi SATA terpasang dengan benar di port yang sesuai pada motherboard. Setelah penggantian, boot ulang sistem dan periksa apakah hard disk terdeteksi dengan baik.', 1, 'kerusakan kabel sata hdd.jpg'),
(7, 'Kerusakan RAM', 'K07', 'Jika menghadapi kerusakan pada RAM laptop, solusinya dapat dimulai dengan memeriksa apakah modul RAM terpasang dengan benar. Coba lepaskan dan pasang kembali modul RAM untuk memastikan koneksi yang baik. Selanjutnya, jalankan pemeriksaan kesalahan memori menggunakan utilitas Windows Memory Diagnostics atau Memtest86. Jika terdeteksi masalah, pertimbangkan untuk mengganti modul RAM yang bermasalah dengan yang baru. Pastikan modul RAM yang digunakan kompatibel dengan laptop dan pemasangannya sesuai dengan pedoman produsen.', 1, 'kerusakan ram.png'),
(8, 'Kerusakan Chip VGA', 'K08', 'Jika mengalami kerusakan pada chip VGA laptop, solusinya mungkin melibatkan penggantian atau perbaikan chip tersebut. Dalam sebagian besar kasus, penggantian chip VGA pada laptop melibatkan proses yang rumit dan sebaiknya dilakukan oleh teknisi profesional. Sebelum mempertimbangkan penggantian, pastikan bahwa masalah tersebut tidak disebabkan oleh driver grafis yang tidak terbaru atau pengaturan perangkat lunak. Jika masalah berlanjut setelah mengonfirmasi faktor perangkat lunak, konsultasikan dengan layanan purna jual atau teknisi untuk evaluasi lebih lanjut dan kemungkinan perbaikan atau penggantian hardware yang diperlukan.', 1, 'kerusakan chip vga.jpg'),
(9, 'Kerusakan Slot RAM', 'K09', 'Jika menghadapi kerusakan pada slot RAM laptop, solusinya dapat melibatkan beberapa langkah. Pertama, coba ganti modul RAM dengan slot yang lain untuk memastikan bahwa masalah bukan pada modul RAM itu sendiri. Jika slot RAM tetap tidak berfungsi, kemungkinan ada masalah pada slot tersebut. Dalam beberapa kasus, membersihkan slot dengan udara terkompresi atau cotton swab dapat membantu menghilangkan debu atau kotoran yang mungkin menyebabkan masalah. Namun, jika slot RAM tetap tidak berfungsi, pertimbangkan untuk mendapatkan bantuan profesional atau mengganti motherboard laptop, karena perbaikan pada tingkat hardware tersebut sering kali memerlukan keahlian khusus dan alat yang sesuai.', 1, 'kerusakan ram.png'),
(10, 'Kerusakan Processor', 'K10', 'Jika menghadapi kerusakan pada prosesor laptop, solusinya biasanya melibatkan penggantian prosesor tersebut. Sebelumnya, pastikan bahwa masalah bukan disebabkan oleh masalah perangkat lunak atau sistem operasi. Jika laptop tidak dapat boot atau mengalami kegagalan sistem yang serius, pertimbangkan untuk melakukan pembaruan atau instalasi ulang sistem operasi. Namun, jika setelah itu masalah persisten dan indikasi kerusakan pada prosesor, sebaiknya konsultasikan dengan teknisi komputer profesional atau layanan purna jual untuk evaluasi lebih lanjut dan kemungkinan penggantian hardware yang diperlukan. Perlu diingat bahwa penggantian prosesor melibatkan prosedur yang rumit dan seringkali lebih baik dilakukan oleh ahli teknis.', 1, 'kerusakan processor.jpg'),
(11, 'Kerusakan Motherboard', 'K11', 'Jika menghadapi kerusakan pada motherboard laptop, solusinya dapat mencakup beberapa langkah evaluasi. Pertama, pastikan bahwa masalah tersebut bukan karena komponen lain, seperti RAM, prosesor, atau daya listrik. Selanjutnya, periksa apakah ada tanda-tanda visual kerusakan fisik pada motherboard, seperti komponen yang terbakar atau kerusakan koneksi. Jika kerusakan terdetek, memperbaiki atau mengganti komponen yang rusak mungkin memerlukan bantuan teknisi ahli. Jika motherboard benar-benar rusak dan tidak dapat diperbaiki, opsi terbaik adalah mengganti motherboard laptop. Namun, penggantian motherboard seringkali mahal dan memerlukan keahlian teknis yang tinggi, sehingga sebaiknya dilakukan oleh profesional atau di pusat layanan purna jual resmi.', 1, 'motherboard laptop.jpg'),
(12, 'Baterai CMOS Habis', 'K12', 'Jika baterai CMOS pada laptop habis, solusinya adalah menggantinya dengan baterai yang baru. Baterai CMOS bertanggung jawab menyimpan pengaturan BIOS dan jam waktu sistem ketika laptop dimatikan. Untuk mengganti baterai CMOS, matikan laptop, buka casing atau panel yang melindungi baterai tersebut, lalu gantilah dengan baterai serupa yang sesuai dengan spesifikasi laptop. Setelah penggantian, hidupkan kembali laptop dan atur ulang tanggal dan waktu di BIOS jika diperlukan. Baterai CMOS yang baru akan memastikan kelangsungan penyimpanan pengaturan BIOS dan fungsi jam waktu sistem.', 1, 'baterai cmos laptop.jpg'),
(13, 'Kerusakan BIOS', 'K13', 'Jika menghadapi kerusakan BIOS pada laptop, solusinya dapat dimulai dengan mengupdate atau mem-flash BIOS menggunakan versi firmware terbaru yang diperoleh dari situs web produsen laptop. Namun, proses ini perlu dilakukan dengan sangat hati-hati karena kesalahan selama flashing BIOS dapat menyebabkan kerusakan permanen. Jika update BIOS tidak memperbaiki masalah atau laptop tidak dapat boot, opsi lain adalah melakukan reset atau mengembalikan pengaturan default BIOS melalui jumper atau tombol yang disediakan pada motherboard laptop. Jika semua upaya tersebut tidak berhasil, konsultasikan dengan teknisi ahli atau pusat layanan purna jual resmi untuk evaluasi lebih lanjut dan kemungkinan penggantian chip BIOS atau motherboard.', 1, 'bios laptop.jpg'),
(14, 'Kerusakan Cooling Fan', 'K14', 'Jika menghadapi kerusakan pada cooling fan laptop, solusinya adalah menggantinya dengan unit yang baru. Cooling fan kritis untuk menjaga suhu optimal komponen laptop, terutama prosesor. Pertama, pastikan bahwa debu atau kotoran tidak menghambat kinerja fan saat membersihkan laptop secara menyeluruh. Jika fan tetap tidak berfungsi setelah pembersihan, gantilah cooling fan dengan model yang sesuai dan kompatibel. Pemasangan fan yang baru umumnya dapat dilakukan dengan membuka casing laptop dan melepas fan yang lama, kemudian memasang fan yang baru. Jika tidak yakin atau tidak nyaman melakukan penggantian sendiri, sebaiknya minta bantuan dari teknisi atau pusat layanan purna jual.', 1, 'cooling fan laptop.jpg'),
(15, 'Kerusakan Chipset Southbridge', 'K15', 'Jika menghadapi kerusakan pada southbridge laptop, solusinya melibatkan penanganan yang cermat dan seringkali memerlukan bantuan teknisi profesional. Southbridge merupakan bagian kritis dari chipset motherboard yang mengelola perangkat input/output dan fungsi tambahan lainnya. Jika terdapat indikasi kerusakan, langkah awal adalah memastikan bahwa perangkat lunak dan driver terkait diperbarui ke versi terbaru. Jika masalah persisten, teknisi mungkin perlu melakukan penggantian southbridge atau bahkan motherboard secara keseluruhan. Sebelum memutuskan untuk mengganti hardware, sebaiknya konsultasikan dengan ahli teknis atau pusat layanan resmi untuk evaluasi dan saran yang lebih lanjut.', 1, 'southbridge laptop.jpg'),
(16, 'Kerusakan Chipset Northbridge', 'K16', 'Northbridge merupakan bagian dari chipset pada motherboard yang bertanggung jawab atas pengelolaan komunikasi antara CPU, RAM, kartu grafis, dan komponen utama lainnya. Meskipun di masa lalu northbridge memiliki peran yang lebih dominan, seiring evolusi teknologi, sebagian besar fungsi northbridge telah diintegrasikan ke dalam CPU atau southbridge modern. Meskipun demikian, jika terjadi kerusakan pada northbridge, hal tersebut dapat memengaruhi kinerja dan stabilitas sistem secara keseluruhan. Solusinya melibatkan penanganan yang hati-hati dan seringkali memerlukan bantuan teknisi profesional. Jika ada indikasi kerusakan, konsultasikan dengan ahli teknis atau pusat layanan resmi untuk evaluasi dan saran lebih lanjut.', 1, 'southbridge laptop.jpg'),
(17, 'Kerusakan MMC Port', 'K17', 'Jika terjadi kerusakan pada MMC (MultiMediaCard) port pada laptop, solusinya pertama-tama melibatkan pemeriksaan fisik port untuk memastikan tidak ada kerusakan mekanis atau konsleting. Pastikan juga tidak ada benda asing atau debu yang menyumbat port. Jika tidak ada tanda-tanda kerusakan fisik, cobalah menggunakan perangkat MMC yang berfungsi dengan baik untuk memastikan bahwa masalah tidak ada pada perangkat itu sendiri. Jika port tetap tidak berfungsi, bisa jadi masalah terletak pada driver atau pengaturan perangkat di sistem operasi. Pembaruan driver atau penyesuaian pengaturan perangkat di Device Manager dapat membantu memperbaiki masalah tersebut. Jika upaya tersebut tidak berhasil, pertimbangkan untuk menghubungi teknisi atau pusat layanan purna jual untuk pemeriksaan lebih lanjut dan mungkin penggantian port jika diperlukan.', 1, 'mmc port.jpg'),
(18, 'Kerusakan Port USB', 'K18', 'Jika terjadi kerusakan pada port USB pada laptop, langkah pertama adalah memastikan bahwa masalah tersebut tidak disebabkan oleh perangkat USB yang digunakan. Coba gunakan perangkat USB yang berfungsi pada port lain untuk memastikan bahwa perangkat tersebut tidak bermasalah. Selanjutnya, periksa port USB untuk memastikan tidak ada kotoran atau benda asing yang menyumbat. Cobalah membersihkan port dengan hati-hati menggunakan udara terkompresi atau cotton swab. Jika masalah tetap ada, bisa jadi disebabkan oleh driver yang rusak atau port yang rusak secara fisik. Pembaruan driver atau penggantian port USB mungkin diperlukan. Jika upaya tersebut tidak berhasil, konsultasikan dengan teknisi atau pusat layanan purna jual untuk evaluasi lebih lanjut dan kemungkinan penggantian port jika diperlukan.', 1, 'port usb.jpg'),
(19, 'Kerusakan Port Ethernet RJ-45', 'K19', 'Jika terjadi kerusakan pada port RJ-45 (Ethernet) pada laptop, langkah awal adalah memastikan bahwa kabel Ethernet dan perangkat jaringan lainnya berfungsi dengan baik. Pastikan juga tidak ada kotoran atau benda asing di dalam port RJ-45. Coba ganti kabel Ethernet dan perangkat jaringan untuk memastikan bahwa kerusakan bukan disebabkan oleh faktor eksternal. Jika port RJ-45 masih tidak berfungsi, periksa driver jaringan di laptop untuk memastikan bahwa mereka terinstal dan diperbarui. Jika masalah tetap, kemungkinan ada kerusakan fisik pada port itu sendiri. Dalam kasus ini, sebaiknya konsultasikan dengan teknisi atau pusat layanan purna jual untuk evaluasi lebih lanjut dan kemungkinan penggantian port RJ-45.', 1, 'port rj 45.png'),
(20, 'Kerusakan Wireless Network Card', 'K20', 'Jika Anda mengalami kerusakan pada WNC (Wireless Network Card) pada laptop, pertama-tama pastikan bahwa masalah tersebut bukan disebabkan oleh faktor perangkat lunak, seperti driver yang tidak terinstal atau rusak. Cobalah untuk memperbarui driver WNC melalui Device Manager atau situs web produsen laptop. Jika perangkat lunak tidak menjadi isu, periksa apakah ada indikasi kerusakan fisik pada WNC, seperti koneksi yang lepas atau komponen yang rusak. Jika ada kerusakan fisik, pertimbangkan untuk mengganti kartu jaringan nirkabel tersebut dengan yang baru dan sesuai. Jika masalah tetap persisten setelah upaya tersebut, sebaiknya konsultasikan dengan teknisi atau pusat layanan purna jual untuk pemeriksaan lebih lanjut dan kemungkinan penggantian hardware jika diperlukan.', 1, 'WNC Laptop.jpg'),
(21, 'Kerusakan Webcam', 'K21', 'Jika mengalami kerusakan pada webcam laptop, langkah pertama adalah memastikan bahwa masalah tersebut bukan karena perangkat lunak atau driver. Pastikan driver webcam terinstal dan diperbarui melalui Device Manager atau situs web produsen laptop. Jika perangkat lunak tidak menjadi masalah, cek pengaturan privasi di sistem operasi untuk memastikan bahwa akses ke webcam diizinkan. Jika semua pengaturan dan driver sudah diperiksa, namun webcam masih tidak berfungsi, mungkin terjadi kerusakan fisik pada hardware. Konsultasikan dengan teknisi atau pusat layanan purna jual untuk pemeriksaan lebih lanjut dan kemungkinan penggantian webcam jika diperlukan.', 1, 'webcam laptop.jpg'),
(22, 'Kerusakan Port Audio', 'K22', 'Jika mengalami kerusakan pada port audio laptop, langkah awal adalah memastikan bahwa masalah tersebut bukan disebabkan oleh perangkat audio atau headphone yang digunakan. Coba gunakan perangkat audio yang berfungsi pada port lain untuk memastikan bahwa perangkat tersebut tidak bermasalah. Periksa juga pengaturan suara di sistem operasi untuk memastikan port audio diaktifkan dan diatur dengan benar. Jika masalah tetap ada, bisa jadi ada masalah fisik pada port audio. Cobalah membersihkan port dengan hati-hati menggunakan udara terkompresi atau cotton swab. Jika itu tidak memperbaiki masalah, pertimbangkan untuk menghubungi teknisi atau pusat layanan purna jual untuk evaluasi lebih lanjut dan kemungkinan penggantian port audio jika diperlukan.', 1, 'port audio.jpg'),
(23, 'Kerusakan CD / DVD Drive', 'K23', 'Jika mengalami kerusakan pada CD/DVD drive laptop, langkah awal adalah memastikan bahwa masalah tersebut bukan disebabkan oleh perangkat lunak. Pastikan driver CD/DVD drive terinstal dan diperbarui melalui Device Manager. Jika perangkat lunak tidak menjadi isu, cobalah menggunakan CD/DVD yang berfungsi di drive lain untuk memastikan bahwa masalah bukan pada media tersebut. Cek apakah ada masalah fisik pada drive, seperti kotoran atau debu di lensa. Jika drive masih tidak berfungsi, mungkin perlu mengganti drive atau mempertimbangkan penggunaan drive eksternal sebagai alternatif. Jika upaya tersebut tidak berhasil, sebaiknya konsultasikan dengan teknisi atau pusat layanan purna jual untuk pemeriksaan lebih lanjut dan kemungkinan penggantian drive CD/DVD jika diperlukan.', 1, 'CD DVD.jpg'),
(24, 'Kerusakan Port VGA', 'K24', 'Jika mengalami kerusakan pada port VGA (Video Graphics Array) laptop, langkah pertama adalah memastikan bahwa perangkat tampilan, seperti monitor atau proyektor, dan kabel VGA yang digunakan berfungsi dengan baik. Coba gunakan perangkat dan kabel tersebut pada port VGA lain atau pada perangkat lain untuk mengisolasi sumber masalah. Pastikan tidak ada kotoran atau benda asing di dalam port VGA dan pastikan kabel terhubung dengan baik. Jika port VGA masih tidak berfungsi, bisa jadi ada masalah fisik pada port itu sendiri. Pertimbangkan untuk menggunakan port alternatif seperti HDMI atau DisplayPort jika tersedia, atau pertimbangkan untuk menggunakan adaptor VGA eksternal. Jika masalah tetap persisten, konsultasikan dengan teknisi atau pusat layanan purna jual untuk evaluasi lebih lanjut dan kemungkinan penggantian port VGA jika diperlukan.', 1, 'port vga.jpg'),
(25, 'Kerusakan Inverter LCD', 'K25', 'Jika mengalami kerusakan pada inverter LCD laptop, yang umumnya bertanggung jawab untuk menyediakan daya untuk lampu latar layar, langkah awal adalah memastikan bahwa masalah tersebut bukan disebabkan oleh layar LCD atau kabel yang bermasalah. Periksa apakah layar terlihat gelap atau tidak menyala dengan baik. Jika layar tampak normal tetapi tidak terang, bisa jadi inverter LCD bermasalah. Pengecekan lebih lanjut melibatkan penggantian inverter, yang biasanya terletak di dalam casing layar laptop. Jika Anda tidak yakin atau tidak nyaman melakukan penggantian sendiri, sebaiknya konsultasikan dengan teknisi atau pusat layanan purna jual untuk pemeriksaan lebih lanjut dan kemungkinan penggantian inverter LCD jika diperlukan.', 1, 'inverter lcd.jpg'),
(26, 'Kerusakan LCD Screen', 'K26', 'Jika mengalami kerusakan pada layar LCD laptop, langkah pertama adalah memastikan bahwa masalah tersebut bukan disebabkan oleh perangkat lunak atau driver. Pastikan driver grafis terinstal dan diperbarui melalui Device Manager. Jika perangkat lunak tidak menjadi isu, cek apakah ada tanda-tanda fisik kerusakan pada layar, seperti retak atau goresan. Jika layar tampak normal tetapi tidak menampilkan gambar dengan baik, mungkin ada masalah pada koneksi kabel fleksibel antara motherboard dan layar. Jika layar LCD rusak secara fisik atau tampilan tidak membaik setelah langkah-langkah di atas, pertimbangkan untuk mengganti layar LCD. Penggantian layar LCD umumnya memerlukan keahlian teknis dan bisa dilakukan oleh teknisi atau pusat layanan purna jual.', 1, 'lcd laptop.png'),
(27, 'Kerusakan Kabel Layar (Kabel Video)', 'K27', 'Jika mengalami kerusakan pada kabel layar laptop (biasanya disebut kabel LVDS atau kabel fleksibel layar), langkah pertama adalah memastikan bahwa masalah tersebut bukan disebabkan oleh driver atau perangkat lunak. Pastikan driver grafis terinstal dan diperbarui melalui Device Manager. Selanjutnya, periksa kabel layar untuk memastikan tidak ada kabel yang putus, terlepas, atau rusak secara fisik. Jika ada tanda-tanda kerusakan, pertimbangkan untuk mengganti kabel layar. Penggantian kabel layar umumnya memerlukan keahlian teknis dan sebaiknya dilakukan oleh teknisi atau pusat layanan purna jual. Jika setelah penggantian kabel layar masalah tetap persisten, kemungkinan besar ada masalah lain dengan komponen layar, dan konsultasikan dengan teknisi untuk pemeriksaan lebih lanjut.', 1, 'kabel layar.jpg'),
(28, 'Kerusakan Power Adaptor', 'K28', 'Jika mengalami kerusakan pada adaptor laptop, langkah pertama adalah memastikan bahwa masalah tersebut bukan disebabkan oleh sumber daya listrik atau outlet yang digunakan. Coba gunakan adaptor di outlet yang berbeda untuk memastikan bahwa masalah tidak ada pada sumber daya. Selanjutnya, periksa kabel adaptor untuk memastikan tidak ada kerusakan fisik seperti patah atau terputus. Jika kabel atau konektor adaptor rusak, pertimbangkan untuk mengganti adaptor atau kabelnya. Jika adaptor tetap tidak berfungsi setelah penggantian, bisa jadi terjadi kerusakan pada komponen internal adaptor. Dalam hal ini, sebaiknya konsultasikan dengan produsen laptop atau pusat layanan purna jual resmi untuk pemeriksaan lebih lanjut dan kemungkinan penggantian adaptor.', 1, 'power adaptor.jpg'),
(29, 'Kerusakan Port Charge', 'K29', 'Jika mengalami kerusakan pada port pengisian (charge) laptop, langkah awal adalah memastikan bahwa masalah tersebut bukan disebabkan oleh adaptor atau kabel pengisian itu sendiri. Coba gunakan adaptor dan kabel yang berfungsi pada laptop lain untuk memastikan bahwa perangkat tersebut tidak bermasalah. Periksa juga apakah ada debu atau kotoran di dalam port pengisian yang dapat menghambat koneksi. Jika port terlihat rusak atau patah secara fisik, mungkin perlu mengganti port pengisian. Penggantian port pengisian melibatkan prosedur teknis dan umumnya sebaiknya dilakukan oleh teknisi atau pusat layanan purna jual resmi. Jika setelah langkah-langkah tersebut masalah tetap persisten, konsultasikan dengan produsen laptop atau teknisi untuk pemeriksaan lebih lanjut dan kemungkinan perbaikan atau penggantian komponen yang terlibat.', 1, 'port charge.jpg'),
(30, 'Kerusakan Baterai Laptop', 'K30', 'Jika mengalami masalah pada baterai laptop, langkah pertama adalah memastikan bahwa baterai tersebut masih berada dalam kondisi baik dan dapat menyimpan daya listrik dengan normal. Cek apakah ada tanda-tanda fisik kerusakan pada baterai, seperti bengkak atau retak. Jika baterai terlihat normal, periksa juga apakah kabel pengisian dan port pengisian berfungsi dengan baik. Beberapa langkah yang dapat diambil meliputi pengaturan ulang baterai melalui Device Manager, pembaruan driver baterai, atau kalibrasi ulang baterai. Jika masalah tetap persisten, pertimbangkan untuk mengganti baterai dengan yang baru, terutama jika baterai telah mencapai umur pakainya. Baterai laptop biasanya dapat diganti oleh pengguna sendiri, namun pastikan untuk memilih baterai yang kompatibel dengan model laptop Anda. Jika tidak yakin atau masalah tetap tidak teratasi, sebaiknya konsultasikan dengan produsen laptop atau pusat layanan purna jual resmi untuk pemeriksaan lebih lanjut dan kemungkinan penggantian baterai.', 1, 'baterai laptop.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pertanyaan`
--

CREATE TABLE `tbl_pertanyaan` (
  `idpertanyaan` int(11) NOT NULL,
  `pertanyaan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pertanyaan`
--

INSERT INTO `tbl_pertanyaan` (`idpertanyaan`, `pertanyaan`) VALUES
(1, 'Apakah tombol keyboard tidak berfungsi ?'),
(2, 'Apakah touchpad berfungsi ?'),
(3, 'Apakah LED power hidup ?');

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
(6, 'budi', 'd41d8cd98f00b204e9800998ecf8427e', 'budi', 'budi@gmail.com', 'user'),
(8, 'kami', '202cb962ac59075b964b07152d234b70', 'kami', 'kami@gmail.com', 'user');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  MODIFY `idgejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  MODIFY `idhasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_kerusakan`
--
ALTER TABLE `tbl_kerusakan`
  MODIFY `idkerusakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_pertanyaan`
--
ALTER TABLE `tbl_pertanyaan`
  MODIFY `idpertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
