-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Nov 2019 pada 06.50
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asramadb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `nim` char(12) DEFAULT NULL,
  `pass_foto` char(1) DEFAULT NULL,
  `surat_pernyataan` char(1) DEFAULT NULL,
  `ktp_penghuni` char(1) DEFAULT NULL,
  `ktp_ayah` char(1) DEFAULT NULL,
  `ktp_ibu` char(1) DEFAULT NULL,
  `kartu_keluarga` char(1) DEFAULT NULL,
  `kwitansi_daftar` char(1) DEFAULT NULL,
  `kwitansi_karakter` char(1) DEFAULT NULL,
  `surat_dokter` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fakultas` char(2) NOT NULL,
  `nama_fakultas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hobi`
--

CREATE TABLE `tbl_hobi` (
  `nim` char(12) DEFAULT NULL,
  `ket_hobi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jalurmasuk`
--

CREATE TABLE `tbl_jalurmasuk` (
  `id_jalurmasuk` char(1) NOT NULL,
  `ket_jalurmasuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` char(3) NOT NULL,
  `id_fakultas` char(2) DEFAULT NULL,
  `ket_jurusan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelamin`
--

CREATE TABLE `tbl_kelamin` (
  `id_kelamin` char(1) NOT NULL,
  `ket_kelamin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id_level` char(4) NOT NULL,
  `ket_level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_level`
--

INSERT INTO `tbl_level` (`id_level`, `ket_level`) VALUES
('100', 'Pendaftar'),
('1337', 'Administrator'),
('999', 'Musahil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `username` varchar(32) NOT NULL,
  `id_level` char(4) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_created` datetime DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`username`, `id_level`, `password`, `user_created`, `photo`) VALUES
