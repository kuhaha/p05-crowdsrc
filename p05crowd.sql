-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- ホスト: 127.0.0.1
-- 生成日時: 2016 年 5 月 31 日 10:56
-- サーバのバージョン: 5.5.27
-- PHP のバージョン: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `p05crowd`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_point`
--

CREATE TABLE IF NOT EXISTS `tb_point` (
  `pid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `daytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` varchar(16) NOT NULL,
  `detail` text NOT NULL,
  `pchange` int(11) NOT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE KEY `pid` (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

--
-- テーブルのデータのダンプ `tb_point`
--

INSERT INTO `tb_point` (`pid`, `daytime`, `userid`, `detail`, `pchange`) VALUES
(25, '2015-10-13 07:36:23', '10jk083', 'ポイントチャージ', 100),
(29, '2015-10-13 08:02:05', '10jk083', 'ポイント利用', -100),
(30, '2015-10-13 08:02:34', '10jk083', 'ポイントチャージ', 300),
(45, '2015-10-15 02:47:00', '10jk083', 'ポイント利用', -200),
(46, '2015-10-20 06:04:55', '10jk083', 'ポイントチャージ', 200),
(47, '2015-10-20 06:05:33', '10jk083', 'ポイント利用', -200),
(56, '2015-10-20 06:27:57', '12jk200', '支払い', -500),
(57, '2015-10-20 06:27:57', '11jk200', '収入', 500),
(58, '2015-10-20 06:30:22', '12jk200', '支払い', -50),
(59, '2015-10-20 06:30:22', '10jk083', '収入', 50),
(60, '2015-10-20 06:30:22', '12jk200', '支払い', -50),
(61, '2015-10-20 06:30:22', '10jk200', '収入', 50),
(62, '2015-11-12 02:49:41', '10jk083', 'ポイントチャージ', 300),
(63, '2015-11-16 06:06:18', '12jk200', '支払い', -500),
(64, '2015-11-16 06:06:18', '11jk200', '収入', 500),
(65, '2015-11-17 06:40:10', '12jk200', 'ポイントチャージ', 1200),
(66, '2015-11-19 02:54:02', '13jk200', 'ポイントチャージ', 1000),
(67, '2015-11-19 02:54:38', '13jk200', 'ポイント利用', -500),
(68, '2015-12-10 01:58:27', '12jk200', 'ポイント利用', -50),
(69, '2015-12-11 06:54:43', '12jk200', 'ポイントチャージ', 100),
(70, '2015-12-11 06:58:24', '12jk200', 'ポイントチャージ', 200),
(71, '2015-12-17 00:18:49', '12jk200', '支払い', -500),
(72, '2015-12-17 00:18:49', '12jk200', '収入', 500),
(73, '2015-12-17 00:38:34', '12jk200', '支払い', -200),
(74, '2015-12-17 00:38:34', '12jk200', '収入', 200),
(75, '2015-12-17 00:40:36', '12jk200', 'ポイント利用', -300),
(76, '2015-12-17 00:41:13', '12jk200', 'ポイントチャージ', 300),
(83, '2016-01-27 01:59:39', '10jk083', 'ポイントチャージ', 100);

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_receive`
--

CREATE TABLE IF NOT EXISTS `tb_receive` (
  `requestid` int(11) NOT NULL,
  `userid` varchar(32) NOT NULL,
  `dgresult` int(11) DEFAULT NULL,
  `comment` varchar(1000) NOT NULL,
  `rday` datetime NOT NULL,
  `eday` datetime DEFAULT NULL,
  UNIQUE KEY `requestid` (`requestid`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `tb_receive`
--

INSERT INTO `tb_receive` (`requestid`, `userid`, `dgresult`, `comment`, `rday`, `eday`) VALUES
(3, '10jk200', 2, 'ああああ', '2013-11-03 12:00:00', '2013-11-03 17:00:00'),
(1, '11jk200', 1, '食堂がいいですよ!', '2013-11-04 13:00:00', '2013-11-05 12:00:00'),
(2, '12jk200', 1, '', '2013-11-03 13:00:00', '2015-10-15 12:04:01'),
(5, '12jk200', NULL, '', '2015-12-11 15:49:34', NULL),
(3, '10jk083', 1, 'ああああ', '2013-11-04 13:00:00', '2013-11-04 15:00:00'),
(5, '10jk083', 1, 'ｂｂｂｂ', '2014-10-21 18:51:28', NULL),
(4, '10jk083', 1, '○○が時間つぶせます。', '2013-11-04 19:00:00', '2013-11-05 12:00:00'),
(5, '10jk200', 2, '○○がいいですよ。。', '2013-11-06 13:00:00', '2013-11-06 15:00:00'),
(14, '11jk049', NULL, '図書館がおすすめです。', '2015-01-28 03:12:20', '2015-01-28 03:12:41'),
(15, '11jk049', NULL, '図書館がおすすめです。', '2015-01-28 09:46:28', '2015-01-28 09:46:50'),
(6, '12jk200', NULL, '', '2015-12-11 15:49:42', NULL),
(17, '12jk200', 1, 'aaaa', '2015-12-17 08:58:15', '2015-12-17 08:58:50'),
(1, '12jk200', NULL, '', '2015-12-17 09:47:17', NULL),
(23, '12jk200', NULL, 'test', '2016-01-27 10:58:34', '2016-01-27 10:59:10'),
(1, 'admin', NULL, 'hello', '2016-05-31 19:09:21', '2016-05-31 19:14:13');

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_request`
--

CREATE TABLE IF NOT EXISTS `tb_request` (
  `requestid` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(128) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `contents` varchar(1000) NOT NULL,
  `point` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `perpicient` int(11) DEFAULT NULL,
  `amethod` int(11) NOT NULL,
  `requserid` varchar(16) NOT NULL,
  `rpoint` int(11) NOT NULL,
  PRIMARY KEY (`requestid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- テーブルのデータのダンプ `tb_request`
--

INSERT INTO `tb_request` (`requestid`, `rname`, `sdate`, `edate`, `contents`, `point`, `genre`, `perpicient`, `amethod`, `requserid`, `rpoint`) VALUES
(1, '文化祭のポスター作製', '2013-11-01', '2013-11-10', '文化祭で使用するポスターを作成してください。今年のモチーフは○○です。', 500, 1, 1, 0, '11jk049', 500),
(5, '球技大会のキャッチコピー', '2013-11-05', '2013-11-12', '再来週行われる球技大会で使われるキャッチコピーを考えてください。', 500, 4, 1, 0, '12jk200', 500),
(6, 'ポスター', '2013-12-01', '2013-12-05', '特になし', 100, 0, NULL, 1, '10jk083', 500),
(23, 'test', '2016-01-27', '2016-01-27', 'test', 100, 3, 1, 1, '', 0),
(8, 'ポスター作成', '2015-01-09', '2015-01-12', 'テニスサークルで使用するポスターの製作', 100, 0, 2, 0, '', 0),
(17, '画像デザインの作製', '2015-11-12', '2015-11-20', '卒業研究で使用する画像の作製', 500, 3, 2, 0, '', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_shopping`
--

CREATE TABLE IF NOT EXISTS `tb_shopping` (
  `sid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `spid` varchar(32) NOT NULL,
  `uid` varchar(16) NOT NULL,
  `sdate` date NOT NULL,
  `content` text NOT NULL,
  `cost` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `sid` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `userid` varchar(7) NOT NULL,
  `passwd` varchar(16) NOT NULL,
  `uname` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `dept` varchar(8) NOT NULL,
  `tel` varchar(16) NOT NULL,
  `rpoint` int(11) DEFAULT NULL,
  `post` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `tb_user`
--

INSERT INTO `tb_user` (`userid`, `passwd`, `uname`, `email`, `dept`, `tel`, `rpoint`, `post`) VALUES
('10jk083', 'abcd', '中島拓也', 'aaaa@hotmali.com', 'jk', '090-1234-4567', 500, 1),
('11jk200', 'abcd', '佐藤翔太', 'bbbb@gmali.com', 'te', '080-1111-1111', 500, 1),
('12jk200', 'abcd', '鈴木健太', 'cccc@gmali.com', 'at', '090-2222-2222', 500, 1),
('13jk200', 'abcd', '高橋大樹', 'dddd@gmail.com', 'es', '090-5555-5555', 500, 1),
('10jk200', 'abcd', '田中翼', 'eeee@gmail.com', 'mg', '080-4444-4444', 500, 1),
('11jk049', 'abcd', '久保山雄介', 'ffff@gmail.com', 'jk', '080-7777-7777', 500, 1),
('admin', 'abcd', '管理者', 'xxxx@kyusan-u.ac.jp', 'jk', '080-1111-1234', 0, 9),
('11jk006', 'abcd', '石田真悟', 'gggg@gmail.com', 'jk', '080-1111-0000', 500, 1),
('maruzen', 'abcd', '丸善一号館', 'maruzen@abc.com', 'a', '5411', NULL, 8),
('saposen', 'abcd', 'PCサポートセンター12号館', 'saposen@abc.com', 'a', '5412', NULL, 8),
('cheng', 'abcd', '成先生', 'cheng@1234.com', 'jk', '1234', 500, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
