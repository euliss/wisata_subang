-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2023 at 01:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-wisata-subang`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Menggali Jejak Sejarah Kota Subang: Dari Kerajaan Galuh Hingga Kota Industri', 'wpflare.com_wp (1).jpg', 'Artikel ini akan mengajak pembaca untuk menjelajahi jejak sejarah Kota Subang yang kaya dan beragam. Sebagai salah satu kota di Provinsi Jawa Barat, Subang memiliki sejarah yang panjang dan menarik. Kita akan melihat bagaimana kota ini memiliki akar sejarah yang erat dengan Kerajaan Galuh, salah satu kerajaan Hindu-Buddha yang berpengaruh di Jawa Barat pada abad ke-7 hingga ke-13 Masehi. Selain itu, kita akan menyusuri perkembangan kota ini hingga menjadi pusat industri yang penting di era modern.', '2023-05-26 16:49:45', '2023-05-26 16:49:45'),
(2, 'Kecantikan Alam dan Warisan Budaya: Menelusuri Sejarah Kota Subang melalui Situs Bersejarah', 'wallpaperflare.com_wallpaper (4).jpg', 'Dalam artikel ini, kita akan mengeksplorasi kekayaan alam dan warisan budaya Kota Subang melalui situs-situs bersejarah yang ada di kota ini. Subang dikenal memiliki pemandangan alam yang indah, seperti Gunung Tangkuban Perahu dan Kawah Ciwidey. Selain itu, kota ini juga memiliki sejumlah situs bersejarah yang menarik, seperti Candi Cangkuang, sebuah candi Buddha dari abad ke-8, dan Kampung Naga, sebuah desa tradisional yang mempertahankan budaya Sunda dengan baik. Kita akan melihat bagaimana situs-situs ini menjadi saksi bisu perkembangan kota Subang dari masa ke masa.', '2023-05-26 16:49:45', '2023-05-26 16:49:45'),
(3, 'Pariwisata Sejarah Kota Subang: Menapak Jejak Kolonial dan Mengenal Warisan Arsitektur', 'wallpaperflare.com_wallpaper (3).jpg', 'Dalam artikel ini, kita akan menjelajahi potensi pariwisata sejarah Kota Subang yang terkait dengan masa penjajahan di Indonesia. Kota Subang memiliki beberapa bangunan bersejarah yang mencerminkan masa kolonial Belanda, seperti Gedung Landraad (Pengadilan Negeri) yang megah dan Gereja Katedral Subang yang berarsitektur klasik. Selain itu, kita juga akan mempelajari tentang warisan arsitektur tradisional yang ada di kota ini, seperti rumah-rumah panggung yang merupakan contoh arsitektur tradisional Sunda. Dengan menapaki jejak kolonial dan mengenal warisan arsitektur ini, kita dapat lebih memahami perkembangan Kota Subang secara historis dan budayanya yang kaya.', '2023-05-26 16:49:45', '2023-05-26 16:49:45'),
(4, 'Pariwisata Sejarah Kota Subang: Menapak Jejak Kolonial dan Mengenal Warisan Arsitektur', 'wallpaperflare.com_wallpaper.jpg', 'Dalam artikel ini, kita akan menjelajahi potensi pariwisata sejarah Kota Subang yang terkait dengan masa penjajahan di Indonesia. Kota Subang memiliki beberapa bangunan bersejarah yang mencerminkan masa kolonial Belanda, seperti Gedung Landraad (Pengadilan Negeri) yang megah dan Gereja Katedral Subang yang berarsitektur klasik. Selain itu, kita juga akan mempelajari tentang warisan arsitektur tradisional yang ada di kota ini, seperti rumah-rumah panggung yang merupakan contoh arsitektur tradisional Sunda. Dengan menapaki jejak kolonial dan mengenal warisan arsitektur ini, kita dapat lebih memahami perkembangan Kota Subang secara historis dan budayanya yang kaya.', '2023-05-26 16:49:45', '2023-05-26 16:49:45'),
(5, 'Asal Usul Kota Subang', 'AsalUsulSubang.jpeg', '<p><span style=\"color: rgb(42, 42, 42); font-family: Roboto, sans-serif; font-size: 14px;\">Asal-usul nama Subang bersumber dari cerita rakyat yang berkembang dalam beberapa versi. Salah satu versinya menyebut kata Subang berasal dari nama seorang wanita dalam Babad Siliwangi, yaitu Subanglarang atau Subangkarancang. Disebutkan bahwa di wilayah Karawang terdapat pesantren yang diasuh oleh Syekh Datuk Quro. Syekh Datuk Quro ini memiliki santri putri, salah satunya bernama Subanglarang yang merupakan putri Ki Jamajan Jati. Dalam perjalanannya, Subanglarang kemudian diperunting oleh Raden Pamanahrasa yang bergelar Prabu Siliwangi saat menjadi Raja Pajajaran. Dari pernikahan ini kemudian lahir dua orang anak yang bernama Raden Walangsungsang dan Ratu Rarasantang. Ratu Rarasantang ini kelak melahirkan seorang anak yang bernama Syarif Hidayatullah yang kemudian dikenal sebagai Sunan Gunung Jati.</span><br style=\"color: rgb(42, 42, 42); font-family: Roboto, sans-serif; font-size: 14px;\"><br></p>', '2023-06-06 11:25:18', '2023-06-06 11:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_categories` int(11) NOT NULL,
  `categories_name` varchar(100) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_categories`, `categories_name`, `images`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Wisata ', 'images/icon/Wisata.png', 'Terdiri dari wisata alam, wisata sejarah, dan lainnya', 'Aktif', '2023-05-21 14:34:07', '2023-05-21 14:34:07'),
(2, 'Kuliner', 'images/icon/Kuliner.png', 'Menyajikan referensi kuliner, mulai dari street food, cafe, rumah makan, da resto', 'Aktif', '2023-05-21 14:34:07', '2023-05-21 14:34:07'),
(3, 'Hotel', 'images/icon/Hotel.png', 'Rekomendasi penginapan hotel, vila, dan home stay', 'Aktif', '2023-05-21 14:40:21', '2023-05-21 14:40:21'),
(4, 'Desa Wisata ', 'images/icon/DesaWisata.png', 'Referensi ekonomi kreatif asli Subang untuk oleh-oleh liburanmu', 'Aktif', '2023-05-21 14:40:21', '2023-05-21 14:40:21'),
(5, 'Ekonomi Kreatif', 'images/icon/Ekraf.png', 'Mengenal dan belajar kebudayaan yang ada di Subang', 'Aktif', '2023-05-21 14:40:21', '2023-05-21 14:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_destination` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_destination`, `name`, `email`, `content`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 'Diana', 'diana@gmail.com', 'Desain dan Tampilan: Pertama-tama, penting untuk memiliki desain website yang menarik dan menarik perhatian pengunjung. Pastikan tata letaknya intuitif dan mudah dinavigasi. Gunakan gambar-gambar yang indah dari pantai dan suasana pantai untuk menciptakan kesan visual yang menarik.', 4, '2023-05-22 04:18:03', '2023-05-22 04:18:03'),
(2, 2, 'Diana2', 'diana2@gmail.com', 'Informasi Destinasi: Pastikan website menyediakan informasi yang lengkap tentang berbagai destinasi pantai yang ditampilkan. Sertakan deskripsi tentang pantai-pantai tersebut, keunikan masing-masing pantai, aktivitas yang dapat dilakukan, aksesibilitas, akomodasi di sekitar, dan sebagainya. Informasi ini akan membantu pengunjung dalam merencanakan liburan mereka.', 3, '2023-05-22 04:18:49', '2023-05-22 04:18:49'),
(3, 1, 'Diana3', 'diana3@gmail.com', 'Galeri Foto: Tampilkan galeri foto yang menarik dari pantai-pantai yang diulas di website. Foto-foto ini akan memberikan gambaran visual kepada pengunjung tentang keindahan dan keunikan setiap pantai. Pastikan foto-foto tersebut berkualitas tinggi dan memperlihatkan berbagai aspek pantai, seperti pasir putih, air laut yang jernih, pemandangan matahari terbenam, atau aktivitas pantai.', 5, '2023-05-22 04:19:18', '2023-05-22 04:19:18'),
(4, 1, 'Diana4', 'diana4@gmail.com', 'Ulasan dan Rekomendasi: Jika memungkinkan, sertakan ulasan pengunjung atau rekomendasi dari mereka yang telah mengunjungi pantai-pantai tersebut. Testimoni dari pengunjung sebelumnya dapat memberikan kepercayaan tambahan kepada calon pengunjung dan membantu mereka dalam membuat keputusan.', 4, '2023-05-22 04:19:43', '2023-05-22 04:19:43'),
(5, 1, 'Diana5', 'diana5@gmail.com', 'Aktivitas dan Fasilitas: Jelaskan dengan jelas aktivitas apa yang dapat dilakukan di pantai-pantai tersebut, seperti berenang, menyelam, berselancar, atau berjalan-jalan di sepanjang tepi pantai. Sertakan juga informasi mengenai fasilitas yang tersedia di sekitar pantai, seperti restoran, toko suvenir, toilet, dan tempat parkir.', 5, '2023-05-22 04:20:04', '2023-05-22 04:20:04'),
(10, 1, 'Eulis Jubaedah', 'eulisjubaedah17@gmail.com', 'good', 4, '2023-06-04 14:44:27', '2023-06-04 14:44:27'),
(11, 1, 'Eulisss', 'eulisjubaedah08@gmail.com', 'feff', 5, '2023-06-04 14:49:44', '2023-06-04 14:49:44'),
(12, 14, 'Eulis Jubaedah', 'eulisjubaedah08@gmail.com', 'good', 5, '2023-06-05 03:43:20', '2023-06-05 03:43:20'),
(13, 1, 'Eulis Jubaedah', 'eulisjubaedah17@gmail.com', 'keren', 5, '2023-06-12 13:01:26', '2023-06-12 13:01:26'),
(14, 2, 'Eulis', 'eulis@gmail.com', 'Komentar', 5, '2023-07-21 13:44:10', '2023-07-21 13:44:10'),
(15, 14, 'Eulis', 'eulis@gmail.com', 'Good', 5, '2023-07-22 07:47:57', '2023-07-22 07:47:57'),
(16, 14, 'Eulis', 'eulis@gmail.com', 'Good 2', 2, '2023-07-22 08:18:42', '2023-07-22 08:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `jumlah_pengunjung` int(11) NOT NULL,
  `location` text NOT NULL,
  `alamat` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `jam_operasional` varchar(255) DEFAULT NULL,
  `harga` varchar(100) DEFAULT NULL,
  `fasilitas` text DEFAULT NULL,
  `menu` text DEFAULT NULL,
  `tipe_kamar` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `id_category`, `name`, `description`, `jumlah_pengunjung`, `location`, `alamat`, `contact`, `jam_operasional`, `harga`, `fasilitas`, `menu`, `tipe_kamar`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sari Ater Hots Spring Water', '<p style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Sari Ater Hot Spring Resort atau lebih dikenal dengan obyek wisata air panas Ciater, terletak pada kawasan pegunungan Subang, dikaki gunung tangkubanparahu, tepatnya di Desa Ciater, Kecamatan Ciater Kabupaten Subang.</p><p style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Obyek wisata ini merupakan salah satu obyek terpopuler di Indonesia, para wisatawan dapat menikmati sumber mata air panas yang berasal dari kawah aktif gunung tangkubanparahu yang terletak tidak jauh dari obyek wisata sari ater, sumber mata air panas tersebut disajikan dalam bentuk kolam dan kamar rendam dengan desain yang unik, yang tersebar di beberapa lokasi obyek wisata sari ater. Dengan luas area 30 ha dan pesona alam khas pegunungan, sari ater hot spring resort banyak memberikan fasilitas wisata bagi para wisatawan yang berekreasi bersama keluarga selain untuk berendam juga dapat menikmati keindaha alam pegunungan yang masih asri.</p><p style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Fasilitas :</p><p style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Kolam rendam</p><p style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Kamar rendam</p><p style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Sungai Air Panas</p><p style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Hotel</p><p style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Resto</p><p style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">- Camp</p><p style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Tiket Masuk:</p><p style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Weekday : 35k</p><p style=\"color: rgb(33, 37, 41); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;;\">Weekend :50k</p>', 100, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.257457649859!2d107.65058887413633!3d-6.738415593257815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e691f93a93ba7fd%3A0xb735f75ce693be73!2sSari%20Ater%20Hot%20Spring%20Water!5e0!3m2!1sid!2sid!4v1685926994420!5m2!1sid!2sid', 'Alamat', '081280776731', NULL, NULL, NULL, NULL, NULL, 0, '|OIP (3).jpeg|6349751127_01a8936cdc_b.jpg|R (1).jpeg', '2023-05-22 00:54:54', '2023-05-22 00:54:54'),
(2, 1, 'Pantai Pondok Bali 2', 'Pantai Kuta2 adalah sebuah pantai yang terletak di Pulau Bali, Indonesia. Pantai ini terkenal di seluruh dunia karena keindahan alamnya, ombak yang besar, dan pasir putihnya yang lembut. Kuta merupakan salah satu tujuan wisata terpopuler di Bali dan telah menjadi ikon pariwisata pulau ini.', 46, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31731.456277406112!2d107.75626860062673!3d-6.206604301986516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e695b92bf77a2ab%3A0x1a5d663dbccf5c61!2sPantai%20Pondok%20Bali!5e0!3m2!1sid!2sid!4v1685927543571!5m2!1sid!2sid', 'Alamat', '081280776731', '05.50 - 18.00 WIB', 'Start From 10k', 'Sewa tikar, sewa perahu, sewa pelampung, rumah makan, toilet, dll', NULL, NULL, 0, '|business-pondok-bali-2-001.l.webp|il_340x270.888923874_aq5x.webp', '2023-05-22 00:54:54', '2023-05-22 00:54:54'),
(14, 5, 'Desa Wisata Cibeusi', '<p>Desa wisata cibeusi adalah salah satu desa wisata yang berada di kecamatan ciater kabupaten subang&nbsp;</p>', 120, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.2348362807516!2d107.67011420968566!3d-6.7411835932269835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69211f4d21f0db%3A0x7749dc98f3cfa169!2sDesa%20Wisata%20Cibeusi!5e0!3m2!1sid!2sid!4v1685936218160!5m2!1sid!2sid', '', '081280776731', NULL, NULL, NULL, NULL, NULL, 1, '|f5047e8e08fbe9cece08229e7274ea54_Photo_x4.jpg', '2023-06-05 03:38:30', '2023-06-05 03:38:30'),
(20, 1, 'Hotel Nalendra', '<p>Hotel Nalendra meruapakan&nbsp;</p>', 0, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7049793142987!2d107.76618070968371!3d-6.558876393406886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693b7c0fc905bd%3A0x94432d48ea88fcda!2sHotel%20Nalendra%20Plaza%20Subang!5e0!3m2!1sid!2sid!4v1687163977797!5m2!1sid!2sid', '', '081280776731', NULL, '350000', 'Kolam renang, gedung, resto', NULL, 'Single, Family', 0, '|Taman_anggur_kukulu_4.jpg', '2023-06-19 08:42:21', '2023-06-19 08:42:21'),
(26, 1, 'Smart Hill Camp', '<div><br></div><div>Destinasi wisata hits i kabupaten subang karena memadukan konsep spot foto dengan latar belakang pegununngan dna perkebunan kebun teh yang indah, seain spot foto tempat ini menyajikan tempat wisata berkemah atau camp.&nbsp;</div><div>Keindahan pemandangan alam wisata smart hill camp ini berada di Desa Cisaat, Kecamatan Ciater Kabupaten Subang, Jawa Barat. lokasinya cukup strategis mudah diakses baik kendaraan roda 2 maupun roda 4</div>', 100, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.4293270898397!2d107.64854740968538!3d-6.717348193250494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e691f16c6695cc9%3A0xde679f598ae2a81b!2sSmart%20Hill%20Camp%20(SHC)!5e0!3m2!1sid!2sid!4v1688508893319!5m2!1sid!2sid', '', '081280776731', '08.00 - 21.00 WIB', 'Weekday 30K, Weekend 35k', 'mushola, parkiran, toilet, dll', NULL, NULL, 1, '|SmartHil.jpg|Smarthil(2).jpg|Smarthil(3).jpg', '2023-07-09 14:45:30', '2023-07-09 14:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `news` longtext NOT NULL,
  `news_image` text NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `id_users`, `title`, `news`, `news_image`, `status`, `date`) VALUES
(5, 5, 'News 2 update', '<p>                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Edit</p><p style=\"text-align: center; \">\r\n                <img src=\"data:image/png;base64,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\" style=\"width: 300px;\" data-filename=\"image 307.png\"></p>', '12102022062356.png', 'Tidak Aktif', '2022-12-09'),
(7, 5, 'News 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '12102022083040.png', 'Aktif', '2022-12-10'),
(8, 5, 'News 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '12102022083105.png', 'Aktif', '2022-12-10'),
(9, 5, 'Title 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '12102022083129.png', 'Aktif', '2022-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id_partner` int(11) NOT NULL,
  `partner_name` varchar(100) NOT NULL,
  `partner_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id_partner`, `partner_name`, `partner_image`) VALUES