('admin', '1337', '21232f297a57a5a743894a0e4a801fc3', '2019-11-06 00:00:00', 'admin.jpg'),
('M170411100061', '100', '9c66f75befa26d06779a8db1a1518061', '2019-11-06 00:00:00', 'musahil.jpg'),
('P170411100061', '999', 'narko', '2019-11-06 00:00:00', 'pendaftar.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_musahil`
--

CREATE TABLE `tbl_musahil` (
  `nim_musahil` char(12) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_orangtua`
--

CREATE TABLE `tbl_orangtua` (
  `nim` char(12) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `telp_ayah` varchar(16) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `telp_ibu` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_organisasi`
--

CREATE TABLE `tbl_organisasi` (
  `nim` char(12) DEFAULT NULL,
  `nama_organisasi` varchar(255) DEFAULT NULL,
  `tahun_masuk` char(4) DEFAULT NULL,
  `tahun_selesai` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `nim` char(12) NOT NULL,
  `id_jurusan` char(3) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `id_kelamin` char(1) DEFAULT NULL,
  `id_jalurmasuk` char(1) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` char(10) DEFAULT NULL,
  `no_telp` varchar(16) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kode_kelurahan` varchar(10) DEFAULT NULL,
  `kode_pos` char(5) DEFAULT NULL,
  `tanggal_mendaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_pendidikan` char(2) NOT NULL,
  `ket_pendidikan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prestasi`
--

CREATE TABLE `tbl_prestasi` (
  `nim` char(12) DEFAULT NULL,
  `nama_prestasi` varchar(255) DEFAULT NULL,
  `tahun_prestasi` char(4) DEFAULT NULL,
  `berkas_prestasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayatpendidikan`
--

CREATE TABLE `tbl_riwayatpendidikan` (
  `id_pendidikan` char(2) DEFAULT NULL,
  `nim` char(12) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `tahun_lulus` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayatsakit`
--

CREATE TABLE `tbl_riwayatsakit` (
  `nim` char(12) DEFAULT NULL,
  `nama_penyakit` varchar(255) DEFAULT NULL,
  `ket_penyakit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_validasiberkas`
--

CREATE TABLE `tbl_validasiberkas` (
  `nim` char(12) DEFAULT NULL,
  `pass_foto` char(1) DEFAULT NULL,
  `surat_pernyataan` char(1) DEFAULT NULL,
  `ktp_penghuni` char(1) DEFAULT NULL,
  `ktp_ayah` char(1) DEFAULT NULL,
  `ktp_ibu` char(1) DEFAULT NULL,
  `kartu_keluarga` char(1) DEFAULT NULL,
  `kwitansi_daftar` char(1) DEFAULT NULL,
  `kwitansi_karakter` char(1) DEFAULT NULL,
  `surat_dokter` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD KEY `FK_RELATIONSHIP_14` (`nim`);

--
-- Indeks untuk tabel `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `tbl_hobi`
--
ALTER TABLE `tbl_hobi`
  ADD KEY `FK_RELATIONSHIP_7` (`nim`);

--
-- Indeks untuk tabel `tbl_jalurmasuk`
--
ALTER TABLE `tbl_jalurmasuk`
  ADD PRIMARY KEY (`id_jalurmasuk`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `FK_RELATIONSHIP_4` (`id_fakultas`);

--
-- Indeks untuk tabel `tbl_kelamin`
--
ALTER TABLE `tbl_kelamin`
  ADD PRIMARY KEY (`id_kelamin`);

--
-- Indeks untuk tabel `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `FK_RELATIONSHIP_5` (`id_level`);

--
-- Indeks untuk tabel `tbl_musahil`
--
ALTER TABLE `tbl_musahil`
  ADD PRIMARY KEY (`nim_musahil`),
  ADD KEY `FK_RELATIONSHIP_16` (`username`);

--
-- Indeks untuk tabel `tbl_orangtua`
--
ALTER TABLE `tbl_orangtua`
  ADD KEY `FK_RELATIONSHIP_11` (`nim`);

--
-- Indeks untuk tabel `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD KEY `FK_RELATIONSHIP_9` (`nim`);

--
-- Indeks untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `FK_RELATIONSHIP_1` (`id_kelamin`),
  ADD KEY `FK_RELATIONSHIP_2` (`id_jalurmasuk`),
  ADD KEY `FK_RELATIONSHIP_3` (`id_jurusan`),
  ADD KEY `FK_RELATIONSHIP_6` (`username`);

--
-- Indeks untuk tabel `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indeks untuk tabel `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD KEY `FK_RELATIONSHIP_8` (`nim`);

--
-- Indeks untuk tabel `tbl_riwayatpendidikan`
--
ALTER TABLE `tbl_riwayatpendidikan`
  ADD KEY `FK_RELATIONSHIP_12` (`nim`),
  ADD KEY `FK_RELATIONSHIP_17` (`id_pendidikan`);

--
-- Indeks untuk tabel `tbl_riwayatsakit`
--
ALTER TABLE `tbl_riwayatsakit`
  ADD KEY `FK_RELATIONSHIP_10` (`nim`);

--
-- Indeks untuk tabel `tbl_validasiberkas`
--
ALTER TABLE `tbl_validasiberkas`
  ADD KEY `FK_RELATIONSHIP_15` (`nim`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`);

--
-- Ketidakleluasaan untuk tabel `tbl_hobi`
--
ALTER TABLE `tbl_hobi`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`);

--
-- Ketidakleluasaan untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`id_fakultas`) REFERENCES `tbl_fakultas` (`id_fakultas`);

--
-- Ketidakleluasaan untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`id_level`) REFERENCES `tbl_level` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `tbl_musahil`
--
ALTER TABLE `tbl_musahil`
  ADD CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`username`) REFERENCES `tbl_login` (`username`);

--
-- Ketidakleluasaan untuk tabel `tbl_orangtua`
--
ALTER TABLE `tbl_orangtua`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`);

--
-- Ketidakleluasaan untuk tabel `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`);

--
-- Ketidakleluasaan untuk tabel `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`id_kelamin`) REFERENCES `tbl_kelamin` (`id_kelamin`),
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`id_jalurmasuk`) REFERENCES `tbl_jalurmasuk` (`id_jalurmasuk`),
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`id_jurusan`) REFERENCES `tbl_jurusan` (`id_jurusan`),
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`username`) REFERENCES `tbl_login` (`username`);

--
-- Ketidakleluasaan untuk tabel `tbl_prestasi`
--
ALTER TABLE `tbl_prestasi`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`);

--
-- Ketidakleluasaan untuk tabel `tbl_riwayatpendidikan`
--
ALTER TABLE `tbl_riwayatpendidikan`
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`),
  ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`id_pendidikan`) REFERENCES `tbl_pendidikan` (`id_pendidikan`);

--
-- Ketidakleluasaan untuk tabel `tbl_riwayatsakit`
--
ALTER TABLE `tbl_riwayatsakit`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`);

--
-- Ketidakleluasaan untuk tabel `tbl_validasiberkas`
--
ALTER TABLE `tbl_validasiberkas`
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`nim`) REFERENCES `tbl_pendaftaran` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
