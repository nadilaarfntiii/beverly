-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2024 at 11:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_beverly`
--

-- --------------------------------------------------------

--
-- Table structure for table `gd_keluar`
--

CREATE TABLE `gd_keluar` (
  `id_brg_klr` varchar(7) NOT NULL,
  `id_brg` varchar(7) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_klr` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gd_keluar`
--

INSERT INTO `gd_keluar` (`id_brg_klr`, `id_brg`, `jumlah`, `tgl_klr`) VALUES
('', 'C56', 20, '2024-07-15'),
('', 'C57', 9, '2024-07-15'),
('', 'C58', 11, '2024-07-15'),
('', 'C59', 21, '2024-07-15'),
('', 'C60', 18, '2024-07-15'),
('K001', 'S01', 500, '2024-07-16'),
('K002', 'S02', 200, '2024-07-16'),
('K003', 'S03', 50, '2024-07-16'),
('K004', 'S04', 500, '2024-07-16'),
('K005', 'S05', 100, '2024-07-16');

--
-- Triggers `gd_keluar`
--
DELIMITER $$
CREATE TRIGGER `update_produksi_masuk` AFTER INSERT ON `gd_keluar` FOR EACH ROW INSERT INTO pd_stok_masuk
SET id_brg = new.id_brg,
jumlah = new.jumlah,
tanggal_masuk = now()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gd_masuk`
--

