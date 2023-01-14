-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 01:18 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemperpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookId` char(20) NOT NULL,
  `idKategori` char(20) NOT NULL,
  `judul` char(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` char(20) DEFAULT NULL,
  `tanggalTerbit` char(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `isbn` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `idKategori`, `judul`, `jumlah`, `status`, `tanggalTerbit`, `harga`, `isbn`) VALUES
('BJDOY-1033758407', 'LINN', 'Another Volume 1', 5, 'Available', '29-Oktober-2009', 64000, '9786025254727'),
('HUWIY-9084013871', 'FIKS', 'It Ends With Us', 4, 'Available', '02-Aug-2016', 49900, '9783423718622'),
('ICLKF-7204117374', 'BIOG', 'Warren Buffett : An Illustrated Biography', 4, 'Available', '14-Dec-2004', 66000, '9780470821534'),
('IFVRA-1276232523', 'FIKS', 'Negeri Lima menara', 2, 'Not available', 'Jul-2009', 106000, '9789792248616'),
('KICXD-3159588348', 'KAMU', 'Concise English-Chinese Chinese-English Dictionary (4th Edition) (English and Chinese Edition)', 8, 'Available', '16-Mei-2021', 250000, '9787100059459'),
('PKGXZ-5977570848', 'REFR', 'Buku Siswa Bahasa Indonesia untuk SMP/MTs Kelas VII', 9, 'Not Available', '2017', 18000, '9786022829683'),
('PUNDW-5993370241', 'ENSI', 'Encyclopedia of Toxicology', 6, 'Available', '07-Apr-2014', 1267320, '9780123864543'),
('QDLKV-6356880234', 'BIOG', 'Soekarno Arsitek Bangsa', 2, 'Available', '27-Mei-2021', 50000, '9789797096328'),
('SAKHP-7307181418', 'REFR', 'The Unofficial Sims Cookbook', 2, 'Not available', '11-Oct-2022', 275000, '9781507219461'),
('UANOD-6632365723', 'NASK', 'Pembalesan baccarat : (samboengan penipoe besar) / ditjeritaken oleh Lie Kim Hok', 1, 'Not available', '1912', 0, '9789797096328'),
('UBUPC-6052907159', 'KOMI', 'JOURNEY. THE ART OF CARLES DALMAU', 4, 'Available', '10-Nov-2022', 440000, '9788467959154'),
('USNHJ-7060782910', 'NFIK', 'Buku Filsafat Ilmu : Hakikat Mencari Pengetahuan', 3, 'Available', '27-Mei-2021', 130000, '9786024014278'),
('VFYUQ-3539487716', 'HIST', ' China: Warisan Klasik dan Daya Dinamis yang Menggetarkan Dunia', 3, 'Not available', '27-Mei-2021', 70000, '9786020636395'),
('WSPJK-9202333288', 'MAJA', 'Majalah Bobo Edisi 48 3 Maret 2022', 5, 'Available', '3-Maret-2022', 15000, '9118536305183'),
('WSUFE-1041466813', 'FIKS', 'Bumi Manusia', 5, 'Available', '25-Aug-1980', 66000, '9780140256352'),
('XBVST-5208317967', 'FIKS', 'Laut Bercerita', 2, 'Available', 'Oct-2017', 171000, '9786024246945'),
('ZZMOJ-5439089530', 'FIKS', 'Cantik Itu Luka', 2, 'Available', '2002', 142400, '9788426404183');

-- --------------------------------------------------------

--
-- Stand-in structure for view `borrowavg`
-- (See below for the actual view)
--
CREATE TABLE `borrowavg` (
`AVG(jumlahBuku)` decimal(14,4)
);

-- --------------------------------------------------------

--
-- Table structure for table `compilationtrans`
--

