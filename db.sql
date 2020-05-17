-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Apr 2020 pada 16.17
-- Versi server: 10.3.22-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finvmwbq_techpedia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activate`
--

CREATE TABLE `activate` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `limitnya` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `activate`
--

INSERT INTO `activate` (`id`, `id_user`, `token`, `limitnya`, `date`) VALUES
(11, 11, '2b62af0d988608c8a2037e43234f4740', 1, 1583413804),
(12, 12, 'cf6c9baa76d75cf7a2bf5305b91c34ce', 1, 1583413868);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `github` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `linkedin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id_admin`, `username`, `telepon`, `email`, `position`, `password`, `foto_profil`, `id_role`, `is_active`, `github`, `twitter`, `facebook`, `instagram`, `linkedin`) VALUES
(1, 'Yudas1337', '081359158535', 'superadmin@gmail.com', 'Founder of TechPedia', '$2y$10$apBHDKc2P5VSlKoaPmu6.ennntyiguICzYvu.Rv.S0gelpCJVPo4O', '1573826331gitar.jpg', 1, 1, 'https://github.com/Yudas1337', '', 'https://www.facebook.com/yudas1337/', '', 'https://www.linkedin.com/in/yudas1337/'),
(2, 'root@samjreng', '082140572544', 'lukmanhakim@gmail.com', 'Mentor di Kanesa Elearning', '$2y$10$pkMj2vbATWE87m8pvI25buBmjy5hT7StUQkZT18E6iYppDIk/iiMS', '1571124612lukman.jpeg', 2, 1, '', NULL, NULL, NULL, NULL),
(4, 'Ajid Stark', '083133182289', 'ajid@gmail.com', 'Founder of ForStone', '$2y$10$YTiAtiIYtRXa9gT3gHXFUuUld/trLfp5y10.GcbNZYw258RqZrh22', '15789775011578489723ajidStark.jpeg', 2, 1, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_role`
--

CREATE TABLE `admin_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_role`
--

