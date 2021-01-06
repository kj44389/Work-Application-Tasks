-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Sty 2021, 22:27
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `worktasks`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `invoices`
--

CREATE TABLE `invoices` (
  `id` int(7) NOT NULL,
  `buyer-name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `buyer-surname` text COLLATE utf8mb4_polish_ci NOT NULL,
  `seller-name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `seller-surname` text COLLATE utf8mb4_polish_ci NOT NULL,
  `buyer-nip` text COLLATE utf8mb4_polish_ci NOT NULL,
  `seller-nip` text COLLATE utf8mb4_polish_ci NOT NULL,
  `date-of-making` date NOT NULL,
  `name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `unit-price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` float NOT NULL,
  `net-value` double NOT NULL,
  `vat-value` float NOT NULL,
  `gross-value` double NOT NULL,
  `add-date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `invoices`
--

INSERT INTO `invoices` (`id`, `buyer-name`, `buyer-surname`, `seller-name`, `seller-surname`, `buyer-nip`, `seller-nip`, `date-of-making`, `name`, `unit-price`, `quantity`, `discount`, `net-value`, `vat-value`, `gross-value`, `add-date`) VALUES
(1, 'Jarosław', 'Kudzia', 'Jan', 'Kowalski', '2151-123-12-51', '1233-123-13-12', '2021-01-01', 'test', 10, 10, 0, 100, 23, 123, '2021-01-05');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
