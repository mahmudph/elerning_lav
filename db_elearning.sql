-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Des 2020 pada 13.00
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_failed_jobs`
--

CREATE TABLE `tbl_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gurus`
--

CREATE TABLE `tbl_gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` smallint(6) DEFAULT NULL,
  `nama_guru` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` smallint(6) NOT NULL,
  `nomer_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `lulusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_gurus`
--

INSERT INTO `tbl_gurus` (`id`, `id_user`, `nama_guru`, `nip`, `gender`, `nomer_hp`, `tgl_lahir`, `tempat_lahir`, `alamat`, `lulusan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sakti Hidayat', '7206306501044915', 1, '(+62) 457 777', '2007-02-27', 'Padang', 'Ds. Halim No. 767', 'DOCTOR', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(2, 2, 'Tina Puspita', '5101580306065164', 1, '(+62) 266 885', '1981-01-17', 'Tual', 'Jln. Soekarno Hatta No. 210', 'DOCTOR', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(3, 3, 'Capa Praba Irawan M.Ak', '7211241010119719', 2, '0880 1726 933', '2011-11-24', 'Lhokseumawe', 'Psr. Sumpah Pemuda No. 170', 'SMA', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(4, 4, 'Wulan Handayani', '3516294709094177', 1, '(+62) 730 264', '1978-01-16', 'Tomohon', 'Psr. Bhayangkara No. 586', 'SARJANA', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(5, 5, 'Saka Opung Dongoran S.Ked', '5308705405011101', 2, '(+62) 205 362', '1983-11-14', 'Sabang', 'Jln. Veteran No. 11', 'DOCTOR', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(6, 13, 'Saka Opung Dongoran S.Ked', '5308705405011101', 2, '(+62) 205 362', '1983-11-14', 'Sabang', 'Jln. Veteran No. 11', 'DOCTOR', '2020-12-18 17:00:00', '2020-12-18 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru_mengajars`
--

CREATE TABLE `tbl_guru_mengajars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_pelajaran` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_guru_mengajars`
--

