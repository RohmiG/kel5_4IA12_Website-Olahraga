-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 08:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `informasi_olahraga`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `berita_id` varchar(36) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`berita_id`, `judul`, `isi`) VALUES
('5ef4b609-caed-4969-bce7-d2d724117b10', 'Hasil Indonesia Open 2022: Berlangsung Sengit dan Hampir Menang', 'Ganda putra Indonesia, Pramudya Kusumawardana/Yeremia Erich Yoche Yacob Rambitan, harus merelakan slot semifinal Indonesia Open 2022 kepada ganda putra Malaysia, Aaron Chia/Soh Wooi Yik. Hampir saja menang di gim ketiga, cedera yang dialami Yeremia membuat pasangan Indonesia itu kalah meski sempat melanjutkan pertandingan. Pramudya/Yeremia kalah 21-14, 12-21, 20-22 dalam perempat final Indonesia Open 2022 di Istora Gelora Bung Karno, Senayan, Jumat (17/6/2022)\r\n\r\nPramudya/Yeremia terlibat pertarungan yang cukup sengit pada awal gim pertama laga perempat final ganda putra Indonesia Open 2022 ini. Meski sempat unggul 2-0 lebih dulu, pasangan Malaysia mampu menjaga jarak dengan hanya tertinggal 1-2 poin saja.');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `kontak_id` varchar(36) NOT NULL,
  `no_telp` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `facebook` varchar(32) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`kontak_id`, `no_telp`, `email`, `facebook`, `alamat`) VALUES
('4d3d9961-f3ae-4886-b318-bd133e373ce2', 'xxx-xxxx-xxxx', 'info_olahraga@gmail.com', 'info_olahraga', 'Depok');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `logo_id` varchar(36) NOT NULL,
  `file_name` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`logo_id`, `file_name`) VALUES
('68123721-5235-43e3-b2de-d536f7a7df6e', '484cfc540b22a243190c76b8204e3109.png');

-- --------------------------------------------------------

--
-- Table structure for table `olahraga`
--

