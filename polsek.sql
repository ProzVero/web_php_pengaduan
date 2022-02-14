-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2015 at 12:08 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `polsek`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nama` char(30) NOT NULL,
  `jk` char(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `pekerjaan` char(20) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `adminname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  UNIQUE KEY `username` (`adminname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nama`, `jk`, `alamat`, `pekerjaan`, `nohp`, `adminname`, `password`) VALUES
('Muhammad Ridwan Mahfudz', 'Male', 'Desa Tunas Mudo Rt 05 Kecamatan Sekernan Kabupaten', 'Mahasiswa', '081994420024', 'Ridwan', 'crtghb68p2');

-- --------------------------------------------------------

--
-- Table structure for table `aduan`
--

CREATE TABLE `aduan` (
  `kode` int(5) NOT NULL auto_increment,
  `datetime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `kategori` char(30) NOT NULL,
  `tkp` varchar(50) NOT NULL,
  `isi` varchar(200) NOT NULL,
  `np` int(5) NOT NULL,
  PRIMARY KEY  (`kode`),
  KEY `np` (`np`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `aduan`
--

INSERT INTO `aduan` (`kode`, `datetime`, `kategori`, `tkp`, `isi`, `np`) VALUES
(1, '2015-11-19 13:28:33', 'Kekerasan', 'Disekolah', '<p>Telah terjadi tindak kekerasan dilingkungan sekolah, korban mengalami memar disekujur tubuh akibat pengeroyokan teman sekelasnya.</p>', 1),
(2, '2015-11-25 15:44:17', 'Kekerasan', 'Desa setiris rt 03', '<p>Seorang anak telah dipukuli oleh temanya saat jam pelajaran disekolah telah usai.</p>', 2),
(3, '2015-11-25 23:07:23', 'Pencabulan', 'Tempat Umum', '<p>Saya mendapat perlakuan tidak menyenangkan ketika sedang naik angkutan kota</p>', 3),
(4, '2015-12-15 22:33:16', 'Kdrt', 'Desa Setiris Rt 01', '<p>Ibu saya mendapat perlakuan tindak kekerasan oleh ayah saya</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `himbauan`
--

CREATE TABLE `himbauan` (
  `no` int(5) NOT NULL auto_increment,
  `judul` varchar(50) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `himbauan`
--

INSERT INTO `himbauan` (`no`, `judul`, `ket`, `datetime`) VALUES
(1, 'Himbauan', '<p>Kepada seluruh lapisan masyarakat diharapkan berhati-hati dan selalu waspada ketika berkendara pada malam hari, khususnya saat melintasi jalanan yang sepi dari keramian. Terima kasih.</p>', '2015-11-19 10:30:05'),
(2, 'Pemberitahuan', '<p>Kepada seluruh masyarakat diharapkan untuk melaporkan jika ada orang yang mencurigakan disekitar tempat tinggal anda. Terima kasih.</p>', '2015-11-19 10:32:15'),
(3, 'Pemberitahuan', '<p>Sehubungan telah dilaksanakan pilkada serentak pada 09 Desember lalu .. maka pelayanan pada polsek sekernan telah normal kembali.. mohon ma&#39;af atas ketidaknyamananya.. terima kasih.</p>', '2015-12-15 22:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `kejahatan`
--

CREATE TABLE `kejahatan` (
  `no` int(5) NOT NULL auto_increment,
  `kategori` char(30) NOT NULL,
  `tkp` varchar(50) NOT NULL,
  `modus` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kejahatan`
--

INSERT INTO `kejahatan` (`no`, `kategori`, `tkp`, `modus`, `datetime`) VALUES
(1, 'Kekerasa Fisik dan Perampokan', 'Jl. Lintas Timur Km 29 Sengeti', 'Pelaku berpura-pura menumpang lalu merebut kendaraan dan menganiaya sang supir kemudian melarikan diri ke arah bukit', '2015-11-13 01:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `korban`
--

CREATE TABLE `korban` (
  `nk` int(5) NOT NULL auto_increment,
  `nama` char(30) NOT NULL,
  `jk` char(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `ciri` varchar(200) NOT NULL,
  `np` int(5) NOT NULL,
  `kode` int(5) NOT NULL,
  PRIMARY KEY  (`nk`),
  KEY `np` (`np`),
  KEY `kode` (`kode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `korban`
--

INSERT INTO `korban` (`nk`, `nama`, `jk`, `alamat`, `ciri`, `np`, `kode`) VALUES
(1, 'Salim', 'Male', 'Desa setiris rt 03', '<p>Putih, tinggi dan memakai jam tangan merk swiss.</p>', 1, 1),
(2, 'Suryani', 'Female', 'Desa Kedemangan rt 01', '<p>Tinggi, Putih dan langsing</p>', 2, 2),
(3, 'anonymous', 'Male', '-', '<p>-</p>', 3, 3),
(4, 'Ummi', 'Female', 'Desa Setiris Rt 01', '<p>Putih, Manis</p>', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pelaku`
--

CREATE TABLE `pelaku` (
  `npl` int(5) NOT NULL auto_increment,
  `nama` char(30) NOT NULL,
  `jk` char(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `ciri` varchar(200) NOT NULL,
  `np` int(5) NOT NULL,
  `kode` int(5) NOT NULL,
  `nk` int(5) NOT NULL,
  PRIMARY KEY  (`npl`),
  KEY `np` (`np`),
  KEY `kode` (`kode`),
  KEY `nk` (`nk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pelaku`
--

INSERT INTO `pelaku` (`npl`, `nama`, `jk`, `alamat`, `ciri`, `np`, `kode`, `nk`) VALUES
(1, 'Musyrikin', 'Male', 'Belum diketahui', '<p>Hitam dan agak&nbsp;tempramental.</p>', 1, 1, 1),
(2, 'Sarjito', 'Male', 'Desa Setiris rt 05', '<p>Tinggi dan agak kasar</p>', 2, 2, 2),
(3, '-', 'Male', '-', '<p>-</p>', 3, 3, 3),
(4, 'Abi', 'Male', 'Desa Setiris Rt 01', '<p>Tinggi Agak Kasar</p>', 1, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pelapor`
--

CREATE TABLE `pelapor` (
  `np` int(5) NOT NULL auto_increment,
  `nama` char(30) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jk` char(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `pekerjaan` char(20) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY  (`np`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pelapor`
--

INSERT INTO `pelapor` (`np`, `nama`, `ttl`, `jk`, `alamat`, `pekerjaan`, `nohp`, `username`, `password`) VALUES
(1, 'Aziz Mahmud Effendi', 'Sembubuk 21 Desember 1995', 'Male', 'Desa tunas mudo rt 05', 'Mekanik', '085764175764', 'root', 'root'),
(2, 'Ali imron', 'Setiris 01 Juni 1992', 'Male', 'Desa Setiris', 'Pegawai Negeri', '085266622098', 'user', 'user'),
(3, 'anonymous', '-', 'Male', '-', '-', '-', 'anonymous', 'anonymous'),
(4, 'Marq Marques', 'Spayol 20 Mei 1993', 'Male', 'Sepanyol', 'Pembalap', '085266611909', 'Rookie', 'Rookie');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `no` int(5) NOT NULL auto_increment,
  `datetime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `username` varchar(30) NOT NULL,
  `pesan` varchar(200) NOT NULL,
  PRIMARY KEY  (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pesan`
--

