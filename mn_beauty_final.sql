
-- DATABASE MN BEAUTY FINAL (DENGAN SYARAT LENGKAP)
CREATE DATABASE IF NOT EXISTS mn_beauty;
USE mn_beauty;

-- TABEL USER
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100)
);

-- TABEL PRODUK
CREATE TABLE IF NOT EXISTS produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    harga INT,
    kategori ENUM('makeup', 'skincare') NOT NULL,
    best_seller TINYINT(1) DEFAULT 0
);

-- TABEL TRANSAKSI (RELASI USER & PRODUK)
CREATE TABLE IF NOT EXISTS transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    produk_id INT,
    qty INT NOT NULL,
    total INT,
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (produk_id) REFERENCES produk(id)
);

-- INDEX
CREATE INDEX idx_kategori ON produk(kategori);

-- VIEW
CREATE OR REPLACE VIEW v_laporan_transaksi AS
SELECT 
    t.id AS id_transaksi,
    u.nama AS nama_pelanggan,
    p.nama AS nama_produk,
    p.kategori,
    t.qty,
    t.total,
    t.tanggal
FROM transaksi t
JOIN user u ON t.user_id = u.id
JOIN produk p ON t.produk_id = p.id;

-- FUNCTION: Hitung Diskon (misalnya 10% jika best seller)
DELIMITER //
CREATE FUNCTION hitung_diskon(harga INT, is_best TINYINT)
RETURNS INT
DETERMINISTIC
BEGIN
  IF is_best = 1 THEN
    RETURN harga - (harga * 10 / 100);
  ELSE
    RETURN harga;
  END IF;
END;
//
DELIMITER ;

-- TRIGGER: Otomatis hitung total saat transaksi dibuat
DELIMITER //
CREATE TRIGGER trg_hitung_total
BEFORE INSERT ON transaksi
FOR EACH ROW
BEGIN
  DECLARE harga_produk INT;
  SELECT harga INTO harga_produk FROM produk WHERE id = NEW.produk_id;
  SET NEW.total = harga_produk * NEW.qty;
END;
//
DELIMITER ;

-- CONTOH DATA DUMMY
INSERT INTO user (nama, email) VALUES 
('Dina Ayu', 'dina@example.com'),
('Rani Putri', 'rani@example.com');

INSERT INTO produk (nama, harga, kategori, best_seller) VALUES
('Lipstick Matte', 75000, 'makeup', 1),
('Serum Glowing', 120000, 'skincare', 1),
('Eyeshadow Nude', 95000, 'makeup', 0),
('Moisturizer Aloe Vera', 85000, 'skincare', 0);

-- CONTOH TRANSAKSI
INSERT INTO transaksi (user_id, produk_id, qty) VALUES (1, 1, 2);
INSERT INTO transaksi (user_id, produk_id, qty) VALUES (2, 2, 1);

-- AGGREGAT QUERIES
-- Total Penjualan
SELECT SUM(total) AS total_penjualan FROM transaksi;

-- Produk Termahal & Termurah
SELECT MAX(harga) AS produk_termahal, MIN(harga) AS produk_termurah FROM produk;
