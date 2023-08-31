INSERT INTO Seller (username, name, email, password, phone, status, resetCode, createdDate, createdBy, updatedDate, updatedBy, businessAddress, storeName, storeDesc, lastLoginDate)
VALUES
    ('seller1', 'Seller One', 'seller1@example.com', 'password', '1234567890', 'Active', 'reset123', '2023-08-31 10:00:00', 'Admin', '2023-08-31 10:00:00', 'Admin', '123 Business St', 'Store 1', 'Welcome to Store 1', '2023-08-31 10:30:00'),
    ('seller2', 'Seller Two', 'seller2@example.com', 'password', '9876543210', 'Active', 'reset456', '2023-08-31 11:00:00', 'Admin', '2023-08-31 11:00:00', 'Admin', '456 Business St', 'Store 2', 'Welcome to Store 2', '2023-08-31 11:30:00'),
    ('seller3', 'Seller Three', 'seller3@example.com', 'password', '5555555555', 'Active', 'reset789', '2023-08-31 12:00:00', 'Admin', '2023-08-31 12:00:00', 'Admin', '789 Business St', 'Store 3', 'Welcome to Store 3', '2023-08-31 12:30:00'),
    ('seller4', 'Seller Four', 'seller4@example.com', 'password', '1112223333', 'Active', 'resetabc', '2023-08-31 13:00:00', 'Admin', '2023-08-31 13:00:00', 'Admin', '987 Business St', 'Store 4', 'Welcome to Store 4', '2023-08-31 13:30:00'),
    ('seller5', 'Seller Five', 'seller5@example.com', 'password', '4445556666', 'Active', 'resetxyz', '2023-08-31 14:00:00', 'Admin', '2023-08-31 14:00:00', 'Admin', '654 Business St', 'Store 5', 'Welcome to Store 5', '2023-08-31 14:30:00');

INSERT INTO Admin (username, name, email, password, phone, status, resetCode, createdDate, createdBy, updatedDate, updatedBy)
VALUES
    ('admin1', 'Admin One', 'admin1@example.com', 'adminpass', '9876543210', 'Active', 'reset123', '2023-08-31 15:00:00', 'Admin', '2023-08-31 15:00:00', 'Admin'),
    ('admin2', 'Admin Two', 'admin2@example.com', 'adminpass', '5555555555', 'Active', 'reset456', '2023-08-31 16:00:00', 'Admin', '2023-08-31 16:00:00', 'Admin'),
    ('admin3', 'Admin Three', 'admin3@example.com', 'adminpass', '1112223333', 'Active', 'reset789', '2023-08-31 17:00:00', 'Admin', '2023-08-31 17:00:00', 'Admin'),
    ('admin4', 'Admin Four', 'admin4@example.com', 'adminpass', '4445556666', 'Active', 'resetabc', '2023-08-31 18:00:00', 'Admin', '2023-08-31 18:00:00', 'Admin'),
    ('admin5', 'Admin Five', 'admin5@example.com', 'adminpass', '7778889999', 'Active', 'resetxyz', '2023-08-31 19:00:00', 'Admin', '2023-08-31 19:00:00', 'Admin'),
    ('admin6', 'Admin Six', 'admin6@example.com', PASSWORD('adminpass'), '9876543211', 'Active', 'reset888', '2023-08-31 15:00:00', 'Admin', '2023-08-31 15:00:00', 'Admin');

INSERT INTO Buyer (username, name, email, password, phone, status, resetCode, createdDate, createdBy, updatedDate, updatedBy, deliveryAddress)
VALUES
    ('buyer1', 'Buyer One', 'buyer1@example.com', 'buyerpass', '1234567890', 'Active', 'reset123', '2023-08-31 20:00:00', 'Admin', '2023-08-31 20:00:00', 'Admin', '123 Buyer St'),
    ('buyer2', 'Buyer Two', 'buyer2@example.com', 'buyerpass', '9876543210', 'Active', 'reset456', '2023-08-31 21:00:00', 'Admin', '2023-08-31 21:00:00', 'Admin', '456 Buyer St'),
    ('buyer3', 'Buyer Three', 'buyer3@example.com', 'buyerpass', '5555555555', 'Active', 'reset789', '2023-08-31 22:00:00', 'Admin', '2023-08-31 22:00:00', 'Admin', '789 Buyer St'),
    ('buyer4', 'Buyer Four', 'buyer4@example.com', 'buyerpass', '1112223333', 'Active', 'resetabc', '2023-08-31 23:00:00', 'Admin', '2023-08-31 23:00:00', 'Admin', '987 Buyer St'),
    ('buyer5', 'Buyer Five', 'buyer5@example.com', 'buyerpass', '4445556666', 'Active', 'resetxyz', '2023-09-01 00:00:00', 'Admin', '2023-09-01 00:00:00', 'Admin', '654 Buyer St');

