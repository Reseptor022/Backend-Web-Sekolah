-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2023 pada 04.39
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_about`
--

CREATE TABLE `tb_about` (
  `id_about` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_about`
--

INSERT INTO `tb_about` (`id_about`, `judul`, `deskripsi`) VALUES
(2, 'Website Sekolah', 'Website sekolah merupakan sebuah platform atau sarana yang digunakan oleh sekolah untuk menyediakan informasi tentang lembaga pendidikan yang mereka dirikan. Sebuah website sekolah biasanya berisi informasi tentang visi, misi, sejarah, kurikulum, program akademik dan non-akademik, jadwal pelajaran, jadwal kegiatan, informasi tentang tenaga pengajar dan staf, fasilitas pendidikan, dan berbagai aspek lainnya.\r\n\r\nWebsite sekolah biasanya juga dilengkapi dengan fitur-fitur yang memudahkan siswa, orang tua, guru, dan masyarakat untuk berinteraksi dan mendapatkan informasi yang dibutuhkan. Fitur-fitur tersebut antara lain kalender akademik, pengumuman, informasi tentang kegiatan ekstrakurikuler, fasilitas pendaftaran online, dan lain sebagainya.\r\n\r\nDalam era digital seperti saat ini, website sekolah menjadi semakin penting karena dapat membantu sekolah untuk lebih mudah menjangkau dan berinteraksi dengan masyarakat luas. Selain itu, dengan adanya website sekolah, siswa dan orang tua juga dapat lebih mudah memperoleh informasi terkait kegiatan dan perkembangan terbaru dari sekolah.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `id_agenda` int(11) NOT NULL,
  `nama_acara` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_agenda`
--

INSERT INTO `tb_agenda` (`id_agenda`, `nama_acara`, `waktu`, `deskripsi`, `gambar`) VALUES
(1, 'Ulang Tahun', '2023-06-19 18:34:43', 'Ulang Tahun Kepala Sekolah Pada  Hari Mnggu Tanggal 18 Juni 2023', 'Watermeloen.jpg'),
(5, 'liburan ke  korea selatan', '2023-06-21 17:03:59', 'test', 'IMG_9530.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(50) NOT NULL,
  `cover` text NOT NULL,
  `content` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `waktu_artikel` datetime NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `judul_artikel`, `cover`, `content`, `id_users`, `waktu_artikel`, `slug`) VALUES
(61, 'Pentingnya Pendidikan Bagi Masa Depann', '', 'Sekolah adalah tempat bagi pelajar untuk menimba ilmu dan pengetahuan. Sekolah bukan hanya sekadar tempat untuk belajar, tetapi juga sebagai pembentuk karakter dan kepribadian seseorang. Oleh karena itu, penting bagi kita untuk memperhatikan perkembangan sekolah di Indonesia.\r\n\r\nSalah satu permasalahan utama di Indonesia saat ini adalah rendahnya kualitas pendidikan di beberapa daerah. Banyak sekolah di Indonesia yang belum memenuhi standar pendidikan yang seharusnya. Hal ini disebabkan oleh kurangnya dana dan tenaga pengajar yang memadai. Kondisi seperti ini tentunya akan berdampak pada kualitas pendidikan yang didapat oleh pelajar.\r\n\r\nNamun, bukan hanya tanggung jawab pemerintah untuk meningkatkan kualitas pendidikan di Indonesia. Para orang tua juga harus turut serta dalam memperhatikan pendidikan anak-anak mereka. Orang tua harus memastikan bahwa sekolah yang dipilih untuk anak-anaknya memiliki kurikulum yang baik dan tenaga pengajar yang berkualitas.\r\n\r\nSelain itu, para siswa juga harus berperan aktif dalam proses pendidikan mereka. Mereka harus bersemangat dalam belajar, mengikuti semua pelajaran dengan baik, dan berpartisipasi dalam semua kegiatan di sekolah. Siswa juga harus menghargai guru dan teman-teman mereka, serta menghormati aturan yang berlaku di sekolah.\r\n\r\nDi era globalisasi dan teknologi seperti saat ini, pendidikan sudah menjadi hal yang sangat penting bagi masa depan seseorang. Dengan kualitas pendidikan yang baik, seseorang dapat memiliki kesempatan untuk meraih pekerjaan yang lebih baik dan memiliki penghasilan yang lebih tinggi. Oleh karena itu, kita harus memperhatikan perkembangan pendidikan di Indonesia, dan menjadikan sekolah sebagai sarana untuk menimba ilmu dan pengetahuan, serta sebagai pembentuk karakter dan kepribadian seseorang.\r\n\r\nDalam rangka meningkatkan kualitas pendidikan di Indonesia, pemerintah, orang tua, dan siswa harus bekerjasama untuk mengatasi semua permasalahan yang ada. Dengan semangat dan tekad yang kuat, bersama-sama kita dapat membawa Indonesia menuju masa depan yang lebih cerah dan sejahtera.', 1, '2023-06-21 16:33:40', ''),
(64, 'Contoh 22', '', 'test', 1, '2023-06-21 17:14:11', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id_gallery` int(11) NOT NULL,
  `waktu_gallery` datetime NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_gallery`
--

INSERT INTO `tb_gallery` (`id_gallery`, `waktu_gallery`, `gambar`) VALUES
(1, '2023-06-20 10:26:19', 'taro.png'),
(3, '2023-06-20 10:26:34', 'tehpucuk.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`) VALUES
(1, 'Arikel'),
(2, 'About'),
(3, 'Agenda'),
(4, 'Gallery'),
(5, 'Data Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn_siswa` int(12) NOT NULL,
  `nama_siswa` varchar(124) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` text NOT NULL,
  `nama_orang_tua` varchar(124) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nisn_siswa`, `nama_siswa`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `nama_orang_tua`, `jenis_kelamin`, `foto`) VALUES
(1, 123456789, 'Indra Kusumah', 'jalan mayor abdurahman', '2003-03-28', 'Sumedang', 'michael', 'laki laki', 'IMG_9649.JPG'),
(6, 987654321, 'kusumah', 'bandung', '2003-03-25', 'Jakarta', 'thony', 'laki - laki', 'IMG_9649.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(11) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `nama`, `username`, `password`) VALUES
(1, 'indra kusumah', 'indra022', '00aeb408ba8314c4abb0c36024d42c48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indeks untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indeks untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
