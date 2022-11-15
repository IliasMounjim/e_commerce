/*****************************************
* Create the e_commerce database
*****************************************/
-- create and select the database
DROP DATABASE IF EXISTS e_commerce;
CREATE DATABASE e_commerce;
USE e_commerce;


-- categories in our book store will be the genre of the book
-- For example, sci-fi, novel, horror
CREATE TABLE genres (
 genreID       INT(11)        NOT NULL   AUTO_INCREMENT,
 genreName     VARCHAR(255)   NOT NULL,
 PRIMARY KEY (genreID)
);



CREATE TABLE books (
 bookID         INT            NOT NULL   AUTO_INCREMENT,
 genreID        INT            NOT NULL,
 bookName       VARCHAR(255)   NOT NULL,
 bookDescription       TEXT           NOT NULL,
 listPrice         DECIMAL(10,2)  NOT NULL,
 discountPercent   DECIMAL(10,2)  NOT NULL   DEFAULT 0.00,
 isbn              VARCHAR(255)   NOT NULL,
 authors           VARCHAR(255)   NOT NULL,
 publisher         VARCHAR(255)   NOT NULL,
 pictureName       VARCHAR(255)   NOT NULL,
 PRIMARY KEY (bookID), 
 FOREIGN KEY (genreID) REFERENCES genres(genreID)
);

CREATE TABLE users (
 userID        INT            NOT NULL   AUTO_INCREMENT,
 
 /*
 1 is visitor, they can view and search books, everyone that enters the site without cookies stored, they will be viewed as visitors
 2 is normal user, they can use shopping cart, view/search books, and checks out. When a new user try to register, they will be assigned as a normal user
 3 is administrator, we will have a few pre-define admin accounts, they can add/delete/update/select books
 */
 privileges        INT            NOT NULL,
 
 emailAddress      VARCHAR(255)   NOT NULL,
 userPassword          VARCHAR(60)    NOT NULL,
 firstName         VARCHAR(60)    NOT NULL,
 lastName          VARCHAR(60)    NOT NULL,
 shipAddressID     INT            DEFAULT NULL,
 billingAddressID  INT            DEFAULT NULL,
 PRIMARY KEY (userID),
 UNIQUE INDEX emailAddress (emailAddress),
 INDEX shipAddressID(shipAddressID),
 INDEX billingAddressID(billingAddressID)

 /* Reference to addresses table, I used a command below at line 159 & 160, foreign key in table do not work, errno: 150 "Foreign key constraint is incorrectly formed
 
 FOREIGN KEY (shipAddressID) REFERENCES addresses(addressID),
 FOREIGN KEY (billingAddressID) REFERENCES addresses(addressID)
 */
);


CREATE TABLE addresses (
 addressID         INT            NOT NULL   AUTO_INCREMENT,
 userID            INT            NOT NULL,
 line1             VARCHAR(60)    NOT NULL,
 line2             VARCHAR(60)               DEFAULT NULL,
 city              VARCHAR(40)    NOT NULL,
 address_State             VARCHAR(2)     NOT NULL,
 zipCode           VARCHAR(10)    NOT NULL,
 phone             VARCHAR(12)    NOT NULL,
 address_Disabled          TINYINT(1)     NOT NULL   DEFAULT 0,
 PRIMARY KEY (addressID),
 INDEX userID(userID),
 FOREIGN KEY (userID) REFERENCES users(userID)
);

CREATE TABLE orders (
 orderID           INT            NOT NULL   AUTO_INCREMENT,
 userID            INT            NOT NULL,
 orderDate         DATE       NOT NULL,
 shipAmount        DECIMAL(10,2)  NOT NULL,
 taxAmount         DECIMAL(10,2)  NOT NULL,
 shipDate          DATE           DEFAULT NULL,
 shipAddressID     INT            NOT NULL,
 cardType          CHAR(1)        NOT NULL,
 cardNumber        CHAR(16)       NOT NULL,
 cardExpires       CHAR(7)        NOT NULL,
 billingAddressID  INT            NOT NULL,
 PRIMARY KEY (orderID), 
 INDEX userID (userID),
 FOREIGN KEY (userID) REFERENCES users(userID)
);

CREATE TABLE orderItems (
 itemID            INT            NOT NULL   AUTO_INCREMENT,
 orderID           INT            NOT NULL,

 
 bookID         INT            NOT NULL,

 /* Do we need these two in here tho? Cuz it can reference books.bookID*/
 itemPrice         DECIMAL(10,2)  NOT NULL,
 discountAmount    DECIMAL(10,2)  NOT NULL,
 

 quantity          INT            NOT NULL,
 PRIMARY KEY (itemID), 
 INDEX orderID (orderID), 
 INDEX bookID (bookID),
 FOREIGN KEY (bookID) REFERENCES books(bookID),
 FOREIGN KEY (orderID) REFERENCES orders(orderID)
);


