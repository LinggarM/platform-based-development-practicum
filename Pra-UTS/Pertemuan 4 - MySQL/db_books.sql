-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 24. Oktober 2016 jam 16:47
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_book`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `isbn` char(13) NOT NULL,
  `author` char(30) DEFAULT NULL,
  `title` char(60) DEFAULT NULL,
  `price` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`isbn`, `author`, `title`, `price`) VALUES
('0-672-31509-2', 'Pruitt, et al.', 'Teach Yourself GIMP in 24 Hours', 24.99),
('0-672-31697-8', 'Michael Morgan', 'Java 2 for Professional Developers', 34.99),
('0-672-31745-1', 'Thomas Down', 'Installing Debian GNU/Linux', 24.99),
('0-672-31769-9', 'Thomas Schenk', 'Caldera OpenLinux System Administration Unleashed', 49.99);

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_reviews`
--

CREATE TABLE IF NOT EXISTS `book_reviews` (
  `isbn` char(13) NOT NULL,
  `review` text,
  PRIMARY KEY (`isbn`),
  KEY `isbn` (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `book_reviews`
--

INSERT INTO `book_reviews` (`isbn`, `review`) VALUES
('0-672-31697-8', 'Morgan''s book is clearly written and goes well beyond most of the basic Java books out there.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customerid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `address` char(40) NOT NULL,
  `city` char(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`customerid`, `name`, `address`, `city`, `email`, `password`) VALUES
(1, 'Julie Smith', '25 Oak Street''', 'Airport West', 'julie@gmail.com', 'c0d3cce00d976943ec650855f58f9e0b'),
(2, 'Alan Wong', '1/47 Haines Avenue', 'Box Hill', 'alan@gmail.com', 'bab891de979ae791cfa37bfc88ed9e88'),
(3, 'Michelle Arthur', '357 North Road', 'Yarraville', 'michelle@gmail.com', '06ee2d4b9ce7961f4718f66da1851ed4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`orderid`),
  KEY `customerid` (`customerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `date`) VALUES
(1, 3, '2015-11-01'),
(2, 1, '2015-11-02'),
(3, 2, '2015-10-14'),
(4, 3, '2015-10-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `orderid` int(10) unsigned NOT NULL,
  `isbn` char(13) NOT NULL,
  `quantity` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`orderid`,`isbn`),
  KEY `isbn` (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`orderid`, `isbn`, `quantity`) VALUES
(1, '0-672-31509-2', 1),
(1, '0-672-31697-8', 2),
(1, '0-672-31769-9', 2),
(2, '0-672-31769-9', 1),
(3, '0-672-31509-2', 1),
(3, '0-672-31769-9', 1),
(4, '0-672-31509-2', 3),
(4, '0-672-31745-1', 3),
(4, '0-672-31769-9', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `password`) VALUES
(1, 'andrew', 'd914e3ecf6cc481114a3f534a5faf90b');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD CONSTRAINT `book_reviews_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `books` (`isbn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customers` (`customerid`);

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `books` (`isbn`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;