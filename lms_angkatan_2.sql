-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2025 pada 10.14
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
-- Database: `lms_angkatan_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `education` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `gender`, `education`, `phone`, `email`, `password`, `address`, `created_at`, `update_at`, `deleted_at`) VALUES
(2, 'Aryo Pramudityas', 1, 'S1', '0938908123', 'aryo@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Jakarta', '2025-06-04 03:57:30', '2025-06-05 08:02:20', 0),
(3, 'Mas Ruben', 1, 'S1', '0908701231', 'ruben@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Jakarta', '2025-06-05 03:58:58', '2025-06-05 05:01:53', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `instructor_majors`
--

CREATE TABLE `instructor_majors` (
  `id` int(11) NOT NULL,
  `id_major` int(11) NOT NULL,
  `id_instructor` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `instructor_majors`
--

INSERT INTO `instructor_majors` (`id`, `id_major`, `id_instructor`, `created_at`, `update_at`) VALUES
(12, 1, 2, '2025-06-04 08:16:38', NULL),
(13, 3, 2, '2025-06-05 07:52:00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `majors`
--

INSERT INTO `majors` (`id`, `name`, `created_at`, `update_at`) VALUES
(1, 'Design Grafis', '2025-06-04 02:54:56', '2025-06-04 04:39:55'),
(2, 'Web Programing', '2025-06-04 06:43:37', NULL),
(3, 'Barista', '2025-06-04 06:43:46', NULL),
(4, 'Content Creator', '2025-06-05 02:50:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `moduls`
--

CREATE TABLE `moduls` (
  `id` int(11) NOT NULL,
  `id_major` int(11) NOT NULL,
  `id_instructor` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `moduls_details`
--

CREATE TABLE `moduls_details` (
  `id` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `update_at`) VALUES
(1, 'Admin', '2025-06-04 02:58:44', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'aryo', 'aryo@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2025-06-03 02:57:17', '2025-06-03 07:23:02', 1),
(2, 'aryo', 'aryo@gmail.com', '123', '2025-06-04 01:10:46', '2025-06-04 02:11:49', 1),
(3, 'Aryo Putranto Pramudityas123', 'aryopramudityas97@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '2025-06-04 02:12:20', '2025-06-04 02:12:50', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `instructor_majors`
--
ALTER TABLE `instructor_majors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `moduls`
--
ALTER TABLE `moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `moduls_details`
--
ALTER TABLE `moduls_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `instructor_majors`
--
ALTER TABLE `instructor_majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `moduls`
--
ALTER TABLE `moduls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `moduls_details`
--
ALTER TABLE `moduls_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