INSERT INTO `admin_role` (`id_role`, `nama_role`) VALUES
(1, 'SuperAdmin'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `apps`
--

CREATE TABLE `apps` (
  `id_apps` int(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahasa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apps_uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `apps`
--

INSERT INTO `apps` (`id_apps`, `foto`, `icon`, `bahasa`, `kategori`, `apps_uri`, `created_at`, `updated_at`) VALUES
(1, 'php.jpg', 'php.png', 'PHP', 'Web', 'php', '2019-08-18 04:06:10', '2019-08-23 20:31:02'),
(2, 'python.jpg', 'python.png', 'Python', 'Data', 'python', '2019-08-18 04:06:10', '2019-08-18 04:06:23'),
(3, 'html.jpg', '1570537179icon_html.png', 'HTML', 'Web', 'html', '2019-08-18 04:06:10', '2019-08-18 04:06:23'),
(4, 'js.jpg', 'js.png', 'Vanilla JavaScript', 'Web', 'vanilla-javascript', '2019-08-18 04:06:10', '2019-08-18 04:06:23'),
(5, 'css.jpg', 'css.png', 'CSS', 'Web', 'css', '2019-08-18 04:06:10', '2019-08-18 04:06:23'),
(6, 'jquery.jpg', 'jquery.png', 'Jquery', 'Web', 'jquery', '2019-08-18 04:06:10', '2019-08-19 04:54:13'),
(7, 'ajax.jpg', 'ajax.png', 'Ajax', 'Web', 'ajax', '2019-08-18 04:06:10', '2019-08-18 04:06:23'),
(8, '1570345895ci.jpg', '1570538070ci.png', 'CodeIgniter', 'Web', 'codeigniter', '2019-09-21 17:51:50', '2019-09-21 17:51:50'),
(9, 'noimage.jpg', '1570537108laravel.png', 'Laravel', 'Web', 'laravel', '2019-09-21 17:51:50', '2019-09-21 17:51:50'),
(10, 'noimage.jpg', 'java_android.jpg', 'Java Android', 'Mobile', 'java-android', '2019-09-21 17:55:02', '2019-09-21 17:55:02'),
(11, 'noimage.jpg', '1577197635kotlin.jpeg', 'Kotlin', 'Mobile', 'kotlin', '2019-09-21 17:55:02', '2019-09-21 17:55:02'),
(12, 'react.png', 'react_native.png', 'React Native', 'Mobile', 'react-native', '2019-09-21 17:55:57', '2019-09-21 17:55:57'),
(13, 'cryptography.jpg', 'ic_crypto.png', 'Crypto', 'Security', '', '2019-09-21 17:59:36', '2019-09-21 17:59:36'),
(14, 'forensics_home.jpg', 'ic_forensics.png', 'Forensics', 'Security', '', '2019-09-21 17:59:36', '2019-09-21 17:59:36'),
(15, 'reverse.jpg', 'ic_reverse.png', 'Reverse Engineering', 'Security', '', '2019-09-21 17:59:36', '2019-09-21 17:59:36'),
(16, 'web_exploit.jpg', 'icweb_exploit.png', 'Web Exploitation', 'Security', '', '2019-09-29 11:30:58', '2019-09-29 11:30:58'),
(17, '1569766477ruby.jpg', '1569766477ruby.png', 'Ruby on Rails', 'Web', 'ruby-on-rails', '2019-09-29 14:14:37', '2019-09-29 14:14:37'),
(18, '1569766718c_sharp.jpg', '1569766718c_sharp.png', 'C#', 'Desktop', 'c#', '2019-09-29 14:18:38', '2019-09-29 14:18:38'),
(19, '1569767121swift2.png', '1569767121swift.png', 'Swift', 'Mobile', 'swift', '2019-09-29 14:25:21', '2019-09-29 14:25:21'),
(20, '1569767231c2.png', '1569767231c.png', 'C', 'Desktop', 'c', '2019-09-29 14:27:11', '2019-09-29 14:27:11'),
(21, '1569767346sql.jpg', '1569767346sql.png', 'MySQL', 'Data', 'mysql', '2019-09-29 14:29:06', '2019-09-29 14:29:06'),
(22, '1569767508flutter2.jpg', '1569767508flutter.png', 'Flutter', 'Mobile', 'flutter', '2019-09-29 14:31:48', '2019-09-29 14:31:48'),
(23, '1569767664vue2.png', '1569767664vue.png', 'Vue JS', 'Web', 'vue-js', '2019-09-29 14:34:24', '2019-09-29 14:34:24'),
(24, '1569767742node2.png', '1569767742node.png', 'Express JS', 'Web', 'express-js', '2019-09-29 14:35:42', '2019-09-29 14:35:42'),
(25, '1569767852angular2.jpg', '1570538670angular.png', 'Angular JS', 'Web', 'angular-js', '2019-09-29 14:37:32', '2019-09-29 14:37:32'),
(26, '1569767935bs2.png', '1569767935bs.png', 'Bootstrap', 'Web', 'bootstrap', '2019-09-29 14:38:55', '2019-09-29 14:38:55'),
(27, '1569768398perl2.jpg', '1569768398perl.png', 'Perl', 'Web', 'perl', '2019-09-29 14:46:38', '2019-09-29 14:46:38'),
(28, '1569769637c_plus.jpg', '1569769637c_plus.png', 'C++', 'Desktop', 'c++', '2019-09-29 15:07:17', '2019-09-29 15:07:17'),
(29, '1570023227react2.png', 'react_native.png', 'React JS', 'Web', 'react-js', '2019-10-02 13:33:47', '2019-10-02 13:33:47'),
(30, '1570023605vb2.png', '1570023605vb.png', 'Visual Basic', 'Desktop', 'visual-basic', '2019-10-02 13:40:05', '2019-10-02 13:40:05'),
(31, 'noimage.jpg', 'java.jpg', 'Java Desktop', 'Desktop', 'java-desktop', '2019-09-21 17:55:02', '2019-09-21 17:55:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `appsdetail`
--

CREATE TABLE `appsdetail` (
  `id_appsdetail` int(11) NOT NULL,
  `id_apps` int(11) NOT NULL,
  `apps_detail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `appsdetail`
--

INSERT INTO `appsdetail` (`id_appsdetail`, `id_apps`, `apps_detail`) VALUES
(1, 1, 'Backend Native'),
(2, 8, 'PHP Backend Web Framework'),
(4, 4, 'Frontend Native'),
(6, 9, 'PHP Backend Web Framework'),
(7, 5, 'Frontend Native for Web Styling'),
(8, 26, 'CSS Frontend Web Framework'),
(9, 29, 'Javascript Frontend Web Framework'),
(10, 23, 'Javascript Frontend Web Framework'),
(11, 25, 'Javascript Frontend Web Framework'),
(12, 6, 'Javascript Library'),
(13, 24, 'Javascript Backend Web Framework'),
(14, 3, 'Frontend Web Markup Language'),
(15, 7, 'Asynchronous JavaScript'),
(16, 21, 'SQL Database Management'),
(17, 2, 'Data Science');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `id_katArtikel` int(11) NOT NULL,
  `isi` varchar(10000) NOT NULL,
  `foto_artikel` varchar(255) NOT NULL,
  `artikel_uri` varchar(255) NOT NULL,
  `statusArtikel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `tanggal`, `id_katArtikel`, `isi`, `foto_artikel`, `artikel_uri`, `statusArtikel`) VALUES
(1, 'Cara atasi apache di xampp error', '2020-01-01', 1, '<div class=\"separator\" style=\"clear: both; text-align: center;\">\r\n<a href=\"https://3.bp.blogspot.com/-gno821kNkAI/XOUoi6BSPLI/AAAAAAAABxA/2EwYcjme-kcfNV2CeFk10M4BEx0i9BXgQCLcBGAs/s1600/xampperror.png\" imageanchor=\"1\" style=\"margin-left: 1em; margin-right: 1em;\"><img alt=\"Index Attacker\" border=\"0\" data-original-height=\"558\" data-original-width=\"800\" height=\"223\" src=\"https://3.bp.blogspot.com/-gno821kNkAI/XOUoi6BSPLI/AAAAAAAABxA/2EwYcjme-kcfNV2CeFk10M4BEx0i9BXgQCLcBGAs/s320/xampperror.png\" title=\"Index Attacker\" width=\"320\" /></a></div>\r\n<div class=\"separator\" style=\"clear: both; text-align: center;\">\r\n<br /></div>\r\n<br />\r\n<br />\r\nHai gan kembali lagi di <b>Index Attacker</b>, kali ini gw akan memberi tutorial tentang cara atasi atau cara memperbaiki Xampp error. Pernahkah kamu mengalami error saat mau menghidupkan apache di xampp ?Contohnya seperti ini<br />\r\n<br />\r\n<div class=\"separator\" style=\"clear: both; text-align: center;\">\r\n<a href=\"https://4.bp.blogspot.com/-KBgYLrYR2uY/XIr-JuTFVeI/AAAAAAAAADQ/Qjhh8IaCOHMV3Y1qf8dgp7ZCDO3UMnlngCLcBGAs/s1600/Screenshot%2B%2528184%2529.png\" imageanchor=\"1\" style=\"margin-left: 1em; margin-right: 1em;\"><img alt=\"Index Attacker - Cara atasi apache di xampp error ( tidak bisa di start )\" border=\"0\" data-original-height=\"444\" data-original-width=\"704\" height=\"201\" src=\"https://4.bp.blogspot.com/-KBgYLrYR2uY/XIr-JuTFVeI/AAAAAAAAADQ/Qjhh8IaCOHMV3Y1qf8dgp7ZCDO3UMnlngCLcBGAs/s320/Screenshot%2B%2528184%2529.png\" title=\"Index Attacker - Cara atasi apache di xampp error ( tidak bisa di start )\" width=\"320\" /></a></div>\r\n<br />\r\nJangan khawatir, ikuti langkah langkah dibawah ini untuk memperbaiki nya. Okelah langsung saja ke tutorial nya.<br />\r\n<br />\r\n<h3>\r\nCara mengatasi Xampp error di Windows</h3>\r\n1. Buka software XAMPP mu<br />\r\n2. Klik tombol config pada baris Apache 2 lalu klik <b>Apache2(httpd.conf)&nbsp;</b>seperti ini<br />\r\n<br />\r\n<div class=\"separator\" style=\"clear: both; text-align: center;\">\r\n<a href=\"https://3.bp.blogspot.com/-RJm6N_aO8JY/XIr-4cTVBlI/AAAAAAAAADY/0i3tmY0qBJ4NtS4SHXDoogcYY1zscL9zwCLcBGAs/s1600/Screenshot%2B%2528185%2529.png\" imageanchor=\"1\" style=\"margin-left: 1em; margin-right: 1em;\"><img alt=\"Index Attacker - Cara atasi apache di xampp error ( tidak bisa di start )\" border=\"0\" data-original-height=\"459\" data-original-width=\"799\" height=\"183\" src=\"https://3.bp.blogspot.com/-RJm6N_aO8JY/XIr-4cTVBlI/AAAAAAAAADY/0i3tmY0qBJ4NtS4SHXDoogcYY1zscL9zwCLcBGAs/s320/Screenshot%2B%2528185%2529.png\" title=\"Index Attacker - Cara atasi apache di xampp error ( tidak bisa di start )\" width=\"320\" /></a></div>\r\n<br />\r\n3. Lalu nanti akan terbuka file <b>httpd.conf</b> nya di notepad, lalu klik edit dan pilih replace atau juga bisa dengan menekan tombol <b>ctrl + h</b><br />\r\n<br />\r\n<div class=\"separator\" style=\"clear: both; text-align: center;\">\r\n<a href=\"https://3.bp.blogspot.com/-DnLU3y8YmGg/XIr_FakdAiI/AAAAAAAAADc/u1Qa2ZspengXnIV-aeNnaN3mfUUbDJ7ggCLcBGAs/s1600/Screenshot%2B%2528192%2529.png\" imageanchor=\"1\" style=\"margin-left: 1em; margin-right: 1em;\"><img alt=\"Index Attacker - Cara atasi apache di xampp error ( tidak bisa di start )\" border=\"0\" data-original-height=\"479\" data-original-width=\"983\" height=\"155\" src=\"https://3.bp.blogspot.com/-DnLU3y8YmGg/XIr_FakdAiI/AAAAAAAAADc/u1Qa2ZspengXnIV-aeNnaN3mfUUbDJ7ggCLcBGAs/s320/Screenshot%2B%2528192%2529.png\" title=\"Index Attacker - Cara atasi apache di xampp error ( tidak bisa di start )\" width=\"320\" /></a></div>\r\n<br />\r\n4. Lalu pada bagian Find what ketikkan 443 dan pada bagian Replace with ketikkan 4499<br />\r\n<br />\r\n<div class=\"separator\" style=\"clear: both; text-align: center;\">\r\n<a href=\"https://4.bp.blogspot.com/-gMD1QjkZzs8/XIr_xfQVqPI/AAAAAAAAADo/0n1QZugPP00KzvwPSRqwyR_vtRMUtsilwCLcBGAs/s1600/Screenshot%2B%2528193%2529.png\" imageanchor=\"1\" style=\"margin-left: 1em; margin-right: 1em;\"><img alt=\"Index Attacker - Cara atasi apache di xampp error ( tidak bisa di start )\" border=\"0\" data-original-height=\"442\" data-original-width=\"967\" height=\"146\" src=\"https://4.bp.blogspot.com/-gMD1QjkZzs8/XIr_xfQVqPI/AAAAAAAAADo/0n1QZugPP00KzvwPSRqwyR_vtRMUtsilwCLcBGAs/s320/Screenshot%2B%2528193%2529.png\" title=\"Index Attacker - Cara atasi apache di xampp error ( tidak bisa di start )\" width=\"320\" /></a></div>\r\n<br />\r\n5. Lalu save file nya dengan menekan tombol <b>ctrl + s </b>atau juga bisa dengan klik tab file dan pilih save<br />\r\n<br />\r\n<div class=\"separator\" style=\"clear: both; text-align: center;\">\r\n<a href=\"https://1.bp.blogspot.com/-xQJaEPgb5tk/XIr_yJTxUKI/AAAAAAAAADs/ET8tbSTpSKQRjkh38d89MikzM_kC4mhnwCLcBGAs/s1600/Screenshot%2B%2528194%2529.png\" imageanchor=\"1\" style=\"margin-left: 1em; margin-right: 1em;\"><img alt=\"Index Attacker\" border=\"0\" data-original-height=\"496\" data-original-width=\"926\" height=\"171\" src=\"https://1.bp.blogspot.com/-xQJaEPgb5tk/XIr_yJTxUKI/AAAAAAAAADs/ET8tbSTpSKQRjkh38d89MikzM_kC4mhnwCLcBGAs/s320/Screenshot%2B%2528194%2529.png\" title=\"Index Attacker\" width=\"320\" /></a></div>\r\n<br />\r\n6. Lalu close xampp dan buka kembali lalu coba start apache nya lagi. Dan berhasillll<br />\r\n<br />\r\n<div class=\"separator\" style=\"clear: both; text-align: center;\">\r\n<a href=\"https://3.bp.blogspot.com/-xkVRcgalATo/XIr_zSexxuI/AAAAAAAAADw/Fzkavq783IE0qHhH6ZxJ8kpA-9Ivb_w8QCLcBGAs/s1600/Screenshot%2B%2528195%2529.png\" imageanchor=\"1\" style=\"margin-left: 1em; margin-right: 1em;\"><img alt=\"Index Attacker\" border=\"0\" data-original-height=\"473\" data-original-width=\"736\" height=\"205\" src=\"https://3.bp.blogspot.com/-xkVRcgalATo/XIr_zSexxuI/AAAAAAAAADw/Fzkavq783IE0qHhH6ZxJ8kpA-9Ivb_w8QCLcBGAs/s320/Screenshot%2B%2528195%2529.png\" title=\"Index Attacker\" width=\"320\" /></a></div>\r\n<br />\r\nSelamat mencoba semoga berhasil. Jika belum berhasil silahkan tanyakan di form <a href=\"http://www.indexattacker.web.id/p/contact.html\" target=\"_blank\">contact</a> karena saat ini fitur komentar blog sedang di perbaiki. Terimakasih &gt;&lt;<br />\r\n<br />\r\n~1337', '1577813034xampp.png', 'cara-atasi-apache-di-xampp-error', 1),
(3, 'Jenis Jenis Keamanan Komputer Jaringan', '2020-01-01', 1, '<p>Hai gan, jumpa lagi dengan saya di blog&nbsp;<strong>TechPedia</strong>&nbsp;yang akan memberikan penjelasan tentang keamanan komputer dan jaringan yaitu :&nbsp;<strong>Jenis Jenis Keamanan Komputer Jaringan.&nbsp;</strong>Okelah langsung saja simak artikelnya.</p>\r\n\r\n<p>Terdapat beberapa jenis keamanan komputer yang harus diperhatikan saat membangun dan mendesain sebuah sistem jaringan sebagai basis infrastruktur sistem informasi, di antaranya sebagai berikut.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1.&nbsp;</strong><strong>Physical Security</strong></p>\r\n\r\n<p>Kelemahan paling utama selouah jaringan terletak pada komputer server yang berfungsi sebagai pusat layanan data. Ketika seseorang yang tidak memiliki hak akses secara legal melakukan kontak atau interaksi langsung terhadap mesin, kemungkinan terjadi sabotase data sangat besar. Hal ini dikarenakan data adalah harta yang tak ternilai harganya. Di dalam data tersebut, semua informasi tentang transaksi loisnis, gaji, utang piutang, finansial, atau kredit, terekam dan tersimpan di dalamnya. Oleh karena itu, diperlukan prosedur pengamanan mesin server dalam sebuah ruangan khusus. Beberapa hal yang perlu diperhatikan ketika mempersiapkan keamanan fisik secara baik adalah sebagai berikut.</p>\r\n\r\n<ol>\r\n	<li>Ruangan dengan dimensi kapasitas yang longgar dan baik sirkulasi udaranya.&nbsp;</li>\r\n	<li>Memiliki pengatur temperatur yang balk seperti AC sehingga menjaga suhu ruangan tetap, dingin karena server beroperasi 24 jam non stop.&nbsp;</li>\r\n	<li>Ruangan server terpisah dari ruangan lainnya dan diusahakan tertutup, sehingga meminimalisasi keluar masuk pihak yang tidak berkepentingan.&nbsp;</li>\r\n	<li>Ruangan&#39; tersebut memiliki catu daya tegangan yang stabil. &#39;&nbsp;</li>\r\n	<li>Memiliki akses sambungan internet terdekat sebagai sumloer pengendali jaringan.&nbsp;</li>\r\n	<li>Terhindar dari terik panas matahari secara langsung.&nbsp;</li>\r\n	<li>Lantai ruang server menggunakan raised floor yang tahan api (dengan ketinggian tertentu) yang berfungsi menyalurkan udara dingin dari bawah.&nbsp;</li>\r\n	<li>Adanya indikator suhu. .</li>\r\n	<li>Server untuk meletakkan perangkat server.&nbsp;</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pada mesin server dengan sistem operasi berbasis Unix dan Linux, kemungkinan pengaksesan console mesin secara langsung harus dihindari sebaik mungkin. jika ada orang lain berhasil membukanya meski tidak memiliki password, penyusup dapat mudah mengendalikan dan merusaksistem tersebut. Di samping hal itu, keamanan datajuga harus di perhatikan secara berkala dengan melakukan proses back up melalui mirror server atau media penyimpanan yang Iainnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2. Network Security</strong></p>\r\n\r\n<p>Ketika mesin server yang dibangun dihubungkan ke jaringan, misalnya jaringan internet, server tersebut semakin rentan terhadap berbagai gangguan dan penyerangan. Semakin banyak aplikasi yang dijalankan, semakin besar pula celah keamanan yang mungkin muncul. Oleh karena itu, untuk menjaga sistem tetap stabil, beberapa hal yang perlu dilakukan antara lain sebagai berikut.</p>\r\n\r\n<ol>\r\n	<li>Pendataan komputer dan user yang bertujuan untuk menghindari terjadinya penyamaran atau duplikasi pengguna.&nbsp;</li>\r\n	<li>Pemfilteran layanan dan akses data sesuai dengan security policy yang telah ditetapkan.&nbsp;</li>\r\n	<li>Beberapa sistem operasi secara default menyediakan layanan FTP (File Transfer Protocol) sehingga perlu dianalisis ulang layanan tersebut memang diperlukan atau tidak. lika tidak, sebaiknya ditutup saja. lika diperlukan, harus dipastikan terdapat konfigurasi yang mengatur tentang kepemilikan hak akses terhadap layanan FTP tersebut.&nbsp;</li>\r\n	<li>Pemeriksaan aplikasi-aplikasi yang terpasang pada mesin sudah sesuai dengan standar operasional dan sesuai dengan kebutuhan. Terkadang aplikasi tersebut masih dalam kondisi trial sehingga masih banyak ditemukan bu yang dapat dimanfaatkan oleh hacker untuk menyusup masuk.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3. Account Security&nbsp;</strong></p>\r\n\r\n<p>Account (akun) adalah data yang berisi user name dan password sebagai bentuk verifikasi terhadap login yang dilakukan seseorang ke dalam sebuah sistem. Account security merupakan kunci utama yang harus dijaga dan diperhatikan oleh administrator jaringan. Akun dengan nama user dan password yang mudah ditebak menjadi penyebalo utama bobolnya sistem server.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>4. File System Security</strong></p>\r\n\r\n<p>Pada bagian ini, administrator jaringan harus dapat menentukan jenis file sistem yang akan digunakan, mekanisme mengatur kevvenangan setiap user dalam pengaksesannya, maupun maksimal kuota kapasitas penyimpanannya.</p>\r\n\r\n<p>Adapun dalam melakukan perancangan dan penerapan sistem keamanan tersebut, administrator harus memerhatikan beberapa hal&nbsp;<a href=\"https://www.indexattacker.web.id/p/contact.html\">berikut ini.</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sekian dulu dari saya, semoga bermanfaat...</p>', '1577815356jenis2.png', 'jenis-jenis-keamanan-komputer-jaringan', 1),
(4, 'Tutorial Menginstall Mikrotik', '2020-01-01', 2, '<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://4.bp.blogspot.com/-lxJnVoR-Ugk/XB9rUeBsvhI/AAAAAAAABE4/p1JLxdFbXeUG3ZuFvc_qPacjDL1awh_yACLcBGAs/s1600/mikrotik.png\"><img alt=\"Cara mudah install mikrotik\" src=\"https://4.bp.blogspot.com/-lxJnVoR-Ugk/XB9rUeBsvhI/AAAAAAAABE4/p1JLxdFbXeUG3ZuFvc_qPacjDL1awh_yACLcBGAs/s320/mikrotik.png\" style=\"height:240px; width:320px\" /></a></p>\r\n\r\n<p><br />\r\nAssalamualaikum, jumpa lagi dengan gw di blog <a href=\"http://www.indexattacker.tech/\" target=\"_blank\">index attacker</a> . Di kesempatan kali ini gw akan memberikan tutorial tentang bagaimana caranya instalasi mikrotik router os. kali ini instalasi nya di virtual box. okay lah langsung saja gw kasih tutorial nya.<br />\r\n<br />\r\n1. Pastikan lu sudah punya file iso mikrotik nya download <a href=\"http://www.mediafire.com/file/di20gowzp9d9xdh/Mikrotik-5.20_Full_Lev6.rar\" target=\"_blank\">di sini untuk full nya</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://1.bp.blogspot.com/-Pz_8DFls2YQ/XB9bQ8EbMJI/AAAAAAAABCU/tB8k7WKyZOQsEmRB72RKSPtjimq1uK-ugCLcBGAs/s1600/Screenshot%2B%2528147%2529.png\"><img src=\"https://1.bp.blogspot.com/-Pz_8DFls2YQ/XB9bQ8EbMJI/AAAAAAAABCU/tB8k7WKyZOQsEmRB72RKSPtjimq1uK-ugCLcBGAs/s320/Screenshot%2B%2528147%2529.png\" style=\"height:154px; width:320px\" /></a></p>\r\n\r\n<p>2. buka virtual box lu dan klik Baru</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://3.bp.blogspot.com/-N5Yhv-zbZkE/XB9hvChMLoI/AAAAAAAABC0/0oZSWkptJEk05oVzKyJPezkZD04yOgB7gCLcBGAs/s1600/Screenshot%2B%2528102%2529.png\"><img src=\"https://3.bp.blogspot.com/-N5Yhv-zbZkE/XB9hvChMLoI/AAAAAAAABC0/0oZSWkptJEk05oVzKyJPezkZD04yOgB7gCLcBGAs/s320/Screenshot%2B%2528102%2529.png\" style=\"height:215px; width:320px\" /></a></p>\r\n\r\n<p><br />\r\n3. selanjutnya beri nama Mikrotik nya , untuk tipe dan verssi pilih saja other</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://1.bp.blogspot.com/-i16VRJFMCzI/XB9h2Owa_bI/AAAAAAAABC4/a6lfwzWvPp0kdDuChLlbvrE_WSoGg2zWwCLcBGAs/s1600/Screenshot%2B%252893%2529.png\"><img src=\"https://1.bp.blogspot.com/-i16VRJFMCzI/XB9h2Owa_bI/AAAAAAAABC4/a6lfwzWvPp0kdDuChLlbvrE_WSoGg2zWwCLcBGAs/s320/Screenshot%2B%252893%2529.png\" style=\"height:320px; width:269px\" /></a></p>\r\n\r\n<p><br />\r\n4.untuk ukuran memori RAM nya kasih saja 512</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://1.bp.blogspot.com/-UBz-0Uf7hok/XB9igHngExI/AAAAAAAABDg/vuZ6u25Zh5YoA4p0z8JqFeDLWAYvsQS5ACLcBGAs/s1600/Screenshot%2B%252894%2529.png\"><img src=\"https://1.bp.blogspot.com/-UBz-0Uf7hok/XB9igHngExI/AAAAAAAABDg/vuZ6u25Zh5YoA4p0z8JqFeDLWAYvsQS5ACLcBGAs/s320/Screenshot%2B%252894%2529.png\" style=\"height:320px; width:255px\" /></a></p>\r\n\r\n<p><br />\r\n5. Selanjutnya pilih Create virtual hard disk now</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://1.bp.blogspot.com/-2Kftxh_3d38/XB9igtMWCjI/AAAAAAAABDk/xFWATW9qPLIRXJjDQJcnTKZuDr4Lul3tQCEwYBhgL/s1600/Screenshot%2B%252895%2529.png\"><img src=\"https://1.bp.blogspot.com/-2Kftxh_3d38/XB9igtMWCjI/AAAAAAAABDk/xFWATW9qPLIRXJjDQJcnTKZuDr4Lul3tQCEwYBhgL/s320/Screenshot%2B%252895%2529.png\" style=\"height:320px; width:254px\" /></a></p>\r\n\r\n<p><br />\r\n6. Selanjutnya pilih VDI (Virtual Disk Image)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://4.bp.blogspot.com/-RSh13JYcJKI/XB9igpSD09I/AAAAAAAABEc/VldEM_c8S30vvnKPxhl3Eon88RTEH2OqgCEwYBhgL/s1600/Screenshot%2B%252896%2529.png\"><img src=\"https://4.bp.blogspot.com/-RSh13JYcJKI/XB9igpSD09I/AAAAAAAABEc/VldEM_c8S30vvnKPxhl3Eon88RTEH2OqgCEwYBhgL/s320/Screenshot%2B%252896%2529.png\" style=\"height:298px; width:320px\" /></a></p>\r\n\r\n<p><br />\r\n7. Selanjutnya pilih Dislokasikan secara dinamik</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://2.bp.blogspot.com/-VjC3g2FBbhQ/XB9ihIh-zRI/AAAAAAAABEQ/1fP3qqMgf2sW-6uH5LHfiNWpulG3EjvswCEwYBhgL/s1600/Screenshot%2B%252897%2529.png\"><img src=\"https://2.bp.blogspot.com/-VjC3g2FBbhQ/XB9ihIh-zRI/AAAAAAAABEQ/1fP3qqMgf2sW-6uH5LHfiNWpulG3EjvswCEwYBhgL/s320/Screenshot%2B%252897%2529.png\" style=\"height:306px; width:320px\" /></a></p>\r\n\r\n<p><br />\r\n8. Untuk ukuran harddisk kasih saja 2GB karena itu sudah cukup</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://3.bp.blogspot.com/-ObO816R6W1M/XB9iiHQ0gMI/AAAAAAAABEY/S1_C2OHI4PcBKHozARYoia5pi_Len8TBgCEwYBhgL/s1600/Screenshot%2B%252898%2529.png\"><img src=\"https://3.bp.blogspot.com/-ObO816R6W1M/XB9iiHQ0gMI/AAAAAAAABEY/S1_C2OHI4PcBKHozARYoia5pi_Len8TBgCEwYBhgL/s320/Screenshot%2B%252898%2529.png\" style=\"height:298px; width:320px\" /></a></p>\r\n\r\n<p><br />\r\n9. Selanjutnya klik tombol start yang berwarna hijau<br />\r\n10. Selanjutnya klik icon berbentuk folder</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://3.bp.blogspot.com/-wGvt-5-9B4k/XB9ibpC1PeI/AAAAAAAABEM/3m3lAfDETM8nnnUgOyv6th0sCskedqHUgCEwYBhgL/s1600/Screenshot%2B%2528103%2529.png\"><img src=\"https://3.bp.blogspot.com/-wGvt-5-9B4k/XB9ibpC1PeI/AAAAAAAABEM/3m3lAfDETM8nnnUgOyv6th0sCskedqHUgCEwYBhgL/s320/Screenshot%2B%2528103%2529.png\" style=\"height:276px; width:320px\" /></a></p>\r\n\r\n<p><br />\r\n11. Selanjutnya pilih file iso mikrotik nya</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://2.bp.blogspot.com/-Zd0lyryYqQc/XB9icGz0REI/AAAAAAAABEg/XWTjX7g_I7s4_0TnOvVwhbOnSYI-yb-mwCEwYBhgL/s1600/Screenshot%2B%2528100%2529.png\"><img src=\"https://2.bp.blogspot.com/-Zd0lyryYqQc/XB9icGz0REI/AAAAAAAABEg/XWTjX7g_I7s4_0TnOvVwhbOnSYI-yb-mwCEwYBhgL/s320/Screenshot%2B%2528100%2529.png\" style=\"height:221px; width:320px\" /></a></p>\r\n\r\n<p><br />\r\n12. Kalo sudah klik Mulai</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://3.bp.blogspot.com/-U6RAtNV5egg/XB9icmQ9foI/AAAAAAAABEY/ANh0Vn2cZRoEOqnlUUU7Gn3Ktk3YvWCLwCEwYBhgL/s1600/Screenshot%2B%2528101%2529.png\"><img src=\"https://3.bp.blogspot.com/-U6RAtNV5egg/XB9icmQ9foI/AAAAAAAABEY/ANh0Vn2cZRoEOqnlUUU7Gn3Ktk3YvWCLwCEwYBhgL/s320/Screenshot%2B%2528101%2529.png\" style=\"height:279px; width:320px\" /></a></p>\r\n\r\n<p><br />\r\n13. Setelah itu akan muncul seperti ini untuk menginstall semua modul silahkan pencet tombol <strong>A</strong> di keyboard lu</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p><a href=\"https://4.bp.blogspot.com/-IZVT156MJgo/XB9iicleE-I/AAAAAAAABEk/m_0tAK6x5LAlMFYFS0D_K0P2UkBjV1-lwCEwYBhgL/s1600/VirtualBox_MikroTik%2B5.0_18_12_2018_02_27_23.png\"><img src=\"https://4.bp.blogspot.com/-IZVT156MJgo/XB9iicleE-I/AAAAAAAABEk/m_0tAK6x5LAlMFYFS0D_K0P2UkBjV1-lwCEwYBhgL/s320/VirtualBox_MikroTik%2B5.0_18_12_2018_02_27_23.png\" style=\"height:177px; width:320px\" /></a></p>\r\n\r\n<p><br />\r\n14. Kalo sudah begini silahkan pencet tombol <strong>I</strong> di keyboard lu</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://3.bp.blogspot.com/-zw0ckP5fFYQ/XB9ijrRIDJI/AAAAAAAABEg/R562uNcSU5gg34DcSpQhX0iBI7nTzSd8ACEwYBhgL/s1600/VirtualBox_MikroTik%2B5.0_18_12_2018_02_27_30.png\"><img src=\"https://3.bp.blogspot.com/-zw0ckP5fFYQ/XB9ijrRIDJI/AAAAAAAABEg/R562uNcSU5gg34DcSpQhX0iBI7nTzSd8ACEwYBhgL/s320/VirtualBox_MikroTik%2B5.0_18_12_2018_02_27_30.png\" style=\"height:177px; width:320px\" /></a></p>\r\n\r\n<p><br />\r\n15. Kalo seperti ini pencet saja tombol <strong>Y</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://3.bp.blogspot.com/-0ZPMT8YvpNA/XB9ij3STPOI/AAAAAAAABEc/URNaJzPu90YL33FwyRZrJibqGDRyafg0QCEwYBhgL/s1600/VirtualBox_MikroTik%2B5.0_18_12_2018_02_27_41.png\"><img src=\"https://3.bp.blogspot.com/-0ZPMT8YvpNA/XB9ij3STPOI/AAAAAAAABEc/URNaJzPu90YL33FwyRZrJibqGDRyafg0QCEwYBhgL/s320/VirtualBox_MikroTik%2B5.0_18_12_2018_02_27_41.png\" style=\"height:177px; width:320px\" /></a></p>\r\n\r\n<p><br />\r\n16. Tunggu saja h</p>', '1577818009mikrotiknya.png', 'tutorial-menginstall-mikrotik', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bab_modules`
--

CREATE TABLE `bab_modules` (
  `id_bab` int(11) NOT NULL,
  `nama_bab` varchar(255) NOT NULL,
  `kategori_bab` varchar(255) NOT NULL,
  `bab_uri` varchar(255) NOT NULL,
  `rarity` int(1) NOT NULL,
  `foto_babmodules` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bab_modules`
--

INSERT INTO `bab_modules` (`id_bab`, `nama_bab`, `kategori_bab`, `bab_uri`, `rarity`, `foto_babmodules`) VALUES
(1, 'Pengenalan Dasar PHP', 'php', 'pengenalan-dasar-php', 0, '15841843551584160997php-dasar.png'),
(3, 'Dasar Framework CodeIgniter', 'codeigniter', 'dasar-framework-codeigniter', 0, ''),
(4, 'Basic HTML', 'html', 'basic-html', 0, ''),
(5, 'Apa itu Python ?', 'python', 'apa-itu-python-?', 0, ''),
(8, 'Tutorial React Native', 'react-native', 'tutorial-react-native', 0, ''),
(10, 'Tutorial CRUD Dasar PHP Native', 'php', 'tutorial-crud-dasar-php-native', 0, '1584164262tutor crud php.png'),
(11, 'Laravel Bagi Pemula', 'laravel', 'laravel-bagi-pemula', 0, ''),
(12, 'Tutorial CRUD Dasar PHP OOP', 'php', 'tutorial-crud-dasar-php-oop', 0, '1584959946phpooop.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_us`
--

CREATE TABLE `contact_us` (
  `id_contact` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact_us`
--

INSERT INTO `contact_us` (`id_contact`, `nama`, `email`, `subject`, `message`, `time`) VALUES
(1, 'Aminulloh', 'aminulloh@gmail.com', 'Tentang Website', 'Mantap Kanesa Elearning website nya bagus dan menyenangkan . materi yang disediakan pun lengkap dan mudah dipahami . kyaa terimakasih admin kun &gt;,&lt;', '2019-12-20 17:55:10'),
(4, 'Yudas Malabi', 'yudasmalabi@gmail.com', 'Tentang Apk TechPedia', 'tolong modulnya diperbanyak lagi ya', '2019-12-20 12:10:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotomodul`
--

CREATE TABLE `fotomodul` (
  `id_fotomodul` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `foto_modul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fotomodul`
--

INSERT INTO `fotomodul` (`id_fotomodul`, `id_foto`, `foto_modul`) VALUES
(1, 1, 'apaphp.png'),
(2, 2, 'syntax.png'),
(3, 3, 'html.jpg'),
(4, 4, 'js.jpg'),
(5, 5, 'css.jpg'),
(6, 6, 'jquery.jpg'),
(7, 7, 'ajax.jpg'),
(8, 8, 'ci.jpg'),
(9, 9, 'laravel.jpg'),
(10, 10, 'forensics_home.jpg'),
(11, 11, 'web_exploit.jpg'),
(12, 12, 'cryptography.jpg'),
(13, 13, 'reverse.jpg'),
(14, 14, 'noimage.jpg'),
(15, 15, 'noimage.jpg'),
(16, 16, 'noimage.jpg'),
(17, 1, 'php2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `kategori_uri` varchar(255) NOT NULL,
  `icon_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_uri`, `icon_kategori`) VALUES
(1, 'Web', 'web', '1576302278website.png'),
(2, 'Mobile', 'mobile', '1576306688mobile.png'),
(3, 'Desktop', 'desktop', '1576302031analytics (1).png'),
(4, 'Security', 'security', '1576301214sec.png'),
(5, 'Design', 'design', '1576301401desain.png'),
(6, 'Data', 'data', '1576305030data.png'),
(7, 'Network', 'network', '1576305495network.png'),
(8, 'Game', 'game', '1584786060game.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id_katArtikel` int(11) NOT NULL,
  `nama_katArtikel` varchar(255) NOT NULL,
  `katArtikel_uri` varchar(255) NOT NULL,
  `icon_katArtikel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id_katArtikel`, `nama_katArtikel`, `katArtikel_uri`, `icon_katArtikel`) VALUES
(1, 'Network', 'Network', '157898168915784469421576305495network.png'),
(2, 'Mikrotik', 'Mikrotik', '15789817091578449681mikrotik.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_modules` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `komentarnya` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_user`, `id_modules`, `waktu`, `komentarnya`) VALUES
(1, 2, 1, '2020-01-03 16:01:50', 'Wow Keren Sekali Artikelnya Mantap'),
(2, 2, 1, '2020-01-03 16:01:50', 'Mantul Bang'),
(3, 2, 2, '2020-01-03 16:01:50', 'Mantul Bang'),
(4, 5, 1, '2020-03-15 15:03:34', 'konten nya bagus gan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_artikel`
--

CREATE TABLE `komentar_artikel` (
  `id_komentarArtikel` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `komentarnya` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar_artikel`
--

INSERT INTO `komentar_artikel` (`id_komentarArtikel`, `id_user`, `id_artikel`, `waktu`, `komentarnya`) VALUES
(1, 2, 1, '2020-01-15 14:37:56', 'wow keren mantap'),
(2, 1, 1, '2020-01-15 08:44:20', 'keren tambahin lagi modulnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_apps` int(11) NOT NULL,
  `id_bab` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_modul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusnya` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `modules`
--

INSERT INTO `modules` (`id`, `id_apps`, `id_bab`, `judul`, `foto_modul`, `tanggal`, `konten`, `statusnya`, `judul_uri`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Hello Coderz', '1584790302hellocoderz.png', ' 23 Mar 2020', '<p><strong>Pengenalan PHP</strong></p>\r\n\r\n<p><strong>PHP</strong> adalah singkatan dari <em>Hypertext Prepocessor </em>dan merupakan bahasa pemrograman yang di desain khusus untuk web development atau pengembangan web.</p>\r\n\r\n<p>PHP memiliki sifat Server-Side karena PHP dijalankan atau di eksekusi dari sisi server. maksud di jalankan dari sisi server adalah PHP di jalankan pada komputer server dan bukan pada komputer client.</p>\r\n\r\n<p>PHP di jalankan melalui aplikasi web browser sama halnya seperti <strong>HTML</strong>. Hampir semua situs-situs besar dan populer di kembangkan menggunakan PHP. seperti misalnya wordpress, joomla,&nbsp;dan situs besar lainnya.</p>\r\n\r\n<p><strong>Penulisan Syntax PHP</strong></p>\r\n\r\n<p>Untuk penulisan syntax nya, PHP di tandai dengan membuat tag pembuka ( &lt;?php&nbsp;) dan diakhiri dengan tag penutup ( ?&gt; ).</p>\r\n\r\n<p>Syntax php dapat di sisipkan pada bagian-bagian HTML. kemudian di akhir setiap baris syntax PHP harus di tutup dengan tanda semicolon atau titik koma(;) . dan format dari sebuah file harus berkestensi .php</p>\r\n\r\n<p>untuk menampilkan output ke layar , php memiliki syntax yang bernama <em>echo .</em></p>\r\n\r\n<p>sekarang mari coba tulis script berikut ini :</p>\r\n<!-- HTML generated using hilite.me -->\r\n\r\n<div style=\"background: #f8f8f8; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;\">\r\n<pre style=\"margin: 0; line-height: 125%\">\r\n<span style=\"color:#bc7a00\">&lt;?php</span>\r\n\r\n<strong style=\"color:#008000; font-weight:bold\">echo</strong> <span style=\"color:#ba2121\">&quot;Hello Coderz&quot;</span>;\r\n\r\n<span style=\"color:#bc7a00\">?&gt;</span>\r\n\r\n</pre>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>syntax diatas bertujuan untuk mengeluarkan output ke layar berupa <em>Hello Coderz</em>&nbsp;seperti gambar di bawah ini :&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://techpedia.pecelsec.com/assets/images/foto_ckeditor/hellocoderz.png\" style=\"height:169px; width:300px\" /></p>\r\n\r\n<p>Sekarang mari kita coba menulis biodata diri kita . silahkan ketik script berikut ini :&nbsp;</p>\r\n<!-- HTML generated using hilite.me -->\r\n\r\n<div style=\"background: #f8f8f8; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;\">\r\n<pre style=\"margin: 0; line-height: 125%\">\r\n<span style=\"color:#bc7a00\">&lt;?php</span>\r\n\r\n<strong style=\"color:#008000; font-weight:bold\">echo</strong> <span style=\"color:#ba2121\">&quot;Nama : Yudas malabi&quot;</span>;\r\n\r\n<strong style=\"color:#008000; font-weight:bold\">echo</strong> <span style=\"color:#ba2121\">&quot;Kelas : XII RPL 1&quot;</span>;\r\n\r\n<strong style=\"color:#008000; font-weight:bold\">echo</strong> <span style=\"color:#ba2121\">&quot;Absen : 35&quot;</span>;\r\n\r\n<span style=\"color:#bc7a00\">?&gt;</span>\r\n</pre>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>maka output yang akan keluar :&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://techpedia.pecelsec.com/assets/images/foto_ckeditor/hellocoderz1.png\" style=\"height:169px; width:300px\" />&nbsp;</p>\r\n\r\n<p>Note :&nbsp;</p>\r\n\r\n<p>Untuk menjalankan script diatas , tentu saja anda harus menginstall php terlebih dahulu pada komputer kalian , atau kalian bisa install xampp dan menjalankan nya pada localhost</p>\r\n\r\n<p>Kesimpulan :&nbsp;</p>\r\n\r\n<p>pada modul ini , kita telah belajar , bahwa syntax php diawali dengan tanda &lt;?php dan diakhiri dengan ?&gt; serta jangan lupa simbol titik koma ; . selain itu , untuk file php juga harus berekstensi .php .</p>', '1', 'hello-coderz', '2020-03-23 13:31:05', '2020-03-23 13:31:05'),
(2, 1, 1, 'Variabel', '1584797933variabel.png', ' 23 Mar 2020', '<p><strong>Cara Penulisan Variabel di PHP</strong></p>\r\n\r\n<p>Penulisan variabel di php mempunyai ketentuan tersendiri. pada modul ini kan di jelaskan tentang bagaimana cara penulisan variabel yang benar di php sesuai dengan ketentuan dari PHP. berikut adalah cara penulisan variabel di php yang&nbsp;dibuat dalam beberapa point.</p>\r\n\r\n<ol>\r\n	<li>- Penulisan variabel PHP di awali dengan tanda $.</li>\r\n	<li>- Variabel PHP bersifat Case Sensitive atau sensitif terhadap huruf besar dan kecil.</li>\r\n	<li>- Kemudian untuk mengisi suatu variabel bisa langsung menambahkan tanda sama dengan &ldquo;=&rdquo;.</li>\r\n</ol>\r\n\r\n<p>Poin-poin di atas adalah cara penulisan dari <strong>variabel di PHP</strong>. penulisan variabel di php harus di awali dengan tanda dolar $ dan kemudian di lanjutkan dengan nama dari variabel nya. misalnya :</p>\r\n<!-- HTML generated using hilite.me -->\r\n\r\n<div style=\"background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;\">\r\n<pre style=\"margin: 0; line-height: 125%\">\r\n<span style=\"color:#4c8317\">&lt;?php</span>\r\n\r\n<span style=\"color:#aa0000\">$nama</span>;\r\n\r\n<span style=\"color:#4c8317\">?&gt;</span>\r\n</pre>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>contoh di atas adalah salah satu contoh penulisan variabel di php.</p>\r\n\r\n<p>di awali dengan membuat tanda dolar $ kemudian di lanjutkan dengan nama dari variabel tersebut. pada contoh di atas berarti variabel tersebut adalah variabel nama.</p>\r\n\r\n<p>jangan lupa untuk cara penulisan syntax php yang benar seperti yang sudah di jelaskan pada modul sebelumnya&nbsp;bahwa penulisan syntax php harus di awali dengan tag php pembuka( &lt;?php ) dan di akhiri dengan tag php penutup ( ?&gt; ).kemudian di akhir baris di tutup dengan tanda semicolon ( ; ).</p>\r\n\r\n<p>pada contoh kedua di jelaskan bahwa variabel di php memiliki sifat case sensitive berarti penulisan variabel php sangat peka terhadap huruf besar dan kecil.</p>\r\n\r\n<p>misalnya anda membuat variabe $namaSaya, maka untuk memanggil variabel tersebut harus sesuai case sensitive nya seperti $namaSaya.</p>\r\n\r\n<p>point ketiga mengatakan untuk mengisi suatu nilai atau informasi yang ingin di simpan kedalam variabel php bisa menggunakan tanda sama dengan &rdquo; = &ldquo;. Contoh nya :&nbsp;</p>\r\n<!-- HTML generated using hilite.me -->\r\n\r\n<div style=\"background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;\">\r\n<pre style=\"margin: 0; line-height: 125%\">\r\n<span style=\"color:#4c8317\">&lt;?php</span>\r\n\r\n<span style=\"color:#aa0000\">$nama</span> = <span style=\"color:#aa5500\">&quot;Yudas&quot;</span>;\r\n<span style=\"color:#aa0000\">$umur</span> = <span style=\"color:#aa5500\">&quot;18&quot;</span>;\r\n\r\n<span style=\"color:#4c8317\">?&gt;</span>\r\n\r\n</pre>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>contoh di atas adalah contoh pengisian data atau informasi ke dalam variabel PHP.</p>\r\n\r\n<p>Perlu di perhatikan bahwa untuk mengisi data yang berupa string maka data harus di apit dengan petik ganda atau petik satu. tetapi jika nilai dari variabel tersebut berupa angka maka tidak perlu menggunakan tanda petik.</p>\r\n\r\n<p>karena pada modul sebelumnya anda sudah belajar tentang perintah &ldquo;echo&rdquo; di php yang berfungsi untuk menampilkan data maka pada tutorial ini kita akan menerapkannya juga sebagai contoh dari <strong>penggunaan variabel di PHP</strong>.</p>\r\n\r\n<p>Buat sebuah file php dan simpan pada localhost. di sini file php tersebut saya beri nama variabel.php. kemudian isi degan syntax berikut:</p>\r\n<!-- HTML generated using hilite.me -->\r\n\r\n<div style=\"background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;\">\r\n<pre style=\"margin: 0; line-height: 125%\">\r\n<span style=\"color:#4c8317\">&lt;?php</span>\r\n<span style=\"color:#aa0000\">$nama</span> = <span style=\"color:#aa5500\">&quot;Yudas&quot;</span>;\r\n<span style=\"color:#aa0000\">$umur</span> = <span style=\"color:#009999\">18</span>;\r\n<span style=\"color:#0000aa\">echo</span> <span style=\"color:#aa0000\">$nama</span>;\r\n<span style=\"color:#0000aa\">echo</span> <span style=\"color:#aa5500\">&quot;&lt;br/&gt;&quot;</span>;\r\n<span style=\"color:#0000aa\">echo</span> <span style=\"color:#aa0000\">$umur</span>;\r\n<span style=\"color:#0000aa\">echo</span> <span style=\"color:#aa5500\">&quot;&lt;br/&gt;&quot;</span>;\r\n<span style=\"color:#0000aa\">echo</span> <span style=\"color:#aa5500\">&quot;hai, perkenalkan nama saya &quot;</span>.<span style=\"color:#aa0000\">$nama</span>.<span style=\"color:#aa5500\">&quot; dan saya berumur &quot;</span>.<span style=\"color:#aa0000\">$umur</span>;\r\n<span style=\"color:#4c8317\">?&gt;</span>\r\n</pre>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>kemudian akses di browser dengan alamat http://localhost/variabel.php. dan jangan lupa mengaktifkan xampp terlebih dahulu.</p>\r\n\r\n<p>maka output nya adalah :&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://techpedia.pecelsec.com/assets/images/foto_ckeditor/variabel.png\" style=\"height:162px; width:300px\" /></p>\r\n\r\n<p>perhatikan pada contoh syntax di atas. tanda titik(.) di gunakan untuk memisahkan string dan variabel. dan syntax &lt;br/&gt;&nbsp;adalah syntax break pada HTML.</p>\r\n\r\n<p><strong>Update isi Variabel</strong></p>\r\n\r\n<p>variabel pada php juga bisa diupdate , berikut ini contoh nya :&nbsp;</p>\r\n<!-- HTML generated using hilite.me -->\r\n\r\n<div style=\"background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;\">\r\n<pre style=\"margin: 0; line-height: 125%\">\r\n<span style=\"color:#4c8317\">&lt;?php</span>\r\n<span style=\"color:#aa0000\">$alamat</span> = <span style=\"color:#aa5500\">&quot;Malang&quot;</span>;\r\n<span style=\"color:#aa0000\">$alamat</span> = <span style=\"color:#aa5500\">&quot;Kepanjen&quot;</span>;\r\n<span style=\"color:#0000aa\">echo</span> <span style=\"color:#aa0000\">$alamat</span>;\r\n<span style=\"color:#4c8317\">?&gt;</span>\r\n</pre>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>maka output nya adalah :&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://techpedia.pecelsec.com/assets/images/foto_ckeditor/variabel2.png\" style=\"height:162px; width:300px\" /></p>\r\n\r\n<p>Kesimpulan :</p>\r\n\r\n<p>Pada modul ini . kita telah belajar mengenai variabel dalam php . variabel di php didefinisikan dengan simbol $ dan memiliki beberapa cara penulisan tersendiri . dan untuk memberikan nilai pada variabel kita bisa melakukan dengan memberi simbol = .</p>', '1', 'variabel', '2020-03-23 13:07:25', '2020-03-23 13:07:25'),
(3, 2, 5, 'Syntax Dasar Python', '1570340174python.jpg', '2019-10-06', '<p>Apa bener kalo kita belajar python nantinya bisa jadi pawang ular ?</p>', '1', 'syntax-dasar-python', '2019-10-06 05:36:14', '2019-10-06 05:36:14'),
(5, 8, 3, 'Konfigurasi awal CodeIgniter', '1570345895ci.jpg', '2019-10-06', 'CodeIgniter adalah web framework php', '1', 'konfigurasi-awal-codeigniter', '2019-10-06 07:49:43', '2019-10-06 07:49:43'),
(10, 1, 1, 'Instalasi Web Server', '15847934081584161199cara-instalasi-web-server-di-windows.png', ' 21 Mar 2020', '<h3>Pengertian Web Server</h3>\r\n\r\n<p>Sebelum masuk ke tahap tutorial cara menginstal web server akan di jelaskan terlebih dahulu tentang pengertian web server. Web Server adalah layanan yang memiliki fungsi untuk received(menerima) request atau permintaan dari HTTP/HTTPS dari client melalui web browser(Google Chrome, Mozilla Firefox, Opera dan lain-lain) dan mengirimkan kembali hasil request kepada client berupa halaman website yang umumnya berbentuk file .HTML atau . PHP. <strong>Instalasi Web Server Di Windows</strong></p>\r\n\r\n<p>ada beberapa contoh jenis web server yang paling populer dan paling banyak di gunakan yaitu Apache dan Microsoft Windows Server milik dari Perusahaan Microsoft.</p>\r\n\r\n<h3>Pengertian Localhost</h3>\r\n\r\n<p>Localhost merupakan server local atau web server yang bekerja atau berjalan pada laptop atau pc anda. alamat IP dari localhost adalah 127.0.0.1 yang kemudian di terjemahkan menjadi <strong>LOCALHOST</strong>. jadi localhost terletak pada pc atau laptop anda.anda membutuhkan localhost untuk menjalankan file .php</p>\r\n\r\n<p>Localhost dijadikan sebagai server sementara pada saat pengembangan aplikasi yang berbasis website sebelum di hosting kan atau di online kan. localhost hanya dapat di akses dari laptop atau pc anda sendiri dengan cara mengakses langsung pada web browser dengan alamat IP dari localhost yaitu <strong>http://127.0.0.1</strong> atau bisa juga dengan mengakses <strong>http://localhost</strong>. maka halaman akan di alihkan ke localhost tempat anda membuat project aplkasi yang berbasis website. Jadi inti dari localhost adalah server local yang di pasang pada pc atau laptop anda untuk dapat menjalankan file PHP karena PHP memiliki sifat server side atau bekerja pada sisi server.</p>\r\n\r\n<h3>Pengertian XAMPP</h3>\r\n\r\n<p>XAMPP adalah sebuah software(perangkat lunak) untuk menginstall atau memasang localhost pada pc atau laptop. aplikasi XAMPP sendiri bersifat gratis atau free. sehingga banyak para pengembang web(Web Developer) menggunakan XAMPP untuk menginstall localhost dan mysql karena selain gratis, xampp juga sangat powerfull dalam menegement data dan cara penginstalannya.</p>\r\n\r\n<p>Dengan menginstall XAMPP maka database MySQL dan phpmyadmin juga akan ikut terinstal. karena anda akan membutuhkan MySQL untuk penyimpanan database website anda. dan dapat mengelola database dengan mudah dan instan melalui PhpMyAdmin.</p>\r\n\r\n<h3>Cara Instalasi Web Server di Windows</h3>\r\n\r\n<p>Untuk cara penginstalan web server di windows ini sebagai contohnya akan menggunakan aplikasi XAMPP. sebenarnya tidak hanya XAMPP yang memiliki fungsi untuk menginstall localhost, ada juga WAMPP dan LAMPP untuk linux. tetapi pada contoh cara <strong>instalasi web server di windows</strong> ini kita akan menggunakan XAMPP.</p>\r\n\r\n<p>Cara Instalasi XAMPP di Windows:</p>\r\n\r\n<ul>\r\n	<li>Untuk tahap awal cara penginstalan XAMPP anda harus men-download terlebih dahulu. untuk men-download XAMPP anda dapat men-downloadnya langsung dari website resminya. <a href=\"https://www.apachefriends.org/download.html\" target=\"_blank\">https://www.apachefriends.org/download.html</a></li>\r\n	<li>Kemudian double klik pada master XAMPP yang sudah di download.</li>\r\n	<li>Kemudian anda hanya tinggal mengikuti intruksi penginstalan XAMPP nya langsung seperti cara menginstall aplikasi windows lainnya.</li>\r\n</ul>\r\n\r\n<p>Nah, jika anda sudah melakukan penginstalan XAMPP sesuai prosedur maka langkah selanjutnya adalah memeriksa apakah XAMPP sudah berjalan dengan baik ? cara nya buka shortcut XAMPP. lalu aktifkan apache dan juga mysql</p>\r\n\r\n<p><img alt=\"\" src=\"https://techpedia.pecelsec.com/assets/images/foto_ckeditor/xampp.png\" style=\"height:212px; width:300px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://techpedia.pecelsec.com/assets/images/foto_ckeditor/xampp-sukses.png\" style=\"height:144px; width:300px\" /></p>', '1', 'instalasi-web-server', '2020-03-21 13:30:05', '2020-03-21 13:30:05'),
(11, 1, 1, 'Tipe Data', '1584971287tipedata.png', ' 23 Mar 2020', '<p><strong>Tipe Data</strong></p>\r\n\r\n<p>Tipe data adalah jenis dari data yang digunakan pada sebuah variabel. PHP mendukung tipe data berikut:</p>\r\n\r\n<ul>\r\n	<li><strong>- String</strong>&nbsp;adalah susunan dari huruf, angka dan karakter lainnya, seperti&nbsp;<code>&quot;Hello Coders!&quot;</code>. String ditulis dengan diapit oleh tanda kutip (&quot;) atau tanda petik (&#39;).</li>\r\n	<li><strong>- Integer</strong>&nbsp;adalah tipe data angka non-desimal, dengan rentang -2,147,483,648 hingga 2,147,483,647.</li>\r\n	<li><strong>- Float</strong>&nbsp;adalah tipe data angka desimal. Tanda desimal yang digunakan adalah tanda titik.</li>\r\n	<li><strong>- Boolean</strong>&nbsp;adalah tipe data yang menyatakan dua kondisi,&nbsp;<code>TRUE</code>&nbsp;dan&nbsp;<code>FALSE</code>.</li>\r\n	<li><strong>- Array</strong>&nbsp;adalah tipe data yang digunakan untuk menyimpan lebih dari satu nilai data dalam satu variabel.</li>\r\n	<li><strong>- Object</strong>&nbsp;adalah tipe data yang menyimpan nilai data beserta sejumlah operasi data. Objek akan dibahas detail di pembahasan OOP.</li>\r\n	<li><strong>- NULL</strong>&nbsp;adalah tipe data dengan satu nilai saja, yakni&nbsp;<code>NULL</code>. Suatu variabel yang tidak berisi nilai dari tipe data lain, maka variabel tersebut bernilai&nbsp;<code>NULL</code>.</li>\r\n</ul>\r\n\r\n<p>Umumnya kita menampilkan nilai dari suatu variabel dengan menggunakan perintah&nbsp;<code>echo</code>.</p>\r\n\r\n<p>Akan tetapi&nbsp;<code>echo</code>&nbsp;tidak akan menampilkan nilai dengan tipe data kompleks (yang tidak memiliki nilai tunggal).</p>\r\n\r\n<p>Untuk tipe data kompleks, kita dapat menggunakan perintah&nbsp;<code>print_r()</code>&nbsp;atau&nbsp;<code>var_dump()</code>. Fungsi&nbsp;<code>var_dump()</code>&nbsp;akan menampilkan output nilai berikut tipe datanya.</p>', '1', 'tipe-data', '2020-03-23 13:52:10', '2020-03-23 13:52:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modules_token`
--

CREATE TABLE `modules_token` (
  `id_token` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `modules_token`
--

INSERT INTO `modules_token` (`id_token`, `token`, `id_user`) VALUES
(1, '81f76f27abbf9791522d409a71d6474da4e97319', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id_orderdetail` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `email_pemesan` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `statusnya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orderdetail`
--

INSERT INTO `orderdetail` (`id_orderdetail`, `id_user`, `nama_pemesan`, `email_pemesan`, `no_hp`, `subject`, `deskripsi`, `statusnya`) VALUES
(1, 1, 'Yudas Malabi', 'yudasmalabi@gmail.com', '082131546258', 'Web Ecommerce', 'tolong saya bikin kan web ecommerce ya mas', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio`
--

CREATE TABLE `portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `portfolio`
--

INSERT INTO `portfolio` (`id_portfolio`, `nama`, `kategori`, `foto`) VALUES
(2, 'PapaAntar', 'Mobile', '1578491164papaantar.jpg'),
(3, 'TravelAgency', 'Web', '1578491177travel.png'),
(5, 'Vector Benny Moza', 'Design', '1578666003benymoza.jpg'),
(6, 'Vector RezaOktovian', 'Design', '1578666073reza.jpg'),
(7, 'Vector Sarah Viloid', 'Design', '1578666093viloid.jpg'),
(8, 'Vector BluePanda', 'Design', '1578666138bluepanda.jpg'),
(9, 'Vector DarkBreaker', 'Design', '1578666165darkbreaker.jpg'),
(10, 'Vector Sehun', 'Design', '1578666217sehun.jpg'),
(11, 'Vector Shawn Mendes', 'Design', '1578666313shawn.jpg'),
(12, 'Vector Shawn Mendes 2', 'Design', '1578666340shawn2.jpg'),
(13, 'Vector Clairine Clay', 'Design', '1578666387clairineclay.jpg'),
(14, 'Vector Marsya Ayu Annisa', 'Design', '1578666431marsyaayuannisa.jpg'),
(15, 'Vector Xvina', 'Design', '1578666458vxvina.jpg'),
(16, 'Vector Nayla', 'Design', '1578667183nyla.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `premium_token`
--

CREATE TABLE `premium_token` (
  `id_token` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `premium_token`
--

INSERT INTO `premium_token` (`id_token`, `token`, `id_user`) VALUES
(1, '6ae8e7433ba50c4b9dfd29a5f880226b372e1e69', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resetpassword`
--

CREATE TABLE `resetpassword` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `limitnya` int(11) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id_services` int(11) NOT NULL,
  `nama_services` varchar(255) NOT NULL,
  `harga_services` varchar(255) NOT NULL,
  `foto_services` varchar(255) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `services_uri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id_services`, `nama_services`, `harga_services`, `foto_services`, `keterangan`, `services_uri`) VALUES
(1, 'Web Development', '200', '1578890694icon_grid.png', '<p>E-Commerce</p>\r\n\r\n<p>Aplikasi Kasir</p>\r\n\r\n<p>Company Profile</p>\r\n\r\n<p>Landing Page</p>\r\n\r\n<p>Sistem Informasi Sekolah</p>\r\n\r\n<p>Sistem Informasi Akademik</p>\r\n\r\n<p>Sistem Informasi Rumah Sakit</p>\r\n\r\n<p>Sistem Manajemen Gudang</p>\r\n\r\n<p>Sistem Antrian</p>\r\n\r\n<p>E-Learning</p>\r\n\r\n<p>Sistem Siakad</p>\r\n\r\n<p>Sistem Hotel</p>', 'web-development'),
(2, 'Mobile Development', '180', '1578890883icon_responsive.png', '<p>Point of Sale</p>\r\n\r\n<p>E-Learning</p>\r\n\r\n<p>Sistem Antrian</p>\r\n\r\n<p>Aplikasi Manajemen Data Barang</p>\r\n\r\n<p>Aplikasi Absen Guru</p>\r\n\r\n<p>Aplikasi Portal Berita</p>\r\n\r\n<p>Aplikasi Kasir</p>\r\n\r\n<p>Quran App</p>\r\n\r\n<p>Sistem Hotel</p>', 'mobile-development'),
(3, 'Creative Designs', '50', '15788911771578464551pricing-image-1.png', '<p>Vector</p>\r\n\r\n<p>Line Art</p>', 'creative-designs'),
(4, 'FullStack Development', '500', '157889142615786331901578491847fullstack.png', '<p>E-Commerce (Website + Mobile)</p>\r\n\r\n<p>Aplikasi Kasir (Website + Mobile)</p>\r\n\r\n<p>Sistem Antrian (Website + Mobile)</p>\r\n\r\n<p>E-Learning (Website + Mobile)</p>\r\n\r\n<p>Portal Berita (Website + Mobile)</p>\r\n\r\n<p>Sistem Manajemen Gudang (Website + Mobile)</p>\r\n\r\n<p>Sistem Informasi Sekolah (Website + Mobile)</p>\r\n\r\n<p>Sistem Hotel (Website + Mobile)</p>', 'fullstack-development'),
(5, 'Premium Membership', '30', '1578891622157863297715784917191578464416pricing-image-2.png', '<p>Akses Lengkap untuk semua modul belajar</p>\r\n\r\n<p>modul premium terdapat source code lengkap</p>\r\n\r\n<p>tutorial lengkap dan jelas&nbsp;</p>\r\n\r\n<p>Dapat bergabung pada forum diskusi techpedia</p>', 'premium-membership'),
(6, 'Penetration Testing', '80', '15788918781578491847fullstack.png', '<p>Information Gathering</p>\r\n\r\n<p>Port scanning</p>\r\n\r\n<p>Identifikasi dan enumerasi service</p>\r\n\r\n<p>Vulnerability scanning</p>\r\n\r\n<p>Penetration Testing :</p>\r\n\r\n<p>Bussiness logic</p>\r\n\r\n<p>SQL injection</p>\r\n\r\n<p>XSS</p>\r\n\r\n<p>File Inclusion</p>\r\n\r\n<p>File upload</p>\r\n\r\n<p>Directory Traversal</p>\r\n\r\n<p>Access database found</p>\r\n\r\n<p>Access Admin Page found</p>\r\n\r\n<p>Apache exploit</p>\r\n\r\n<p>Application Error Message</p>\r\n\r\n<p>File Manager Script Exploit</p>\r\n\r\n<p>Code Execution</p>\r\n\r\n<p>Clickjacking</p>\r\n\r\n<p>CSRF Information Disclosure</p>\r\n\r\n<p>File Tampering</p>\r\n\r\n<p>Weak Password</p>\r\n\r\n<p>Host Header Attack</p>\r\n\r\n<p>Git Repository Found</p>\r\n\r\n<p>LDAP Injection</p>\r\n\r\n<p>PHPinfo Page Found</p>\r\n\r\n<p>Backup Data Found</p>\r\n\r\n<p>Laporan komprehensif mengenai detail yang diperoleh dari tahapan-tahapan tersebut</p>', 'penetration-testing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id_sliders` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto_sliders` varchar(125) NOT NULL,
  `isi` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id_sliders`, `judul`, `deskripsi`, `foto_sliders`, `isi`) VALUES
(1, 'Premium Member', 'Akses semua modul dengan fitur premium Sekarang!', '1584436178slider1.png', '<p>&nbsp;</p>\r\n\r\n<h3><strong>Rp. 100.000,00 / Months</strong></h3>\r\n\r\n<p>dengan menjadi premium member kamu akan mendapatkan banyak sekali keuntungan antara lain :&nbsp;</p>\r\n\r\n<p>- Kelas online sesuai dengan program belajar yang diikuti</p>\r\n\r\n<p>- Update materi belajar sesuai program belajar yang diikuti</p>\r\n\r\n<p>- Semua modul premium dapat diakses</p>\r\n\r\n<p>- terdapat pengerjaan beberapa real project&nbsp;</p>\r\n\r\n<p>- Forum diskusi tanya jawab di setiap materi belajar</p>\r\n\r\n<p>- Kuis evaluasi untuk menguji pemahaman materi belajar</p>\r\n\r\n<p>untuk informasi lengkap&nbsp;hubungi :</p>\r\n\r\n<p>Email<strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;yudasmalabi@gmail.com</strong></p>\r\n\r\n<p>Whatsapp<strong> : 083835519396</strong></p>'),
(2, 'Bergabung Dalam TechPedia', 'Bergabung dalam Komunitas kami', '1584436925comunity.png', '<p>daftar menjadi&nbsp;member dari techpedia hanya dari website kami&nbsp;:&nbsp;</p>\r\n\r\n<p>https://techpedia.pecelsec.com/</p>\r\n\r\n<p>dengan mendaftar sebagai member , tentunya anda tidak akan ketinggalan modul belajar lainnya</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscribe`
--

CREATE TABLE `subscribe` (
  `id_subscribe` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subscribe`
--

INSERT INTO `subscribe` (`id_subscribe`, `email`) VALUES
(1, 'yudasmalabi@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_online_admin`
--

CREATE TABLE `tb_online_admin` (
  `id_online_admin` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `is_online` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_online_admin`
--

INSERT INTO `tb_online_admin` (`id_online_admin`, `id_admin`, `is_online`) VALUES
(1, 1, 1),
(2, 2, 0),
(3, 4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_online_user`
--

CREATE TABLE `tb_online_user` (
  `id_online_user` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `is_online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_online_user`
--

INSERT INTO `tb_online_user` (`id_online_user`, `id_user`, `is_online`) VALUES
(2, 2, 0),
(3, 3, 0),
(4, 4, 1),
(6, 8, 0),
(7, 9, 0),
(8, 13, 0),
(9, 14, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonials`
--

CREATE TABLE `testimonials` (
  `id_testimonial` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `testi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimonials`
--

INSERT INTO `testimonials` (`id_testimonial`, `id_user`, `testi`) VALUES
(1, 1, 'Jujur dari pengalaman saya sendiri. Setelah saya mengenal TechPedia dan ikut program belajarnya, saya ngerasa buang-buang duit ikut pelatihan programming di tempat lain selama ini. Setelah belajar di TechPedia saya terarah banget belajar programmingnya'),
(4, 2, 'Waktu itu pas lagi pusing-pusingnya TA, browsing materi tentang pemrograman gak sengaja kesasar di web TechPedia. Ternyata lengkap banget materinya. Materi yang disediakan TechPediapun singkat padat dan jelas langsung ada soal latihannya. Akhirnya saya bisa selesaikan TA dengan judul yang berbeda dari yang lain karena ikut program belajar TechPedia. Terima kasih TechPedia suksess terusss!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(20) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_premium` int(1) NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `telepon`, `password`, `foto_profil`, `is_active`, `is_premium`, `position`, `about`, `created_at`, `updated_at`) VALUES
(1, 'Moch. Lukman Hakim', 'mochlukman786@gmail.com', '082140572544', '$2y$10$2izRoHsX3rY2gMb2Nf1snOGMqm01ON1nSNWOc/ZugYWUAnRglgVhu', 'default.png', 1, 0, 'Member Of TechPedia', 'Member Of TechPedia', '2020-01-14 18:57:31', '2020-01-14 18:57:31'),
(2, 'Aminulloh', 'Aminulloh@gmail.com', '089650116606', '$2y$10$2izRoHsX3rY2gMb2Nf1snOGMqm01ON1nSNWOc/ZugYWUAnRglgVhu', 'default.png', 1, 0, 'Member of TechPedia', 'Member of TechPedia', '2020-01-14 18:57:31', '2020-01-14 18:57:31'),
(3, 'stark', 'ajid@forstone.web.id', '0895414026103', '$2y$10$Xw8qIX13FkC1F95UQHnVjuy345pLAmo7Ufx7qqgwDYoRgPnZBLo92', 'default.png', 1, 0, 'Member Of TechPedia', 'Member Of TechPedia', '2020-01-16 06:36:19', '2020-01-16 06:36:19'),
(4, 'ajid', 'ajidgans69@gmail.com', '0895414026103', '$2y$10$ybt/if7WNqQMYzMo/CZrDuB7trYhTBlV12HrJz3c9fCZ2x4a8xJoa', 'default.png', 0, 0, 'Member Of TechPedia', 'Member Of TechPedia', '2020-01-21 20:13:08', '2020-01-21 20:13:08'),
(5, 'Yudas', 'yudasmalabi@gmail.com', '081359158535', '$2y$10$ts61AVECk84.88cU4USeaO.p9D7vypFBC3vUBAR7iLMoSJYvkyzEW', 'default.png', 1, 1, 'Member Of TechPedia', 'Member Of TechPedia', '2020-03-05 06:18:40', '2020-03-05 06:18:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activate`
--
ALTER TABLE `activate`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id_apps`);

--
-- Indeks untuk tabel `appsdetail`
--
ALTER TABLE `appsdetail`
  ADD PRIMARY KEY (`id_appsdetail`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `bab_modules`
--
ALTER TABLE `bab_modules`
  ADD PRIMARY KEY (`id_bab`);

--
-- Indeks untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indeks untuk tabel `fotomodul`
--
ALTER TABLE `fotomodul`
  ADD PRIMARY KEY (`id_fotomodul`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id_katArtikel`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  ADD PRIMARY KEY (`id_komentarArtikel`);

--
-- Indeks untuk tabel `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `modules_token`
--
ALTER TABLE `modules_token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indeks untuk tabel `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id_orderdetail`);

--
-- Indeks untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- Indeks untuk tabel `premium_token`
--
ALTER TABLE `premium_token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indeks untuk tabel `resetpassword`
--
ALTER TABLE `resetpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id_sliders`);

--
-- Indeks untuk tabel `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id_subscribe`);

--
-- Indeks untuk tabel `tb_online_admin`
--
ALTER TABLE `tb_online_admin`
  ADD PRIMARY KEY (`id_online_admin`);

--
-- Indeks untuk tabel `tb_online_user`
--
ALTER TABLE `tb_online_user`
  ADD PRIMARY KEY (`id_online_user`);

--
-- Indeks untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id_testimonial`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activate`
--
ALTER TABLE `activate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `apps`
--
ALTER TABLE `apps`
  MODIFY `id_apps` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `appsdetail`
--
ALTER TABLE `appsdetail`
  MODIFY `id_appsdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bab_modules`
--
ALTER TABLE `bab_modules`
  MODIFY `id_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `fotomodul`
--
ALTER TABLE `fotomodul`
  MODIFY `id_fotomodul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id_katArtikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  MODIFY `id_komentarArtikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `modules_token`
--
ALTER TABLE `modules_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id_orderdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `premium_token`
--
ALTER TABLE `premium_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id_services` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id_sliders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id_subscribe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_online_admin`
--
ALTER TABLE `tb_online_admin`
  MODIFY `id_online_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_online_user`
--
ALTER TABLE `tb_online_user`
  MODIFY `id_online_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id_testimonial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;