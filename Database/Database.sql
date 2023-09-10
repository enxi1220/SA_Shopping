DROP DATABASE IF EXISTS `SA_Shopping`;

CREATE DATABASE `SA_Shopping`;
USE `SA_Shopping`;

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`admin` (
    `admin_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `reset_code` VARCHAR(50),
    `created_date` DATETIME,
    `created_by` VARCHAR(255),
    `updated_date` DATETIME,
    `updated_by` VARCHAR(255),
	UNIQUE KEY `email_UNIQUE` (`email`),
	UNIQUE KEY `username_UNIQUE` (`username`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`seller` (
    `seller_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(255),
    `name` VARCHAR(255),
    `email` VARCHAR(255),
    `password` VARCHAR(255),
    `phone` VARCHAR(20),
    `status` VARCHAR(50),
    `reset_code` VARCHAR(50),
    `created_date` DATETIME,
    `created_by` VARCHAR(255),
    `updated_date` DATETIME,
    `updated_by` VARCHAR(255),
    `business_address` TEXT,
    `store_name` VARCHAR(255),
    `store_desc` TEXT,
    `last_login_date` DATETIME,
	UNIQUE KEY `email_UNIQUE` (`email`),
	UNIQUE KEY `username_UNIQUE` (`username`),
	UNIQUE KEY `store_name_UNIQUE` (`store_name`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`buyer` (
    `buyer_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `reset_code` VARCHAR(50),
    `created_date` DATETIME,
    `created_by` VARCHAR(255),
    `updated_date` DATETIME,
    `updated_by` VARCHAR(255),
    `delivery_address` TEXT,
	UNIQUE KEY `email_UNIQUE` (`email`),
	UNIQUE KEY `username_UNIQUE` (`username`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`product` (
    `product_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `product_no` VARCHAR(255) NOT NULL,
    `seller_id` INT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `price` FLOAT NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `description` TEXT NOT NULL,
    `created_date` DATETIME NOT NULL,
    `updated_date` DATETIME,
    FOREIGN KEY (seller_id) REFERENCES seller(seller_id),
    UNIQUE KEY `product_no_UNIQUE` (`product_no`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`product_detail` (
    `product_detail_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `product_detail_no` VARCHAR(255) NOT NULL,
    `product_id` INT NOT NULL,
    `size` VARCHAR(50) NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `color` VARCHAR(50) NOT NULL,
    `material` VARCHAR(50) NOT NULL,
    `min_stock_qty` INT NOT NULL,
    `available_qty` INT NOT NULL,
    `sales_out_qty` INT DEFAULT 0,
    `created_date` DATETIME NOT NULL,
    `updated_date` DATETIME,
    `updated_by` VARCHAR(255),
    FOREIGN KEY (product_id) REFERENCES product(product_id),
    UNIQUE KEY `product_detail_no_UNIQUE` (`product_detail_no`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`product_image` (
    `product_image_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `product_id` INT NOT NULL,
    `image_name` VARCHAR(255) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES product(product_id)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`order` (
    `order_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `order_no` VARCHAR(255) NOT NULL,
    `product_detail_id` INT NOT NULL,
    `buyer_id` INT NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `product_name` VARCHAR(255) NOT NULL,
    `price` FLOAT NOT NULL,
    `quantity` INT NOT NULL,
    `size` VARCHAR(50) NOT NULL,
    `color` VARCHAR(50) NOT NULL,
    `material` VARCHAR(50) NOT NULL,
    `delivery_address` TEXT NOT NULL,
    `delivery_fee` FLOAT NOT NULL,
    `total_price` FLOAT NOT NULL,
    `created_date` DATETIME NOT NULL,
    `updated_date` DATETIME,
    FOREIGN KEY (product_detail_id) REFERENCES product_detail(product_detail_id),
    FOREIGN KEY (buyer_id) REFERENCES buyer(buyer_id),
    UNIQUE KEY `order_no_UNIQUE` (`order_no`)
);

-- useless table. todo: delete 
CREATE TABLE IF NOT EXISTS `SA_Shopping`.`payment` (
    `payment_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `payment_no` VARCHAR(255) NOT NULL,
    `order_id` INT NOT NULL,
    `price` FLOAT NOT NULL,
    `created_date` DATETIME NOT NULL,
    `payment_method` VARCHAR(50) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES `order`(order_id),
    UNIQUE KEY `payment_no_UNIQUE` (`payment_no`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`review` (
    `review_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `product_id` INT NOT NULL,
    `order_id` INT NOT NULL,
    `buyer_email` VARCHAR(255) NOT NULL,
    `review_text` TEXT NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `sentiment` FLOAT NOT NULL,
    `created_date` DATETIME NOT NULL,
    `updated_date` DATETIME,
    FOREIGN KEY (product_id) REFERENCES product(product_id),
    FOREIGN KEY (order_id) REFERENCES `order`(order_id)
);
