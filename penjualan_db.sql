-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2023 pada 03.56
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
-- Database: `penjualan_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`, `user_id`) VALUES
(18, 'Redmi Note 10 Pro ', '3500000', 'pms_1622777974.0024911.png', 1, 0),
(19, 'Huawai Mate 50 Pro', '20000000', 'mate40-pro-v1.png', 1, 0),
(20, 'Mito Limbad', '150000', 'download (6).jpeg', 1, 0),
(21, 'iPhone 11 box', '6500000', 'iphone112_1799x1799.png', 1, 0),
(23, 'Samsung Z-Fold 5', '25000000', 'Samsung-Galaxy-Z-Fold-4-5G-Bumilindo-4.jpg', 1, 0),
(24, 'Apple iPhone Flip-1', '50000000', 'Apple-iPhone-Flip.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(50) NOT NULL,
  `flat` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pin_code` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(1, 'Fandi Ahmad', 2147483647, 'fandiahmad306@gmail.com', 'cash on delivery', 'Jl raya jogoroto no 11, rt 10 rw 05', ' nbb', 'KABUPATEN JOMBANG', 'JAWA TIMUR', 'Indonesia', 61485, 0, '200'),
(2, 'Fandi Ahmad', 2147483647, 'fandiahmad306@gmail.com', 'cash on delivery', 'Jl raya jogoroto no 11, rt 10 rw 05', 'ewrfewtewr', 'KABUPATEN JOMBANG', 'JAWA TIMUR', 'Indonesia', 61485, 0, '1'),
(3, 'Fandi Ahmad', 2147483647, 'fandiahmad306@gmail.com', 'cash on delivery', 'Dsn. sumberbendo, RT/RW 010/005', ' nbb', 'JOMBANG', 'JAWA TIMUR', 'Indonesia', 61485, 0, '4'),
(4, 'Fandi Ahmad', 2147483647, 'fandiahmad306@gmail.com', 'cash on delivery', 'Jl raya jogoroto no 11, rt 10 rw 05', 'hghghgh', 'KABUPATEN JOMBANG', 'JAWA TIMUR', 'Indonesia', 61485, 0, '73');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(7, 'Blackbarry Passport', '15000000', '61HXt1G8BKL.jpg'),
(8, 'Redmi Note 10 Pro ', '3500000', 'pms_1622777974.0024911.png'),
(9, 'iPhone 11 box', '6500000', 'iphone112_1799x1799.png'),
(10, 'Infinix Smart 3 plus', '1500000', '5ec59c8c-6e8a-4733-86f3-79ea892fb7cd.png'),
(11, 'Samsung Z-Fold 5', '25000000', 'Samsung-Galaxy-Z-Fold-4-5G-Bumilindo-4.jpg'),
(12, 'Mito Limbad', '150000', 'download (6).jpeg'),
(13, 'Huawai Mate 50 Pro', '20000000', 'mate40-pro-v1.png'),
(14, 'Nexian Hidayah', '50000', '11895_L_1.jpg'),
(15, 'Apple iPhone Flip-1', '50000000', 'Apple-iPhone-Flip.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_info`
--

CREATE TABLE `user_info` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'mohonsabar1234@gmail.com', '9cc892a13ab565e8b3fe353e0efbeca1'),
(2, 'Fandi', 'mohonsabar123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(3, 'admin', 'fandiahmad306@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'Fandi Ahmad', 'mohonsabar1234@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
