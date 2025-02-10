-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 13 Nov 2024 pada 05.38
-- Versi server: 5.7.24
-- Versi PHP: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ujian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `benar` varchar(20) NOT NULL,
  `salah` varchar(20) NOT NULL,
  `kosong` varchar(20) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id`, `id_user`, `benar`, `salah`, `kosong`, `nilai`, `tgl`, `status`) VALUES
(10, 'NIS005', '4', '6', '0', '40.0', '2024-11-12', 'GAGAL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengaturan`
--

CREATE TABLE `tbl_pengaturan` (
  `id` int(11) NOT NULL,
  `nama_ujian` varchar(100) NOT NULL,
  `waktu` int(11) NOT NULL,
  `nilai_minimal` int(11) NOT NULL,
  `peraturan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengaturan`
--

INSERT INTO `tbl_pengaturan` (`id`, `nama_ujian`, `waktu`, `nilai_minimal`, `peraturan`) VALUES
(1, 'semester', 4, 70, '&lt;p&gt;1. kerjakanlah soal ini dengan jujur&lt;/p&gt;&lt;p&gt;2. waktu yang diberikan sebanyak 20 menit&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `kunci_jawaban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_soal`
--

INSERT INTO `tbl_soal` (`id`, `pertanyaan`, `gambar`, `a`, `b`, `c`, `d`, `kunci_jawaban`) VALUES
(3, '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt;Audrey memiliki pita sepanjang &lt;/span&gt;1,5&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; m dan Lucky memiliki pita &lt;/span&gt;4.500&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; cm. Perbandingan panjang pita Audrey dan Lucky adalah....&lt;/span&gt;&lt;/p&gt;', '', '1 : 45', '1 : 30', '1 : 3', '1 : 2', 'B'),
(4, '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt;Pak Yahya dan Pak Anton masing-masing membeli sebungkus makanan ikan dengan merek sama, tetapi beratnya berbeda. Kemasan yang dibeli Pak Yahya tertulis berat &lt;/span&gt;1.200&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; gram dan kemasan yang dibeli Pak Anton tertulis seberat &lt;/span&gt;1,5&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; kg. Perbandingan berat pakan ikan yang dibeli Pak Yahya dan Pak Anton adalah ....&lt;/span&gt;&lt;/p&gt;', '', '4 : 5', '3 : 1', '3 : 2', '2 : 3', 'A'),
(5, '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt;Sebuah mobil menghabiskan &lt;/span&gt;8&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; liter bensin untuk menempuh jarak &lt;/span&gt;56&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; km. Jika jarak yang ditempuh &lt;/span&gt;84&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; km, maka bensin yang diperlukan adalah ...&lt;/span&gt;&lt;/p&gt;', '', '5,5 liter', '7,0 liter', '10,5 liter', '12,0 liter', 'D'),
(6, '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt;Persediaan makanan untuk &lt;/span&gt;15&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; ekor kambing habis setelah &lt;/span&gt;24&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; hari. Jika &lt;/span&gt;3&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; ekor kambing dijual, maka persediaan makanan tersebut akan habis setelah ...&lt;/span&gt;&lt;/p&gt;', '', '30 hari', '40 hari', '45 hari', '54 hari', 'A'),
(7, '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt;Sebuah panti asuhan memiliki persediaan beras yang cukup untuk &lt;/span&gt;20&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; orang selama &lt;/span&gt;15&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; hari. Jika penghuni panti asuhan bertambah &lt;/span&gt;5&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; orang, persediaan beras akan habis dalam waktu ...&lt;/span&gt;&lt;/p&gt;', '', '8 hari', '10 hari', '12 hari', '20 hari', 'C'),
(8, '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt;Sebuah mobil dengan kecepatan &lt;/span&gt;60&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; km/jam memerlukan waktu &lt;/span&gt;3&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; jam &lt;/span&gt;30&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; menit. Jika kecepatan mobil &lt;/span&gt;90&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; km/jam, waktu yang diperlukan untuk menempuh jarak yang sama adalah ...&lt;/span&gt;&lt;/p&gt;', '', '  1 jam 30 menit', '2 jam 15 menit', '2 jam 20 menit', '2 jam 30 menit', 'C'),
(9, '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt;Diketahui &lt;/span&gt;45&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; liter beras cukup untuk makan &lt;/span&gt;5&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; orang dalam &lt;/span&gt;10&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; hari. Dalam suatu acara kemah, dihabiskan &lt;/span&gt;72&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; liter beras dalam sehari. Dengan anggapan bahwa setiap orang memiliki porsi makan yang sama besar, banyaknya orang yang mengikuti acara kemah tersebut adalah ...&lt;/span&gt;&lt;/p&gt;', '', '8 orang', '16 orang', '80 orang', '160 orang', 'C'),
(10, '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt;Suatu pekerjaan dapat diselesaikan oleh &lt;/span&gt;50&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; orang dalam &lt;/span&gt;8&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; bulan. Agar pekerjaan tersebut dapat diselesaikan dalam &lt;/span&gt;5&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; bulan, diperlukan tambahan pekerja sebanyak ....&lt;/span&gt;&lt;/p&gt;', '', '30 orang', '42 orang', '45 orang', '80 orang', 'A'),
(11, '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt;Suatu pekerjaan akan selesai dikerjakan oleh &lt;/span&gt;24&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; orang dalam &lt;/span&gt;20&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; hari. Agar pekerjaan tersebut dapat diselesaikan selama &lt;/span&gt;15&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; hari, banyaknya tambahan pekerja yang diperlukan adalah ....&lt;/span&gt;&lt;/p&gt;', '', '1 orang', ' 3 orang', '6 orang', '9 orang', 'B'),
(12, '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt;Enam tahun yang lalu, jumlah umur Owen dan ibunya adalah &lt;/span&gt;60&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt; tahun dengan perbandingan &lt;/span&gt;5:7&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(51,51,51);&quot;&gt;. Umur Owen sekarang adalah....&lt;/span&gt;&lt;/p&gt;', '', '25 tahun', '31 tahun', '32 tahun', '35 tahun', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1 = administrator, 2 = siswa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_id`, `fullname`, `username`, `email`, `password`, `role`) VALUES
(1, '199010052022061001', 'administrator', 'admin', 'admin@mail.com', '$2y$10$B2afCnB3KI9MILPpRRvLReVUx0lmCnW6qWWMtlWXUfM9sAxLIrA2i', 1),
(2, 'NIS003', 'Bima Arif adi Perdana', 'bima', 'bima@mail.com', '$2y$10$6H7wOkTtj8WhdzhZicNTZOzULBlTfCSVTB339AsVbH7eqjdlLxgPu', 2),
(3, 'NIS005', 'muhammad arif', 'arif', 'arif@mail.com', '$2y$10$DATL7CS5s/23rLVV40eSX.wsY22Tx8qIsuz2J22hKmQCXY2C9TLeG', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
