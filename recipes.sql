-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2024-06-03 20:48:57
-- サーバのバージョン： 10.4.32-MariaDB
-- PHP のバージョン: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_lab10_01`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `recipe_name` varchar(45) NOT NULL,
  `category` tinyint(1) NOT NULL,
  `difficulty` tinyint(1) NOT NULL DEFAULT 2,
  `budget` mediumint(9) NOT NULL,
  `howto` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `recipes`
--

INSERT INTO `recipes` (`id`, `recipe_name`, `category`, `difficulty`, `budget`, `howto`) VALUES
(2, 'パレタイズロボット', 1, 1, 3000, '自動化の要件定義'),
(3, 'スカラロボット', 2, 3, 2000, '垂直多関節ロボット、安全教育訓練受講後レクチャー'),
(4, '垂直多関節ロボット', 3, 3, 4000, '搬送工程の自動化、省人化対策にて導入予算確保済み'),
(5, '人協調ロボット', 2, 3, 5000, '安全カテゴリの確認、搬送重量の確認、ワークサンプルテスト'),
(6, '人協調ロボット', 3, 2, 4000, '人手不足により、搬送ラインでの協同ロボットの導入を検討中'),
(7, '搬送用コンベア専用機', 2, 1, 100, '樹脂ワークの搬送ライン改造に伴うコンベア導入');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
