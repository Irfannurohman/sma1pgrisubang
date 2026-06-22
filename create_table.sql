CREATE TABLE `pengaturan_kelulusan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(20) NOT NULL,
  `tanggal_pengumuman` date NOT NULL,
  `jam_pengumuman` time NOT NULL,
  `pesan_sebelum` text DEFAULT NULL,
  `pesan_sesudah` text DEFAULT NULL,
  `is_aktif` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
