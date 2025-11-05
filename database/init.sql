DROP DATABASE IF EXISTS phone_store;

CREATE DATABASE phone_store CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE phone_store;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255),
    content TEXT,
    category_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE
);

INSERT INTO
    categories (name)
VALUES ('iPhone'),
    ('Samsung'),
    ('Xiaomi');

INSERT INTO
    products (
        title,
        price,
        image,
        content,
        category_id
    )
VALUES (
        'iPhone 15 Pro',
        32990000,
        'https://via.placeholder.com/300x300?text=iPhone+15+Pro',
        'Flagship mới nhất của Apple.',
        1
    ),
    (
        'Galaxy S24 Ultra',
        29990000,
        'https://via.placeholder.com/300x300?text=Galaxy+S24+Ultra',
        'Điện thoại đầu bảng của Samsung.',
        2
    ),
    (
        'Xiaomi 14',
        18990000,
        'https://via.placeholder.com/300x300?text=Xiaomi+14',
        'Hiệu năng mạnh mẽ, giá hợp lý.',
        3
    );