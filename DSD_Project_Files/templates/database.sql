CREATE DATABASE ArmoredStallion;

USE ArmoredStallion;

-- Customer Table
CREATE TABLE Customer (
    CustomerID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(50) NOT NULL,
    Password VARCHAR(50) NOT NULL,
    Address TEXT NOT NULL,
    CredCar CHAR(8) NOT NULL
);
INSERT INTO Customer (CustomerID, Username, Password,
            Address, CredCar) VALUES (2121, 'mbektic',
            'password1', '321 Squire Blvd.', 7328372);

-- Horse Table
CREATE TABLE Horse (
    HorseID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50) NOT NULL,
    Breed VARCHAR(50) NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Stock INT NOT NULL
);
INSERT INTO Horse (HorseID, Name, Breed, Price, Stock)
            VALUES (73918, 'Seabiscuit', 'Purebred',
            100, 9),
            (98709, 'Aatrox', 'Alaskan', 9999, 84),
            (68859, 'Warwick', 'Pony', 392, 45),
            (15264, 'Majin Buu', 'Unicorn', 435, 3),
            (27194, 'Perfect Cell', 'Perfection', 5294, 1),
            (14141, 'Medo', 'Super', 88, 12);

-- Cart Table
CREATE TABLE Cart (
    CartID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT NOT NULL,
    FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID) ON DELETE CASCADE
);

-- CartItem Table
CREATE TABLE CartItem (
    CartItemID INT AUTO_INCREMENT PRIMARY KEY,
    CartID INT NOT NULL,
    HorseID INT NOT NULL,
    Quantity INT NOT NULL,
    FOREIGN KEY (CartID) REFERENCES Cart(CartID) ON DELETE CASCADE,
    FOREIGN KEY (HorseID) REFERENCES Horse(HorseID)
);

-- Order Table
CREATE TABLE `Order` (
    OrderID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT NOT NULL,
    OrderDate DATE NOT NULL,
    TotalAmount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID) ON DELETE CASCADE
);

-- OrderItem Table
CREATE TABLE OrderItem (
    OrderItemID INT AUTO_INCREMENT PRIMARY KEY,
    OrderID INT NOT NULL,
    HorseID INT NOT NULL,
    Quantity INT NOT NULL,
    ItemPrice DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (OrderID) REFERENCES `Order`(OrderID) ON DELETE CASCADE,
    FOREIGN KEY (HorseID) REFERENCES Horse(HorseID)
);