(1, 'Partner 1', '12112022020834.png'),
(2, 'Partner 2', '12112022020907.png'),
(3, 'Partner 3', '12112022020919.png'),
(5, 'Partner 4', '12112022020931.png'),
(6, 'Partner 5', '12112022020946.png'),
(7, 'Partner 6', '12112022021001.png'),
(8, 'Partner 7', '12112022021013.png'),
(9, 'Partner 8', '12112022021026.png');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `id_destination` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `id_destination`, `count`, `content`, `date`, `created_at`, `updated_at`) VALUES
(8, 2, 46, '111', '2023-04-11', '2023-05-27 12:19:44', '2023-05-27 12:19:44'),
(9, 1, 10, 'Mei', '2023-05-02', '2023-05-28 07:37:41', '2023-05-28 07:37:41'),
(13, 1, 10, '11111111111', '2023-05-12', '2023-05-28 07:37:41', '2023-05-28 07:37:41'),
(16, 1, 20, '12312312', '2023-06-22', '2023-06-03 03:17:37', '2023-06-03 03:17:37'),
(17, 1, 20, 'bulan mei', '2023-06-11', '2023-06-11 14:42:26', '2023-06-11 14:42:26'),
(18, 1, 40, 'juli', '2023-07-30', '2023-06-14 14:52:47', '2023-06-14 14:52:47'),
(20, 14, 100, 'Hari Ini', '2023-07-22', '2023-07-21 17:36:17', '2023-07-21 17:36:17'),
(21, 14, 20, 'Hari Besok', '2023-07-23', '2023-07-21 17:37:06', '2023-07-21 17:37:06'),
(23, 26, 100, 'Hari Ini', '2023-07-22', '2023-07-21 18:15:13', '2023-07-21 18:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) DEFAULT 2,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('non-active','active') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nik`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`, `photo`, `status`) VALUES
(1, 'Admin ', '123412341234', 'admin@gmail.com', NULL, '$2y$10$uuf6Mkz9F4ITVYETB/4/oeydU5cP1WEwAi6SSmVTQ4mNN0rXlWZ1K', NULL, NULL, NULL, 1, NULL, 'active'),
(2, 'eulis', '123412341235', 'user@gmail.com', NULL, '$2y$10$9wfxAJFdPBnrMFQflLtONOOczMHN3LETRwkCm8gNMEqHigIz1l3qS', NULL, '2023-05-15 00:04:02', '2023-05-15 00:04:02', 2, NULL, 'active'),
(26, 'user2', '123412341237', 'user2@gmail.com', NULL, '$2y$10$RlqrmUg6Ljmb2uH2bJN5ceUOpwiwI4xPMbeWOqgLLKD2xrS5Ntguu', NULL, NULL, NULL, 1, '06032023023400.jpg', 'active'),
(30, 'bagus', '87265726398259827398', 'bagus@mail.com', NULL, '$2y$10$V.Op1ugSbRe76ClPRVG9leGd8zSjbqQwQjoQn66jm63htMKc7vYHq', NULL, '2023-06-08 20:46:18', '2023-06-08 20:46:18', 2, NULL, 'non-active'),
(34, 'Eulis Jubaedah', '1234567890123456', 'eulisjubaedah17@gmail.com', NULL, '$2y$10$rmF/1rHHkfPoQfGwPJBDYem95alsXyzjVlQTRyOy8LoxYQ4xvoXga', NULL, '2023-06-09 00:09:03', '2023-06-09 00:09:45', 2, NULL, 'active'),
(35, 'Eulisss', '1234567891098765', 'eulisjubaedah08@gmail.com', NULL, '$2y$10$9ajPWoFxmHRLXjRT0sUuJOp3D73Vgwld7H93D26Y7aKxcFGAf8irW', NULL, '2023-06-12 06:06:48', '2023-06-12 06:06:48', 2, NULL, 'non-active'),
(36, 'Yoza Prawama', '1234567891012345', 'prawamayoza@gmail.com', NULL, '$2y$10$yf.qRyuoqBNfg5wh.uHgwuwyKH9bKca8VYGTSPhOv3bl/E.kJTEq.', NULL, '2023-06-18 11:15:36', '2023-06-18 11:23:42', 2, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_destinations`
--

CREATE TABLE `user_destinations` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_destination` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_destinations`
--

INSERT INTO `user_destinations` (`id`, `id_user`, `id_destination`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2023-05-26 09:47:39', '2023-05-26 09:47:39'),
(2, 2, 2, '2023-05-26 09:47:39', '2023-05-26 09:47:39'),
(3, 1, 11, '2023-06-04 16:10:03', '2023-06-04 16:10:03'),
(4, 2, 12, '2023-06-04 23:23:43', '2023-06-04 23:23:43'),
(5, 28, 13, '2023-06-05 02:57:54', '2023-06-05 02:57:54'),
(7, 29, 13, '2023-06-06 02:03:43', '2023-06-06 02:03:43'),
(8, 29, 14, '2023-06-06 02:03:43', '2023-06-06 02:03:43'),
(9, 1, 15, '2023-06-16 07:54:34', '2023-06-16 07:54:34'),
(10, 34, 16, '2023-06-19 02:28:56', '2023-06-19 02:28:56'),
(11, 34, 17, '2023-06-19 02:31:13', '2023-06-19 02:31:13'),
(12, 34, 18, '2023-06-19 02:35:37', '2023-06-19 02:35:37'),
(13, 34, 19, '2023-06-19 03:29:47', '2023-06-19 03:29:47'),
(14, 1, 20, '2023-06-19 08:42:21', '2023-06-19 08:42:21'),
(15, 2, 21, '2023-06-19 08:51:52', '2023-06-19 08:51:52'),
(16, 2, 22, '2023-06-19 08:56:33', '2023-06-19 08:56:33'),
(17, 2, 23, '2023-06-19 09:02:40', '2023-06-19 09:02:40'),
(18, 1, 24, '2023-06-19 09:16:54', '2023-06-19 09:16:54'),
(19, 1, 25, '2023-06-19 15:10:44', '2023-06-19 15:10:44'),
(20, 1, 26, '2023-07-09 14:45:30', '2023-07-09 14:45:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment` (`id_destination`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_destination` (`id_category`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id_partner`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`) USING BTREE;

--
-- Indexes for table `user_destinations`
--
ALTER TABLE `user_destinations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id_partner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_destinations`
--
ALTER TABLE `user_destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment` FOREIGN KEY (`id_destination`) REFERENCES `destinations` (`id`);

--
-- Constraints for table `destinations`
--
ALTER TABLE `destinations`
  ADD CONSTRAINT `fk_destination` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_categories`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