CREATE TABLE `olahraga` (
  `olahraga_id` varchar(36) NOT NULL,
  `judulBesar` varchar(50) NOT NULL,
  `judulKecil` varchar(32) DEFAULT NULL,
  `urlimage` varchar(100) DEFAULT NULL,
  `isi` text NOT NULL,
  `post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `olahraga`
--

INSERT INTO `olahraga` (`olahraga_id`, `judulBesar`, `judulKecil`, `urlimage`, `isi`, `post`) VALUES
('0dcba5ae-0fca-4e9a-a5ca-b533bd6e5a6c', 'Bulu tangkis', 'dalam bahasa inggris \"Badminton\"', 'http://localhost\\informasi_olahraga\\assets\\img\\olahraga\\3.jpg', '<p><a href=\"https://id.wikipedia.org/wiki/Bulu_tangkis\" title=\"Bulu tangkis\">Bulu tangkis</a>&nbsp;adalah olahraga yang paling sukses di Indonesia. Indonesia telah memenangkan medali emas pada bulu tangkis pada setiap&nbsp;<a href=\"https://id.wikipedia.org/wiki/Olimpiade\" title=\"Olimpiade\">Olimpiade</a>&nbsp;sejak bulu tangkis dimasukan pada Olimpiade pada tahun 1992, kecuali edisi 2012. Pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/Olimpiade_1992\" title=\"Olimpiade 1992\">1992</a>, medali emas dimenangkan oleh&nbsp;<a href=\"https://id.wikipedia.org/wiki/Alan_Budikusuma\" title=\"Alan Budikusuma\">Alan Budikusuma</a>&nbsp;pada tunggal putra, dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Susi_Susanti\" title=\"Susi Susanti\">Susi Susanti</a>&nbsp;pada tunggal putri. Pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/Olimpiade_1996\" title=\"Olimpiade 1996\">1996</a>&nbsp;<a href=\"https://id.wikipedia.org/wiki/Ricky_Subagja\" title=\"Ricky Subagja\">Ricky Subagja</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Rexy_Mainaky\" title=\"Rexy Mainaky\">Rexy Mainaky</a>&nbsp;memenangkan medali emas pada ganda putra. Pada&nbsp;<a href=\"https://id.wikipedia.org/wiki/Olimpiade_2000\" title=\"Olimpiade 2000\">2000</a>&nbsp;<a href=\"https://id.wikipedia.org/wiki/Candra_Wijaya\" title=\"Candra Wijaya\">Candra Wijaya</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tony_Gunawan\" title=\"Tony Gunawan\">Tony Gunawan</a>&nbsp;memenangkan medali emas pada ganda putra. Sedangkan pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/Olimpiade_2004\" title=\"Olimpiade 2004\">2004</a>&nbsp;<a href=\"https://id.wikipedia.org/wiki/Taufik_Hidayat\" title=\"Taufik Hidayat\">Taufik Hidayat</a>&nbsp;memenangkan medali emas pada tunggal putra. Lalu Tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/Olimpiade_2008\" title=\"Olimpiade 2008\">2008</a>&nbsp;Indonesia kembali meraih medali emas di sektor ganda putra yang diraih&nbsp;<a href=\"https://id.wikipedia.org/wiki/Markis_Kido\" title=\"Markis Kido\">Markis Kido</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Hendra_Setiawan\" title=\"Hendra Setiawan\">Hendra Setiawan</a>. Di Olimpiade Rio&nbsp;<a href=\"https://id.wikipedia.org/wiki/Olimpiade_Musim_Panas_2016\" title=\"Olimpiade Musim Panas 2016\">2016</a>&nbsp;pertama kalinya ganda campuran Indonesia meraih medali emas yang dimenangkan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tontowi_Ahmad\" title=\"Tontowi Ahmad\">Tontowi Ahmad</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Liliyana_Natsir\" title=\"Liliyana Natsir\">Liliyana Natsir</a>&nbsp;setelah menumbangkan pasangan asal&nbsp;<a href=\"https://id.wikipedia.org/wiki/Malaysia\" title=\"Malaysia\">Malaysia</a>. Terbaru, pada&nbsp;<a href=\"https://id.wikipedia.org/wiki/Olimpiade_Tokyo_2020\" title=\"Olimpiade Tokyo 2020\">Olimpiade Tokyo 2020</a>&nbsp;(diselenggarakan pada Juli - Agustus 2021), pasangan ganda putri&nbsp;<a href=\"https://id.wikipedia.org/wiki/Greysia_Polii\" title=\"Greysia Polii\">Greysia Polii</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Apriyani_Rahayu\" title=\"Apriyani Rahayu\">Apriyani Rahayu</a>&nbsp;berhasil meraih medali emas setelah menumbangkan pasangan unggulan asal China.</p>\r\n\r\n<p>Atlet bulu tangkis Indonesia telah bermain pada&nbsp;<a href=\"https://id.wikipedia.org/wiki/Indonesia_Terbuka\" title=\"Indonesia Terbuka\">Indonesia Terbuka</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Kejuaraan_Bulutangkis_Inggris_Terbuka\" title=\"Kejuaraan Bulutangkis Inggris Terbuka\">Kejuaraan Bulutangkis Inggris Terbuka</a>&nbsp;dan kejuaraan internasional lainnya, termasuk&nbsp;<a href=\"https://id.wikipedia.org/wiki/Olimpiade_musim_panas\" title=\"Olimpiade musim panas\">Olimpiade musim panas</a>&nbsp;sejak bulu tangkis dimainkan lagi pada&nbsp;<a href=\"https://id.wikipedia.org/wiki/Olimpiade_1992\" title=\"Olimpiade 1992\">Olimpiade 1992</a>.&nbsp;<a href=\"https://id.wikipedia.org/wiki/Rudy_Hartono\" title=\"Rudy Hartono\">Rudy Hartono</a>&nbsp;adalah bintang bulu tangkis yang paling terkenal, yang telah memenangkan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Piala_Thomas\" title=\"Piala Thomas\">Piala Thomas</a>&nbsp;sebanyak enam kali serta&nbsp;<a href=\"https://id.wikipedia.org/wiki/All_England\" title=\"All England\">All England</a>&nbsp;sebanyak delapan kali .<a href=\"https://id.wikipedia.org/wiki/Olahraga_di_Indonesia#cite_note-2\">[2]</a></p>\r\n\r\n<p>Dari semua kejuaraan, Indonesia sangat sukses memenangkan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Piala_Thomas\" title=\"Piala Thomas\">Piala Thomas</a>&nbsp;(Kejuaraan Bulu Tangkis Pria), dan memenangkan sebanyak 14 piala. Sebagai tambahan, Indonesia telah memenangkan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Piala_Uber\" title=\"Piala Uber\">Piala Uber</a>&nbsp;(Kejuaraan Bulu Tangkis Wanita) sebanyak 3 kali. Sedangkan untuk&nbsp;<a href=\"https://id.wikipedia.org/wiki/Piala_Sudirman\" title=\"Piala Sudirman\">Piala Sudirman</a>&nbsp;(Kejuaraan Bulu Tangkis Campuran) Indonesia hanya berhasil memenangkan 1 piala saja.</p>\r\n', '1656261961'),
('8a099070-6e94-445d-b908-0432b273923c', 'Basket', 'dalam bahasa inggris ', 'http://localhost/informasi_olahraga\\assets\\img\\olahraga\\4.jpg', '<p>Basket merupakan salah satu olahraga yang populer di kalangan anak muda Indonesia.&nbsp;<a href=\"https://id.wikipedia.org/wiki/Liga_Bola_Basket_Nasional_Indonesia\" title=\"Liga Bola Basket Nasional Indonesia\">Liga Bola Basket Nasional Indonesia</a>, merupakan liga bola basket pria unggulan di Indonesia. Dengan 10 klub yang bersaing dari seluruh negeri. Kompetisi ini dimulai sebagai Indonesian Basketball League (IBL) pada 2003. Pada 2010, Perbasi menunjuk DBL Indonesia untuk menangani kompetisi dan mengubah nama liga ke National Basketball League (NBL). Kini, Indonesia dan Filipina adalah salah satu kekuatan basket di Asia Tenggara. Sukses besar tim nasional basket Indonesia adalah ketIka meraih emas pada&nbsp;<a href=\"https://id.wikipedia.org/w/index.php?title=Kejuaraan_Basket_Asia_Tenggara&amp;action=edit&amp;redlink=1\" title=\"Kejuaraan Basket Asia Tenggara (halaman belum tersedia)\">Kejuaraan Basket Asia Tenggara</a>&nbsp;tahun 1996.</p>\r\n', '1656417263'),
('c8835833-96a4-42d6-af31-7b9a38cf120f', 'Sepak bola', 'Sepak bola adalah olahraga yang ', 'http://localhost/informasi_olahraga/assets/img/olahraga/2.jpg', '<p><a href=\"https://id.wikipedia.org/wiki/Sepak_bola\" title=\"Sepak bola\">Sepak bola</a>&nbsp;adalah olahraga yang paling populer di&nbsp;<a href=\"https://id.wikipedia.org/wiki/Indonesia\" title=\"Indonesia\">Indonesia</a>. Olahraga ini dimainkan oleh banyak orang, dari anak-anak sampai dewasa.&nbsp;<a href=\"https://id.wikipedia.org/wiki/Liga_Indonesia\" title=\"Liga Indonesia\">Liga Indonesia</a>&nbsp;sangat terkenal di Indonesia. Beberapa klub terkenalnya adalah&nbsp;<a href=\"https://id.wikipedia.org/wiki/Persija_Jakarta\" title=\"Persija Jakarta\">Persija Jakarta</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Persib_Bandung\" title=\"Persib Bandung\">Persib Bandung</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Persebaya_Surabaya\" title=\"Persebaya Surabaya\">Persebaya Surabaya</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/PSM_Makassar\" title=\"PSM Makassar\">PSM Makassar</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/PSMS_Medan\" title=\"PSMS Medan\">PSMS Medan</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/PSIS_Semarang\" title=\"PSIS Semarang\">PSIS Semarang</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Barito_Putra\" title=\"Barito Putra\">Barito Putra</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Sriwijaya_FC_Palembang\" title=\"Sriwijaya FC Palembang\">Sriwijaya FC Palembang</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Bali_United_F.C.\" title=\"Bali United F.C.\">Bali United</a>,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Persipura_Jayapura\" title=\"Persipura Jayapura\">Persipura Jayapura</a>, dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Arema_Malang\" title=\"Arema Malang\">Arema Malang</a>. Badan sepak bola nasional adalah&nbsp;<a href=\"https://id.wikipedia.org/wiki/PSSI\" title=\"PSSI\">PSSI</a>. Liga Indonesia telah dimulai sejak era&nbsp;<a href=\"https://id.wikipedia.org/wiki/Kolonial_Belanda\" title=\"Kolonial Belanda\">Kolonial Belanda</a>. Pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1993\" title=\"1993\">1993</a>, PSSI mengkombinasikan dua liga menjadi satu, yang kemudian dikenal sebagai&nbsp;<strong>Liga Indonesia</strong>.</p>\r\n\r\n<p>Pada ajang internasional,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tim_nasional_sepak_bola_Indonesia\" title=\"Tim nasional sepak bola Indonesia\">Indonesia</a>&nbsp;sangat miskin pengalaman walaupun merupakan tim&nbsp;<a href=\"https://id.wikipedia.org/wiki/Asia\" title=\"Asia\">Asia</a>&nbsp;pertama yang lolos ke Piala Dunia pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/Piala_Dunia_FIFA_1938\" title=\"Piala Dunia FIFA 1938\">1938</a>&nbsp;(sebagai&nbsp;<a href=\"https://id.wikipedia.org/wiki/Hindia_Belanda\" title=\"Hindia Belanda\">Hindia Belanda</a>). Pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/1956\" title=\"1956\">1956</a>, Indonesia bermain pada ajang&nbsp;<a href=\"https://id.wikipedia.org/wiki/Olimpiade\" title=\"Olimpiade\">Olimpiade</a>&nbsp;dan memainkan pertandingan yang sulit dengan timnas&nbsp;<a href=\"https://id.wikipedia.org/wiki/Uni_Soviet\" title=\"Uni Soviet\">Uni Soviet</a>&nbsp;yang dipimpin oleh kiper&nbsp;<a href=\"https://id.wikipedia.org/wiki/Lev_Yashin\" title=\"Lev Yashin\">Lev Yashin</a>. Indonesia pertama kali masuk ajang&nbsp;<a href=\"https://id.wikipedia.org/wiki/Piala_Asia\" title=\"Piala Asia\">Piala Asia</a>&nbsp;pada tahun&nbsp;<a href=\"https://id.wikipedia.org/wiki/Piala_Asia_AFC_1996\" title=\"Piala Asia AFC 1996\">1996</a>. Dengan menahan imbang&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tim_nasional_sepak_bola_Kuwait\" title=\"Tim nasional sepak bola Kuwait\">Kuwait</a>&nbsp;pada pertandingan pertama, tetapi gagal ketika mereka dikalahkan oleh dua tim kuat yaitu&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tim_nasional_sepak_bola_Korea_Selatan\" title=\"Tim nasional sepak bola Korea Selatan\">Korea Selatan</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tim_nasional_sepak_bola_Uni_Emirat_Arab\" title=\"Tim nasional sepak bola Uni Emirat Arab\">Uni Emirat Arab</a>, membuat timnas Indonesia pulang lebih awal.</p>\r\n\r\n<p>Timnas Indonesia sering sekali ikut dalam&nbsp;<a href=\"https://id.wikipedia.org/wiki/Piala_Asia\" title=\"Piala Asia\">Piala Asia</a>. Pada&nbsp;<a href=\"https://id.wikipedia.org/wiki/Piala_Asia_AFC_2004\" title=\"Piala Asia AFC 2004\">Piala Asia 2004</a>, timnas mencetak kemenangan pertamanya setelah mengalahkan timnas&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tim_nasional_sepak_bola_Qatar\" title=\"Tim nasional sepak bola Qatar\">Qatar</a>, tetapi kejayaan itu harus buyar pada saat timnas berada di ronde ke-dua ketika dikalahkan oleh&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tim_nasional_sepak_bola_Cina\" title=\"Tim nasional sepak bola Cina\">Cina</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tim_nasional_sepak_bola_Bahrain\" title=\"Tim nasional sepak bola Bahrain\">Bahrain</a>. Indonesia secara sukses mengalahkan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tim_nasional_sepak_bola_Bahrain\" title=\"Tim nasional sepak bola Bahrain\">Bahrain</a>&nbsp;pada&nbsp;<a href=\"https://id.wikipedia.org/wiki/Piala_Asia_AFC_2007\" title=\"Piala Asia AFC 2007\">Piala Asia 2007</a>&nbsp;namun kembali gagal setelah dikalahkan oleh dua tim kuat Asia,&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tim_nasional_sepak_bola_Korea_Selatan\" title=\"Tim nasional sepak bola Korea Selatan\">Korea Selatan</a>&nbsp;dan&nbsp;<a href=\"https://id.wikipedia.org/wiki/Tim_nasional_sepak_bola_Arab_Saudi\" title=\"Tim nasional sepak bola Arab Saudi\">Arab Saudi</a>.</p>\r\n', '1656261751');

-- --------------------------------------------------------

--
-- Table structure for table `opening_word`
--

CREATE TABLE `opening_word` (
  `opening_word_id` varchar(36) NOT NULL,
  `title_opening` varchar(50) NOT NULL,
  `word` varchar(255) NOT NULL,
  `url_background` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opening_word`
--

INSERT INTO `opening_word` (`opening_word_id`, `title_opening`, `word`, `url_background`) VALUES
('668b92df-b4d5-468e-ba87-a438aef68830', 'Informasi Olahraga di Indonesia', '<p>Website ini akan memberitahu tentang informasi olahraga yang ada di indonesia</p>\r\n', 'http://localhost/informasi_olahraga/assets/img/opening word/my.jpg'),
('c010ad2f-7a6c-440a-a9de-a6414ede44e6', 'Informasi Olahraga di Indonesia', '<p>Website ini akan memberitahu tentang informasi olahraga yang ada di indonesia</p>\r\n', 'http://localhost/informasi_olahraga/assets/img/opening word/my.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profilweb`
--

CREATE TABLE `profilweb` (
  `profilweb_id` varchar(36) NOT NULL,
  `judul_profilweb` varchar(50) NOT NULL,
  `isi` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profilweb`
--

INSERT INTO `profilweb` (`profilweb_id`, `judul_profilweb`, `isi`) VALUES
('710277b0-26e5-4500-85ca-b71b87aea3c8', 'Informasi Olahraga', '<p><strong>Website Informasi Olahraga</strong></p>\r\n\r\n<p>Adalah tempat dimana informasi olahraga yang ada di indonesia, seperti Basket, Sepak Bola, Badminton, dll.</p>\r\n\r\n<p>Website ini dibuat untuk menyelasaikan tugas Rekayasa Perangkat Lunak.</p>\r\n\r\n<p>Website ini dibuat oleh 4IA12 :  </p>\r\n\r\n<p>Kelompok 5 </p>\r\n\r\n<ol>\r\n <li>Galing Rohmi Dani Santjoyo (52418863)</li>\r\n <li>Mochamad Rizky Lubis (54418173)</li>\r\n <li>Reanaldy Wiriatama (55418958)</li>\r\n</ol>\r\n\r\n<p> </p>\r\n\r\n<p>Gunadarma University </p>\r\n\r\n<p> </p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(36) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` enum('operator','admin','superAdmin') NOT NULL,
  `lastLogin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `level`, `lastLogin`) VALUES
('82829b15-de76-4cfd-9d32-7939584c70a5', 'reza', 'reza', '$2y$10$VLfbO01GIagiidlHYqLU5eaSvZ46XkZ8V/.KOs/pe0H9ULHS4p/Nu', 'superAdmin', '1656252482'),
('a49526ce-c900-4d85-93a4-448581160af9', 'reanaldy', 'reanaldy', '$2y$10$TaA0jWDAzBJXl5rzoiilCOtsMe0WP6il7PoMiuM602zr/qOzKTxki', 'operator', ''),
('c9c29754-0f0f-4fc0-b3d4-8bf7d3952936', 'rizki', 'rizki', '$2y$10$VdVOkwsM.usFMj.4iR/ONeQtyK0QxftEWOjTGqe6KjaIouivrQX5e', 'admin', '1656325586'),
('cb42fcf0-17ac-4139-b6b5-636418b1ff79', 'galing', 'galing', '$2y$10$8oCbTlKKBPaPbqdFr7.0gOjKQthkith5TPx.TcN2LbenmZXiT74E2', 'superAdmin', '1657520038');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`kontak_id`),
  ADD KEY `no_telp` (`no_telp`,`email`,`facebook`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`logo_id`);

--
-- Indexes for table `olahraga`
--
ALTER TABLE `olahraga`
  ADD PRIMARY KEY (`olahraga_id`),
  ADD KEY `urlimage` (`urlimage`);

--
-- Indexes for table `opening_word`
--
ALTER TABLE `opening_word`
  ADD PRIMARY KEY (`opening_word_id`);

--
-- Indexes for table `profilweb`
--
ALTER TABLE `profilweb`
  ADD PRIMARY KEY (`profilweb_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `username` (`username`,`password`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