-- create the users
CREATE USER IF NOT EXISTS mgs_user@localhost 
IDENTIFIED BY 'pa55word';
CREATE USER IF NOT EXISTS mgs_tester@localhost 
IDENTIFIED BY 'pa55word';
-- grant privleges to the users
GRANT SELECT, INSERT, DELETE, UPDATE
ON * 
TO mgs_user@localhost;
GRANT SELECT 
ON books
TO mgs_tester@localhost;


INSERT INTO `genres`(`genreName`) VALUES
('Arts'),
('Sci-Fi'),
('Education'),
('Literature'),
('Science'),
('Comic');

INSERT INTO `books`(`genreID`, `bookName`, `bookDescription`, `listPrice`, `discountPercent`, `isbn`, `authors`, `publisher`, `pictureName`) VALUES
('1','Picasso Sculpture',"The most in-depth account of the lives of Picasso's sculptures.",'82.55','0.00','0870709747','Ann Temkin','The Museum of Modern Art, New York','../view/pic/Picasso.jpg'),
('1','Origami Extravaganza! Folding Paper, a Book, and a Box',"Make dozens of fun and easy origami projects with this colossal origami kit.",'14.39','0.05','0804832420','Tuttle Publishing','Tuttle Publishing','../view/pic/Origami.jpg'),
('2', 'The Dark Forest', "In The Dark Forest, Earth is reeling from the revelation of a coming alien invasion-in just four centuries' time.", '28.34', '0.10', '9780765377081', 'Cixin Liu', 'Tor Books', '../view/pic/Dark_Forest.jpg'),
('2', 'Do Androids Dream of Electric Sheep', "A masterpiece ahead of its time, a prescient rendering of a dark future, and the inspiration for the blockbuster film Blade Runner.", '13.99', '0.05', '0345404475', 'Philip K. Dick', 'Random House Worlds', '../view/pic/Sheep.jpg'),
('3', 'My First Book of Baby Signs: 40 Essential Signs to Learn and Practice', "Learn sign language alongside your baby with this adorable storybook for ages 0 to 3", '11.50', '0.00', '1648766595', 'Lane Rebelo', 'Rockridge Press', '../view/pic/Baby.jpg'),
('3', 'Princeton Review SAT Premium Prep, 2022', "Make sure you're studying with the most up-to-date prep materials! 9 Practice Tests + Review & Techniques + Online Tools and more.", '28.88', '0.08', '0525570446', 'The Princeton Review', 'Princeton Review', '../view/pic/Sat.jpg'),
('4', 'The Complete Fiction of H. P. Lovecraft', "The Complete Fiction of H. P. Lovecraft collects the great horror author's novel, four novellas, and fifty-three short stories.", '13.89', '0.00', '0785834206', 'Howard Phillips Lovecraft', 'Chartwell Books', '../view/pic/Lovecraft.jpg'),
('4', 'To Kill a Mockingbird', "Pulitzer Prize-winning masterwork of honor and injustice in the deep South—and the heroism of one man in the face of blind and violent hatred.", '22.99', '0.00', '0062420704', 'Harper Lee', 'Harper', '../view/pic/Bird.jpg'),
('5', 'Quantum Physics for Beginners', "Award-winner scientist, Carl J. Pratt, presents the most exhaustive and clear introduction to the topic.", '24.95', '0.00', '1802356584', 'Carl J. Pratt', 'Stefano Solimito', '../view/pic/Quantum.jpg'),
('5', 'Universe: The Definitive Visual Guide', "Marvel at the wonders of the Universe, from stars and planets to black holes and nebulae, in this exploration of our Solar System and beyond.", '49.99', '0.25', '0241412749', 'DK', 'DK', '../view/pic/Space.jpg'),
('6', 'Star Wars Vol. 1: Skywalker Strikes', "The greatest space adventure of all returns to Marvel! Luke Skywalker and the ragtag rebel band opposing the Galactic Empire are fresh off their biggest victory.", '11.99', '0.35', '0785192131', 'John Cassaday', 'Marvel', '../view/pic/Star_Wars.jpg'),
('6', 'Spider-Man', "Taking on both writing and art duties, McFarlane ushered Peter Parker into a gritty new era", '43.99', '0.00', '1302923730', 'Todd McFarlane', 'Marvel', '../view/pic/Spider-Man.jpg');


INSERT INTO `users`(`privileges`, `emailAddress`, `userPassword`, `firstName`, `lastName`) VALUES 
('3','Eli','123','admin','Eli'),
('3','Lin','123','admin','Lin'),
('1','','','Dear','Visitor');


ALTER TABLE `users` ADD CONSTRAINT `users_shipAddressID_fk` FOREIGN KEY (`shipAddressID`) REFERENCES `addresses`(`addressID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `users` ADD CONSTRAINT `users_billingAddressID_fk` FOREIGN KEY (`billingAddressID`) REFERENCES `addresses`(`addressID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
