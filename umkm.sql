-- phpMyAdmin SQL Dump
-- version 6.0.0-dev
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2025 at 04:32 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `isi`, `image`, `created_at`) VALUES
(1, 'Kunjungan Joko Widodo', 'kunjungan-joko-widodo', 'Pada hari yang penuh antusiasme, kantor kami menjadi saksi dari kunjungan luar biasa Presiden Joko Widodo. Dengan diiringi oleh keamanan yang ketat, presiden tiba di kantor kami dengan senyuman hangat dan sikap ramahnya yang khas. Rombongan yang ikut dalam kunjungan ini mencerminkan keragaman dan representasi yang kuat dari berbagai sektor masyarakat.<br />\r\n<br />\r\nKunjungan tersebut tidak hanya sekadar pertemuan formal, tetapi juga menjadi kesempatan bagi Presiden untuk mendengarkan aspirasi dan masukan langsung dari para pemimpin di perusahaan kami. Dalam pidatonya, Presiden Joko Widodo menyoroti pentingnya kerjasama antara pemerintah dan sektor swasta dalam memajukan ekonomi dan menciptakan lapangan kerja yang lebih baik.<br />\r\n<br />\r\nKami merasa terhormat karena Presiden menunjukkan minatnya terhadap inovasi dan perkembangan industri di kantor kami. Beliau berdiskusi dengan pemimpin perusahaan dan melibatkan diri dalam sesi tanya jawab yang membangun. Ini bukan hanya kunjungan rutin, tetapi sebuah momen bersejarah yang memberikan inspirasi dan semangat baru bagi semua yang hadir.<br />\r\n<br />\r\nSetelah acara resmi, Presiden mengambil waktu untuk berkeliling di sekitar kantor, bertemu dengan para karyawan, dan meresapi atmosfer kerja kami. Keberadaannya di sini memberikan semangat baru bagi tim kami untuk terus berkontribusi pada pembangunan negara dan mencapai visi pemerintah.<br />\r\n<br />\r\nKunjungan Presiden Joko Widodo di kantor kami bukan hanya sekadar kehormatan, tetapi juga merupakan dorongan positif untuk terus bergerak maju dalam mencapai tujuan bersama. Kami berharap kunjungan ini menjadi awal dari hubungan yang lebih erat antara pemerintah dan sektor swasta, demi kemajuan dan kesejahteraan bersama.', '1701624888.jpeg', '2023-12-03 17:34:48'),
(3, 'Edukasi Bencana', 'edukasi-bencana', 'Edukasi bencana memiliki peran penting dalam mempersiapkan masyarakat menghadapi risiko dan dampak yang mungkin terjadi akibat bencana alam atau insiden serius lainnya. Melalui penyebaran pengetahuan dan pemahaman yang benar tentang ancaman potensial, kita dapat meningkatkan kesiapsiagaan dan mengurangi kerugian yang mungkin timbul.<br />\r\n<br />\r\nSalah satu aspek penting dari edukasi bencana adalah pemahaman akan jenis-jenis bencana yang mungkin terjadi di suatu wilayah. Dengan mengetahui potensi bencana seperti gempa bumi, banjir, kebakaran hutan, atau badai tropis, masyarakat dapat mengambil langkah-langkah preventif dan bersiap diri menghadapi situasi darurat. Informasi ini dapat disampaikan melalui kampanye penyuluhan, seminar, dan sumber daya edukatif lainnya.<br />\r\n<br />\r\nSelain itu, edukasi bencana juga mencakup penekanan pada peran masyarakat dalam sistem peringatan dini. Masyarakat perlu tahu cara merespons peringatan dini, termasuk evakuasi cepat dan mengumpulkan perlengkapan darurat yang diperlukan. Pengembangan keterampilan pertolongan pertama juga menjadi bagian integral dari edukasi ini, karena dapat membantu menyelamatkan nyawa dan mengurangi tingkat cedera saat keadaan darurat.<br />\r\n<br />\r\nSektor pendidikan, mulai dari tingkat sekolah dasar hingga perguruan tinggi, memegang peran kunci dalam mengintegrasikan edukasi bencana ke dalam kurikulum. Program-program ini dapat mencakup simulasi evakuasi, pelatihan pertolongan pertama, dan proyek-proyek penelitian yang terfokus pada mitigasi risiko bencana. Hal ini membantu menciptakan budaya kesiapsiagaan yang ditanamkan sejak dini dalam masyarakat.<br />\r\n<br />\r\nTerakhir, kerja sama antara pemerintah, organisasi non-pemerintah, dan sektor swasta menjadi kunci dalam mendukung upaya edukasi bencana. Sumber daya bersama dan koordinasi yang baik akan memperkuat efektivitas program-program ini, menciptakan lingkungan yang lebih aman, dan meningkatkan kapasitas tanggap darurat masyarakat secara keseluruhan. Dengan mengutamakan edukasi bencana, kita dapat bergerak menuju masyarakat yang lebih siap dan tahan bencana.', '1701625422.jpeg', '2023-12-03 17:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `gambar`, `judul`, `deskripsi`, `kategori`) VALUES
(2, '1738511332.jpeg', 'Edukasi Bencana', 'sdfsd', 'kunjungan');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int NOT NULL,
  `nama_lokasi` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `umkm_id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `umkm_id`, `nama`, `foto`, `deskripsi`) VALUES
(6, 5, 'Siomay bandung 23232', '1738943518.png', 'asdsad'),
(7, 5, 'Siomay Bandung ', '1738941685.png', 'sadsadsadsad'),
(8, 5, 'dasdsa', '1738943038.jpeg', 'dsadsad'),
(9, 7, 'Siomay bandung', '1738943636.png', 'sadsads'),
(10, 7, 'ssd', '1738943657.png', 'sadsad');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int NOT NULL,
  `judul_sambutan` varchar(255) NOT NULL,
  `isi_sambutan` longtext NOT NULL,
  `foto_sambutan` varchar(255) NOT NULL,
  `isi_sejarah` longtext NOT NULL,
  `visi` longtext NOT NULL,
  `misi` longtext NOT NULL,
  `program_kerja` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `judul_sambutan`, `isi_sambutan`, `foto_sambutan`, `isi_sejarah`, `visi`, `misi`, `program_kerja`) VALUES
(1, 'Memberikan sambutan oleh ketua lembaga  ', 'Lembaga Penanggulangan Bencana Pimpinan Pusat Muhammadiyah mengalami perubahan nama dengan tanpa mengurangi makna, visi dan misi lembaga yakni menjadi Lembaga Resiliensi Bencana Pimpinan Pusat Muhammadiyah mulai dari tahun 2022 serta memiliki sebutan dalam bahasa inggris \"Muhammadiyah Disaster Management Center\" atau disingkat MDMC. Lembaga ini dirintis tahun 2007 dengan nama \"Pusat Penanggulangan Bencana\" yang kemudian dikukuhkan menjadi lembaga yang bertugas mengkoordinasikan sumberdaya Muhammadiyah dalam kegiatan penanggulangan bencana oleh Pimpinan Pusat Muhammadiyah pasca Muktamar tahun 2010.<br />\r\n<br />\r\nMDMC bergerak dalam kegiatan penanggulangan bencana sesuai dengan definisi kegiatan penanggulangan bencana baik pada kegiatan Mitigasi dan Kesiapsiagaan, Tanggap Darurat dan juga Rehabilitasi. MDMC mengadopsi kode etik kerelawanan kemanusiaan dan piagam kemanusiaan yang berlaku secara internasional, mengembangkan misi pengurangan risiko bencana selaras dengan Hygo Framework for Action dan mengembangkan basis kesiapsiagaan di tingkat komunitas, sekolah dan rumah sakit sebagai basis gerakan Muhammadiyah sejak 100 tahun yang lalu. <br />\r\n<br />\r\nMDMC bergerak dalam kegiatan kebencanaan di seluruh wilayah Negara Republik Indonesia, sesuai wilayah badan hukum Persyarikatan Muhammadiyah yang dalam operasionalnya mengembangkan MDMC di tingkat Pimpinan Wilayah Muhammadiyah (Propinsi) dan MDMC di tingkat Pimpinan Daerah Muhammadiyah (Kabupaten).  ', '1738852043.jpeg', 'Muhammadiyah Disaster Management Center (MDMC) adalah sebutan dalam bahasa inggris dari Lembaga Penanggulangan Bencana Muhammadiyah yang merupakan salah satu unsur pembantu pimpinan Persyarikatan Muhammadiyah pada tingkat Pusat (Nasional), Wilayah (Provinsi) dan Daerah (Kabupaten) se Indonesia. Saat ini Lembaga Penanggulangan Bencana beralih nama dengan tanpa merubah visi dan misinya menjadi Lembaga Resilliensi Bencana sebagaiman Surat Keputusan Pimpinan Pusat Muhammadiyah nomor 153/KEP/I.0/D/2023 tentang Pengangkatan Pimpinan dan Anggota Lembaga Resiliensi Bencana Pimpinan Pusat Muhammadiyah Periode 2023-2028<br />\r\n<br />\r\nLRB bertugas mengkoordinasikan sumberdaya Muhammadiyah dalam upaya tanggap darurat - pemulihan, mitigasi-kesiapsiagaan, dan penguatan sistem jaringan, organisasi dan pengelolaan sumberdaya penanggulangan bencana.<br />\r\n<br />\r\nBekerja pada misi internasional dalam bendera Muhammadiyah Aid, menjadi bagian dari Muhammadiyah Covid-19 Command Center, anggota Humanitarian Forum Indonesia (HFI), anggota Platform Nasional PRB, dan anggota Konsorsium Pendidikan Bencana (KPB) ', 'Berkembangnya fungsi dan sistem penanggulangan bencana yang unggul dan berbasis Penolong Kesengsaraan Oemoem (PKO) sehingga mampu meningkatkan kualitas dan kemajuan hidup masyarakat yang sadar dan tangguh terhadap bencana serta mampu memulihkan korban bencana secara cepat dan bermartabat ', '    1. Meningkatkan dan Mengoptimalkan Sistem Penanggulangan Bencana di Muhammadiyah<br />\r\n    2. Mengembangkan Kesadaran Bencana di Lingkungan Muhammadiyah<br />\r\n    3. Memperkuat Jaringan dan Partisipasi Masyarakat dalam Penanggulangan Bencana.', 'Penanggulangan bencana adalah bagian dari nafas pergerakan Muhammadiyah sejak pendiriannya di tahun 1912 yang lalu. Komitmen ini telah diwujudkan baik dalam norma organisasi maupun dalam wujud nyata gerakan dengan berbagai karya inovatifnya sebagai pengusung gerakan Islam Berkemajuan. Berdirinya Majelis Penolong Kesengsaraan Oemoem (PKO) sebagai perangkat pelaksana misi persyarikatan di periode awal berdirinya organisasi, kemudian melahirkan berbagai varian aktualisasi ajaran Islam yang terus mengusahakan amalan terbaiknya dalam pemecahkan masalah kemanusiaan. Salah satu variannya berupa amal nyata dalam bidang penanggulangan bencana yang mewujud dalam bentuk Lembaga Penanggulangan Bencana Muhammadiyah atau disebut juga Muhammadiyah Disaster Management Center dengan singkatan MDMC.<br />\r\n<br />\r\nMDMC tidak saja mampu mengorganisir sumberdaya Muhammadiyah di tingkat lokal dan Nasional, namun juga telah berkiprah dalam misi kemanusiaan Internasional. Lembaga ini ikut menentukan arah dan kebijakan masalah kemanusiaan di berbagai forum Internasional, ikut menentukan arah dan kebijakan pengurangan risiko bencana di tingkat regional dan Internasional, serta membangun hubungan baik dengan pemerintah negara lain, lembaga regional dan juga lembaga Internasional .<br />\r\n<br />\r\nKerja besar jaringan Muhammadiyah yang tersebar di 34 Provinsi -di dukung perangkat pimpinan di 429 Kabupaten/Kota, dan disertai perangkat pimpinan di 3.366 Kabupaten/Kota- pada periode 2015 - 2020 ini bertujuan pencapaian kondisi obyektif secara nasional, berupa :<br />\r\n<br />\r\nTerciptanya transformasi (perubahan cepat ke arah kemajuan) sistem organisasi dan jaringan yang maju, profesional, dan modern.<br />\r\n<br />\r\nBerkembangnya sistem gerakan dan amal usaha yang berkualitas utama dan mandiri bagi terciptanya kondisi dan faktor-faktor pendukung terwujudnya masyarakat Islam yang sebenar-benarnya.<br />\r\n<br />\r\nBerkembangnya peran strategis Muhammadiyah dalam kehidupan umat, bangsa, dan dinamika global.<br />\r\n<br />\r\nProgram Muhammadiyah hasil Muktamar ke-47 merupakan program Nasional/Pusat (keseluruhan) yang menjadi acuan umum bagi perumusan dan pelaksanaan program di tingkat Wilayah, Daerah, Cabang, Ranting, Organisasi Otonom, dan Amal Usaha Persyarikatan sesuai dengan kewenangan, kepentingan, dan kondisi masing-masing. ');

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id_umkm` int NOT NULL,
  `nama_umkm` varchar(255) NOT NULL,
  `foto_umkm` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `link_umkm` varchar(255) NOT NULL,
  `pemilik_umkm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id_umkm`, `nama_umkm`, `foto_umkm`, `deskripsi`, `link_umkm`, `pemilik_umkm`) VALUES
(5, 'Umkm Pertama', '1738892302.png', 'sadsad', 'umkm-pertama', 'putra'),
(6, 'UMKM Kedua', '1738892998.jpeg', 'adsadsd', 'umkm-kedua', 'danil'),
(7, 'UMKM Ketiga', '1738943603.png', 'dsadsdsad', 'umkm-ketiga', 'farhan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`) VALUES
(1, 'Riski Putra Alamzah', 'putra', 'putra123'),
(2, 'Muhammad Farhan', 'farhan', 'farhan123'),
(5, 'Muhammad Danil Haqewi', 'danil', 'danil123'),
(6, 'Marshanda Aliza Putra Sudiono', 'danda', 'danda123'),
(7, 'zakki', 'zakki', 'zakki123'),
(8, 'Admin', 'admin', 'admin1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id_umkm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id_umkm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
