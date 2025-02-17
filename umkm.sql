-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2025 pada 13.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `isi`, `image`, `created_at`) VALUES
(1, 'Kunjungan Joko Widodo', 'kunjungan-joko-widodo', 'Pada hari yang penuh antusiasme, kantor kami menjadi saksi dari kunjungan luar biasa Presiden Joko Widodo. Dengan diiringi oleh keamanan yang ketat, presiden tiba di kantor kami dengan senyuman hangat dan sikap ramahnya yang khas. Rombongan yang ikut dalam kunjungan ini mencerminkan keragaman dan representasi yang kuat dari berbagai sektor masyarakat.<br />\r\n<br />\r\nKunjungan tersebut tidak hanya sekadar pertemuan formal, tetapi juga menjadi kesempatan bagi Presiden untuk mendengarkan aspirasi dan masukan langsung dari para pemimpin di perusahaan kami. Dalam pidatonya, Presiden Joko Widodo menyoroti pentingnya kerjasama antara pemerintah dan sektor swasta dalam memajukan ekonomi dan menciptakan lapangan kerja yang lebih baik.<br />\r\n<br />\r\nKami merasa terhormat karena Presiden menunjukkan minatnya terhadap inovasi dan perkembangan industri di kantor kami. Beliau berdiskusi dengan pemimpin perusahaan dan melibatkan diri dalam sesi tanya jawab yang membangun. Ini bukan hanya kunjungan rutin, tetapi sebuah momen bersejarah yang memberikan inspirasi dan semangat baru bagi semua yang hadir.<br />\r\n<br />\r\nSetelah acara resmi, Presiden mengambil waktu untuk berkeliling di sekitar kantor, bertemu dengan para karyawan, dan meresapi atmosfer kerja kami. Keberadaannya di sini memberikan semangat baru bagi tim kami untuk terus berkontribusi pada pembangunan negara dan mencapai visi pemerintah.<br />\r\n<br />\r\nKunjungan Presiden Joko Widodo di kantor kami bukan hanya sekadar kehormatan, tetapi juga merupakan dorongan positif untuk terus bergerak maju dalam mencapai tujuan bersama. Kami berharap kunjungan ini menjadi awal dari hubungan yang lebih erat antara pemerintah dan sektor swasta, demi kemajuan dan kesejahteraan bersama.', '1701624888.jpeg', '2023-12-03 17:34:48'),
(3, 'Edukasi Bencana', 'edukasi-bencana', 'Edukasi bencana memiliki peran penting dalam mempersiapkan masyarakat menghadapi risiko dan dampak yang mungkin terjadi akibat bencana alam atau insiden serius lainnya. Melalui penyebaran pengetahuan dan pemahaman yang benar tentang ancaman potensial, kita dapat meningkatkan kesiapsiagaan dan mengurangi kerugian yang mungkin timbul.<br />\r\n<br />\r\nSalah satu aspek penting dari edukasi bencana adalah pemahaman akan jenis-jenis bencana yang mungkin terjadi di suatu wilayah. Dengan mengetahui potensi bencana seperti gempa bumi, banjir, kebakaran hutan, atau badai tropis, masyarakat dapat mengambil langkah-langkah preventif dan bersiap diri menghadapi situasi darurat. Informasi ini dapat disampaikan melalui kampanye penyuluhan, seminar, dan sumber daya edukatif lainnya.<br />\r\n<br />\r\nSelain itu, edukasi bencana juga mencakup penekanan pada peran masyarakat dalam sistem peringatan dini. Masyarakat perlu tahu cara merespons peringatan dini, termasuk evakuasi cepat dan mengumpulkan perlengkapan darurat yang diperlukan. Pengembangan keterampilan pertolongan pertama juga menjadi bagian integral dari edukasi ini, karena dapat membantu menyelamatkan nyawa dan mengurangi tingkat cedera saat keadaan darurat.<br />\r\n<br />\r\nSektor pendidikan, mulai dari tingkat sekolah dasar hingga perguruan tinggi, memegang peran kunci dalam mengintegrasikan edukasi bencana ke dalam kurikulum. Program-program ini dapat mencakup simulasi evakuasi, pelatihan pertolongan pertama, dan proyek-proyek penelitian yang terfokus pada mitigasi risiko bencana. Hal ini membantu menciptakan budaya kesiapsiagaan yang ditanamkan sejak dini dalam masyarakat.<br />\r\n<br />\r\nTerakhir, kerja sama antara pemerintah, organisasi non-pemerintah, dan sektor swasta menjadi kunci dalam mendukung upaya edukasi bencana. Sumber daya bersama dan koordinasi yang baik akan memperkuat efektivitas program-program ini, menciptakan lingkungan yang lebih aman, dan meningkatkan kapasitas tanggap darurat masyarakat secara keseluruhan. Dengan mengutamakan edukasi bencana, kita dapat bergerak menuju masyarakat yang lebih siap dan tahan bencana.', '1701625422.jpeg', '2023-12-03 17:43:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `gambar`, `judul`, `deskripsi`, `kategori`) VALUES
(2, '1738511332.jpeg', 'Edukasi Bencana', 'sdfsd', 'kunjungan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `umkm_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `judul_sambutan` varchar(255) NOT NULL,
  `isi_sambutan` longtext NOT NULL,
  `foto_sambutan` varchar(255) NOT NULL,
  `isi_sejarah` longtext NOT NULL,
  `visi` longtext NOT NULL,
  `misi` longtext NOT NULL,
  `program_kerja` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `judul_sambutan`, `isi_sambutan`, `foto_sambutan`, `isi_sejarah`, `visi`, `misi`, `program_kerja`) VALUES
(1, 'Memberikan sambutan oleh Kepala Desa Margourip', 'Assalamu’alaikum Warahmatullahi Wabarakatuh,Selamat datang di Website Resmi Desa Margourip. Dengan penuh rasa syukur, kami hadirkan website ini sebagai bentuk keterbukaan informasi dan pelayanan bagi seluruh masyarakat Desa Margourip serta para pengunjung yang ingin mengenal lebih jauh tentang desa kami.Desa Margourip memiliki potensi alam, budaya, dan kearifan lokal yang kaya. Melalui website ini, kami berupaya untuk menyajikan informasi terkait pemerintahan desa, kegiatan masyarakat, potensi wisata, serta berbagai layanan yang dapat diakses secara digital guna meningkatkan transparansi dan kemudahan dalam pelayanan publik.Kami mengajak seluruh masyarakat untuk berpartisipasi aktif dalam pembangunan desa, baik dengan memberikan saran, kritik, maupun kontribusi nyata demi kemajuan Desa Margourip yang lebih baik. Semoga dengan adanya website ini, komunikasi antara pemerintah desa dan masyarakat semakin erat, serta dapat menjadi sarana untuk memajukan desa kita tercinta.Terima kasih atas kunjungan Anda. Mari bersama kita bangun Desa Margourip yang lebih maju, sejahtera, dan berdaya saing!Wassalamu’alaikum Warahmatullahi Wabarakatuh.', '1739289663.jpeg', 'Desa Margourip terletak di Kecamatan Ngancar, Kabupaten Kediri, Jawa Timur. Dahulu, wilayah ini merupakan hutan belantara dengan jumlah penduduk yang masih sedikit. Seiring berjalannya waktu, banyak pendatang menetap di desa ini, membentuk komunitas yang beragam dengan budaya dan latar belakang yang unik. Margourip berada di lereng Gunung Kelud, menjadikannya wilayah yang subur dan memiliki pemandangan alam yang indah. Di bagian selatan desa mengalir sungai lahar yang berperan penting dalam ekosistem sekitar, terutama saat terjadi aktivitas vulkanik Gunung Kelud. Mayoritas penduduk Desa Margourip beragama Islam, dengan keberagaman keyakinan lain yang tetap hidup berdampingan secara harmonis. Tradisi gotong royong masih dijunjung tinggi, mencerminkan kebersamaan yang kuat di antara warga desa. Berbagai kegiatan keagamaan, sosial, dan kebudayaan rutin diadakan untuk mempererat tali persaudaraan antarwarga. Sebagai desa yang berada di kawasan pegunungan, Margourip memiliki potensi besar dalam bidang pertanian dan perkebunan. Selain itu, pariwisata juga menjadi sektor yang terus berkembang, mengingat lokasinya yang strategis dekat dengan destinasi wisata alam seperti Gunung Kelud. Desa Margourip memiliki fasilitas pendidikan yang memadai, termasuk beberapa sekolah dasar yang mendukung perkembangan pendidikan anak-anak desa. Infrastruktur desa terus ditingkatkan guna menunjang kesejahteraan masyarakat, mulai dari akses jalan, sarana kesehatan, hingga teknologi informasi.', '\"Menjadikan Desa Margourip sebagai desa yang maju, mandiri, dan berdaya saing dengan tetap menjaga kearifan lokal serta kesejahteraan masyarakat.\"', '1. Meningkatkan kesejahteraan masyarakat melalui pengembangan ekonomi berbasis potensi lokal.<br />\r\n2. Mendorong pendidikan dan peningkatan kualitas sumber daya manusia.<br />\r\n3. Menjaga kelestarian lingkungan serta pengelolaan sumber daya alam yang berkelanjutan.<br />\r\n4. Mengembangkan sektor pariwisata dan kebudayaan desa.<br />\r\n5. Memperkuat nilai-nilai gotong royong dan kebersamaan dalam kehidupan bermasyarakat.', 'Dalam bidang pembangunan dan infrastruktur, Desa Margourip berkomitmen untuk meningkatkan kualitas jalan desa guna mendukung mobilitas warga serta membangun fasilitas umum seperti balai desa, pasar desa, dan tempat ibadah. Selain itu, sistem drainase akan dikembangkan untuk mencegah banjir saat musim hujan, serta penyediaan akses internet desa guna mendukung kemajuan digitalisasi.<br />\r\n<br />\r\nDi bidang ekonomi dan UMKM, desa berupaya mengembangkan usaha mikro, kecil, dan menengah berbasis potensi lokal melalui pelatihan keterampilan serta pemberdayaan petani dan peternak dengan bantuan alat serta teknologi pertanian. Selain itu, promosi produk lokal desa akan diperkuat melalui platform digital dan event pameran guna meningkatkan daya saing.<br />\r\n<br />\r\nDalam bidang sosial dan kemasyarakatan, berbagai program bantuan sosial akan diberikan kepada masyarakat kurang mampu, sementara kegiatan gotong royong dan kerja bakti rutin dilakukan untuk menjaga kebersihan desa. Program pemberdayaan perempuan dan peningkatan kesejahteraan keluarga juga menjadi perhatian, sejalan dengan peningkatan pelayanan administrasi desa agar lebih cepat dan efisien.<br />\r\n<br />\r\nDi sektor pendidikan dan kesehatan, desa berupaya menyediakan beasiswa bagi siswa berprestasi dan kurang mampu, serta mengadakan fasilitas penunjang pendidikan seperti perpustakaan desa. Program kesehatan seperti posyandu untuk ibu hamil dan balita akan terus dijalankan guna meningkatkan kualitas kesehatan masyarakat, disertai penyuluhan tentang kebersihan lingkungan.<br />\r\n<br />\r\nDalam bidang pariwisata dan budaya, Desa Margourip mengembangkan potensi wisata alam dan budaya melalui berbagai program, termasuk pelestarian seni dan budaya lokal dengan mengadakan festival serta acara adat. Infrastruktur pendukung wisata, seperti homestay dan pusat informasi wisata, akan terus dikembangkan, didukung dengan promosi yang lebih luas melalui media sosial dan website resmi desa.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `umkm`
--

CREATE TABLE `umkm` (
  `id_umkm` int(11) NOT NULL,
  `nama_umkm` varchar(255) NOT NULL,
  `foto_umkm` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `link_umkm` varchar(255) NOT NULL,
  `pemilik_umkm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `umkm`
--

INSERT INTO `umkm` (`id_umkm`, `nama_umkm`, `foto_umkm`, `deskripsi`, `link_umkm`, `pemilik_umkm`) VALUES
(8, 'Peyek Bu Sri', '1739619400.jpeg', 'UMKM Peyek Bu Sri merupakan usaha rumahan yang telah beroperasi selama lebih dari 17 tahun di Desa Margourip, Kecamatan Ngancar, tepatnya di RT 02/RW 01. Usaha ini dikenal dengan produksi peyeknya yang renyah dan gurih, menggunakan bahan-bahan berkualitas untuk menjaga cita rasa khasnya.<br />\r\n<br />\r\nSetiap harinya, Peyek Bu Sri mampu memproduksi sekitar 10 kg peyek, yang dijual dengan harga Rp50.000 per kilogram. Produk ini banyak diminati oleh masyarakat dan biasanya dipasarkan di sekolah-sekolah, pameran, serta melalui pesanan langsung dari pelanggan.<br />\r\n<br />\r\nDengan pengalaman bertahun-tahun, Peyek Bu Sri terus mempertahankan kualitasnya dan menjadi salah satu produk unggulan UMKM di Desa Margourip.', 'peyek-bu-sri', 'peyek bu sri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(8, 'Admin', 'admin', 'admin1234567890'),
(9, 'emping', 'emping', 'emping123'),
(10, 'peyek bu sri', 'peyek bu sri', 'peyek123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id_umkm`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
