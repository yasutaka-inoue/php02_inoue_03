-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2020 at 09:45 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gs_bm`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `title` varchar(64) NOT NULL,
  `author` varchar(64) NOT NULL,
  `img` text NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `title`, `author`, `img`, `url`, `comment`, `date`) VALUES
(14, '鬼滅の刃 1', '吾峠呼世晴', '<img src=\"http://books.google.com/books/content?id=Mj1cDAAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api/\">', '<a class=\"detail\" href=\"http://books.google.co.jp/books?id=Mj1cDAAAQBAJ&amp;pg=PT109&amp;dq=%E9%AC%BC%E6%BB%85&amp;hl=&amp;cd=8&amp;source=gbs_api\">Detail (Google books)</a>', 'やたら話題なので', '2020-10-21 17:41:19'),
(15, 'スロウハイツの神様上', '辻村深月', '<img src=\"http://books.google.com/books/content?id=TX1XQwAACAAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;source=gbs_api/\">', '<a class=\"detail\" href=\"http://books.google.co.jp/books?id=TX1XQwAACAAJ&amp;dq=%E8%BE%BB%E6%9D%91%E6%B7%B1%E6%9C%88&amp;hl=&amp;cd=8&amp;source=gbs_api\">Detail (Google books)</a>', 'いい話', '2020-10-21 17:41:37'),
(18, 'はじめてのPHPプログラミング基本編 5.3対応', '下岡秀幸,中村悟', '<img src=\"http://books.google.com/books/content?id=Y1_Y5CodPgYC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api/\">', '<a class=\"detail\" href=\"http://books.google.co.jp/books?id=Y1_Y5CodPgYC&amp;pg=PA100&amp;dq=PHP&amp;hl=&amp;cd=3&amp;source=gbs_api\">Detail (Google books)</a>', '勉強しよ', '2020-10-21 17:44:22'),
(19, 'はじめてのホームページHTML入門', '荒石正二', '<img src=\"http://books.google.com/books/content?id=U4DFfhkkPFgC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api/\">', '<a class=\"detail\" href=\"http://books.google.co.jp/books?id=U4DFfhkkPFgC&amp;pg=PA20&amp;dq=html&amp;hl=&amp;cd=1&amp;source=gbs_api\">Detail (Google books)</a>', 'None', '2020-10-21 17:44:49'),
(21, 'レシピブログmagazine Vol.16', 'レシピブログ', '<img src=\"http://books.google.com/books/content?id=Z4YBEAAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api/\">', '<a class=\"detail\" href=\"http://books.google.co.jp/books?id=Z4YBEAAAQBAJ&amp;printsec=frontcover&amp;dq=%E3%83%AC%E3%82%B7%E3%83%94&amp;hl=&amp;cd=1&amp;source=gbs_api\">Detail (Google books)</a>', 'None', '2020-10-21 18:22:32'),
(23, 'ハリー・ポッターとアズカバンの囚人', 'J.K. Rowling', '<img src=\"http://books.google.com/books/content?id=sI1fzBczWAsC&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api/\">', '<a class=\"detail\" href=\"http://books.google.co.jp/books?id=sI1fzBczWAsC&amp;printsec=frontcover&amp;dq=%E3%83%8F%E3%83%AA%E3%83%BC%E3%83%9D%E3%83%83%E3%82%BF%E3%83%BC&amp;hl=&amp;cd=3&amp;source=gbs_api\">Detail (Google books)</a>', 'nice', '2020-10-21 18:29:45'),
(24, 'やせる糖質オフレシピ 2週間プログラム', 'undefined', '<img src=\"http://books.google.com/books/content?id=x4TwCwAAQBAJ&amp;printsec=frontcover&amp;img=1&amp;zoom=1&amp;edge=curl&amp;source=gbs_api/\">', '<a class=\"detail\" href=\"http://books.google.co.jp/books?id=x4TwCwAAQBAJ&amp;pg=PA23&amp;dq=%E3%83%AC%E3%82%B7%E3%83%94&amp;hl=&amp;cd=8&amp;source=gbs_api\">詳しく見る (Google books)</a>', 'None', '2020-10-21 18:40:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
