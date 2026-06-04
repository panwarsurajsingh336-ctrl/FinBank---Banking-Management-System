CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    acn VARCHAR(50),
    transaction_type VARCHAR(50),
    amount DECIMAL(10,2),
    remarks VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