CREATE TABLE `compilationtrans` (
  `idPeminjaman` char(20) NOT NULL,
  `memberId` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `daftarpeminjaman`
-- (See below for the actual view)
--
CREATE TABLE `daftarpeminjaman` (
`idPeminjaman` char(20)
,`idDenda` char(20)
,`memberId` char(20)
,`staffId` char(20)
,`bookId` char(20)
,`tanggalPeminjaman` date
,`tanggalPengembalian` date
,`bentukBuku` char(20)
,`judul` char(100)
,`idKategori` char(20)
,`isbn` char(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `idDenda` char(20) NOT NULL,
  `totalDenda` int(11) DEFAULT NULL,
  `hariKeterlambatan` int(11) DEFAULT NULL,
  `jenisPembayaran` char(20) DEFAULT NULL,
  `jenisDenda` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`idDenda`, `totalDenda`, `hariKeterlambatan`, `jenisPembayaran`, `jenisDenda`) VALUES
('DH0215', 500000, 0, 'Cash', 'Hilang'),
('DH4044', 500000, 0, 'BCA', 'Hilang'),
('DN0001', 0, 0, '-', '-'),
('DN0002', 0, 0, '-', '-'),
('DN0804', 0, 0, '-', '-'),
('DT0112', 10000, 2, 'GoPay', 'Terlambat'),
('DT0215', 15000, 3, 'Cash', 'Terlambat'),
('DT0271', 10000, 2, 'Cash', 'Terlambat'),
('DT0315', 25000, 5, 'Cash', 'Terlambat'),
('DT0912', 20000, 4, 'GoPay', 'Terlambat');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` char(20) NOT NULL,
  `namaKategori` char(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `namaKategori`, `jumlah`) VALUES
('BIOG', 'Biography', 123),
('ENSI', 'Encylopedia', 30),
('FIKS', 'Fiction', 477),
('HIST', 'History', 21),
('KAMU', 'Dictionary', 86),
('KOMI', 'Komik', 308),
('LINN', 'Light Novel', 264),
('MAJA', 'Magazine', 18),
('NASK', 'Script', 69),
('NFIK', 'Non-Fiction', 185),
('REFR', 'Referensi', 47);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberId` char(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `noHp` char(20) DEFAULT NULL,
  `riwayatPeminjaman` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberId`, `nama`, `email`, `noHp`, `riwayatPeminjaman`) VALUES
('MEMB0122', 'Vanessa Danuwijaya', 'vanessa@binus.ac.id', '08123456789', 0),
('MEMB0991', 'Nile Calliora', 'nille.2701@binus.ac.id', '08220995555', 1),
('MEMB1102', 'Gaviella Elena', 'gaviella@binus.ac.id', '08992015432', 1),
('MEMB1234', 'Keshia Jean', 'keshia@binus.ac.id', '08987654321', 0),
('MEMB1287', 'Ashley Sagerue', 'ashsagerue@binus.ac.id', '08283772988', 3),
('MEMB1949', 'Revino Alexander', 'alexander@binus.ac.id', '08251230926', 10),
('MEMB2008', 'Angelica Beatrice', 'ang.beatrice@binus.ac.id', '08996274040', 0),
('MEMB2208', 'Marvella Graciana', 'marvellagrace@binus.ac.id', '081915352002', 8),
('MEMB2345', 'Fangeline', 'fangeline@binus.ac.id', '0829172846', 2),
('MEMB2981', 'Annette Jeanne', 'annjeanne@binus.ac.id', '08192888241', 8);

-- --------------------------------------------------------

--
-- Stand-in structure for view `morningstaff`
-- (See below for the actual view)
--
CREATE TABLE `morningstaff` (
`staffId` char(20)
,`shiftCode` char(20)
,`nama` char(20)
,`noHp` char(20)
,`email` char(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mostbook`
-- (See below for the actual view)
--
CREATE TABLE `mostbook` (
`idKategori` char(20)
,`MAX(jumlah)` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mostcategory`
-- (See below for the actual view)
--
CREATE TABLE `mostcategory` (
`idKategori` char(20)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `mosttitle`
-- (See below for the actual view)
--
CREATE TABLE `mosttitle` (
`judul` char(100)
,`MAX(jumlah)` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `idPeminjaman` char(20) NOT NULL,
  `idDenda` char(20) NOT NULL,
  `memberId` char(20) NOT NULL,
  `staffId` char(20) NOT NULL,
  `bookId` char(20) NOT NULL,
  `jumlahBuku` int(11) DEFAULT NULL,
  `tanggalPeminjaman` date DEFAULT NULL,
  `tanggalPengembalian` date DEFAULT NULL,
  `bentukBuku` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`idPeminjaman`, `idDenda`, `memberId`, `staffId`, `bookId`, `jumlahBuku`, `tanggalPeminjaman`, `tanggalPengembalian`, `bentukBuku`) VALUES
('PNJ1098765', 'DN0804', 'MEMB1949', 'ST304', 'ZZMOJ-5439089530', 1, '2022-11-06', '2022-11-10', 'Fisik'),
('PNJ1234567', 'DT0112', 'MEMB2981', 'ST308', 'ICLKF-7204117374', 1, '2022-11-06', '2022-11-22', 'Digital'),
('PNJ1627009', 'DT0315', 'MEMB1287', 'ST302', 'PUNDW-5993370241', 5, '2022-11-03', '2022-11-22', 'Fisik'),
('PNJ1928300', 'DN0001', 'MEMB2008', 'ST310', 'WSUFE-1041466813', 1, '2022-11-01', '2022-11-08', 'Digital'),
('PNJ2617772', 'DT0271', 'MEMB1234', 'ST305', 'QDLKV-6356880234', 1, '2022-11-02', '2022-11-18', 'Fisik'),
('PNJ2817015', 'DH4044', 'MEMB0991', 'ST309', 'HUWIY-9084013871', 2, '2022-11-02', '0000-00-00', 'Fisik'),
('PNJ7283526', 'DN0002', 'MEMB1102', 'ST303', 'UBUPC-6052907159', 2, '2022-11-04', '2022-11-10', 'Digital'),
('PNJ7284632', 'DH0215', 'MEMB2208', 'ST307', 'XBVST-5208317967', 2, '2022-11-10', '0000-00-00', 'Fisik'),
('PNJ9001623', 'DT0912', 'MEMB0122', 'ST306', 'IFVRA-1276232523', 1, '2022-11-11', '2022-11-29', 'Digital'),
('PNJ9099678', 'DT0215', 'MEMB2345', 'ST301', 'HUWIY-9084013871', 1, '2022-11-03', '2022-11-20', 'Fisik');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shiftCode` char(20) NOT NULL,
  `jamMulai` time DEFAULT NULL,
  `jamPulang` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shiftCode`, `jamMulai`, `jamPulang`) VALUES
('SH101', '07:00:00', '10:00:00'),
('SH102', '10:00:01', '13:00:00'),
('SH103', '13:00:01', '16:00:00'),
('SH104', '16:00:01', '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` char(20) NOT NULL,
  `shiftCode` char(20) NOT NULL,
  `nama` char(20) DEFAULT NULL,
  `noHp` char(20) DEFAULT NULL,
  `email` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `shiftCode`, `nama`, `noHp`, `email`) VALUES
('ST301', 'SH101', 'Lauren', '083456178293', 'laurenbliss@gmail.com'),
('ST302', 'SH103', 'Rosie', '089127364528', 'rosieli@gmail.com'),
('ST303', 'SH104', 'Eden', '087263549172', 'edenlee@gmail.com'),
('ST304', 'SH101', 'Hellen', '018263548271', 'hellenpark@gmail.com'),
('ST305', 'SH102', 'Troy', '081723527182', 'troyanderson@yahoo.com'),
('ST306', 'SH104', 'Scarlett', '082937461222', 'scarlettjane@gmail.com'),
('ST307', 'SH103', 'Nina', '018273645177', 'ninarowland@gmail.com'),
('ST308', 'SH102', 'Clara', '182736442817', 'claraadams@yahoo.com'),
('ST309', 'SH102', 'Luca', '087263517263', 'lucabalsa@gmail.com'),
('ST310', 'SH101', 'Ethan', '086785241322', 'ethanwinter@gmail.com');

-- --------------------------------------------------------

--
-- Structure for view `borrowavg`
--
DROP TABLE IF EXISTS `borrowavg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `borrowavg`  AS SELECT avg(`peminjaman`.`jumlahBuku`) AS `AVG(jumlahBuku)` FROM `peminjaman``peminjaman`  ;

-- --------------------------------------------------------

--
-- Structure for view `daftarpeminjaman`
--
DROP TABLE IF EXISTS `daftarpeminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `daftarpeminjaman`  AS SELECT `p`.`idPeminjaman` AS `idPeminjaman`, `p`.`idDenda` AS `idDenda`, `p`.`memberId` AS `memberId`, `p`.`staffId` AS `staffId`, `p`.`bookId` AS `bookId`, `p`.`tanggalPeminjaman` AS `tanggalPeminjaman`, `p`.`tanggalPengembalian` AS `tanggalPengembalian`, `p`.`bentukBuku` AS `bentukBuku`, `b`.`judul` AS `judul`, `b`.`idKategori` AS `idKategori`, `b`.`isbn` AS `isbn` FROM (`peminjaman` `p` join `books` `b` on(`p`.`bookId` = `b`.`bookId`))  ;

-- --------------------------------------------------------

--
-- Structure for view `morningstaff`
--
DROP TABLE IF EXISTS `morningstaff`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `morningstaff`  AS SELECT `staff`.`staffId` AS `staffId`, `staff`.`shiftCode` AS `shiftCode`, `staff`.`nama` AS `nama`, `staff`.`noHp` AS `noHp`, `staff`.`email` AS `email` FROM `staff` WHERE `staff`.`shiftCode` like '%SH101%''%SH101%'  ;

-- --------------------------------------------------------

--
-- Structure for view `mostbook`
--
DROP TABLE IF EXISTS `mostbook`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mostbook`  AS SELECT `books`.`idKategori` AS `idKategori`, max(`books`.`jumlah`) AS `MAX(jumlah)` FROM `books``books`  ;

-- --------------------------------------------------------

--
-- Structure for view `mostcategory`
--
DROP TABLE IF EXISTS `mostcategory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mostcategory`  AS SELECT `books`.`idKategori` AS `idKategori`, count(`books`.`jumlah`) AS `total` FROM `books``books`  ;

-- --------------------------------------------------------

--
-- Structure for view `mosttitle`
--
DROP TABLE IF EXISTS `mosttitle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mosttitle`  AS SELECT `books`.`judul` AS `judul`, max(`books`.`jumlah`) AS `MAX(jumlah)` FROM `books``books`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `idKategori` (`idKategori`);

--
-- Indexes for table `compilationtrans`
--
ALTER TABLE `compilationtrans`
  ADD PRIMARY KEY (`idPeminjaman`),
  ADD KEY `memberId` (`memberId`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`idDenda`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`idPeminjaman`),
  ADD KEY `idDenda` (`idDenda`),
  ADD KEY `memberId` (`memberId`),
  ADD KEY `staffId` (`staffId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shiftCode`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`),
  ADD KEY `shiftCode` (`shiftCode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`idKategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `compilationtrans`
--
ALTER TABLE `compilationtrans`
  ADD CONSTRAINT `compilationtrans_ibfk_1` FOREIGN KEY (`idPeminjaman`) REFERENCES `peminjaman` (`idPeminjaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compilationtrans_ibfk_2` FOREIGN KEY (`idPeminjaman`) REFERENCES `peminjaman` (`idPeminjaman`),
  ADD CONSTRAINT `compilationtrans_ibfk_3` FOREIGN KEY (`memberId`) REFERENCES `member` (`memberId`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`idDenda`) REFERENCES `denda` (`idDenda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`memberId`) REFERENCES `member` (`memberId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_4` FOREIGN KEY (`bookId`) REFERENCES `books` (`bookId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`shiftCode`) REFERENCES `shift` (`shiftCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