INSERT INTO Product (productNo, sellerId, name, price, description, createdDate, updatedDate)
VALUES
    ('P12345', 1, 'Product One', 50.00, 'This is Product One description.', '2023-09-01 01:00:00', '2023-09-01 01:00:00'),
    ('P23456', 2, 'Product Two', 60.00, 'This is Product Two description.', '2023-09-01 02:00:00', '2023-09-01 02:00:00'),
    ('P34567', 3, 'Product Three', 70.00, 'This is Product Three description.', '2023-09-01 03:00:00', '2023-09-01 03:00:00'),
    ('P45678', 4, 'Product Four', 80.00, 'This is Product Four description.', '2023-09-01 04:00:00', '2023-09-01 04:00:00'),
    ('P56789', 5, 'Product Five', 90.00, 'This is Product Five description.', '2023-09-01 05:00:00', '2023-09-01 05:00:00');

INSERT INTO ProductDetail (productDetailNo, productId, size, status, color, material, minStockQty, availableQty, salesOutQty, createdDate, updatedDate, updatedBy)
VALUES
    ('PD12345', 1, 'M', 'Available', 'Red', 'Cotton', 10, 5, 0, '2023-09-01 06:00:00', '2023-09-01 06:00:00', 'Admin'),
    ('PD23456', 2, 'L', 'Available', 'Blue', 'Polyester', 15, 8, 0, '2023-09-01 07:00:00', '2023-09-01 07:00:00', 'Admin'),
    ('PD34567', 3, 'S', 'Available', 'Green', 'Silk', 20, 10, 0, '2023-09-01 08:00:00', '2023-09-01 08:00:00', 'Admin'),
    ('PD45678', 4, 'XL', 'Available', 'Black', 'Wool', 12, 4, 0, '2023-09-01 09:00:00', '2023-09-01 09:00:00', 'Admin'),
    ('PD56789', 5, 'M', 'Available', 'White', 'Cotton', 18, 6, 0, '2023-09-01 10:00:00', '2023-09-01 10:00:00', 'Admin');

INSERT INTO ProductImage (productId, imageURL)
VALUES
    (1, 'image1.jpg'),
    (2, 'image2.jpg'),
    (3, 'image3.jpg'),
    (4, 'image4.jpg'),
    (5, 'image5.jpg');

INSERT INTO `Order` (orderNo, productDetailId, buyerId, status, productName, price, quantity, size, color, material, deliveryAddress, deliveryFee, totalPrice, createdDate)
VALUES
    ('ORDER123', 1, 1, 'Closed', 'Product One', 50.00, 2, 'M', 'Red', 'Cotton', '123 Buyer St', 5.00, 105.00, '2023-09-01 11:00:00'),
    ('ORDER234', 2, 2, 'Delivered', 'Product Two', 60.00, 3, 'L', 'Blue', 'Polyester', '456 Buyer St', 5.00, 185.00, '2023-09-01 12:00:00'),
    ('ORDER345', 3, 3, 'Shipped', 'Product Three', 70.00, 1, 'S', 'Green', 'Silk', '789 Buyer St', 5.00, 75.00, '2023-09-01 13:00:00'),
    ('ORDER456', 4, 4, 'Confirmed', 'Product Four', 80.00, 2, 'XL', 'Black', 'Wool', '123 Buyer St', 5.00, 170.00, '2023-09-01 14:00:00'),
    ('ORDER567', 5, 5, 'Received', 'Product Five', 90.00, 2, 'M', 'White', 'Cotton', '456 Buyer St', 5.00, 190.00, '2023-09-01 15:00:00');

INSERT INTO Payment (paymentNo, orderId, price, createdDate, paymentMethod)
VALUES
    ('PAY123', 1, 105.00, '2023-09-01 16:00:00', 'Credit Card'),
    ('PAY234', 2, 185.00, '2023-09-01 17:00:00', 'PayPal'),
    ('PAY345', 3, 75.00, '2023-09-01 18:00:00', 'Credit Card'),
    ('PAY456', 4, 170.00, '2023-09-01 19:00:00', 'Google Pay'),
    ('PAY567', 5, 190.00, '2023-09-01 20:00:00', 'Apple Pay');

INSERT INTO Review (productId, orderId, buyerEmail, reviewText, status, sentiment, createdDate, updatedDate)
VALUES
    (1, 1, 'buyer1@example.com', 'This is a great product!', 'New', 0.9, '2023-09-01 21:00:00', '2023-09-01 21:00:00'),
    (2, 2, 'buyer2@example.com', 'Product quality is excellent.', 'New', 0.8, '2023-09-01 22:00:00', '2023-09-01 22:00:00'),
    (3, 3, 'buyer3@example.com', 'Fast delivery and good packaging.', 'New', 0.85, '2023-09-01 23:00:00', '2023-09-01 23:00:00'),
    (4, 4, 'buyer4@example.com', 'Satisfied with the purchase.', 'New', 0.75, '2023-09-02 00:00:00', '2023-09-02 00:00:00'),
    (5, 5, 'buyer5@example.com', 'Product arrived as described.', 'New', 0.9, '2023-09-02 01:00:00', '2023-09-02 01:00:00');