CREATE TABLE `gd_masuk` (
  `id_brg_msk` varchar(7) NOT NULL,
  `id_brg` varchar(7) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_msk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gd_masuk`
--

INSERT INTO `gd_masuk` (`id_brg_msk`, `id_brg`, `jumlah`, `tgl_msk`) VALUES
('M001', 'S01', 1000, '2024-07-16'),
('M002', 'S02', 1000, '2024-07-16'),
('M003', 'S03', 1000, '2024-07-16'),
('M004', 'S04', 1000, '2024-07-16'),
('M005', 'S05', 1000, '2024-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `gd_pembelian`
--

CREATE TABLE `gd_pembelian` (
  `id_pemb` varchar(7) NOT NULL,
  `id_brg` varchar(7) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `tgl_pemb` date NOT NULL,
  `upload` varchar(100) NOT NULL,
  `status` enum('Menunggu','Disetujui','Tidak Disetujui','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gd_pembelian`
--

INSERT INTO `gd_pembelian` (`id_pemb`, `id_brg`, `id_user`, `qty`, `tgl_pemb`, `upload`, `status`) VALUES
('P001', 'S01', 'gd001', 10, '2024-06-01', 'RAB.docx', 'Disetujui'),
('P002', 'S02', 'gd001', 2000, '2024-07-16', 'RAB.docx', 'Menunggu'),
('P003', 'S03', 'gd001', 6000, '2024-07-16', 'RAB.docx', 'Menunggu'),
('P004', 'S04', 'gd001', 2000, '2024-07-16', 'RAB.docx', 'Menunggu'),
('P005', 'S05', 'gd001', 6000, '2024-07-16', 'RAB.docx', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `gd_stok`
--

CREATE TABLE `gd_stok` (
  `id_brg` varchar(7) NOT NULL,
  `nm_brg` varchar(60) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga` int(15) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gd_stok`
--

INSERT INTO `gd_stok` (`id_brg`, `nm_brg`, `satuan`, `harga`, `stok`) VALUES
('S01', 'Teh Merah Mentah', 'pcs', 50000, 500),
('S02', 'Teh Hitam Mentah', 'bal', 50000, 800),
('S03', 'Teh Hijau Mentah', 'bal', 50000, 950),
('S04', 'Kertas Filter', 'pack', 25000, 500),
('S05', 'Kardus', 'bal', 50000, 900);

-- --------------------------------------------------------

--
-- Table structure for table `pd_stok`
--

CREATE TABLE `pd_stok` (
  `id_brg` varchar(7) NOT NULL,
  `nama_produk` varchar(60) NOT NULL,
  `jumlah` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pd_stok`
--

INSERT INTO `pd_stok` (`id_brg`, `nama_produk`, `jumlah`) VALUES
('C56', 'Teh Olong', '17'),
('C57', 'Teh Hitam', '10'),
('C58', 'Teh Herbal', '12'),
('C59', 'Teh Melati', '20'),
('C60', 'Teh Hijau', '19');

-- --------------------------------------------------------

--
-- Table structure for table `pd_stok_masuk`
--

CREATE TABLE `pd_stok_masuk` (
  `id_brg` varchar(7) NOT NULL,
  `jumlah` char(4) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pd_stok_masuk`
--

INSERT INTO `pd_stok_masuk` (`id_brg`, `jumlah`, `tanggal_masuk`) VALUES
('C56', '20', '2024-07-15'),
('C57', '9', '2024-07-15'),
('C58', '11', '2024-07-15'),
('C59', '21', '2024-07-15'),
('C60', '18', '2024-07-15'),
('S01', '500', '2024-07-16'),
('S02', '200', '2024-07-16'),
('S03', '50', '2024-07-16'),
('S04', '500', '2024-07-16'),
('S05', '100', '2024-07-16');

--
-- Triggers `pd_stok_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_stok_real_tambah` AFTER INSERT ON `pd_stok_masuk` FOR EACH ROW BEGIN
UPDATE pd_stok SET jumlah = jumlah + new.jumlah
WHERE id_brg = new.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` char(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jekel` enum('Perempuan','Laki laki','','') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` enum('aktif','cuti','tidak aktif','') NOT NULL,
  `berkas` varchar(30) NOT NULL,
  `id_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama`, `jekel`, `tgl_lahir`, `alamat`, `no_hp`, `status`, `berkas`, `id_user`) VALUES
('K0000000001', 'Cindy Cahyaningsih', 'Perempuan', '2004-03-23', 'Batang', '098767875454', 'cuti', '708-1384-2-PB (2)_1_1_1.pdf', NULL),
('K0000000003', 'gani', 'Laki laki', '2024-07-08', 'dgd', '574754', 'aktif', '708-1384-2-PB (1)_2_5.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` char(11) NOT NULL,
  `nm_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nm_kategori`) VALUES
('BE-01', 'Biaya Ekspedisi'),
('PB-01', 'Pembelian Bahan Baku'),
('PB-02', 'Pembelian Bahan Penolong'),
('PB-03', 'Pembelian alat tulis kantor'),
('PD-01', 'Penjualan Teh'),
('PD-02', 'Penjualan di event'),
('PG-01', 'Gaji Karyawan Produksi'),
('PG-02', 'Gaji Staff Perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kehadiran`
--

CREATE TABLE `tb_kehadiran` (
  `kd_absen` char(11) NOT NULL,
  `nm_krywn` varchar(25) NOT NULL,
  `jam_masuk` datetime NOT NULL,
  `jam_pulang` datetime NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_karyawan` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_keuangan`
--

CREATE TABLE `tb_keuangan` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modal_awal` int(11) NOT NULL,
  `saldo_saat_ini` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_keuangan`
--

INSERT INTO `tb_keuangan` (`id`, `tanggal`, `modal_awal`, `saldo_saat_ini`) VALUES
(1, '2024-06-19 02:03:56', 200000000, 212000000),
(2, '2024-06-21 04:12:17', 100000000, 112000000),
(3, '2024-06-21 04:16:58', 100000000, 112000000),
(4, '2024-06-21 04:17:17', 200000000, 212000000),
(5, '2024-06-21 04:18:20', 150000000, 162000000),
(6, '2024-07-06 02:26:09', 100, -9999900),
(7, '2024-07-06 02:26:23', 100000000, 90000000),
(8, '2024-07-06 04:49:24', 150000000, 165000000),
(9, '2024-07-09 12:11:34', 100000000, 115000000),
(10, '2024-07-09 12:13:49', 100000000, 115000000),
(11, '2024-07-09 12:33:19', 120000000, 125000000),
(12, '2024-07-10 00:27:18', 150000000, 155000000);

--
-- Triggers `tb_keuangan`
--
DELIMITER $$
CREATE TRIGGER `before_insert_modal_awal` BEFORE INSERT ON `tb_keuangan` FOR EACH ROW BEGIN
    DECLARE pendapatan_bulan_ini DECIMAL(15, 2);
    DECLARE pengeluaran_bulan_ini DECIMAL(15, 2);

    -- Hitung total pendapatan bulan ini
    SELECT COALESCE(SUM(nominal), 0) INTO pendapatan_bulan_ini
    FROM tb_pendapatan
    WHERE DATE_FORMAT(tanggal, '%Y-%m') = DATE_FORMAT(NEW.tanggal, '%Y-%m');

    -- Hitung total pengeluaran bulan ini
    SELECT COALESCE(SUM(nominal), 0) INTO pengeluaran_bulan_ini
    FROM tb_pengeluaran
    WHERE DATE_FORMAT(tanggal, '%Y-%m') = DATE_FORMAT(NEW.tanggal, '%Y-%m');

    -- Perbarui saldo_saat_ini
    SET NEW.saldo_saat_ini = NEW.modal_awal + pendapatan_bulan_ini - pengeluaran_bulan_ini;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendapatan`
--

CREATE TABLE `tb_pendapatan` (
  `id_transaksi` char(11) NOT NULL,
  `id_kategori` char(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `nominal` int(20) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pendapatan`
--

INSERT INTO `tb_pendapatan` (`id_transaksi`, `id_kategori`, `tanggal`, `keterangan`, `nominal`, `berkas`, `id_user`) VALUES
('PJ001', 'PD-01', '2024-01-01', 'Penjualan Teh kepada Tn.Anton 40 Ball', 40000000, 'Pricelist.pdf', 'keu001'),
('PJ002', 'PD-01', '2024-02-01', 'Penjualan Teh 5 Ball kepada Tn. Rama', 15000000, 'Analisa SWOT_1.docx', 'keu001'),
('PJ003', 'PD-02', '2024-03-10', 'Penjualan teh di Festival UMKM Kota Pekalongan 202', 13000000, 'TUGAS 2.docx', 'keu001'),
('PJ004', 'PD-01', '2024-04-01', 'Penjualan Teh 20 Ball kepada Tn. Bagas ', 25000000, 'RAB.docx', 'keu001'),
('PJ005', 'PD-01', '2024-05-21', 'Penjualan Teh Kepada Tn. Joni', 30000000, 'RAB_1.docx', 'keu001'),
('PJ006', 'PD-01', '2024-06-21', 'Penjualan Kepada Tn. Rey', 35000000, 'RAB_5.docx', 'keu001'),
('PJ008', 'PD-01', '2024-07-02', 'Penjualan Teh Kepada Tn. Tom 3 ball', 15000000, 'apsi.docx', 'keu001'),
('PJ009', 'PD-02', '2024-07-06', 'Penjualan teh 10 ball Kepada Agen Solo', 50000000, 'RAB_3.docx', 'keu001'),
('PJ010', 'PD-02', '2024-07-09', 'Penjualan Teh di Expo', 10000000, 'TUGAS 2_BHS INDONESIA_RAHMI YUNIAR_2086203020_SEMESTER.1_2.docx', 'keu001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_brg` varchar(7) NOT NULL,
  `nama_produk` varchar(60) NOT NULL,
  `jumlah` char(4) NOT NULL,
  `tanggal_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_brg`, `nama_produk`, `jumlah`, `tanggal_pengajuan`) VALUES
('C56', 'Teh Olong', '20', '2024-07-08'),
('C57', 'Teh Hitam', '9', '2024-07-10'),
('C58', 'Teh Herbal', '11', '2024-07-09'),
('C59', 'Teh Melati', '21', '2024-07-12'),
('C60', 'Teh Hijau', '18', '2024-07-13');

--
-- Triggers `tb_pengajuan`
--
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` AFTER INSERT ON `tb_pengajuan` FOR EACH ROW INSERT INTO gd_keluar 
SET id_brg=new.id_brg, 
jumlah=new.jumlah, 
tgl_klr=now()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_transaksi` char(11) NOT NULL,
  `id_kategori` char(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `nominal` int(20) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_transaksi`, `id_kategori`, `tanggal`, `keterangan`, `nominal`, `berkas`, `id_user`) VALUES
('PBB01', 'PB-01', '2024-07-09', 'Pembelian Bahan Baku Bunga Melatii', 10000000, 'Book1_8.xlsx', 'keu001'),
('PBP01', 'PB-02', '2024-07-09', 'Pembelian Kertas Pembungkus', 20000000, 'TUGAS 2_BHS INDONESIA_RAHMI YUNIAR_2086203020_SEMESTER.1_3.docx', 'keu001'),
('PG001', 'PB-01', '2024-05-01', 'Pembelian Bahan Baku Teh di PT.Pagilaran', 40000000, '708-1384-2-PB (2)_2.pdf', 'keu001'),
('PG002', 'PB-01', '2024-06-03', 'Pembelian Bahan Baku', 4000000, 'Analisa SWOT.docx', 'keu001'),
('PG003', 'PB-03', '2024-05-13', 'Pembelian alat tulis kantor', 2500000, 'MAKALAH_KALIMAT_EFEKTIF.docx', 'keu001'),
('PG004', 'PB-03', '2024-06-02', 'Pembelian Alat Tulis Kantor', 4000000, '1389-3092-1-PB (4).pdf', 'keu001'),
('PG005', 'PG-01', '2024-06-01', 'Penggajian Karyawan Produksi Bulan Mei', 50000000, 'RAB_2.docx', 'keu001'),
('PG006', 'PB-01', '2024-07-04', 'Pembelian Bahan Baku Teh PT.Pagilaran', 50000000, 'RAB_8.docx', 'keu001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penggajian`
--

CREATE TABLE `tb_penggajian` (
  `kd_gaji` char(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nm_krywn` varchar(25) NOT NULL,
  `gaji` int(15) NOT NULL,
  `tunjangan` int(25) NOT NULL,
  `total` int(20) NOT NULL,
  `kd_absen` char(11) DEFAULT NULL,
  `id_karyawan` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_penggajian`
--

INSERT INTO `tb_penggajian` (`kd_gaji`, `tanggal`, `nm_krywn`, `gaji`, `tunjangan`, `total`, `kd_absen`, `id_karyawan`) VALUES
('JN01', '2024-06-01', 'Cindy Cahyaningsih', 4000000, 1500000, 5500000, NULL, 'K0000000001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permintaan`
--

CREATE TABLE `tb_permintaan` (
  `kode` char(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `berkas` text NOT NULL,
  `status` enum('Menunggu','Disetujui','Tidak Disetujui','') NOT NULL,
  `kd_gaji` char(11) DEFAULT NULL,
  `id_user` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_permintaan`
--

INSERT INTO `tb_permintaan` (`kode`, `tgl_permintaan`, `berkas`, `status`, `kd_gaji`, `id_user`) VALUES
('GJ01', '2024-06-30', 'TUGAS 2_BHS INDONESIA_RAHMI YUNIAR_2086203020_SEMESTER.1_7.docx', 'Disetujui', 'JN01', 'hr001'),
('GJ02', '2024-07-09', 'TUGAS 2_BHS INDONESIA_RAHMI YUNIAR_2086203020_SEMESTER.1_9.docx', 'Tidak Disetujui', 'JN01', 'hr001'),
('GJ03', '2024-07-09', 'contoh_11.docx', 'Menunggu', 'JN01', 'hr001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produksi`
--

CREATE TABLE `tb_produksi` (
  `kode_produksi` char(5) NOT NULL,
  `id_karyawan` char(11) NOT NULL,
  `id_brg` varchar(7) NOT NULL,
  `tanggal_produksi` date NOT NULL,
  `total_produksi` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produksi`
--

INSERT INTO `tb_produksi` (`kode_produksi`, `id_karyawan`, `id_brg`, `tanggal_produksi`, `total_produksi`) VALUES
('P32', 'U24', 'C56', '2024-07-15', '4'),
('P33', 'U21', 'C59', '2024-07-15', '2');

--
-- Triggers `tb_produksi`
--
DELIMITER $$
CREATE TRIGGER `update_stok_real_kurang` AFTER INSERT ON `tb_produksi` FOR EACH ROW BEGIN UPDATE pd_stok 
SET jumlah = jumlah - new.total_produksi 
WHERE id_brg = new.id_brg; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `bagian` enum('Gudang','Keuangan','Produksi','HR Personalia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `alamat`, `jekel`, `no_telp`, `bagian`) VALUES
('gd001', 'Cindy Cahyaningsih', '$2y$10$917nO41N70dah1pHAH8mOeVwVIbyY1X97ITI.yzmUkP/cpsXYUiQ2', 'Kab. Batang', 'Perempuan', '08556789754', 'Gudang'),
('hr001', 'Okvi Anggreani', '$2y$10$ov5o85.KKk.5.d.TeKBh4.GtXl3ciCn72EMy8Epwq1BRFBoXM.5/O', 'Kota Pekalongan', 'Perempuan', '09987433246766', 'HR Personalia'),
('keu001', 'Nadila Arofanti', '$2y$10$UxtUa8FxuVKn2fGO96fisefCLdBrHk2.IP763r3o3jgOEVYciUVBK', 'Pekalongan Timur', 'Perempuan', '085727275037', 'Keuangan'),
('pd001', 'Fahria Karima', '$2y$10$Jj69aSMURUyhDO/BmmmlxOm2iWDgLGf/SROtq7JlCjWVl6enfLqEW', 'Kota Pekalongan', 'Perempuan', '085727278888', 'Produksi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gd_masuk`
--
ALTER TABLE `gd_masuk`
  ADD PRIMARY KEY (`id_brg_msk`),
  ADD KEY `tbl1` (`id_brg`);

--
-- Indexes for table `gd_pembelian`
--
ALTER TABLE `gd_pembelian`
  ADD PRIMARY KEY (`id_pemb`),
  ADD KEY `id_brg` (`id_brg`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `gd_stok`
--
ALTER TABLE `gd_stok`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `pd_stok`
--
ALTER TABLE `pd_stok`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `tb_karyawan_ibfk_1` (`id_user`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD PRIMARY KEY (`kd_absen`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pendapatan`
--
ALTER TABLE `tb_pendapatan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_penggajian`
--
ALTER TABLE `tb_penggajian`
  ADD PRIMARY KEY (`kd_gaji`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `kd_absen` (`kd_absen`);

--
-- Indexes for table `tb_permintaan`
--
ALTER TABLE `tb_permintaan`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `tb_permintaan_ibfk_1` (`kd_gaji`),
  ADD KEY `tb_permintaan_ibfk_2` (`id_user`);

--
-- Indexes for table `tb_produksi`
--
ALTER TABLE `tb_produksi`
  ADD PRIMARY KEY (`kode_produksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gd_masuk`
--
ALTER TABLE `gd_masuk`
  ADD CONSTRAINT `gd_masuk_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `gd_stok` (`id_brg`);

--
-- Constraints for table `gd_pembelian`
--
ALTER TABLE `gd_pembelian`
  ADD CONSTRAINT `gd_pembelian_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `gd_stok` (`id_brg`),
  ADD CONSTRAINT `gd_pembelian_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD CONSTRAINT `tb_karyawan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD CONSTRAINT `tb_kehadiran_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pendapatan`
--
ALTER TABLE `tb_pendapatan`
  ADD CONSTRAINT `tb_pendapatan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`),
  ADD CONSTRAINT `tb_pendapatan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD CONSTRAINT `tb_pengeluaran_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`),
  ADD CONSTRAINT `tb_pengeluaran_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `tb_penggajian`
--
ALTER TABLE `tb_penggajian`
  ADD CONSTRAINT `tb_penggajian_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penggajian_ibfk_2` FOREIGN KEY (`kd_absen`) REFERENCES `tb_kehadiran` (`kd_absen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_permintaan`
--
ALTER TABLE `tb_permintaan`
  ADD CONSTRAINT `tb_permintaan_ibfk_1` FOREIGN KEY (`kd_gaji`) REFERENCES `tb_penggajian` (`kd_gaji`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_permintaan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
