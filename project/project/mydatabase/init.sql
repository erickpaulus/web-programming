CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

REPLACE INTO users (name) VALUES ('Erick Paulus'), ('Bim Yusuf');
