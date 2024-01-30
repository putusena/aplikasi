
-- Database Backup --
-- Ver. : 1.0.1
-- Host : Server Host
-- Generating Time : Jan 29, 2024 at 16:08:20:PM


CREATE TABLE `detailpenjualan` (
  `DetailID` int(11) NOT NULL AUTO_INCREMENT,
  `PenjualanID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  PRIMARY KEY (`DetailID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO detailpenjualan VALUES
("1","1","2","1","2000.00"),
("2","2","7","1","4000.00"),
("3","3","13","1","20000.00"),
("4","4","8","1","6500.00"),
("5","5","5","1","90000.00");

CREATE TABLE `keranjang` (
  `keranjangid` int(10) NOT NULL AUTO_INCREMENT,
  `produkid` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  PRIMARY KEY (`keranjangid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO keranjang VALUES
("15","7","1","1");

CREATE TABLE `pelanggan` (
  `PelangganID` int(11) NOT NULL AUTO_INCREMENT,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL,
  PRIMARY KEY (`PelangganID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO pelanggan VALUES
("4","Umum","Umum","2838930023"),
("5","Nia","Dalung","085739198232"),
("6","William","Dalung","0876338483834"),
("7","Zaid","Dalung","087777"),
("8","Sena","Legian","089661718111");

CREATE TABLE `penjualan` (
  `PenjualanID` int(11) NOT NULL AUTO_INCREMENT,
  `TanggalPenjualan` date NOT NULL,
  `TotalHarga` decimal(10,2) NOT NULL,
  `PelangganID` int(11) NOT NULL,
  PRIMARY KEY (`PenjualanID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO penjualan VALUES
("1","2024-01-23","2000.00","5"),
("2","2024-01-23","4000.00","6"),
("3","2024-01-23","20000.00","7"),
("4","2024-01-23","6500.00","8"),
("5","2024-01-23","90000.00","4");

CREATE TABLE `produk` (
  `produkid` int(11) NOT NULL AUTO_INCREMENT,
  `barcode` varchar(225) NOT NULL,
  `namaproduk` varchar(25) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`produkid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO produk VALUES
("2","8993007001694","Susu Kental Manis Indomil","2000.00","112"),
("4","850544005340","Dancow","4500.00","113"),
("5","711844160057","ABC APEL","90000.00","2"),
("7","8991002122000","ABC EXO CHOCOMALT","4000.00","30"),
("8","711844110021","ABC KECAP SASET","6500.00","25"),
("9","8991002101265","ABC KOPI PLUS 18 GR SCT","6000.00","46"),
("10","8991002101630","ABC KOPI SUSU 32 GR SCT","18000.00","60"),
("11","711844130111","ABC SAUCE TOMAT BTL 135mL","15000.00","55"),
("12","711844140059","ABC SAUS TIRAMBTL 135mL","15000.00","50"),
("13","8992772122245","ADEM SARI","20000.00","32"),
("14","8992772586016"," ADEM SARI CK KLG 320mL","9000.00","28"),
("15","8992855888235","AGAR AGAR POWDER RED","35000.00","65"),
("16","8992933434118","AGARASA EKONOMI COKLAT 12","34000.00","78"),
("17","8999918443509","AIM ANEKA SQUAREPUFF 300 ","13000.00","80"),
("18","8993539111205","AIR CUP 600 BTL","3000.00","85"),
("19","8991002101746","ABC KOPI+SUSU+MOCHA 10X27","13500.00","100"),
("20","711844120105","ABC SAMBAL MANIS PEDAS","9000.00","110"),
("21","711844120105","ABC SAMBAL MANIS PEDAS","9000.00","110"),
("22","8886001038011","Beng Beng","2000.00","15"),
("23","8713108000033","Yakult","12500.00","10"),
("24","","","0.00","0"),
("25","","","0.00","0");

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `hak_akses` int(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user VALUES
("1","Arya Sena","admin","admin","1"),
("3","Sena","petugas","petugas","2");