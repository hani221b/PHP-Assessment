-- Run this query from within your database using:
-- Source /path/to/schema.sql

CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_no INT NOT NULL,
    price DECIMAL(10,2) DEFAULT (00.00),
    qty INT NOT NULL,
    total INT DEFAULT (0)
);