INSERT INTO `tbl_guru_mengajars` (`id`, `id_guru`, `id_pelajaran`, `id_kelas`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 1, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(2, 3, 1, 3, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(3, 6, 1, 1, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(4, 6, 4, 1, '2020-12-20 04:56:19', '2020-12-20 04:56:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bangku` smallint(6) NOT NULL,
  `jumlah_kursi` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id`, `nama_kelas`, `jumlah_bangku`, `jumlah_kursi`, `created_at`, `updated_at`) VALUES
(1, 'kelas 1', 40, 40, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(2, 'kelas 3', 40, 40, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(3, 'kelas 1', 40, 40, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(4, 'kelas 2', 40, 40, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(5, 'kelas 3', 40, 40, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(6, 'kelas 2', 40, 40, '2020-12-18 17:00:00', '2020-12-18 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_migrations`
--

CREATE TABLE `tbl_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_migrations`
--

INSERT INTO `tbl_migrations` (`id`, `migration`, `batch`) VALUES
(210, '2014_10_12_000000_create_tbl_users_table', 1),
(211, '2014_10_12_100000_create_tbl_password_resets_table', 1),
(212, '2019_08_19_000000_create_tbl_failed_jobs_table', 1),
(213, '2020_12_15_071524_create_tbl_gurus_table', 1),
(214, '2020_12_15_071528_create_tbl_siswas_table', 1),
(215, '2020_12_15_071533_create_tbl_pelajarans_table', 1),
(216, '2020_12_15_071548_create_tbl_tugas_table', 1),
(217, '2020_12_15_071559_create_tbl_siswa_tugas_table', 1),
(218, '2020_12_15_071712_create_tbl_kelas_table', 1),
(219, '2020_12_15_071741_create_tbl_siswa_kelas_table', 1),
(220, '2020_12_15_071826_create_tbl_guru_mengajars_table', 1),
(221, '2020_12_15_084838_create_tbl_nilai_tugas', 1),
(222, '2020_12_15_171518_add_role_column_to_users_table', 1),
(223, '2020_12_19_124357_tbl_pengerjaan_tuas', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai_tugas`
--

CREATE TABLE `tbl_nilai_tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengerjaan_tugas` int(11) NOT NULL,
  `nilai` double DEFAULT NULL,
  `keterangan` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_nilai_tugas`
--

INSERT INTO `tbl_nilai_tugas` (`id`, `id_pengerjaan_tugas`, `nilai`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 0, 90, 'lanjutkan lagi', '2020-12-19 08:52:47', '2020-12-19 08:52:47'),
(2, 1, 100, 'mantap', '2020-12-19 08:57:14', '2020-12-19 10:19:43'),
(3, 3, 90, 'tingkatkan bung', '2020-12-20 01:31:28', '2020-12-20 01:31:28'),
(4, 4, 80, 'beneri lagi boy', '2020-12-20 01:44:04', '2020-12-20 01:44:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_password_resets`
--

CREATE TABLE `tbl_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelajarans`
--

CREATE TABLE `tbl_pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pelajaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_pelajarans`
--

INSERT INTO `tbl_pelajarans` (`id`, `nama_pelajaran`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'ips', '', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(2, 'mtk', '', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(3, 'ips', '', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(4, 'geografi', 'georgrai teorical', '2020-12-20 04:53:18', '2020-12-20 04:53:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengerjaan_tugas`
--

CREATE TABLE `tbl_pengerjaan_tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_pelajaran` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_pengerjaan_tugas`
--

INSERT INTO `tbl_pengerjaan_tugas` (`id`, `id_tugas`, `id_pelajaran`, `id_siswa`, `jawaban`, `created_at`, `updated_at`) VALUES
(3, 4, 2, 6, 'jawabannnn', '2020-12-20 01:31:02', '2020-12-20 01:31:02'),
(4, 5, 2, 6, 'Referring to Alexey Mezenin answer:\r\n\r\nWhile using his answer, I had to add something directly to the Request Object and used:\r\n\r\n$request->request->add([\'variable\', \'value\']);\r\nUsing this it adds two variables :\r\n\r\n$request[0] = \'variable\', $request[1] = \'value\'\r\nIf you are a newbie like me and you needed an associate array the correct way to do is\r\n\r\n$request->request->add([\'variable\' => \'value\']);', '2020-12-20 01:42:55', '2020-12-20 01:42:55'),
(5, 1, 1, 6, 'shfskjdhfaksd', '2020-12-20 02:52:12', '2020-12-20 02:52:12'),
(6, 2, 1, 6, 'r will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2020-12-20 02:52:54', '2020-12-20 02:52:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswas`
--

CREATE TABLE `tbl_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` smallint(6) DEFAULT NULL,
  `nama_siswa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` smallint(6) NOT NULL,
  `nomer_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_siswas`
--

INSERT INTO `tbl_siswas` (`id`, `id_user`, `nama_siswa`, `nis`, `gender`, `nomer_hp`, `tgl_lahir`, `tempat_lahir`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 6, 'Siti Hastuti', '3511623009126734', 1, '0559 5800 139', '1972-04-22', 'Medan', 'Jr. Casablanca No. 820', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(2, 7, 'Catur Jumari Maheswara S.E.I', '7271030205940376', 2, '(+62) 591 402', '2007-08-05', 'Palembang', 'Dk. Astana Anyar No. 69', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(3, 8, 'Aisyah Elma Mayasari S.T.', '7304295204992572', 1, '0871 203 939', '1980-11-20', 'Probolinggo', 'Jln. Setiabudhi No. 563', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(4, 9, 'Praba Wahyudin S.Gz', '1207041906924689', 2, '(+62) 467 376', '1974-09-15', 'Sorong', 'Kpg. Casablanca No. 853', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(5, 10, 'Ratna Mayasari', '1117520605166888', 2, '0644 8883 067', '1983-01-09', 'Yogyakarta', 'Dk. Tentara Pelajar No. 775', '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(6, 14, 'Ratna Mayasari', '1117520605166888', 2, '0644 8883 067', '1983-01-09', 'Yogyakarta', 'Dk. Tentara Pelajar No. 775', '2020-12-18 17:00:00', '2020-12-18 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa_kelas`
--

CREATE TABLE `tbl_siswa_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` smallint(6) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_siswa_kelas`
--

INSERT INTO `tbl_siswa_kelas` (`id`, `id_kelas`, `id_siswa`, `created_at`, `updated_at`) VALUES
(1, 3, 4, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(2, 3, 2, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(3, 1, 2, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(4, 2, 1, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(5, 1, 3, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(6, 3, 5, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(7, 2, 4, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(8, 1, 3, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(9, 2, 2, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(10, 1, 5, '2020-12-18 17:00:00', '2020-12-18 17:00:00'),
(11, 1, 6, '2020-12-18 17:00:00', '2020-12-18 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa_tugas`
--

CREATE TABLE `tbl_siswa_tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tugas` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_guru_mengajar` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_siswa_tugas`
--

INSERT INTO `tbl_siswa_tugas` (`id`, `id_tugas`, `id_kelas`, `id_guru_mengajar`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 3, NULL, NULL),
(2, 2, 3, 3, NULL, NULL),
(3, 3, 3, 2, NULL, NULL),
(4, 4, 1, 1, NULL, NULL),
(5, 5, 1, 1, NULL, NULL),
(6, 6, 1, 1, NULL, NULL),
(7, 7, 1, 1, NULL, NULL),
(8, 8, 1, 1, NULL, NULL),
(9, 9, 1, 1, NULL, NULL),
(10, 10, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tugas`
--

CREATE TABLE `tbl_tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tugas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_tugas`
--

INSERT INTO `tbl_tugas` (`id`, `nama_tugas`, `soal`, `created_at`, `updated_at`) VALUES
(1, 'tugas basic pemrograman 255', 'apa yang dimaksud dengan makanan', '2020-12-19 07:49:31', '2020-12-20 04:14:58'),
(2, 'tugas crud 267', 'Why do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2020-12-19 09:23:44', '2020-12-20 04:15:08'),
(3, 'tugas pertama hoho', 'lfjaksjflads', '2020-12-19 10:14:08', '2020-12-19 10:14:08'),
(4, 'tugas pertama boy', 'buat crud sderhana saja', '2020-12-20 00:43:34', '2020-12-20 00:43:34'),
(5, 'tugas kedua', 'apa saja jadi', '2020-12-20 01:32:07', '2020-12-20 01:32:07'),
(6, 'tugas ketiga', 'apa itu loreum ipsum domet?', '2020-12-20 04:10:41', '2020-12-20 04:10:41'),
(7, 'loreum ipsum domet', 'skdjfljsdlfasdf', '2020-12-20 04:11:09', '2020-12-20 04:11:09'),
(8, 'sfjskdjfhsd', 'kdjfhashdfkjasdf', '2020-12-20 04:13:33', '2020-12-20 04:13:33'),
(9, 'mkan malam', 'skdfhasdfksdjfads', '2020-12-20 04:15:32', '2020-12-20 04:15:32'),
(10, 'tugas 3', 'tugas lagi cah', '2020-12-20 04:34:18', '2020-12-20 04:34:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','guru','siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Bridgette Dare', 'abelardo.keeling@prohaska.com', NULL, '$2y$10$7VKjbFmVVN0WsBE13LWrSOzMDkvSElDhBTiOaSV2j5bHJic8/6zIS', NULL, '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'guru'),
(2, 'Mathew O\'Kon', 'will.heather@ward.com', NULL, '$2y$10$NPaeJHbEmqPVfjUIgWyQeu1NWc3BelyNoxJRNI2bjQXR51xgNHrz.', NULL, '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'guru'),
(3, 'Shaina Johnston', 'eric79@crona.com', NULL, '$2y$10$K896QfjvOnWMRUi61q0MD.i8of0d1.6RDh07u0py8MlVsct1Nkt9m', NULL, '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'guru'),
(4, 'Cora Cole', 'carlos03@gmail.com', NULL, '$2y$10$TvEmX/E1T.7ymnJ0doVjNuJU04CdFLQKHSLu2w6SSnujbf9QlPe1G', NULL, '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'guru'),
(5, 'Kyra Dare', 'bode.claudia@romaguera.com', NULL, '$2y$10$NY7r2W1g6mLpGiAS3M8LE.srONJuJl0PWw9PgYLmtC4/O59K.F6Vi', NULL, '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'guru'),
(6, 'Reed Crona', 'turner.hollie@rau.org', NULL, '$2y$10$Yal6VXOtX7AvFHcj1cC9PuB6AmE5GS.9eNz32nsg7.ZAT/l/QuDLC', NULL, '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'guru'),
(7, 'Darrick Volkman II', 'wiegand.nikita@gmail.com', NULL, '$2y$10$zvpSgCvsxXsRYcc0HByi0.TtNcfeYBgxJr9NemCsWoldbUd7Yd0QS', NULL, '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'siswa'),
(8, 'Pansy Toy I', 'iwiza@hotmail.com', NULL, '$2y$10$Y1Rj7aMSaREYIgBXXGwWGO/qrR1ShLcN/Sh5H5ilrtKaDKhQODZF6', NULL, '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'siswa'),
(9, 'Demarco Mills', 'ruby70@hotmail.com', NULL, '$2y$10$mhN1Y66f9fdWQa7TyMxCUu2cQSFc4.cO5OKM5g/60DhCQZxqjcvEe', NULL, '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'siswa'),
(10, 'Turner Schuster', 'arely.maggio@yahoo.com', NULL, '$2y$10$hOODP.M9J36F5J/45VUhRO7MOuvKvefWfHoEVdey5geF2eLjSkIBy', NULL, '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'siswa'),
(11, 'Abigayle Muller DDS', 'margaretta.goyette@heathcote.com', NULL, '$2y$10$a4vgan/.2AWWusHyCC43X.JCJXeTcUMim0pghE96cWCzunl6DNAkC', NULL, '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'siswa'),
(12, 'admin', 'admin@gmail.com', NULL, '$2y$10$XEYMumwB1R5OviJehBOYRewV2kwB2WR/H/h0WHPUm3YCySDDk9j96', 'cHO5Xce6UGJlfSnSugjg6jsvYPOW5euYT1qto88tcojAw9xdyP9ARzWIwoxG', '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'admin'),
(13, 'guru', 'guru@gmail.com', NULL, '$2y$10$y7YDnRIaZLUys/HBk80uOuKCKa7eq5naBpgA1UHUQe5rSus0iFx.O', 'vYctzfqk62a0vC1klmZsw64W8vXJ7tUd5Ee0DbgRJniI2w0gx8De23aIJo7A', '2020-12-18 17:00:00', '2020-12-18 17:00:00', 'guru'),
(14, 'mahmudph', 'mahmud@gmail.com', NULL, '$2y$10$VnnlpS7GRJGZ5jBYU5zKjOxWkB3v8QswZgdmpXmV6/7gwzBKk57C.', NULL, '2020-12-19 10:20:52', '2020-12-19 10:20:52', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_failed_jobs`
--
ALTER TABLE `tbl_failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_gurus`
--
ALTER TABLE `tbl_gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_guru_mengajars`
--
ALTER TABLE `tbl_guru_mengajars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_migrations`
--
ALTER TABLE `tbl_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_nilai_tugas`
--
ALTER TABLE `tbl_nilai_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_password_resets`
--
ALTER TABLE `tbl_password_resets`
  ADD KEY `tbl_password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tbl_pelajarans`
--
ALTER TABLE `tbl_pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengerjaan_tugas`
--
ALTER TABLE `tbl_pengerjaan_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswas`
--
ALTER TABLE `tbl_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswa_kelas`
--
ALTER TABLE `tbl_siswa_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswa_tugas`
--
ALTER TABLE `tbl_siswa_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_failed_jobs`
--
ALTER TABLE `tbl_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_gurus`
--
ALTER TABLE `tbl_gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_guru_mengajars`
--
ALTER TABLE `tbl_guru_mengajars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_migrations`
--
ALTER TABLE `tbl_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai_tugas`
--
ALTER TABLE `tbl_nilai_tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelajarans`
--
ALTER TABLE `tbl_pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengerjaan_tugas`
--
ALTER TABLE `tbl_pengerjaan_tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswas`
--
ALTER TABLE `tbl_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa_kelas`
--
ALTER TABLE `tbl_siswa_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa_tugas`
--
ALTER TABLE `tbl_siswa_tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
