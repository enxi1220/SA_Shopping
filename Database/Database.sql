DROP DATABASE IF EXISTS `SA_Shopping`;

CREATE DATABASE `SA_Shopping`;
USE `SA_Shopping`;

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`Seller` (
    `sellerId` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(255),
    `name` VARCHAR(255),
    `email` VARCHAR(255),
    `password` VARCHAR(255),
    `phone` VARCHAR(20),
    `status` VARCHAR(50),
    `resetCode` VARCHAR(50),
    `createdDate` DATETIME,
    `createdBy` VARCHAR(255),
    `updatedDate` DATETIME,
    `updatedBy` VARCHAR(255),
    `businessAddress` TEXT,
    `storeName` VARCHAR(255),
    `storeDesc` TEXT,
    `lastLoginDate` DATETIME,
	UNIQUE KEY `email_UNIQUE` (`email`),
	UNIQUE KEY `username_UNIQUE` (`username`),
	UNIQUE KEY `storeName_UNIQUE` (`storeName`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`Admin` (
    `adminId` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `resetCode` VARCHAR(50),
    `createdDate` DATETIME,
    `createdBy` VARCHAR(255),
    `updatedDate` DATETIME,
    `updatedBy` VARCHAR(255),
	UNIQUE KEY `email_UNIQUE` (`email`),
	UNIQUE KEY `username_UNIQUE` (`username`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`Buyer` (
    `buyerId` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(255) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `resetCode` VARCHAR(50),
    `createdDate` DATETIME,
    `createdBy` VARCHAR(255),
    `updatedDate` DATETIME,
    `updatedBy` VARCHAR(255),
    `deliveryAddress` TEXT,
	UNIQUE KEY `email_UNIQUE` (`email`),
	UNIQUE KEY `username_UNIQUE` (`username`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`Product` (
    `productId` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `productNo` VARCHAR(255) NOT NULL,
    `sellerId` INT NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `price` FLOAT NOT NULL,
    `description` TEXT NOT NULL,
    `createdDate` DATETIME NOT NULL,
    `updatedDate` DATETIME,
    FOREIGN KEY (sellerId) REFERENCES Seller(sellerId),
    UNIQUE KEY `productNo_UNIQUE` (`productNo`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`ProductDetail` (
    `productDetailId` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `productDetailNo` VARCHAR(255) NOT NULL,
    `productId` INT NOT NULL,
    `size` VARCHAR(50) NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `color` VARCHAR(50) NOT NULL,
    `material` VARCHAR(50) NOT NULL,
    `minStockQty` INT NOT NULL,
    `availableQty` INT NOT NULL,
    `salesOutQty` INT DEFAULT 0,
    `createdDate` DATETIME NOT NULL,
    `updatedDate` DATETIME,
    `updatedBy` VARCHAR(255),
    FOREIGN KEY (productId) REFERENCES Product(productId),
    UNIQUE KEY `productDetailNo_UNIQUE` (`productDetailNo`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`ProductImage` (
    `productImageId` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `productId` INT NOT NULL,
    `imageURL` VARCHAR(255) NOT NULL,
    FOREIGN KEY (productId) REFERENCES Product(productId)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`Order` (
    `orderId` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `orderNo` VARCHAR(255) NOT NULL,
    `productDetailId` INT NOT NULL,
    `buyerId` INT NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `productName` VARCHAR(255) NOT NULL,
    `price` FLOAT NOT NULL,
    `quantity` INT NOT NULL,
    `size` VARCHAR(50) NOT NULL,
    `color` VARCHAR(50) NOT NULL,
    `material` VARCHAR(50) NOT NULL,
    `deliveryAddress` TEXT NOT NULL,
    `deliveryFee` FLOAT NOT NULL,
    `totalPrice` FLOAT NOT NULL,
    `createdDate` DATETIME NOT NULL,
    FOREIGN KEY (productDetailId) REFERENCES ProductDetail(productDetailId),
    FOREIGN KEY (buyerId) REFERENCES Buyer(buyerId),
    UNIQUE KEY `orderNo_UNIQUE` (`orderNo`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`Payment` (
    `paymentId` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `paymentNo` VARCHAR(255) NOT NULL,
    `orderId` INT NOT NULL,
    `price` FLOAT NOT NULL,
    `createdDate` DATETIME NOT NULL,
    `paymentMethod` VARCHAR(50) NOT NULL,
    FOREIGN KEY (orderId) REFERENCES `Order`(orderId),
    UNIQUE KEY `paymentNo_UNIQUE` (`paymentNo`)
);

CREATE TABLE IF NOT EXISTS `SA_Shopping`.`Review` (
    `reviewId` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `productId` INT NOT NULL,
    `orderId` INT NOT NULL,
    `buyerEmail` VARCHAR(255) NOT NULL,
    `reviewText` TEXT NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `sentiment` FLOAT NOT NULL,
    `createdDate` DATETIME NOT NULL,
    `updatedDate` DATETIME,
    FOREIGN KEY (productId) REFERENCES Product(productId),
    FOREIGN KEY (orderId) REFERENCES `Order`(orderId)
);
