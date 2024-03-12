-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Mar 2024 pada 01.17
-- Versi server: 8.0.30
-- Versi PHP: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yousystem`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kelas`
--

CREATE TABLE `master_kelas` (
  `id_kelas` int UNSIGNED NOT NULL,
  `nama_kelas` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_kelas`
--

INSERT INTO `master_kelas` (`id_kelas`, `nama_kelas`, `angkatan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'ICA22', '2022', 'Informatika A', NULL, NULL),
(2, 'ICB22', '2022', 'Informatika B', NULL, NULL),
(3, 'ICC22', '2022', 'Informatika C', NULL, NULL),
(4, 'ICA23', '2023', 'Informatika A', NULL, NULL),
(5, 'ICB23', '2023', 'Informatika B', NULL, NULL),
(6, 'ICC23', '2023', 'Informatika C', '2024-03-12 00:52:30', '2024-03-12 00:52:30'),
(7, 'ICD23', 'ICD23', 'Informatika D', '2024-03-12 00:55:08', '2024-03-12 00:55:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_matkul`
--

CREATE TABLE `master_matkul` (
  `id_matkul` int UNSIGNED NOT NULL,
  `nama_matakuliah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_matkul`
--

INSERT INTO `master_matkul` (`id_matkul`, `nama_matakuliah`, `created_at`, `updated_at`) VALUES
(1, 'Software Engineering', '2024-03-10 09:22:30', '2024-03-10 09:22:30'),
(2, 'Data Struktur', '2024-03-11 15:29:04', '2024-03-11 15:29:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2024_03_10_014639_create_master_kelas_table', 1),
(15, '2024_03_10_014702_create_master_matkul_table', 1),
(16, '2024_03_10_014734_create_perkuliahan_kelas_table', 1),
(17, '2024_03_10_014748_create_perkuliahan_mahasiswa_table', 2),
(18, '2024_03_10_014810_create_perkulihan_izin_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkuliahan_kelas`
--

CREATE TABLE `perkuliahan_kelas` (
  `id_perkulihan` int UNSIGNED NOT NULL,
  `kelas_id` int NOT NULL,
  `matakuliah_id` int NOT NULL,
  `asprak_id` int NOT NULL,
  `token_perkuliahan` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_perkuliahan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi_perkuliahan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_perkuliahan` datetime NOT NULL,
  `max_keterlambatan` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perkuliahan_kelas`
--

INSERT INTO `perkuliahan_kelas` (`id_perkulihan`, `kelas_id`, `matakuliah_id`, `asprak_id`, `token_perkuliahan`, `keterangan_perkuliahan`, `materi_perkuliahan`, `tgl_perkuliahan`, `max_keterlambatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 147, '9bOi1tVSPNUE', 'Modul 1', 'Dasar dasar Programming MVC', '2024-03-10 20:45:00', '2024-03-10 20:59:00', '2024-03-10 06:46:13', '2024-03-10 06:46:13'),
(2, 3, 1, 147, 'FYGdoP6Jty5X', 'Modul 1', 'Dasar-dasar PHP Programming MVC', '2024-03-11 10:45:00', '2024-03-11 10:50:00', '2024-03-10 08:05:42', '2024-03-10 08:05:42'),
(3, 3, 1, 147, 'UaZDFeinlCSD', 'Pertemuan 2', 'Framework Mobile Flutter', '2024-03-12 09:10:00', '2024-03-12 09:20:00', '2024-03-11 13:18:05', '2024-03-11 13:18:05'),
(4, 5, 2, 148, 'CGJJRCkPMpdE', 'Pertemuan 1', 'Pemrograman Dasar', '2024-03-11 22:29:00', '2024-03-11 22:32:00', '2024-03-11 15:29:56', '2024-03-11 15:29:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkuliahan_mahasiswa`
--

CREATE TABLE `perkuliahan_mahasiswa` (
  `id_perkuliahan_mhs` int UNSIGNED NOT NULL,
  `token_perkuliahan` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahasiswa_id` int NOT NULL,
  `tgl_absensi` datetime NOT NULL,
  `status_lambat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Tepat waktu\r\n1 = telat',
  `status_kehadiran` smallint NOT NULL,
  `latitude` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perkuliahan_mahasiswa`
--

INSERT INTO `perkuliahan_mahasiswa` (`id_perkuliahan_mhs`, `token_perkuliahan`, `mahasiswa_id`, `tgl_absensi`, `status_lambat`, `status_kehadiran`, `latitude`, `longitude`, `lokasi`, `created_at`, `updated_at`) VALUES
(18, 'FYGdoP6Jty5X', 52, '2024-03-11 14:37:52', 'Terlambat 03 jam, 47 menit, 52 detik', 0, '-7.0482795', '113.9393338', 'XW2Q+PCG, Kalianget Timur, Kalianget Tim., Kec. Kalianget, Kabupaten Sumenep, Jawa Timur, Indonesia', '2024-03-11 07:37:52', '2024-03-11 07:37:52'),
(20, 'FYGdoP6Jty5X', 54, '2024-03-11 16:13:04', 'Terlambat 05 jam, 23 menit, 4 detik', 0, '-7.0189929', '113.8623296', 'Jl. Adirasa No.13, Kothe, Kolor, Kec. Kota Sumenep, Kabupaten Sumenep, Jawa Timur 69417, Indonesia', '2024-03-11 09:13:04', '2024-03-11 09:13:04'),
(21, 'FYGdoP6Jty5X', 59, '2024-03-11 16:21:07', 'Terlambat 05 jam, 31 menit, 7 detik', 0, '-7.0189642', '113.8623069', 'Jl. Adirasa No.13, Kothe, Kolor, Kec. Kota Sumenep, Kabupaten Sumenep, Jawa Timur 69417, Indonesia', '2024-03-11 09:21:07', '2024-03-11 09:21:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkulihan_izin`
--

CREATE TABLE `perkulihan_izin` (
  `id_izin` int UNSIGNED NOT NULL,
  `token_perkuliahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mahasiswa_id` int NOT NULL,
  `keterangan_izin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_izin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_izin` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim_mahasiswa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` int NOT NULL,
  `tgl_lahir` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hint` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int NOT NULL COMMENT '1 = user\r\n0 = admin',
  `status_akun` int NOT NULL,
  `asprak` tinyint NOT NULL DEFAULT '0' COMMENT '0:mahasiswa\r\n1:asprak\r\n2:asprak&admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `nim_mahasiswa`, `kelas_id`, `tgl_lahir`, `email`, `password`, `hint`, `remember_token`, `role`, `status_akun`, `asprak`, `created_at`, `updated_at`) VALUES
(49, 'Muslimatul Mabrura', '2002310030', 3, '', '', '$2y$12$Hj.1J0tBMsnO6sYeAr3Tze0rjyMv4Gg61ptrGxBWqPHtsC04z5.NO', '2002310030', NULL, 1, 1, 0, '2024-03-10 05:18:28', '2024-03-10 05:18:28'),
(50, 'JEKI SERYODI', '2202310002', 3, '', '', '$2y$12$.7lmnNwygavB0kmyA.IJoeUHX/KjyJe7Ju3.bf8OtMp51lsY19LvC', '2202310002', NULL, 1, 1, 0, '2024-03-10 05:18:28', '2024-03-10 05:18:28'),
(51, 'MOHAMMAD FARHAN HADIDI', '2202310009', 3, '', '', '$2y$12$MM/h03Skif/AwMqBgPId4OQSlvwSZS1yhVJioXuXxyf2OIg7HOy9C', '2202310009', NULL, 1, 1, 0, '2024-03-10 05:18:29', '2024-03-10 05:18:29'),
(52, 'RIONALDI SAPUTRA', '2202310046', 3, '', '', '$2y$12$5rcxly9XWTT4nZU0.w0vwOEYuK9G0SRqHeO1KSijeVoGK1c249y3i', '2202310046', NULL, 1, 1, 0, '2024-03-10 05:18:30', '2024-03-11 13:06:16'),
(53, 'ANANDA MAULANA WAHYUDI', '2202310054', 3, '', '', '$2y$12$zKKSVWL/2pAfKRzImNRyauWFHyFrnYqa8llSJsgXm2zYV9kt4xyFi', '2202310054', NULL, 1, 1, 0, '2024-03-10 05:18:30', '2024-03-10 05:18:30'),
(54, 'ABD. RAHMAN SIDDIK', '2202310068', 3, '', '', '$2y$12$bBS0p70jbzh9pv0r10tJquBwa0CywQRLcAr3j0vzp0zkYZGraFnNe', '2202310068', NULL, 1, 1, 0, '2024-03-10 05:18:31', '2024-03-10 05:18:31'),
(55, 'AGUS WEDI', '2202310072', 3, '', '', '$2y$12$95RhOC8LGyhb27pI1DfuC.WHd7o/FzcflR/wzZA2Ho.yL5L3YqfGm', '2202310072', NULL, 1, 1, 0, '2024-03-10 05:18:31', '2024-03-10 05:18:31'),
(56, 'ARIFAH', '2202310073', 3, '', '', '$2y$12$XKWsreEmHS6zq.lq0C3xWuSw6hyEzwphS/Ub9AVCsTlzBjuRymB4W', '2202310073', NULL, 1, 1, 0, '2024-03-10 05:18:32', '2024-03-10 05:18:32'),
(57, 'ATIQATUL LISTIYANA', '2202310074', 3, '', '', '$2y$12$5QidqJoweI9D3PbJkU2zwecrhy4Qudg85QHIVQx/207cxK7M//kQS', '2202310074', NULL, 1, 1, 0, '2024-03-10 05:18:33', '2024-03-10 05:18:33'),
(58, 'MASYITHAH DWI RATNADI', '2202310075', 3, '', '', '$2y$12$EIEKqb4auZum19Hy2ubcneM4TK2WajkZASKLlCXFUOnuYOyTymC9G', '2202310075', NULL, 1, 1, 0, '2024-03-10 05:18:33', '2024-03-10 05:18:33'),
(59, 'AINUL YAQIN', '2202310076', 3, '', '', '$2y$12$nGKPIsC8AkHZFxZhIj.vcefGMITHyulJIbeEY0mPLTQo0X1uzA7rG', '2202310076', NULL, 1, 1, 0, '2024-03-10 05:18:34', '2024-03-10 05:18:34'),
(60, 'ACH.ROFI\'I', '2202310077', 3, '', '', '$2y$12$EWRNCbV1s9b9.o5Awuq8neNi5XWHnv7T..UsiUjGsdcAM.N8svNL2', '2202310077', NULL, 1, 1, 0, '2024-03-10 05:18:34', '2024-03-11 13:08:19'),
(61, 'YOGA PRASTIYO', '2202310078', 3, '', '', '$2y$12$eiKh2FZc99omOEgPvcPaQe/6Ont7V9xmHnuqqw6Nk4ttWBpW01ntS', '2202310078', NULL, 1, 1, 0, '2024-03-10 05:18:35', '2024-03-10 05:18:35'),
(62, 'GILANG RAMADHAN', '2202310080', 3, '', '', '$2y$12$q.MKCdn95iCyPukuCgbybu6RtCHyBjYXIRV0rkEA/4EaQ2y3t/11K', '2202310080', NULL, 1, 1, 0, '2024-03-10 05:18:36', '2024-03-10 05:18:36'),
(63, 'ZAINUL AHBAB', '2202310081', 3, '', '', '$2y$12$SuqxnAKt3n7HQslXr0GeTuQzRlCDxTMZbBgSHNFjFBiCw1TNfPeGm', '2202310081', NULL, 1, 1, 0, '2024-03-10 05:18:36', '2024-03-10 05:18:36'),
(64, 'AHMAD ARYADI', '2202310084', 3, '', '', '$2y$12$54EC8mXqpufqdym4p9mlAOeDEsUsym6am.LmMM/QMhyjehsP7CHuG', '2202310084', NULL, 1, 1, 0, '2024-03-10 05:18:37', '2024-03-10 05:18:37'),
(65, 'MOH.KHAIRUL ANAS', '2202310085', 3, '', '', '$2y$12$wn7DJXvbGQXSih5NO79p0OQVWo7PUuLWtuWxSaWE5KWbHUzPY8cF6', '2202310085', NULL, 1, 1, 0, '2024-03-10 05:18:37', '2024-03-10 05:18:37'),
(66, 'IFADATUR RAHMAH', '2202310087', 3, '', '', '$2y$12$dsDKK9D8kTdnWK7KqVqiEOktABWG8tHAQnyVEIIz.P8pOh6UEjbWe', '2202310087', NULL, 1, 1, 0, '2024-03-10 05:18:38', '2024-03-10 05:18:38'),
(67, 'NURUL HASANAH', '2202310088', 3, '', '', '$2y$12$RcjO6T79DZAtI.aoGyQV6uG1i2iIxCSxWh9JilDMHMLqjiwmCGjfG', '2202310088', NULL, 1, 1, 0, '2024-03-10 05:18:39', '2024-03-10 05:18:39'),
(68, 'DINI ARISKA', '2202310090', 3, '', '', '$2y$12$uHfusu3eTsw1NUp4.zqhNeHQ60rm/6huXzblbbapwGHygg5mDpeo.', '2202310090', NULL, 1, 1, 0, '2024-03-10 05:18:39', '2024-03-10 05:18:39'),
(69, 'RICKY RADIANSYAH PUTRA', '2202310091', 3, '', '', '$2y$12$.E6yDclY/jOlOewBaWpZy.RacGSGvPMZf9Pjub43mPD2FSPXLDLE2', '2202310091', NULL, 1, 1, 0, '2024-03-10 05:18:40', '2024-03-10 05:18:40'),
(70, 'ADI PRAMISTA ISLAMI', '2202310093', 3, '', '', '$2y$12$z7RIYsgJcAlNqYelHfGphuzKgOchUZUISc3VZjp5uOewV/CR3V18i', '2202310093', NULL, 1, 1, 0, '2024-03-10 05:18:40', '2024-03-10 05:18:40'),
(71, 'BAGUS DANU RAHARJO', '2202310094', 3, '', '', '$2y$12$/z0QOWJJZAxkxVU72R777.onRFSaLK1rxeayLwVaI7dMLWYmIMwQe', '2202310094', NULL, 1, 1, 0, '2024-03-10 05:18:41', '2024-03-10 05:18:41'),
(72, 'M. FIRDAUSI', '2202310096', 3, '', '', '$2y$12$aRd5K0tTqUHB6gOTdDIJG.5.iwrUT91eQo7TyI5n0XRWYqRisUX1e', '2202310096', NULL, 1, 1, 0, '2024-03-10 05:18:42', '2024-03-10 05:18:42'),
(73, 'ACH. KURNIAWAN IKBAL', '2202310097', 3, '', '', '$2y$12$IaVPlhnD6qLawYkW8uQBEeFH0bG.vBjzmY9syWzUoNv3EgnH/mn2u', '2202310097', NULL, 1, 1, 0, '2024-03-10 05:18:42', '2024-03-10 05:18:42'),
(74, 'RAFI NUR MAULANA', '2202310098', 3, '', '', '$2y$12$KtEeCzkH5IMyXa20EgGViefK0Gf6rFl12MaxYobfbWn14UHo9GQfe', '2202310098', NULL, 1, 1, 0, '2024-03-10 05:18:43', '2024-03-10 05:18:43'),
(75, 'HARDARIANSYAH SYAIFUL RIJAL', '2202310099', 3, '', '', '$2y$12$4CVdV4WbUj9DNpXC.Gsw4.GLtuHQT5JYh0n/85sJiz5TokytOpmD6', '2202310099', NULL, 1, 1, 0, '2024-03-10 05:18:44', '2024-03-10 05:18:44'),
(76, 'WIDYA KHAIRUL UMMAH', '2202310100', 3, '', '', '$2y$12$AzfW1WdjogOHigUbWLV4vOIKYkio/sFDqFW32zZdZWvR55slX/2V.', '2202310100', NULL, 1, 1, 0, '2024-03-10 05:18:44', '2024-03-10 05:18:44'),
(77, 'DANIL HASBI WICAKSONO', '2202310101', 3, '', '', '$2y$12$YfwYIZyDzTfGiecHxGimYOS18Ht2qkepZb6lj7WhejeAtU6dJPy9C', '2202310101', NULL, 1, 1, 0, '2024-03-10 05:18:45', '2024-03-10 05:18:45'),
(78, 'LELI ERIYANI HASANAH', '2202310110', 3, '', '', '$2y$12$E1YaRR6RZhLpmzwceX.7D.iCyUCN8bw9WbRaTPXbQx7Xig5NEeRq.', '2202310110', NULL, 1, 1, 0, '2024-03-10 05:18:45', '2024-03-10 05:18:45'),
(79, 'ABDUR RAHMAN WAHID', '2202310112', 3, '', '', '$2y$12$J1WH4lNVhWXnfFQ7fcFrnuTEazx7h6twKTiHVwnD9m3flJ37afWyq', '2202310112', NULL, 1, 1, 0, '2024-03-10 05:18:46', '2024-03-10 05:18:46'),
(80, 'SUBAIDI', '2202310113', 3, '', '', '$2y$12$MHVQu4N9YsRfCb8kcchtMemnPqwQ5V.5RQx3z94e0OAFPptkQCjca', '2202310113', NULL, 1, 1, 0, '2024-03-10 05:18:46', '2024-03-10 05:18:46'),
(81, 'MOHAMMAD SEPTIABUDI WICAKSONO', '2202310114', 3, '', '', '$2y$12$JxfUoXkZ9Buuk5RODhKt.OKoOM73i54Oobg4V8y.RO/px3e3uSOBu', '2202310114', NULL, 1, 1, 0, '2024-03-10 05:18:47', '2024-03-10 05:18:47'),
(82, 'RAHMAT SYAFRI KURNIAMAN', '2202310115', 3, '', '', '$2y$12$.jvxLj5sj9EbSHdMUFPsVeRp5rDp3q/PuuGRvXXoo4duHJdG5PFBS', '2202310115', NULL, 1, 1, 0, '2024-03-10 05:18:47', '2024-03-10 05:18:47'),
(83, 'FEBRIYANSYAH', '2202310001', 1, '', '', '$2y$12$rYhDgoD52/7XCCC/88evie00tu4oQ1K0YUNjkimr28I8B09FLtnXW', '2202310001', NULL, 1, 1, 0, '2024-03-10 05:25:19', '2024-03-10 05:25:19'),
(84, 'MUHAMMAD YUSRI TSANI', '2202310003', 1, '', '', '$2y$12$mM/BzxsdNETAxv1EMw.CI.Zf90wqF9WH2QvAixWRvOLnWQynIOEK6', '2202310003', NULL, 1, 1, 0, '2024-03-10 05:25:20', '2024-03-10 05:25:20'),
(85, 'MOH. SIGIT TRI DARMAWAN', '2202310004', 1, '', '', '$2y$12$vT8eRazi6c5rQpF1qzoen.WU/Duw9SsHSn4UIjUhwOHAPK36Itytm', '2202310004', NULL, 1, 1, 0, '2024-03-10 05:25:21', '2024-03-10 05:25:21'),
(86, 'BAGAS VIRGIAWAN PRIANDANA', '2202310005', 1, '', '', '$2y$12$MdrfqI9U9pmnaFHaJ2n1J.9bCJ/WOG2/jdJOoS62.bezGHovRJCaK', '2202310005', NULL, 1, 1, 0, '2024-03-10 05:25:21', '2024-03-10 05:25:21'),
(87, 'NUR WAHI DINI', '2202310007', 1, '', '', '$2y$12$2T7JCRc22IX.zYFR9S8Zc.8j8SEkigaBKg/nvPPxMZovwrlALxZu.', '2202310007', NULL, 1, 1, 0, '2024-03-10 05:25:22', '2024-03-10 05:25:22'),
(88, 'MUSTAMIK', '2202310008', 1, '', '', '$2y$12$Tlp3UlgqdmDrnRKJPhVtSulm.PJ90pb2Ra3SYJhH1uSViAhIEJYmO', '2202310008', NULL, 1, 1, 0, '2024-03-10 05:25:23', '2024-03-10 05:25:23'),
(89, 'AHMAD CHOLILILLAH', '2202310010', 1, '', '', '$2y$12$drsjMPksxRjTFkJ2GY.jAerwrYWojrgqMdPSg7kPOMjfN/0sImfp6', '2202310010', NULL, 1, 1, 0, '2024-03-10 05:25:23', '2024-03-10 05:25:23'),
(90, 'TAUFIKUR RAHMADI', '2202310011', 1, '', '', '$2y$12$pLTxbur7GmpcE5VdcWI4cevD/kR9ggUBncdiiTs9SM1Y5yzNyTGPa', '2202310011', NULL, 1, 1, 0, '2024-03-10 05:25:24', '2024-03-10 05:25:24'),
(91, 'MUHAMMAD AFIF', '2202310012', 1, '', '', '$2y$12$9mCvfNI.YRVSUNldozRYHebJlDciUrlkilDeNLReITVifqTkanApS', '2202310012', NULL, 1, 1, 0, '2024-03-10 05:25:24', '2024-03-10 05:25:24'),
(92, 'NURIANDRA ARDIANSYAH', '2202310013', 1, '', '', '$2y$12$CqmIaxux7v0yIRAw8K3cKe25M6fyBS8MliuwcNVM6qVHmBsNeQfca', '2202310013', NULL, 1, 1, 0, '2024-03-10 05:25:25', '2024-03-10 05:25:25'),
(93, 'ALI ROMDHON MUAYYAT BILLAH', '2202310014', 1, '', '', '$2y$12$fbge9vdKlFdtbB7rrfRq4.zYXfASV2se/3L2FnzGLstr9NBmFv1uu', '2202310014', NULL, 1, 1, 0, '2024-03-10 05:25:26', '2024-03-10 05:25:26'),
(94, 'MOCHAMAD YUSUF EFFENDI', '2202310015', 1, '', '', '$2y$12$Ua.LUFvwXCHe/O7pFv/yUe3b.zc4q1ef2hXWM8BuYzRY6of2n3Lxm', '2202310015', NULL, 1, 1, 0, '2024-03-10 05:25:26', '2024-03-10 05:25:26'),
(95, 'ZAINUR RIDHA', '2202310016', 1, '', '', '$2y$12$qEOIgBX8q4ahQE8UK7pI5Ou6Jwz2o92y1eHPomF/5Gskc7W0rPycK', '2202310016', NULL, 1, 1, 0, '2024-03-10 05:25:27', '2024-03-10 05:25:27'),
(96, 'MAYATUN', '2202310017', 1, '', '', '$2y$12$z2Rs7QvilC24tdRsExfeW.gYMhURLaunzrfbVdCSQhg05oH4IzaYa', '2202310017', NULL, 1, 1, 0, '2024-03-10 05:25:28', '2024-03-10 05:25:28'),
(97, 'RICO GRANANTHA SAPUTRA', '2202310018', 1, '', '', '$2y$12$J03mEY3UJx9ZEXWWVlwV8ugSDITxOK8RarsrUXKdovNnfeOV2nJGi', '2202310018', NULL, 1, 1, 0, '2024-03-10 05:25:28', '2024-03-10 05:25:28'),
(98, 'SUPRIYADI', '2202310020', 1, '', '', '$2y$12$2x8Bz4cN7EFZFraupEVrhO67vKvOx6IHEAmV1XEt884ucXkontR8C', '2202310020', NULL, 1, 1, 0, '2024-03-10 05:25:29', '2024-03-10 05:25:29'),
(99, 'ANDI SUSANTO', '2202310021', 1, '', '', '$2y$12$sWDYfWUhl423cON1p4OoI.0bh9z9soPGIHx.vDw6kIFJXl/HYiWxe', '2202310021', NULL, 1, 1, 0, '2024-03-10 05:25:29', '2024-03-10 05:25:29'),
(100, 'FAIZAL JAZALI', '2202310022', 1, '', '', '$2y$12$zi8e07iwyYdzyoWETVAIfuKCIRHnbzqPNQmg5d6UA/0KpMi/ZpcBW', '2202310022', NULL, 1, 1, 0, '2024-03-10 05:25:30', '2024-03-10 05:25:30'),
(101, 'REVLIN ELVIANA SARI', '2202310024', 1, '', '', '$2y$12$IH0.cX2C0brQiY7/Cecf0eflZtZ83SHvVSmL0D./XURiMDWizYpqi', '2202310024', NULL, 1, 1, 0, '2024-03-10 05:25:31', '2024-03-10 05:25:31'),
(102, 'YULIA INTAN PANDINI', '2202310025', 1, '', '', '$2y$12$58XhdekBwfAMgMGoXB.9m.jqXh5pVTOV3DMgTJrMrSXO0eJRwkgGy', '2202310025', NULL, 1, 1, 0, '2024-03-10 05:25:31', '2024-03-10 05:25:31'),
(103, 'AIMAN GUNA SASMITA', '2202310027', 1, '', '', '$2y$12$4Dgl82tDHMZMeqTjaxyWeeiM24vUAwjuMQk3JpAhf6ism5r6TKFly', '2202310027', NULL, 1, 1, 0, '2024-03-10 05:25:32', '2024-03-10 05:25:32'),
(104, 'BISYIR EL HAFI', '2202310028', 1, '', '', '$2y$12$G0li0F.VujlM1RQ..jNtyOy3aOB4k0anFQds5J1v5XQDKZmv99pzW', '2202310028', NULL, 1, 1, 0, '2024-03-10 05:25:32', '2024-03-10 05:25:32'),
(105, 'DIYO MIFTAHUL ANAM', '2202310029', 1, '', '', '$2y$12$f7F9LdrGzfmZGP7fyvbvVOYZs6uZqbEIJw2Bez2eVcAgI8tkcNcsy', '2202310029', NULL, 1, 1, 0, '2024-03-10 05:25:33', '2024-03-10 05:25:33'),
(106, 'SYAIFUR RAHMAN', '2202310030', 1, '', '', '$2y$12$Hmk0xNLLks.xkdi0hk0BCulqj0i9opu1aaLM3leqGDdqdvrh6407e', '2202310030', NULL, 1, 1, 0, '2024-03-10 05:25:34', '2024-03-10 05:25:34'),
(107, 'ASYROFIL \'ULA', '2202310031', 1, '', '', '$2y$12$piKYR8PEnEtOxixd7pYa6uAU6nvJkrbPL7uLXtjlgXoJUt/w5Iak2', '2202310031', NULL, 1, 1, 0, '2024-03-10 05:25:34', '2024-03-10 05:25:34'),
(108, 'IMAM ZARKASYI', '2202310032', 1, '', '', '$2y$12$iKmMJIRZ8FVYKOiAvC/X/eTP/b3cT4sZoHwCN/DS5BEGII7xc6c12', '2202310032', NULL, 1, 1, 0, '2024-03-10 05:25:35', '2024-03-10 05:25:35'),
(109, 'FARDIAN DANIEL FIRDAUS', '2202310033', 1, '', '', '$2y$12$zUBFJ6q23np0suBgp8rSR.9LBkDOFc5o9jXIOO8AkG2BQBJMV579e', '2202310033', NULL, 1, 1, 0, '2024-03-10 05:25:35', '2024-03-10 05:25:35'),
(110, 'SITI NORHALIZA', '2202310034', 1, '', '', '$2y$12$pkKWUyvvwP2lDHXqEYPDJeLFrj/G28Ed/SCm3./ISBjCFMqlHBi12', '2202310034', NULL, 1, 1, 0, '2024-03-10 05:25:36', '2024-03-10 05:25:36'),
(111, 'ACHMAD HAIRUL MUHLIS', '2202310035', 1, '', '', '$2y$12$9xOpwE4RzrhcZ63ixeiyeezjY5batNPC/DPIEyVwUO07J6Q8IAKuK', '2202310035', NULL, 1, 1, 0, '2024-03-10 05:25:37', '2024-03-10 05:25:37'),
(112, 'NURUL', '2202310057', 1, '', '', '$2y$12$JmiPUteYEkI7mA7JQVj4P.X0L88qiAm87rco50b7ZjZyYCFrQLBNm', '2202310057', NULL, 1, 1, 0, '2024-03-10 05:25:37', '2024-03-10 05:25:37'),
(113, 'A. MUTAWAQQIL ALALLAH', '2202310070', 1, '', '', '$2y$12$dlvY/Mi3jnxEehit.vefKeP14EyqdXMl.9C1Wmrw/qauNyxNqLhBa', '2202310070', NULL, 1, 1, 0, '2024-03-10 05:25:38', '2024-03-10 05:25:38'),
(114, 'AHMAD ADI YOGA', '2302320281', 1, '', '', '$2y$12$TS7qkEmrraMuq6sSRIShkuMlZYgNl/avVP6ouLeHgR4XoIIiDNorm', '2302320281', NULL, 1, 1, 0, '2024-03-10 05:25:38', '2024-03-10 05:25:38'),
(115, 'Ahmad Ansori Fawaid', '1902310002', 2, '', '', '$2y$12$.iJUr5Fzwz.QLLqqmMhoiuOTaD556C4C4GLZdCE/HvI7SWlxfd3bq', '1902310002', NULL, 1, 1, 0, '2024-03-10 05:28:40', '2024-03-10 05:28:40'),
(116, 'Naylah Sakinah', '2002310031', 2, '', '', '$2y$12$XTNIzQX5Y87ZD5SA7Q7HAe1ZKRViOslBEI6reA59dFGLgUDn7edvq', '2002310031', NULL, 1, 1, 0, '2024-03-10 05:28:41', '2024-03-10 05:28:41'),
(117, 'HALIMATUS ZAHRA', '2202310023', 2, '', '', '$2y$12$Yco6zinUQdbSNMImbETMK.PqtxoJ3dqWsOkCpCocxUNt7BxaE7fnq', '2202310023', NULL, 1, 1, 0, '2024-03-10 05:28:41', '2024-03-10 05:28:41'),
(118, 'AHMAD IKLIL ZABADY', '2202310036', 2, '', '', '$2y$12$tgusee2rkuZovpUqA0ze3egrL3ooflyCmjl2a6zMs2BOskxJ3AdAy', '2202310036', NULL, 1, 1, 0, '2024-03-10 05:28:42', '2024-03-10 05:28:42'),
(119, 'BERRY DWI NURISLAM', '2202310037', 2, '', '', '$2y$12$1Ffa5RQcqRK1oy5w7F3/Auuf7Axn.RFAyjGDYN0puwAEZQhayPPqu', '2202310037', NULL, 1, 1, 0, '2024-03-10 05:28:43', '2024-03-10 05:28:43'),
(120, 'RAUDATUL AINIYAH', '2202310039', 2, '', '', '$2y$12$sD5FEQ/Vxt.lP5i.BJLUze1aa2X0dwW6X2ZBwFdGUplqU/V9pm0oe', '2202310039', NULL, 1, 1, 0, '2024-03-10 05:28:43', '2024-03-10 05:28:43'),
(121, 'ARDY SETIAWAN', '2202310040', 2, '', '', '$2y$12$PKsvlmKvfXhAfgkVT3I5JOiP9sE1cy3JdGmDTjuaWXo2gSNmrrmZ6', '2202310040', NULL, 1, 1, 0, '2024-03-10 05:28:44', '2024-03-10 05:28:44'),
(122, 'DIANIS RAMADHANI', '2202310041', 2, '', '', '$2y$12$EJ0FLjgV/1DNS4DvcQZy7uSetNmmlblBip9UyQGwSQISwqB.ntP8K', '2202310041', NULL, 1, 1, 0, '2024-03-10 05:28:44', '2024-03-10 05:28:44'),
(123, 'MUHAMMAD ALIFFIKRIANTO', '2202310042', 2, '', '', '$2y$12$bjWk.5kni8itOtloV4VOfO2eJDjJ4ClvC7m9taliRYgJkGBBh3tpO', '2202310042', NULL, 1, 1, 0, '2024-03-10 05:28:45', '2024-03-10 05:28:45'),
(124, 'RESYAFIL KAHFI', '2202310043', 2, '', '', '$2y$12$2yQ6XAIJYaTJGirAKImJ.uU6oEmjHK8Ag1APfwajrcK61JrcaOso2', '2202310043', NULL, 1, 1, 0, '2024-03-10 05:28:46', '2024-03-10 05:28:46'),
(125, 'MOH NAUFAL AZIZ', '2202310044', 2, '', '', '$2y$12$2BUs1kcLVD/Nkoq4RluWSOnYBrViaJ5D.5IjQolwjEx4gVZeiE9mO', '2202310044', NULL, 1, 1, 0, '2024-03-10 05:28:46', '2024-03-10 05:28:46'),
(126, 'A. SHOHIBUL ARDLI KHOTIM', '2202310047', 2, '', '', '$2y$12$vwEayb6q.NY5kOxi9VLOr.bu5j6FEakyKKGHKrBkSHcMTrH2F6BCa', '2202310047', NULL, 1, 1, 0, '2024-03-10 05:28:47', '2024-03-10 05:28:47'),
(127, 'MUHAMMAD HAMZAH FIRDAUS', '2202310048', 2, '', '', '$2y$12$pyZMocvptkyu.wlHqfbO6OP/8Sdn5CMXIt/a1wKBRsghVuEqXPI4y', '2202310048', NULL, 1, 1, 0, '2024-03-10 05:28:47', '2024-03-10 05:28:47'),
(128, 'DENI IFANDI', '2202310049', 2, '', '', '$2y$12$ZViyIBG4lRpzD1/dntDakehOsRhMjk7AOnd1FBeBvXlRTlarY.5N6', '2202310049', NULL, 1, 1, 0, '2024-03-10 05:28:48', '2024-03-10 05:28:48'),
(129, 'SITI ANISA', '2202310050', 2, '', '', '$2y$12$J.ZYOk2V3yim05HqCvWgmOgIiRhG7BVvCAFG4N0bxs4uk2BJz7tea', '2202310050', NULL, 1, 1, 0, '2024-03-10 05:28:48', '2024-03-10 05:28:48'),
(130, 'ARIS MUZAKKAR BAUZIR', '2202310051', 2, '', '', '$2y$12$NSNk7Wwb63JEOUNP4ZhVzOZhVOI1C/OQY.Lrm4sq24HdLWMS.qs5m', '2202310051', NULL, 1, 1, 0, '2024-03-10 05:28:49', '2024-03-10 05:28:49'),
(131, 'ARIF AFRIANSYAH AN', '2202310052', 2, '', '', '$2y$12$Krqt31pwdCLXd9YPu8cU1..0yQMbZ7A8Rem6VX9Za5KrUA9gxVwa2', '2202310052', NULL, 1, 1, 0, '2024-03-10 05:28:49', '2024-03-10 05:28:49'),
(132, 'ROBY TRI SULAIMAN N.R', '2202310055', 2, '', '', '$2y$12$/mPsUDlMadZ7OWneCAwC8.vPHhB8WEsk/DoyC3Cb0cZi9qzXdFlDm', '2202310055', NULL, 1, 1, 0, '2024-03-10 05:28:50', '2024-03-10 05:28:50'),
(133, 'VIJAY UBAIDILLAH', '2202310056', 2, '', '', '$2y$12$baoannEBpjn4jT94jl/dLeQN4MuwtZGXhtTRRA/QobzjLXEjNLc6W', '2202310056', NULL, 1, 1, 0, '2024-03-10 05:28:51', '2024-03-10 05:28:51'),
(134, 'RIZAL ALI BABA', '2202310058', 2, '', '', '$2y$12$ptEzj0XYRqgzw6tTQOCNBuxggv9EmNBmJYUq5mO0o4EhUjYaD12ee', '2202310058', NULL, 1, 1, 0, '2024-03-10 05:28:51', '2024-03-10 05:28:51'),
(135, 'MOH. FADIL', '2202310059', 2, '', '', '$2y$12$GI/l/FjMhy9jVEXOJ1B1i.sAl3WFlmg4JxUOANcfxMOdnVbaDbMzi', '2202310059', NULL, 1, 1, 0, '2024-03-10 05:28:52', '2024-03-10 05:28:52'),
(136, 'RAFY PRATAMA HORRY S.', '2202310061', 2, '', '', '$2y$12$aonC1gpnQYphCQ0lJOA30OP.RfXPEXelt97gjEfEx1rguICUZMIJW', '2202310061', NULL, 1, 1, 0, '2024-03-10 05:28:53', '2024-03-10 05:28:53'),
(137, 'IKA NURJANNAH', '2202310062', 2, '', '', '$2y$12$7G8hFv/vjWmlFIkmEIDXgOo0UVgVKlT4p5eitxrSr9FnvH4hCJ8iG', '2202310062', NULL, 1, 1, 0, '2024-03-10 05:28:53', '2024-03-10 05:28:53'),
(138, 'FIRMAN NURULLAH', '2202310063', 2, '', '', '$2y$12$2hi6Ycme9soSRxM5ho1coeg6MD04KHcITIiEgJZegqHZ7AEx0dD9G', '2202310063', NULL, 1, 1, 0, '2024-03-10 05:28:54', '2024-03-10 05:28:54'),
(139, 'BARIQ AVRIEL SEAUQIAH', '2202310064', 2, '', '', '$2y$12$7k2Iwvzv4Oij3rHoCGJ2mO3x6Q64JFnzdAPAznc8Ph6j9KV9e4cJ2', '2202310064', NULL, 1, 1, 0, '2024-03-10 05:28:54', '2024-03-10 05:28:54'),
(140, 'ARIFATUN NAILI AFRILIA', '2202310065', 2, '', '', '$2y$12$oq0lAIWLS0aVE6ek9NPXaOl4Jq33wSP7xASkrY1K7mYhutfERQ65S', '2202310065', NULL, 1, 1, 0, '2024-03-10 05:28:55', '2024-03-10 05:28:55'),
(141, 'MOH. KAMIL IBNU SYARIF', '2202310066', 2, '', '', '$2y$12$J504O/1FCMeLn5pAPe7YRe4iS/oHQ5mJoJAxiTZIkZbZAYqUnVQC6', '2202310066', NULL, 1, 1, 0, '2024-03-10 05:28:56', '2024-03-10 05:28:56'),
(142, 'ATHIRAH JAMILAH ANNISAK', '2202310067', 2, '', '', '$2y$12$oOKNtG32tnjGUNp8u5vqA.4iIO8U2WSgeJzpF17shsDZZh/Qs5Avy', '2202310067', NULL, 1, 1, 0, '2024-03-10 05:28:56', '2024-03-10 05:28:56'),
(143, 'MOH. FARISQI', '2202310069', 2, '', '', '$2y$12$bVRitXgEc4GtIp6dyWcEOOtg.07tS105n0K7hUNYylF.9LvP2AlxK', '2202310069', NULL, 1, 1, 0, '2024-03-10 05:28:57', '2024-03-10 05:28:57'),
(144, 'SITI AISYAH NUR JANNAH', '2202310116', 2, '', '', '$2y$12$B3XjrDE/FDsSIFMvKRVw..cs84tKRKEiTNJLNuknyXyOTyl7Ioa/.', '2202310116', NULL, 1, 1, 0, '2024-03-10 05:28:57', '2024-03-10 05:28:57'),
(145, 'HUMAYDI', '2202310117', 2, '', '', '$2y$12$MD2rDZ6GE07GdLZrWHDk2uqkxnyxbB.va73Ms2JLI08qB8U65xy7q', '2202310117', NULL, 1, 1, 0, '2024-03-10 05:28:58', '2024-03-10 05:28:58'),
(147, 'YOSI BAGUS SADAR RASULI', 'admin', 3, '2000-04-22', 'yosibagus@unibamadura.ac.id', '$2y$12$SjLmMzi/ppSGMwtyHYrsduPEEJ3AQ4QN1VOstf.ruhyEyHY0wWsNC', 'admin123', NULL, 0, 1, 2, NULL, '2024-03-11 13:09:57'),
(148, 'RIONALDI SAPUTRA', '12202310046', 3, '', '', '$2y$12$jY2HO7rK4tV44BYTv3cOzOTivzF9YyWIaF1sck6gZYnEbMwzm/WU.', 'asprak123', NULL, 0, 1, 1, '2024-03-11 15:07:46', '2024-03-11 15:07:46'),
(149, 'ACH.ROFI\'I', '12202310077', 3, '', '', '$2y$12$VFPkl6mxapRY6bM8KHICIOBKGyM9cHgAjWho0KtJrDnbMBrdsECU2', 'asprak123', NULL, 0, 1, 1, '2024-03-11 15:08:01', '2024-03-11 15:08:01'),
(150, 'ANANDA MAULANA WAHYUDI', '12202310054', 3, '', '', '$2y$12$G3mOCks.HR9KlrMVkWq/peix14zQlNLxMoL62BMnNgySNlmj5qnPa', 'asprak123', NULL, 0, 1, 1, '2024-03-11 15:08:27', '2024-03-11 15:08:27');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `master_kelas`
--
ALTER TABLE `master_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `master_matkul`
--
ALTER TABLE `master_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `perkuliahan_kelas`
--
ALTER TABLE `perkuliahan_kelas`
  ADD PRIMARY KEY (`id_perkulihan`);

--
-- Indeks untuk tabel `perkuliahan_mahasiswa`
--
ALTER TABLE `perkuliahan_mahasiswa`
  ADD PRIMARY KEY (`id_perkuliahan_mhs`);

--
-- Indeks untuk tabel `perkulihan_izin`
--
ALTER TABLE `perkulihan_izin`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_kelas`
--
ALTER TABLE `master_kelas`
  MODIFY `id_kelas` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `master_matkul`
--
ALTER TABLE `master_matkul`
  MODIFY `id_matkul` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `perkuliahan_kelas`
--
ALTER TABLE `perkuliahan_kelas`
  MODIFY `id_perkulihan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `perkuliahan_mahasiswa`
--
ALTER TABLE `perkuliahan_mahasiswa`
  MODIFY `id_perkuliahan_mhs` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `perkulihan_izin`
--
ALTER TABLE `perkulihan_izin`
  MODIFY `id_izin` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
